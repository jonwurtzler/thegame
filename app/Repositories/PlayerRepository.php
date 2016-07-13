<?php

namespace App\Repositories;

use App\Effect;
use Carbon\Carbon;

class PlayerRepository extends GameRepository
{

    /**
     * Get current effects on self.
     */
    public function getSelfEffects()
    {
        $client = $this->connection->getAuthConnection();

        $response = $client->get(sprintf('effects/%s', $this->player));
        $contents = $response->getBody()->getContents();
        $json     = json_decode($contents);

        $this->parseEffects($json);

        // Make sure to log the output as a just in case.
        $this->logger->info("Updated Personal Effects");
    }

    /**
     * Get the effects for a single player.
     *
     * @param string $player
     *
     * @return mixed
     */
    public function getPlayerEffects($player)
    {
        $client = $this->connection->getAuthConnection();

        $response = $client->post(sprintf('effects/%s', $player));
        $contents = $response->getBody()->getContents();
        $json     = json_decode($contents);

        // Make sure to log the output as a just in case.
        $this->logger->info("Found effects for player: %s", $this->player);

        return $json;
    }

    /**
     * Go through the list of effects and find new ones.
     * 
     * @param $effectList
     */
    private function parseEffects($effectList)
    {
        foreach($effectList as $item) {
            $timestamp = new Carbon($item->Timestamp);

            $effect = $this->effect->query()->where('created_at', $timestamp->toDateTimeString())->first();

            if (!$effect) {
                $this->createEffect($item);
            }
        }
    }

    /**
     * Parse and create the new effect.
     *
     * @param $parseItem
     */
    private function createEffect($parseItem)
    {
        $timestamp = New Carbon($parseItem->Timestamp);

        $creator        = $parseItem->Creator;
        $target         = $parseItem->Targets;
        $effectObj      = $parseItem->Effect;
        $createdAt      = $timestamp->toDateTimeString();
        $expiresAt      = $timestamp;
        $effectDuration = $effectObj->Duration;
        $itemCase       = $effectDuration->Case;
        $durationCase   = "";

        if ("StatusEffect" === $itemCase) {
            $durationCase = $effectDuration->Fields[0]->Case;
            $expiresAt = $this->getExpireDate($durationCase, $effectDuration, $timestamp);
        }

        Effect::create([
            'name'          => $effectObj->EffectName,
            'type'          => $effectObj->EffectType,
            'creator'       => $creator,
            'target'        => $target,
            'description'   => $effectObj->Description,
            'item_case'     => $itemCase,
            'duration_case' => $durationCase,
            'expires_at'    => $expiresAt->toDateTimeString(),
            'vote_gain'     => $effectObj->VoteGain,
            'created_at'    => $createdAt
        ]);
    }

    /**
     * Get the timestamp for when the status effect expires (if lasting effect: Temporal)
     *
     * @param string    $effectCase
     * @param \stdClass $effectDuration
     * @param Carbon    $datetime
     *
     * @return Carbon
     */
    private function getExpireDate($effectCase, $effectDuration, $datetime)
    {
        switch ($effectCase) {
            case 'Temporal':
                $statusTime = explode(":", $effectDuration->Fields[0]->Fields[0]);

                $datetime->addHours($statusTime[0]);
                $datetime->addMinutes($statusTime[1]);

                return $datetime;
            default:
                return $datetime;
        }
    }
}