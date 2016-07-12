<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    /*
    | -------------------------------------------------------------------
    |  Scopes
    | -------------------------------------------------------------------
    */
    /**
     * Scope to get item by specific type
     *
     * @param Builder $query
     * @param string  $type
     *
     * @return Builder
     */
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope to get only items of type 'Attack'
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeIsAttack($query)
    {
        return $this->scopeByType($query, 'Attack');
    }

    /**
     * Scope to get only items of type 'Defense'
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeIsDefense($query)
    {
        return $this->scopeByType($query, 'Defense');
    }

    /**
     * Scope to get only items of type 'Gain'
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeIsGain($query)
    {
        return $this->scopeByType($query, 'Gain');
    }

}
