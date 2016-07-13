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
    protected $fillable = ['api_item_id', 'item_id', 'used', 'queued', 'queued_at'];

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

    /**
     * Get unused item by it's name
     *
     * @param Builder $query
     * @param string $name
     *
     * @return Builder|static
     */
    public function scopeUnusedByItemName($query, $name)
    {
        return $this->scopeUnused($query)
            ->whereHas('item', function($q) use ($name) {
                $q->where('name', $name);
            });
    }

    /**
     * Scope to get queued items
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeQueued($query)
    {
        return $this->scopeUnused($query)->where('queued', true)->orderBy('queued_at');
    }
}
