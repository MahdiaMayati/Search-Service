<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SearchService;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $request, SearchService $searchService)
{
    $filters = $request->only(['keyword', 'role', 'active_only', 'from_date']);

    $namespace = 'App\\Filters\\User';

    $query = $searchService->apply(
        User::query(),
         $filters,
         $namespace);

    return response()->json($query->paginate($request->get('limit', 10)));
}
}



