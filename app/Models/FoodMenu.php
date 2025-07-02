<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    //

    protected $fillable = ['name', 'price', 'description'];
    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
