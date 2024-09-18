<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {

        $query = Product::query()->with('propertyValues.property');

        $products = $query->paginate(40);

        return response()->json(['products' => $products], 200);

    }
}
