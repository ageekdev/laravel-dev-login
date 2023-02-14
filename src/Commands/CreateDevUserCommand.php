<?php

namespace AgeekDev\DevLogin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateDevUserCommand extends Command
{
    protected string $email;

    protected string $developerName;

    protected string $password;

    protected string $password_confirmation;

    protected string $emptyPattern = "/[\"\']+users[\"\']\s+\=>\s+\[([\s\S]*?)\],/";

    protected string $pattern = "/[\"']+users[\"']\s+=>\s+\[+([\s\S])+(?<=id|email|name|password|remember_token)+([\s\S])+(?<='|',)+(\n\s+|\n|\s+|)+(],|])+(\n\s+],|\n],|\s+],|\n\s+]|\n]|\s+])/";

    public $signature = 'dev:user';

    public $description = 'Create Developer User';

    public function handle(): int
    {
        if (! File::exists(config_path('dev-login.php'))) {
            $this->error('please run php artisan vendor:publish --provider="AgeekDev\DevLogin\DevLoginServiceProvider" --tag=dev-login-config');

            return self::INVALID;
        }

        $this->takeInput();

        $validator = $this->checkValidation();

        if ($validator->fails()) {
            $this->info('Dev User not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::INVALID;
        }

        $path = config_path('dev-login.php');
        $arr = include config_path('dev-login.php');

        $collect = collect(Arr::get($arr, 'users', []));
        $checkUserEmail = $collect->where('email', $this->email)->first();

        if ($checkUserEmail) {
            $this->error('User already exist');

            return self::INVALID;
        }

        $this->insertDeveloper($arr, $path);
        $this->info('Dev User created.');

        return self::SUCCESS;
    }

    public function checkValidation(): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make([
            'name' => $this->developerName,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ], [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'same:password', 'min:8'],
        ]);
    }

    /**
     * @param  array  $arr
     * @param  string  $path
     * @return void
     */
    public function insertDeveloper(array $arr, string $path): void
    {
        $users = $arr['users'];
        $users[] = [
            'id' => uniqid('', true),
            'email' => $this->email,
            'name' => $this->developerName,
            'password' => Hash::make($this->password),
            'remember_token' => '',
        ];
        $data['users'] = $users;

        $data = $this->varExport($data);
        $data = $this->replaceArrayIndex(count($arr), $data);
        $data = $this->removeParentArray($data);
        $data = $this->replaceUsersString(empty($arr['users']), $data, file_get_contents($path));

        file_put_contents($path, $data);
    }

    public function takeInput(): void
    {
        $this->email = $this->ask('Login Email?');
        $this->developerName = $this->ask('Developer Name?');
        $this->password = $this->secret('Password');
        $this->password_confirmation = $this->secret('Password Confirmation');
    }

    /**
     * Rewrite like php var_export function.
     * Replace with shortened array syntax.
     */
    private function varExport(array $context): string
    {
        $export = var_export($context, true);
        $export = preg_replace('/^([ ]*)(.*)/m', '$1$1$2', $export);
        $array = preg_split("/\r\n|\n|\r/", $export);
        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [null, ']$1', ' => ['], $array);

        if (is_array($array)) {
            $array = array_filter(['['] + $array);
        }

        return implode(PHP_EOL, $array);
    }

    /**
     * Replace the array index. (eg. `1 => [` replace with `[`)
     */
    private function replaceArrayIndex(int $count, string $context): string
    {
        for ($x = 0; $x <= $count; $x++) {
            $context = str_replace("$x => [", '[', $context);
        }

        return $context;
    }

    /**
     * Remove parent array scope.
     */
    private function removeParentArray(string $context): string
    {
        preg_match($this->pattern, $context, $result);

        return data_get($result, '0');
    }

    /**
     * Replace with new users string.
     */
    private function replaceUsersString(bool $isEmptyPattern, string $replace, string $context): string
    {
        return preg_replace($isEmptyPattern ? $this->emptyPattern : $this->pattern, $replace, $context);
    }
}
