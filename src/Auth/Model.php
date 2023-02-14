<?php

namespace AgeekDev\DevLogin\Auth;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Concerns\GuardsAttributes;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Concerns\HidesAttributes;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use JsonSerializable;

/**
 * @property bool $incrementing
 */
abstract class Model implements Arrayable, ArrayAccess, Jsonable, JsonSerializable
{
    use HasAttributes;
    use HasEvents;
    use HasTimestamps;
    use HidesAttributes;
    use GuardsAttributes;

    /**
     * The primary key for the model.
     */
    protected string $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     */
    protected string $keyType = 'string';

    /**
     * Indicates if the model exists.
     */
    public bool $exists = false;

    /**
     * Indicates that the object's string representation should be escaped when __toString is invoked.
     */
    protected bool $escapeWhenCastingToString = false;

    /**
     * The loaded relationships for the model.
     */
    protected array $relations = [];

    /**
     * The event dispatcher instance.
     */
    protected static \Illuminate\Contracts\Events\Dispatcher $dispatcher;

    /**
     * The array of booted models.
     */
    protected static array $booted = [];

    /**
     * The array of trait initializers that will be called on each new instance.
     */
    protected static array $traitInitializers = [];

    /**
     * The array of global scopes on the model.
     */
    protected static array $globalScopes = [];

    /**
     * Create a new Eloquent model instance.
     */
    final public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();

        $this->initializeTraits();

        $this->syncOriginal();

