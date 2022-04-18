<?php

namespace GenieFintech\DevLogin\Commands;

use Illuminate\Console\Command;
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

            return false;
        }

        $path = config_path('dev-login.php');
        $arr = include config_path('dev-login.php');

        $collect = collect($arr['users']);
        $checkUserEmail = $collect->where('email', $this->email)->first();

        if ($checkUserEmail) {
            $this->error('User already exist');

            return false;
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
     * @param mixed $arr
     * @param string $path
     * @return void
     */
    public function insertDeveloper(mixed $arr, string $path): void
    {
        $arr['users'][] = [
            "id" => uniqid(),
            "email" => $this->email,
            "name" => $this->developerName,
            "password" => $this->password,
            "remember_me" => "",
        ];

        $data = var_export($arr, 1);
        file_put_contents($path, "<?php\n return $data ;");
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
}
