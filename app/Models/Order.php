<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'total_price',
        'user_id',
        'address_id'
    ];
     public function user() {
        return $this->belongsTo(User::class);
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
