<?php

namespace Modules\StandardOrClass\Console\Commands;

use Illuminate\Console\Command;

class StandardOrClassCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:StandardOrClassCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'StandardOrClass Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
