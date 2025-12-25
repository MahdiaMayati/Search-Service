<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Facades\Search;
use App\Services\SearchService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index(Request $request, SearchService $searchService)
{

    $namespace = 'App\\Filters\\Order';

    // $query = Search::apply(Order::query(), $request->all(), $namespace);

    $query = $searchService->apply(
    Order::query(),
    $request->all(),
    $namespace);

    return response()->json($query->paginate($request->get('limit', 10)));
    }

}
