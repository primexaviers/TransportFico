<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'uom' => $this->faker->randomElement($array = array('kg','pack','pcs')),
            'length' => $this->faker->randomFloat(null,0,100),
            'breadth' => $this->faker->randomFloat(null,0,100),
            'height' => $this->faker->randomFloat(null,0,100),
            'weight' => $this->faker->randomFloat(null,0,100),
            'cost' => $this->faker->randomFloat(null,10,1000),
            'sell' => $this->faker->randomFloat(null,50,5000)
        ];
    }
}
