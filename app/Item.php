<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * @package App
 */
class Item extends Model
{
  /**
   * @var string
   */
  protected $table = 'items';

  /**
   * @var array
   */
  protected $fillable = ['name', 'description', 'rarity', 'case'];
  
}
