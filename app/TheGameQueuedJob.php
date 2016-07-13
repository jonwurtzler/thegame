<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class TheGameQueuedJob extends Model
{

    /**
     * @var string
     */
    protected $table = 'jobs';

    /**
     * @var array
     */
    protected $fillable = ['queue', 'payload'];

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
    public function scopeByQueue($query, $queue)
    {
        return $query->where('queue', $queue);
    }

    /**
     * Get those in effects queue
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeEffects($query)
    {
        return $this->scopeByQueue($query, 'effects');
    }

    /**
     * Get those in items queue
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeItems($query)
    {
        return $this->scopeByQueue($query, 'items');
    }

    /**
     * Get those in points queue
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePoints($query)
    {
        return $this->scopeByQueue($query, 'points');
    }

}