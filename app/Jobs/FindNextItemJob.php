<?php

namespace App\Jobs;

use App\Inventory;
use App\TheGameQueuedJob;
use App\Repositories\ItemRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FindNextItemJob extends Job implements ShouldQueue
{
    use DispatchesJobs, InteractsWithQueue, SerializesModels;

    /**
     * @var array
     *
     * Buffalo = 100
     * Biggs = 50
     * Wedge = 50
     * Pizza = 50 (sometimes)
     * UUDDLRLRBA = 30
     * Bo Jackson = 7
     */
    private $instantPointGainItems = ['Buffalo', 'Biggs', 'Wedge', 'Pizza', 'UUDDLRLRBA', 'Bo Jackson'];

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ItemRepository $repository)
    {
        $continue = true;
        $nextItem = null;
        
        // Check for manually queued item
        $queuedItem = $repository->getNextQueuedItem();

        if ($queuedItem) {
            $continue = false;
            $nextItem = $queuedItem;
        }

        // Check Point Gain Effects
        if ($continue) {
            // If we do not have them, grab the next one then queue the others
        }

        // Use static point gain item
        if ($continue) {
            $staticPointItem = $this->findNextInstantPointGainItem($repository);

            if ($staticPointItem) {
                $nextItem = $staticPointItem;
            }
        }
        
        $this->finishJob($nextItem);
        
        return;
    }

    /**
     * @param ItemRepository $repository
     *
     * @return Inventory|bool|null
     */
    private function findNextInstantPointGainItem(ItemRepository $repository)
    {
        $foundItem = false;

        foreach ($this->instantPointGainItems as $itemName) {
            $item = $repository->getNextItemByName($itemName);

            if ($item) {
                $foundItem = $item;
                break;
            }
        }

        return $foundItem;
    }

    /**
     * Finish this job by clearing all following 'points' jobs
     *
     * @param Inventory $item
     *
     * @return bool
     */
    private function finishJob($inventoryItem)
    {
        $useItemJob = (new UseItemJob($inventoryItem->api_item_id, null))->onQueue('items');

        $this->dispatch($useItemJob);
        
        TheGameQueuedJob::points()->delete();
    }
}
