<?php

namespace App\Console\Commands;

use App\Jobs\FindNextItemJob;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class UseNextItemCommand extends Command
{
    use DispatchesJobs;
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:nextItem';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find the next item to use';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $findNextItemJob = (new FindNextItemJob())->onQueue('items');
        
        $this->dispatch($findNextItemJob);
    }
}
