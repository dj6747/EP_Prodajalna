<?php
/**
 * Created by PhpStorm.
 * User: bine
 * Date: 27.12.17
 * Time: 15:34
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name', 'price','description','image','active'
    ];
}