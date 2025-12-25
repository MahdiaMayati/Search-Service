<?php
namespace App\Filters\Product;
use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class MinPrice implements FilterContract
{
    public function apply(Builder $query, $value)
    {
      return $query->priceBetween($value, null);
    }
}
