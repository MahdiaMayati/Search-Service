<?php
namespace App\Filters\Order;
use App\Filters\FilterContract;

class Status implements FilterContract {
    public function apply($query, $value) {
        
    $status = \App\Enums\OrderStatus::tryFrom($value);

    if ($status) {
        return $query->byStatus($status->value);
    }

    return $query;

    }
}
