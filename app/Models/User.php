<?php

namespace App\Models;

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
        return $this->hasOne('App\Models\ZipCode', 'id', 'zip_code_id');
    }


    public function get_menu_items() {
        if ($this->role === self::ROLE_ADMIN) {
            return Admin::menu_items();
        } else if ($this->role === self::ROLE_SELLER) {
            return Seller::menu_items();
        }

        return Customer::menu_items();
    }

}
