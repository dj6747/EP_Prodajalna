<?php

namespace App\Models;

class Customer extends User
{
    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('role', User::ROLE_CUSTOMER);
        });
    }

}
