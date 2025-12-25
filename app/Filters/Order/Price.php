<?php

namespace App\Filters\Order;

use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Price implements FilterContract
{
    public function apply(Builder $query, $value)
    {
        return $query->priceBetween(
            request('min_price'),
            request('max_price')
        );
    }
}
