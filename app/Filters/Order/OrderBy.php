<?php

namespace App\Filters\Order;

use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class OrderBy implements FilterContract
{
    public function apply(Builder $query, $value)
    {
      
        return $query->sortedBy($value, request('direction', 'desc'));
    }
}
