<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'laptop_id'
    ];

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    public function laptop() {
        return $this->belongsTo(Laptop::class);
    }
}
