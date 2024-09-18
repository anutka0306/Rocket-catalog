<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function propertyValues()
    {
        return $this->belongsToMany(PropertyValue::class, 'product_property_values', 'product_id', 'property_value_id');
    }
}
