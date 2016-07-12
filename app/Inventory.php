<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    /*
    | -------------------------------------------------------------------
    |  Scopes
    | -------------------------------------------------------------------
    */
    /**
     * Scope to get only unused items in our inventory
     * 
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeUnused($query)
    {
        return $query->where('used', false);
    }
}
