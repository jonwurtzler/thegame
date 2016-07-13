<?php

namespace App\Jobs;

use App\Repositories\PlayerRepository;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckPlayerEffectsJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var string
     */
    private $player;

    /**
     * @var $self
     */
    private $self;

    public function __construct($player)
    {
        $this->player = $player;
        $this->self   = env('GAME_PLAYER');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PlayerRepository $repository)
    {
        if ($this->player == $this->self) {
            $repository->getSelfEffects();
        } else {
            $repository->getPlayerEffects($this->player);
        }
    }
}
