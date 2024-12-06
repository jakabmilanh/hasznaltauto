<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarType;

class CarTypesSeeder extends Seeder
{

public function run()
{
    CarType::create(['name' => 'Sedan']);
    CarType::create(['name' => 'Coupe']);
    CarType::create(['name' => 'SUV']);
    CarType::create(['name' => 'Truck']);
}
}
