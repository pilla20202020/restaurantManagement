<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['table_id', 'customer_id', 'credit_amount','total_amount', 'payment_type',   'status', 'paid_amount'];
    public function table() {
        return $this->belongsTo(Table::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }


    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }


}
