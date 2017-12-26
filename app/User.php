<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'address', 'zip_code_id', 'password',
    ];

    const ROLE_ADMIN = 'admin';
    const ROLE_SELLER = 'seller';
    const ROLE_CUSTOMER = 'customer';

    const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_SELLER,
        self::ROLE_CUSTOMER
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function zip_code() {
        $this->hasOne('App\ZipCode', 'zip_code_id');
    }


    public function menu_items() {
        if ($this->role === self::ROLE_ADMIN) {
            return $this->admin_menu_items();
        } else if ($this->role === self::ROLE_SELLER) {
            return $this->seller_menu_items();
        }

        return $this->customer_menu_items();
    }


    private function admin_menu_items() {
        return [
            [
                'title' => 'Sellers',
                'route' => route('sellers.index')
            ]
        ];
    }


    private function seller_menu_items() {
        return [
            [
                'title' => 'Customers',
                'route' => route('customers.index')
            ]
        ];
    }

    private function customer_menu_items() {
        return [];
    }

}
