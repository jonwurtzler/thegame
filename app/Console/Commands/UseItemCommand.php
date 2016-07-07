<?php

namespace App\Console\Commands;

use App\Jobs\UseItemJob;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class UseItemCommand extends Command
{
    use DispatchesJobs;
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:item
                            {itemId : Id of the Item to use}
                            {target? : Who using the Item should Target}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use an Item!';

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
        $useItemJob = (new UseItemJob($this->argument('itemId'), $this->argument('target')))
                        ->onQueue('items')
                        ->delay(1);
        
        $this->dispatch($useItemJob);
    }
}
