<?php
namespace App\Filters\User;

use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class ActiveOnly implements FilterContract
{
    public function apply(Builder $query, $value)
    {
        if ($value == '1' || $value == 'true') {
            return $query->active();
        }
        return $query;
    }
}
