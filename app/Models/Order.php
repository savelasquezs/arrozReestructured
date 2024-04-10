<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function delivery_person()
    {
        return $this->belongsTo(User::class);
    }

    public function delivery_method()
    {
        return $this->belongsTo(DeliveryMethod::class);
    }
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function payment_items()
    {
        return $this->hasMany(PaymentItem::class);
    }
}
