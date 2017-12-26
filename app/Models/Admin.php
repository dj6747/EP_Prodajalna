<?php

namespace App\Models;

class Admin extends User
{
    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('role', User::ROLE_ADMIN);
        });
    }

    public static function menu_items() {
        return [
            [
                'title' => 'Sellers',
                'route' => route('sellers.index')
            ]
        ];
    }

}
