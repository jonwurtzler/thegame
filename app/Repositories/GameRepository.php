<?php

namespace App\Repositories;

use App\Inventory;
use App\Item;
use App\Services\GameConnection;
use Illuminate\Contracts\Logging\Log;

class GameRepository
{

    /**
     * @var GameConnection
     */
    protected $connection;

    /**
     * @var Log
     */
    protected $logger;

    /**
     * @var Item
     */
    protected $item;

    /**
     * GameRepository constructor.
     */
    public function __construct(Log $log)
    {
        $this->connection = new GameConnection();
        $this->item = new Item();
        $this->logger = $log;
    }


    /**
     * Post points to the game.
     */
    public function getPoints()
    {
        $client = $this->connection->getAuthConnection();

        $response = $client->post('points');
        $contents = $response->getBody()->getContents();
        $json = json_decode($contents);
        //$json     = json_decode("{\"Messages\":[\"You aqcuired a new item! <Leeroy Jenkins>\",\"jwurtzle gained 1 points! Total points: 441\"],\"Item\":{\"Case\":\"Some\",\"Fields\":[{\"Name\":\"Leeroy Jenkins\",\"Id\":\"e49c304a-8505-43a1-88b8-bac671140a5e\",\"Rarity\":3,\"Description\":\"Absolutely pathetic battle cry.\"}]},\"Points\":441,\"Effects\":[\"Tanooki Suit\"],\"Badges\":[]}");


        // Process response for any items, messages.
        $this->parsePoints($json);

        // Make sure to log the output as a just in case.
        $this->logger->info($contents);

    }

    /**
     * Read through the response, check for gained items and other messages.
     *
     * @param mixed $points
     */
    private function parsePoints($points)
    {
        // If we gained an item, make sure to record it.
        if ($points->Item) {
            $this->storeItem($points->Item);
        }

    }

    /**
     * We found an item, need to track / store it.
     *
     * @param \stdClass $newItem
     */
    private function storeItem($newItem)
    {
        $fields = $newItem->Fields[0];

        // Check if we have the item in our list.
        $item = $this->item->where('name', $fields->Name)->first();

        // Add a new entry for the item if it doesn't exist
        if (count($item) < 1) {
            $item = Item::create([
                'name'        => $fields->Name,
                'description' => $fields->Description,
                'rarity'      => $fields->Rarity,
                'case'        => $newItem->Case,
            ]);
        }

        // Add item to inventory
        $inventory = Inventory::create(['api_item_id' => $fields->Id]);
        $inventory->item()->associate($item);
        $inventory->save();
    }

}