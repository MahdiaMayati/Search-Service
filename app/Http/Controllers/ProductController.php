<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\SearchService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(Request $request, SearchService $searchService)
{
    // نمرر الـ Query والبيانات للخدمة
    $query = $searchService->apply(Product::query(), $request->all());

    // دعم الـ Pagination وإرجاع النتيجة
    return response()->json($query->paginate($request->get('limit', 10)));
}
}
