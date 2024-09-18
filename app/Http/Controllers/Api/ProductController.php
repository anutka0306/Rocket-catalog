<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyValue;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    public function index():JsonResponse {

        $query = Product::query()->with('propertyValues.property');

        $products = $query->paginate(40);

        return response()->json(['products' => $products], 200);

    }
}
