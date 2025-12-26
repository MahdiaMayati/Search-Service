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

           if (in_array($key, ['to_date', 'max_price', 'direction'])) continue;

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



