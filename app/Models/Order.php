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


    public function permanently_cancelled()
    {
        return $this->status === self::PERMANENTLY_CANCELLED;
    }

    public function cancelled()
    {
        return $this->status === self::CANCELLED;
    }

    public function waiting()
    {
        return $this->status === self::WAITING;
    }

    public function confirmed()
    {
        return $this->status === self::CONFIRMED;
    }


    public function scopePermanentlyCancelled($query)
    {
        return $query->where('status', self::PERMANENTLY_CANCELLED);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', self::CANCELLED);
    }

    public function scopeWaiting($query)
    {
        return $query->where('status', self::WAITING);
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', self::CONFIRMED);
    }

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article', 'orders_articles');
    }

}