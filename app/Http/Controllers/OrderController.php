<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\SearchService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index(Request $request, SearchService $searchService)
{
    $namespace = 'App\\Filters\\Order';

    $query = $searchService->apply(
    Order::query(),
    $request->all(),
    $namespace);

    return response()->json($query->paginate($request->get('limit', 10)));
}
    // $allowedFilters = $request->only([
    //     'keyword', 'min_price', 'max_price', 'status', 'from_date', 'to_date', 'order_by'
    // ]);
    // $allowedFilters,
}
