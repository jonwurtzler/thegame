<?php

namespace App\Console\Commands;

use App\Jobs\GetPointsJob;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class GetPointsCommand extends Command
{
    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:points';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $getPoints = (new GetPointsJob())->onQueue('points')->delay(1);

        for($v = 0; $v < 30; $v++) {
            $this->dispatch($getPoints);
        }
    }
}
