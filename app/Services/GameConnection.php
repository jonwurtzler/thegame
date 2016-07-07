<?php

namespace App\Services;

use GuzzleHttp\Client as GuzzleClient;

class GameConnection
{

  /**
   * @var string
   */
  private $apikey;

  /**
   * @var string
   */
  private $baseUri = "http://thegame.nerderylabs.com";

  /**
   * @var GuzzleClient
   */
  private $authClient;

  /**
   * @var GuzzleClient
   */
  private $basicClient;

  public function __construct()
  {
    $this->basicClient = new GuzzleClient([
      'base_uri' => $this->baseUri,
      'connect_timeout' => 1,
      'headers'  => ['accept' => 'application/json'],
    ]);
    
    $this->apikey = env('GAME_API_KEY');
    $this->authClient = new GuzzleClient([
      'base_uri' => $this->baseUri,
      'connect_timeout' => 1,
      'headers'  => [
        'accept' => 'application/json',
        'apikey' => $this->apikey,
      ],
    ]);
  }

  /**
   * Get a connection for basic calls.  At this time, only the leaderboard call uses this.
   * 
   * @return GuzzleClient
   */
  public function getBasicConnection()
  {
    return $this->basicClient;
  }

  /**
   * Get a connection for authorized calls
   * 
   * @return GuzzleClient
   */
  public function getAuthConnection()
  {
    return $this->authClient;
  }
  
}