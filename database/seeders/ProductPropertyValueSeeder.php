<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPropertyValue;
use App\Models\PropertyValue;
use Illuminate\Database\Seeder;

class ProductPropertyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            $property_values = PropertyValue::pluck('id')->toArray();
            for ($i = 0; $i < 3; $i++) {
                $randomKey = array_rand($property_values);
                ProductPropertyValue::create([
                    'product_id' => $product->id,
                    'property_value_id' => $property_values[$randomKey],
                ]);
                unset($property_values[$randomKey]);
            }
        }
    }
}
