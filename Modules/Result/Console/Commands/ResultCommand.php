<?php

namespace Modules\Result\Console\Commands;

use Illuminate\Console\Command;

class ResultCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ResultCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Result Command description';

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
