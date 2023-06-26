<?php

namespace AgeekDev\DevLogin\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'dev:install';

    /**
     * The console command description.
     */
    protected $description = 'Install all of the Dev Login';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->comment('Publishing Dev Login Config...');
        $this->callSilent('vendor:publish', ['--tag' => 'dev-login-config', '--force' => true]);

        $this->comment('Publishing Dev Login Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'dev-login-assets', '--force' => true]);

        if ($this->confirm('Do you want to create dev user?', true)) {
            $this->call('dev:user');
        }

        $this->info('Dev Login installed successfully!');
    }
}
