<?php

namespace App\Http\Controllers;
use App\Services\SearchService;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $request, SearchService $searchService)
{
    // نمرر موديل User للخدمة
    $query = $searchService->apply(\App\Models\User::query(), $request->all());
    return response()->json($query->paginate($request->get('limit', 10)));
}
}
