<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'type',
        'model',
        'processor',
        'ram',
        'storage',
        'price',
        'image'
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function transaction_details() {
        return $this->hasMany(TransactionDetail::class);
    }
}
