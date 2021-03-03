<?php

namespace Database\Factories;

use App\Models\WareHouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WareHouse::class;

    private $array_lalo = array(
        [-6.412697160190658, 106.88894660018805],
        [-6.224490180215687, 107.08121714860424],
        [-6.157359581526754, 106.7386908390278],
        [-6.34567574469806, 107.18616775305449],
        [-6.91900608637056, 110.49921353062774],
        [-7.076239406520669, 109.32499491316355],
        [-7.261882641820674, 108.20545718601578],
        [-7.333461268209317, 112.79003566447844],
        [-7.357231774883313, 108.54054019349525],
        [-7.3694894686692, 109.31519614491881],
        [-7.498293445119555, 110.9117719817922],
        [-7.71880774611091, 112.02688428005446],
        [-7.782300908277309, 110.37672897948283],
        [-7.9630928973600446, 113.95772178380336],
        [-8.134499047076567, 113.23587946263625],
        [-8.321991577878467, 114.15533020204143],
    );

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetAddress,
            'la' => $this->faker->latitude(-90, 90),
            'lo' => $this->faker->latitude(-90, 90),
            'desc' => $this->faker->text(150)
        ];
    }
}
