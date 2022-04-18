<?php

namespace GenieFintech\DevLogin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CreateDevUserCommand extends Command
{
    protected string $email;
    protected string $developerName;
    protected string $password;

    public $signature = 'dev:user';

    public $description = 'Create Developer User';

    public function handle(): int
    {
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
        ], [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);
    }

    /**
     * @param array $arr
     * @param string $path
     *
     * @return void
     */
    public function insertDeveloper(array $arr, string $path): void
    {
        $arr['users'][] = [
            "id" => uniqid(),
            "email" => $this->email,
            "name" => $this->developerName,
            "password" => $this->password,
            "remember_me" => "",
        ];

        $data = $this->varExport($arr);
        $data = $this->removeArrayIndex(count($arr), $data);
        file_put_contents($path, "<?php\nreturn $data;");
    }

    /**
     * @return void
     */
    public function takeInput(): void
    {
        $this->email = $this->ask('Login Email?');
        $this->developerName = $this->ask('Developer Name?');
        $this->password = $this->secret('Password');
    }

    private function varExport(array $context): string
    {
        $export = var_export($context, true);
        $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
        $array = preg_split("/\r\n|\n|\r/", $export);
        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [null, ']$1', ' => ['], $array);

        return join(PHP_EOL, array_filter(["["] + $array));
    }

    private function removeArrayIndex(int $count, String $context): string
    {
        for ($x = 0; $x <= $count; $x++) {
            $context = str_replace("$x => [", "[", $context);
        }

        return $context;
    }
}
