<?php
namespace App\Filters\Product;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterContract;

class ToDate implements FilterContract {
    public function apply(Builder $query, $value) {

        return $query;
    }
}
