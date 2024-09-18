<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyValue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters_ids = [];
        $filters = $request->get('properties', []);
        foreach ($filters as $key => $filter) {
            $property = Property::where('name', $key)->first();
            foreach ($filter as $value) {
                $value = PropertyValue::where('property_id', $property->id)
                    ->where('value', $value)->first();
                $filters_ids[$key][] = $value->id;
            }
        }

        $query = Product::query()->with('propertyValues.property');

        if (! empty($filters_ids)) {
            foreach ($filters_ids as $property => $values) {
                $query->whereHas('propertyValues', function ($q) use ($values) {
                    $q->whereIn('property_value_id', $values);
                });
            }
        }

        $products = $query->paginate(40);

        $properties = Property::with('values')->get();

        return view('products/index', [
            'products' => $products,
            'properties' => $properties,
            'filters' => $filters,
        ]);
    }
}
