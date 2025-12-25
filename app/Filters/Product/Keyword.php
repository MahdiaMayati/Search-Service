<?php
namespace App\Filters\Product;
use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class Keyword implements FilterContract
{
       public function apply(Builder $query, $value) {

         return $query->searchKeyword($value);

        }
}


