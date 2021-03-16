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
        $dimensions = array(
            [36	 ,   24.5,	10,	    	5	],
            [36	 ,   24.5,	19.5,		6	],
            [35.5,	 24,    19,	    	6	],
            [34.5,	 23.6,	17.2,		7	],
            [39.6,	 26.4,	22.4,		9	],
            [39	 ,   26,    22,	    	9	],
            [34	 ,   25.5,	32,	    	13	],
            [35.5,	 19,    23.5,		10	],
            [46	 ,   42,    40,	    	12	],
            [52	 ,   37.5,	40,	    	10	],
            [51	 ,   37,    40,	    	11	],
            [30.5,	 28.5,	20.5,		12	],
            [37.5,	 26.5,	19.5,		10	],
            [31	 ,   28,    22,	    	16	],
            [35	 ,   29,    21,	    	13	],
            [55.3,	 28.5,	18,	    	15	],
            [44.5,	 33,    30,	    	17	],
            [40	 ,   27,    22.8,		18	],
            [34.5,	 26.5,	32.4,		20	]
        );
        $array = $this->faker->numberBetween(0, count($dimensions)-1);
        return [
            'name' => "Product #".$this->faker->unique->randomNumber(),
            'dimension_uom' => "cm",
            'length' => $dimensions[$array][0],
            'breadth' => $dimensions[$array][1],
            'height' => $dimensions[$array][2],
            'weight' => $dimensions[$array][3],
            'volume' => $dimensions[$array][0]*$dimensions[$array][1]*$dimensions[$array][2],
            'weight_uom' => "kg",
            'cost' => $this->faker->randomFloat(null,10,1000),
            'cost_uom' => "IDR",
            'sell' => $this->faker->randomFloat(null,50,5000),
            'sell_uom' => "IDR",
        ];
    }
}
