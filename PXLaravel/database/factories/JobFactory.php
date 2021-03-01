<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text('50'),
            'truck_id' => $this->faker->numberBetween(1,50),
            'driver_id' => $this->faker->numberBetween(1,50),
            'origin' => $this->faker->numberBetween(1,50),
            'destination' => $this->faker->numberBetween(1,50),
        ];
    }
}
