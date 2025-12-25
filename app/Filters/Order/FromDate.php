<?php

namespace App\Filters\Order;

use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class FromDate implements FilterContract
{
    public function apply(Builder $query, $value)
    {
        return $query->createdBetween($value, request('to_date'));
    }
}
