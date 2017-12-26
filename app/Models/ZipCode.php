<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'postal_name'
    ];

    public function full_name() {
        return $this->code . ' ' . $this->postal_name;
    }
}
