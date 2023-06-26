<?php

namespace AgeekDev\DevLogin\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'dev:publish {--force : Overwrite any existing files}';

    /**
     * The console command description.
     */
    protected $description = 'Publish all of the Dev Login resources';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'dev-login-config',
            '--force' => $this->option('force'),
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'dev-login-assets',
            '--force' => true,
        ]);
    }
}
