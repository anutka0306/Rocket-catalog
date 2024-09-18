<?php

namespace Database\Factories;

use App\Models\ProductPropertyValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPropertyValue>
 */
class ProductPropertyValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product_id = fake()->numberBetween(1, 50);
        $property_id = fake()->numberBetween(1, 9);

        $product_property = ProductPropertyValue::where('product_id', $product_id)
            ->where('property_value_id', $property_id)->get();
        if($product_property->isEmpty()) {
            return [
                'product_id' => $product_id,
                'property_value_id' => $property_id,
            ];
        }
    }
}
