<?php

namespace App\Traits;

trait Searchable
{
    public function scopeCreatedBetween($query, $from, $to)
    {
        return $query->when($from, function ($q) use ($from) {
            $q->whereDate('created_at', '>=', $from);
        })->when($to, function ($q) use ($to) {
            $q->whereDate('created_at', '<=', $to);
        });
    }

    public function scopeSortedBy($query, $column, $direction = 'desc')
    {
        $allowedColumns = property_exists($this, 'sortable') ? $this->sortable : ['created_at', 'id'];

        $column = in_array($column, $allowedColumns) ? $column : 'created_at';
        $direction = in_array(strtolower($direction), ['asc', 'desc']) ? $direction : 'desc';

        return $query->orderBy($column, $direction);
    }
}
