<?php

namespace App\Models;

class Seller extends User
{
    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('role', User::ROLE_SELLER);
        });
    }


    public static function menu_items() {
        return [
            [
                'title' => 'Customers',
                'route' => route('customers.index')
            ],
            [
                'title' => 'Articles',
                'route' => route('articles.index')
            ]

        ];
    }

}
