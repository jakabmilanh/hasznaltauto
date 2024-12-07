<?php
namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_type_id' => \App\Models\CarType::inRandomOrder()->value('id') ?? \App\Models\CarType::factory()->create()->id,
            'brand_name' => $this->faker->company,
            'car_name' => $this->faker->word,
            'color' => $this->faker->safeColorName,
            'engine_liter' => $this->faker->randomFloat(1, 1.0, 6.0), 
            'horsepower' => $this->faker->numberBetween(100, 1000),
            'fuel' => $this->faker->randomElement(['Petrol', 'Diesel', 'Electric', 'Hybrid']),
            'price' => $this->faker->randomFloat(2, 10000, 1000000),
        ];
    }
}
