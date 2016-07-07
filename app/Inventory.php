<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

  /**
   * @var string
   */
  protected $table = 'inventory';

  /**
   * @var array
   */
  protected $fillable = ['api_item_id', 'item_id', 'used'];

  /*
  | -------------------------------------------------------------------
  |  Relations
  | -------------------------------------------------------------------
  */
  /**
   * Relationship to Item
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function item() {
    return $this->belongsTo('App\Item');
  }
}
