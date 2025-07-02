<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = ['order_id', 'food_menu_id', 'quantity', 'rate', 'amount'];
    public function foodMenu()
    {
        return $this->belongsTo(FoodMenu::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
