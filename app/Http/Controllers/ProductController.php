<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\SearchService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, SearchService $searchService)
{
    $namespace = 'App\\Filters\\Product';

    $query = $searchService->apply(Product::query(), $request->all(), $namespace);
    
   return response()->json($query->paginate($request->get('limit', 10)));
}
}
