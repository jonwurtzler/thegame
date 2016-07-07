<?php

namespace App\Jobs;

use App\Repositories\GameRepository;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetPointsJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

  /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(GameRepository $repository)
    {
        for($v = 0; $v < 25; $v++) {
          sleep(1);
          $repository->getPoints();
          sleep(1);
        }

        sleep(1);
    }
}
