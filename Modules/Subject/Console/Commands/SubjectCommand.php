<?php

namespace Modules\Subject\Console\Commands;

use Illuminate\Console\Command;

class SubjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SubjectCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subject Command description';

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
