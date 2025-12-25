<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeSearchKeyword($query, $keyword) {
    return $query->where('name', 'like', "%$keyword%")
    ->orWhere('description', 'like', "%$keyword%");
    }
    public function scopePriceBetween($query, $min, $max) {
    if ($min) $query->where('price', '>=', $min);
    if ($max) $query->where('price', '<=', $max);
    return $query;
    }
    public function scopeActive($query) {
    return $query->where('status', 'active');
    }
    public function scopeCreatedBetween($query, $from, $to) {
    return $query->whereBetween('created_at', [$from, $to]);
    }
}


