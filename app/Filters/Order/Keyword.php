<?php
namespace App\Filters\Order;
use App\Filters\FilterContract;

class Keyword implements FilterContract {
    public function apply($query, $value) {
        
        return $query->search($value);

    }
}
