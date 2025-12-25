<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function scopeSearch($query, $keyword) {
        return $query->where('order_number', 'like', "%$keyword%")
                     ->orWhereHas('user', fn($q) => $q->where('name', 'like', "%$keyword%"));
    }

    public function scopePriceBetween($query, $min, $max) {
    if ($min) $query->where('total_price', '>=', $min);
    if ($max) $query->where('total_price', '<=', $max);
    return $query;
    }

    public function scopeByStatus($query, $status) {
        return $query->where('status', $status);
    }
}
