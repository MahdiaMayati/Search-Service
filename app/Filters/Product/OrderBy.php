<?php

namespace App\Filters\Product;

use Illuminate\Database\Eloquent\Builder;

class OrderBy implements \App\Filters\FilterContract
{
   public function apply(Builder $query, $value)
{
    return $query->sortedBy($value, request('direction', 'desc'));
}
}
