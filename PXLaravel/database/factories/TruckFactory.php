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
        $trucks = array(
            ["Tronton Wingbox",	960,	240,	220,	"cm",	18000,	"kg",	1250000,    "IDR"],
            ["Tronton",	        960,	240,	240,	"cm",	15000,	"kg",	1150000,	"IDR"],
            ["Fuso Berat",	    570,	230,	220,	"cm",	8000,	"kg",	900000,	    "IDR"],
            ["Fuso Ringan",	    500,	210,	200,	"cm",	5000,	"kg",	665000,	    "IDR"],
            ["Double Engkel",	420,	200,	170,	"cm",	4000,	"kg",	485000,	    "IDR"],
            ["Engkel Box",	    310,	170,	170,	"cm",	2200,	"kg",	285000,	    "IDR"],
            ["Small Box",	    227,    153,	120,	"cm",	800,	"kg",	142500,	    "IDR"],
            ["Pickup",	        200,	156,	120,	"cm",	800,	"kg",	95000,	    "IDR"],
            ["Van",	            210,	156,	145,	"cm",	720,	"kg",	85000,	    "IDR"],
            ["Ekonomi",	        100,	90,	    75,	    "cm",	150,    "kg",	35000,	    "IDR"],
        );

        $array = $this->faker->numberBetween(0, count($trucks)-1);

        return [
            'name' =>  $trucks[$array][0] . "#" . $this->faker->numberBetween(0, 100),
            'vehicle_no' => strtoupper($this->faker->numerify('BP #### ').$this->faker->lexify('??')),
            'length' =>  $trucks[$array][1],
            'breadth' => $trucks[$array][2],
            'height' => $trucks[$array][3],
            'dimension_uom' => $trucks[$array][4],
            'truck_capacity' => $trucks[$array][5],
            'truck_capacity_uom' => $trucks[$array][6],
            'cost' => $trucks[$array][7],
            'cost_uom' => $trucks[$array][8],
        ];
    }
}
