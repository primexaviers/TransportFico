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

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array_lalo = array(
            [-6.412697160190658, 106.88894660018805],
            [-6.224490180215687, 107.08121714860424],
            [-6.157359581526754, 106.7386908390278],
            [-6.34567574469806, 107.18616775305449],
            [-6.894643507381972, 109.41070657576329],
            [-6.91900608637056, 110.49921353062774],
            [-7.076239406520669, 109.32499491316355],
            [-7.089994196931276, 109.31294812144084],
            [-7.261882641820674, 108.20545718601578],
            [-7.333461268209317, 112.79003566447844],
            [-7.357231774883313, 108.54054019349525],
            [-7.354967623539677, 108.21214470677089],
            [-7.357589804724642, 108.57045410131474],
            [-7.3694894686692, 109.31519614491881],
            [-7.380979691917905, 108.23603613837012],
            [-7.3858728805261045, 108.35601267531409],
            [-7.448029566290446, 110.24971912308776],
            [-7.45159957019363, 110.3061253162381],
            [-7.480158552907951, 110.25872011135644],
            [-7.483062015976793, 108.8005049461522],
            [-7.498293445119555, 110.9117719817922],
            [-7.504253742188963, 110.39163470971295],
            [-7.504261886955338, 108.79448689295155],
            [-7.506710851486277, 108.79435427083529],
            [-7.517044472855883, 110.24041810679928],  
            [-7.523290971866952, 110.1963132642828],
            [-7.540245301333769, 110.15850911355437],
            [-7.660578152543896, 110.42477103484417],     
            [-7.71880774611091, 112.02688428005446],
            [-7.775581445100442, 110.30287146916616],
            [-7.782300908277309, 110.37672897948283],
            [-7.804295484138242, 110.40711831647464], 
            [-7.9630928973600446, 113.95772178380336],
            [-8.134499047076567, 113.23587946263625],
        );
        
        $array = $this->faker->unique()->numberBetween(0, count($array_lalo)-1);
        return [
            'name' => $this->faker->streetAddress,
            'la' => $array_lalo[$array][0],
            'lo' => $array_lalo[$array][1],
            'desc' => $this->faker->text(150)
        ];
    }
}
