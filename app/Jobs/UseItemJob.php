<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Repositories\GameRepository;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UseItemJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var string
     */
    private $itemId;

    /**
     * @var string
     */
    private $target;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($itemId, $target)
    {
        $this->itemId = $itemId;
        $this->target = $target;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(GameRepository $repository)
    {
        sleep(2);
        $repository->useItem($this->itemId, $this->target);
    }
}
