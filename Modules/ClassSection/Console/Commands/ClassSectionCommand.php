<?php

namespace Modules\ClassSection\Console\Commands;

use Illuminate\Console\Command;

class ClassSectionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ClassSectionCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ClassSection Command description';

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