        $this->fill($attributes);
    }

    /**
     * Check if the model needs to be booted and if so, do it.
     */
    protected function bootIfNotBooted(): void
    {
        if (! isset(static::$booted[static::class])) {
            static::$booted[static::class] = true;

            $this->fireModelEvent('booting', false);

            static::booting();
            static::boot();
            static::booted();

            $this->fireModelEvent('booted', false);
        }
    }

    /**
     * Perform any actions required before the model boots.
     */
    protected static function booting(): void
    {
        //
    }

    /**
     * Bootstrap the model and its traits.
     */
    protected static function boot(): void
    {
        static::bootTraits();
    }

    /**
     * Boot all the bootable traits on the model.
     */
    protected static function bootTraits(): void
    {
        $class = static::class;

        $booted = [];

        static::$traitInitializers[$class] = [];

        foreach (class_uses_recursive($class) as $trait) {
            $method = 'boot'.class_basename($trait);

            if (method_exists($class, $method) && ! in_array($method, $booted)) {
                forward_static_call([$class, $method]);

                $booted[] = $method;
            }

            if (method_exists($class, $method = 'initialize'.class_basename($trait))) {
                static::$traitInitializers[$class][] = $method;

                static::$traitInitializers[$class] = array_unique(
                    static::$traitInitializers[$class]
                );
            }
        }
    }

    /**
     * Initialize any initializable traits on the model.
     */
    protected function initializeTraits(): void
    {
        foreach (static::$traitInitializers[static::class] as $method) {
            $this->{$method}();
        }
    }

    /**
     * Perform any actions required after the model boots.
     */
    protected static function booted(): void
    {
        //
    }

    /**
     * Clear the list of booted models, so they will be re-booted.
     */
    public static function clearBootedModels(): void
    {
        static::$booted = [];

        static::$globalScopes = [];
    }

    /**
     * Fill the model with an array of attributes.
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function fill(array $attributes): static
    {
        $totallyGuarded = $this->totallyGuarded();

        foreach ($this->fillableFromArray($attributes) as $key => $value) {
            // The developers may choose to place some attributes in the "fillable" array
            // which means only those attributes may be set through mass assignment to
            // the model, and all others will just get ignored for security reasons.
            if ($this->isFillable($key)) {
                $this->setAttribute($key, $value);
            } elseif ($totallyGuarded) {
                throw new MassAssignmentException(sprintf(
                    'Add [%s] to fillable property to allow mass assignment on [%s].',
                    $key,
                    get_class($this)
                ));
            }
        }

        return $this;
    }

    /**
     * Create a new instance of the given model.
     */
    public function newInstance(array $attributes = [], bool $exists = false): static
    {
        // This method just provides a convenient way for us to generate fresh model
        // instances of this current model. It is particularly useful during the
        // hydration of new objects via the Eloquent query builder instances.
        $model = new static((array) $attributes);

        $model->exists = $exists;

        $model->mergeCasts($this->casts);

        return $model;
    }

    /**
     * Convert the model instance to an array.
     */
    public function toArray(): array
    {
        return $this->attributesToArray();
    }

    /**
     * Convert the model instance to JSON.
     *
     * @throws \Illuminate\Database\Eloquent\JsonEncodingException
     */
    public function toJson($options = 0): string
    {
        $json = json_encode($this->jsonSerialize(), $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw JsonEncodingException::forModel($this, json_last_error_msg());
        }

        return $json;
    }

    /**
     * Convert the object into something JSON serializable.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Get the primary key for the model.
     */
    public function getKeyName(): string
    {
        return $this->primaryKey;
    }

    /**
     * Set the primary key for the model.
     */
    public function setKeyName(string $key): static
    {
        $this->primaryKey = $key;

        return $this;
    }

    /**
     * Get the auto-incrementing key type.
     */
    public function getKeyType(): string
    {
        return $this->keyType;
    }

    /**
     * Set the data type for the primary key.
     */
    public function setKeyType(string $type): static
    {
        $this->keyType = $type;

        return $this;
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     */
    public function getIncrementing(): bool
    {
        return $this->incrementing;
    }

    /**
     * Set whether IDs are incrementing.
     */
    public function setIncrementing(bool $value): static
    {
        $this->incrementing = $value;

        return $this;
    }

    /**
     * Get the value of the model's primary key.
     */
    public function getKey(): mixed
    {
        return $this->getAttribute($this->getKeyName());
    }

    /**
     * Get the queueable identity for the entity.
     */
    public function getQueueableId(): mixed
    {
        return $this->getKey();
    }

    /**
     * Get the value of the model's route key.
     */
    public function getRouteKey(): mixed
    {
        return $this->getAttribute($this->getRouteKeyName());
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return $this->getKeyName();
    }

    /**
     * Dynamically retrieve attributes on the model.
     */
    public function __get(string $key)
    {
        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     */
    public function __set(string $key, mixed $value)
    {
        $this->setAttribute($key, $value);
    }

    /**
     * Determine if the given attribute exists.
     */
    #[\ReturnTypeWillChange]
    public function offsetExists(mixed $offset): bool
    {
        return ! is_null($this->getAttribute($offset));
    }

    /**
     * Get the value for a given offset.
     */
    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $offset): mixed
    {
        return $this->getAttribute($offset);
    }

    /**
     * Set the value for a given offset.
     */
    #[\ReturnTypeWillChange]
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->setAttribute($offset, $value);
    }

    /**
     * Unset the value for a given offset.
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset(mixed $offset): void
    {
        unset($this->attributes[$offset], $this->relations[$offset]);
    }

    /**
     * Determine if an attribute or relation exists on the model.
     */
    public function __isset(string $key)
    {
        return $this->offsetExists($key);
    }

    /**
     * Unset an attribute on the model.
     */
    public function __unset(string $key)
    {
        $this->offsetUnset($key);
    }

    /**
     * Handle dynamic static method calls into the model.
     */
    public static function __callStatic(string $method, array $parameters)
    {
        return (new static())->$method(...$parameters);
    }

    /**
     * Convert the model to its string representation.
     */
    public function __toString()
    {
        return $this->escapeWhenCastingToString
                    ? e($this->toJson())
                    : $this->toJson();
    }

    /**
     * Indicate that the object's string representation should be escaped when __toString is invoked.
     */
    public function escapeWhenCastingToString(bool $escape = true): static
    {
        $this->escapeWhenCastingToString = $escape;

        return $this;
    }

    /**
     * Prepare the object for serialization.
     */
    public function __sleep()
    {
        $this->mergeAttributesFromCachedCasts();

        $this->classCastCache = [];
        $this->attributeCastCache = [];

        return array_keys(get_object_vars($this));
    }

    /**
     * When a model is being unserialized, check if it needs to be booted.
     */
    public function __wakeup()
    {
        $this->bootIfNotBooted();

        $this->initializeTraits();
    }
}
