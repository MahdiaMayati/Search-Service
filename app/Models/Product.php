<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Searchable;
    public $sortable = ['name', 'price', 'created_at'];

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
    // public function scopeSortedBy($query, $column, $direction = 'desc')
    //     {
    // $allowedColumns = ['price', 'created_at', 'name'];
    // $column = in_array($column, $allowedColumns) ? $column : 'created_at';
    // $direction = in_array(strtolower($direction), ['asc', 'desc']) ? $direction : 'desc';

    // return $query->orderBy($column, $direction);
    // }

    // public function scopeCreatedBetween($query, $from, $to) {
    // if ($from && $to) {
    //     return $query->whereBetween('created_at', [$from, $to]);
    // }

    // if ($from) {
    //     return $query->where('created_at', '>=', $from);
    // }

    // if ($to) {
    //     return $query->where('created_at', '<=', $to);
    // }

    // return $query;
    // }
}


