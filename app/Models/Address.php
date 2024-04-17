<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [

        'address',
        'neighborhood_id',
        'customer_id',
        'shipping_value',
    ];

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }
}
