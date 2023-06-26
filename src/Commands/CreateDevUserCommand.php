<?php

namespace AgeekDev\DevLogin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateDevUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    public $signature = 'dev:user
                         {--name= : The name of dev user}
                         {--email= : The email of dev user (valid & unique)}
                         {--password= : The password of dev user (min 8 characters)}';

    /**
     * The console command description.
     */
    public $description = 'Create a new dev user';

    /**
     * Developer email.
     */
    protected string $email;

    /**
     * Developer name.
     */
    protected string $developerName;

    /**
     * Developer password.
     */
    protected string $password;

    /**
     * Check empty developer user array regex pattern.
     */
    protected string $emptyPattern = "/[\"\']+users[\"\']\s+\=>\s+\[([\s\S]*?)\],/";

    /**
     * Get developer users array regex pattern.
     */
    protected string $pattern = "/[\"']+users[\"']\s+=>\s+\[+([\s\S])+(?<=id|email|name|password|remember_token)+([\s\S])+(?<='|',)+(\n\s+|\n|)+(],|])+(\n\s+],|\n],|\s+],|\n\s+]|\n]|\s+])/";

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (! File::exists(config_path('dev-login.php'))) {
            $this->callSilent('vendor:publish', ['--tag' => 'dev-login-config', '--force' => true]);
        }

        $this->takeInput();

        $validator = $this->checkValidation();

        if ($validator->fails()) {
            $this->info("Dev user can't create. See error messages below:");

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::INVALID;
        }

        $users = config('dev-login.users', []);

        if ($this->isUserExist($users)) {
            $this->error('Dev user already exist');

            return self::INVALID;
        }

        $this->insertDeveloper();

        $this->showSuccessMassage();

        return self::SUCCESS;
    }

    private function isUserExist(array $users): bool
    {
        return collect($users)->where('email', $this->email)->isNotEmpty();
    }

    private function showSuccessMassage(): void
    {
        $loginUrl = route('dev-login.login');
        $this->info('Successfully created!! '.$this->email." can sign in at {$loginUrl} now.");
    }

    /**
     * Validate new developer input.
     */
    private function checkValidation(): \Illuminate\Contracts\Validation\Validator
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
     * Append new developer to dev-login config file.
     */
    private function insertDeveloper(): void
    {
        $path = config_path('dev-login.php');
        $devLoginConfig = config('dev-login');

        $users = $devLoginConfig['users'];
        $users[] = [
            'id' => Str::ulid()->generate(),
            'email' => $this->email,
            'name' => $this->developerName,
            'password' => Hash::make($this->password),
        ];
        $data['users'] = $users;

        $data = $this->varExport($data);
        $data = $this->replaceArrayIndex(count($devLoginConfig), $data);
        $data = $this->removeParentArray($data);
        $data = $this->replaceUsersString(empty($devLoginConfig['users']), $data, File::get($path));

        File::put($path, $data);
    }

    /**
     * Ask new developer information.
     */
    private function takeInput(): void
    {
        //        $this->email = $this->ask('Email');
        //        $this->developerName = $this->ask('Name');
        //        $this->password = $this->secret('Password');

        $this->email = 'test2@dev.com';
        $this->developerName = 'test2';
        $this->password = 'password';
    }

    /**
     * Rewrite like php var_export function.
     * Replace with shortened array syntax.
     */
    private function varExport(array $context): string
    {
        $export = var_export($context, true);
        $export = preg_replace('/^( *)(.*)/m', '$1$1$2', $export);
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
        preg_match($isEmptyPattern ? $this->emptyPattern : $this->pattern, $context, $result);

        return str_replace($result[0], $replace, $context);
    }
}
