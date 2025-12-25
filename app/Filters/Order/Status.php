<?php
namespace App\Filters\Order;
use App\Filters\FilterContract;

class Status implements FilterContract {
    public function apply($query, $value) {
        
        return $query->byStatus($value);
    }
}
