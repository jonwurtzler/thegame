<?php

namespace App\Repositories;

use App\Inventory;

class ItemRepository extends GameRepository
{

    /**
     * Look for the next queued item.
     * 
     * @return Inventory|null
     */
    public function getNextQueuedItem()
    {
        return Inventory::queued()->first();
    }

    /**
     * @param string $name
     *
     * @return Inventory|null
     */
    public function getNextItemByName($name)
    {
        return Inventory::unusedByItemName($name)->first();
    }

    /**
     * Trigger the use of an item.
     *   Make sure to make the item as used in thd db.
     *
     * @param string      $itemId
     * @param string|null $target
     */
    public function useItem($itemId, $target = null)
    {
        $client = $this->connection->getAuthConnection();
        $q = [];

        if (!is_null($target)) {
            $q = ['query' => ['target' => $target]];
        }

        $response = $client->post('items/use/' . $itemId, $q);
        $contents = $response->getBody()->getContents();

        // Make sure to make the item as used.
        $this->triggerItemUse($itemId);

        // Make sure to log the output as a just in case.
        $this->logger->info($contents);
    }

    /**
     * Update the item in the DB to be marked as used correctly.
     *
     * @param string $itemId
     */
    private function triggerItemUse($itemId)
    {
        $inventoryItem = Inventory::query()->where('api_item_id', $itemId)->first();
        
        if ($inventoryItem) {
            $inventoryItem->used = true;
            $inventoryItem->save();
        }
    }

}