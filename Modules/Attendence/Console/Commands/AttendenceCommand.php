<?php

namespace Modules\Attendence\Console\Commands;

use Illuminate\Console\Command;

class AttendenceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:AttendenceCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attendence Command description';

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
