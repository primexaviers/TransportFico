<?php

namespace Database\Factories;

use App\Models\InventoryTransfer;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class InventoryTransferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InventoryTransfer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $warehouse = Warehouse::all()->pluck("id");
        $date = new Carbon($this->faker->dateTimeBetween('-5 days','now'));

        return [
            //
            'name' => "Inventory Transfer #".$date->format('Y-m-d H:i:s'),
            'total_product_transfer' => 0,
            'total_weight_transfer' => 0,
            'origin' => $this->faker->randomElement($array = $warehouse),
            'destination' => $this->faker->randomElement($array = $warehouse),
        ];
    }
}
