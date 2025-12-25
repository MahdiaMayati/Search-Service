<?php

namespace App\Http\Controllers;
use App\Services\SearchService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index(Request $request, SearchService $searchService)
{
    $query = $searchService->apply(\App\Models\Order::query(), $request->all());

    return response()->json($query->paginate($request->get('limit', 10)));
}
}
