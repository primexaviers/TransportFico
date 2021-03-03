<?php

namespace Database\Factories;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruckFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Truck::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'vehicle_no' => strtoupper($this->faker->numerify('BP #### ').$this->faker->lexify('??')),
            'length' =>  $this->faker->randomElement($array = array(2430,2990,6060,12200)),
            'breadth' => $this->faker->randomElement($array = array(2200,2440)),
            'height' => $this->faker->randomElement($array = array(2270,2590,2600)),
            'max_weight' => $this->faker->randomElement($array = array(28280,26740,26650,28670,25700,27720)),
        ];
    }
}
