<?php

namespace App\Console\Commands;

use App\Jobs\CheckPlayerEffectsJob;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class GetPlayerEffectsCommand extends Command
{
    use DispatchesJobs;
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:effects {target=self : Player to get status of.  Defaults to self}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get effects on target player';

    /**
     * @var string
     */
    private $player;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->player = env('GAME_PLAYER');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $target = $this->argument('target');
        
        if ('self' == $target) {
            $target = $this->player;
        }
        
        $checkPlayerEffectsJob = (new CheckPlayerEffectsJob($target))->onQueue('effects');

        $this->dispatch($checkPlayerEffectsJob);
    }
}
