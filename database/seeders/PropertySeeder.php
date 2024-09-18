<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyValue;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colorProperty = Property::create([
            'name' => 'Color',
        ]);

        PropertyValue::create([
            'property_id' => $colorProperty->id,
            'value' => 'Red',
        ]);

        PropertyValue::create([
            'property_id' => $colorProperty->id,
            'value' => 'Blue',
        ]);

        PropertyValue::create([
            'property_id' => $colorProperty->id,
            'value' => 'Green',
        ]);

        $sizeProperty = Property::create([
            'name' => 'Size',
        ]);

        PropertyValue::create([
            'property_id' => $sizeProperty->id,
            'value' => 'Small',
        ]);

        PropertyValue::create([
            'property_id' => $sizeProperty->id,
            'value' => 'Middle',
        ]);

        PropertyValue::create([
            'property_id' => $sizeProperty->id,
            'value' => 'Big',
        ]);

        $brandProperty = Property::create([
            'name' => 'Brand',
        ]);

        PropertyValue::create([
            'property_id' => $brandProperty->id,
            'value' => 'Russia',
        ]);

        PropertyValue::create([
            'property_id' => $brandProperty->id,
            'value' => 'Spain',
        ]);

        PropertyValue::create([
            'property_id' => $brandProperty->id,
            'value' => 'Mexico',
        ]);
    }
}
