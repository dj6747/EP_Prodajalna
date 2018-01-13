<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PERMANENTLY_CANCELLED = -2;
    const CANCELLED = -1;
    const WAITING = 0;
    const CONFIRMED = 1;

    protected $fillable = [
        'customer_id', 'review_status', 'reviewed_by'
    ];


    public function isPermanentlyCancelled()
    {
        return $this->review_status === self::PERMANENTLY_CANCELLED;
    }

    public function isCancelled()
    {
        return $this->review_status === self::CANCELLED;
    }

    public function isWaiting()
    {
        return $this->review_status === self::WAITING;
    }

    public function isConfirmed()
    {
        return $this->review_status === self::CONFIRMED;
    }


    public function scopePermanentlyCancelled($query)
    {
        return $query->where('review_status', self::PERMANENTLY_CANCELLED);
    }

    public function scopeCancelled($query)
    {
        return $query->where('review_status', self::CANCELLED);
    }

    public function scopeWaiting($query)
    {
        return $query->where('review_status', self::WAITING);
    }

    public function scopeConfirmed($query)
    {
        return $query->where('review_status', self::CONFIRMED);
    }

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article', 'orders_articles')->withPivot('quantity');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }

}