<?php

namespace Database\Factories;

use App\Models\Perfomance;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerfomanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Perfomance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(0,10),
            'comment' => $this->faker->text(200)
        ];
    }
}
