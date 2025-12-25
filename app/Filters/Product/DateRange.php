<?php
namespace App\Filters\Product;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterContract;

class DateRange implements FilterContract
{
  public function apply(Builder $query, $value)
{
    return $query->createdBetween($value, request('to_date'));
}
}
