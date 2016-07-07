<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
  /**
   * @var string
   */
  protected $table = 'badges';

  /**
   * @var array
   */
  protected $fillable = ['name'];
}
