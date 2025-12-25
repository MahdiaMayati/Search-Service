<?php
namespace App\Filters\User;

use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Role implements FilterContract
{
    public function apply(Builder $query, $value)
    {
        return $query->byRole($value);
    }
}
