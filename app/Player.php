<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

  /**
   * @var string
   */
  protected $table = 'players';

  /**
   * @var array
   */
  protected $fillable = ['player_api_id', 'name', 'score'];
  
}
