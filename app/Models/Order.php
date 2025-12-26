<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use Searchable;
    
    protected $casts = [
    'status' => \App\Enums\OrderStatus::class,
    ];

    public $sortable = ['order_number', 'total_price', 'status', 'created_at'];

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
