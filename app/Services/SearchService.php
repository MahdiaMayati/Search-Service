<?php
namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class SearchService
{
    public function apply(Builder $query, array $filters, string $namespace): Builder
    {
        foreach ($filters as $key => $value) {

            if (is_null($value) || $value === '') continue;

            if ($key === 'to_date') continue;

            $className = $namespace . '\\' . Str::studly($key);

            if (class_exists($className)) {
                $filter = new $className();
            if ($filter instanceof \App\Filters\FilterContract) {
                    $query = $filter->apply($query, $value);
                }
            }
        }
        return $query;
    }
}
    // public function apply(Builder $query, array $filters)
    // {
    //     if (!empty($filters['keyword'])) {
    //         $query->where(function ($q) use ($filters) {
    //             $q->where('name', 'like', '%' . $filters['keyword'] . '%')
    //               ->orWhere('description', 'like', '%' . $filters['keyword'] . '%');
    //         });
    //     }

    //     if (!empty($filters['min_price'])) {
    //         $query->where('price', '>=', $filters['min_price']);
    //     }
    //     if (!empty($filters['max_price'])) {
    //         $query->where('price', '<=', $filters['max_price']);
    //     }
    //     if (!empty($filters['status'])) {
    //         $query->where('status', $filters['status']);
    //     }
    //     if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
    //         $query->whereBetween('created_at', [$filters['from_date'], $filters['to_date']]);
    //     }
    //     if (!empty($filters['only_active'])) {
    //         $query->active();
    //     }
    //     $orderBy = $filters['order_by'] ?? 'created_at';
    //     $direction = $filters['direction'] ?? 'desc';
    //     $query->orderBy($orderBy, $direction);
    //     return $query;
    // }


