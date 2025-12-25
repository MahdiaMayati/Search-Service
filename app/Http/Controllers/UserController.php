<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SearchService;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $request, SearchService $searchService)
{
    $request->validate([
    'keyword'     => 'nullable|string|max:100',
    'role'        => 'nullable|string',
    'active_only' => 'nullable',
    'from_date'   => 'nullable|date',

    ]);
    $namespace = 'App\\Filters\\User';

    $query = $searchService->apply(
         User::query(),
         $request->all(),
         $namespace);
    return response()->json($query->paginate($request->get('limit', 10)));
}
}



