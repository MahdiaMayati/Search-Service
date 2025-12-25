<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\SearchService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(Request $request, SearchService $searchService)
{
    $query = $searchService->apply(Product::query(), $request->all());

    return response()->json($query->paginate($request->get('limit', 10)));
}
}
