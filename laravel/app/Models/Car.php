<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_type_id', 'brand_name', 'car_name', 'color', 'engine_liter', 'horsepower', 'fuel', 'price'
    ];

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }
}

