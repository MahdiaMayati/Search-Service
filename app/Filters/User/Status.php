<?php

namespace App\Filters\User;

use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Status implements FilterContract
{
    public function apply(Builder $query, $value)
    {
   
        if ($value === 'active') {
            return $query->active();
        }

        return $query->where('is_active', false);
    }
}
