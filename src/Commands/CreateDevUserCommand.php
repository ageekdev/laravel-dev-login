<?php

namespace GenieFintech\DevLogin\Commands;

use Illuminate\Console\Command;

class CreateDevUserCommand extends Command
{
    public $signature = 'dev:user';

    public $description = 'Create Developer User';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
