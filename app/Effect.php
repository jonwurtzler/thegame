<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Effect extends Model
{
  
  /**
   * @var string
   */
  protected $table = 'effects';

  /**
   * @var array
   */
  protected $fillable = [
    'name', 'type', 'description', 'creator', 'target',
    'duration_case', 'item_case', 'expires_at', 'vote_gain', 'created_at'
  ];
  
}
