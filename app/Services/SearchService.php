<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class SearchService
{
    public function apply(Builder $query, array $filters)
    {
        // 1. فلاتر النصوص (Keyword)
        if (!empty($filters['keyword'])) {
            $query->where(function ($q) use ($filters) {
                // نبحث في الاسم والوصف إذا كان الكيان Product
                $q->where('name', 'like', '%' . $filters['keyword'] . '%')
                  ->orWhere('description', 'like', '%' . $filters['keyword'] . '%');
            });
        }

        // 2. فلاتر النطاق الرقمي (مثلاً السعر)
        if (!empty($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        if (!empty($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }

        // 3. فلاتر الحالة (Status)
        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        // 4. فلاتر التاريخ (Date Range)
        if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
            $query->whereBetween('created_at', [$filters['from_date'], $filters['to_date']]);
        }

        if (!empty($filters['only_active'])) {
            $query->active(); // استدعاء الـ Scope
}

        // 5. الترتيب الديناميكي (Order By)
        $orderBy = $filters['order_by'] ?? 'created_at';
        $direction = $filters['direction'] ?? 'desc';
        $query->orderBy($orderBy, $direction);

        return $query;
    }
}
