<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // داخل Models/Order.php

// البحث برقم الطلب (Keyword)
public function scopeSearchKeyword($query, $keyword) {
    return $query->where('order_number', 'like', "%$keyword%");
}

public function scopePriceBetween($query, $min, $max) {
    if ($min) $query->where('total_price', '>=', $min);
    if ($max) $query->where('total_price', '<=', $max);
    return $query;
}
}
