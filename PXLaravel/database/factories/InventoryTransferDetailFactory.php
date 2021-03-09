<?php

namespace Database\Factories;

use App\Models\InventoryTransferDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryTransferDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InventoryTransferDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::all()->pluck("id");
        $inventoryTransferDetail = InventoryTransferDetail::count();
        return [
            'name' => "Inventory Transfer Detail #".($inventoryTransferDetail+1),
            'total' =>  $this->faker->numberBetween(1,20),
            'product_id' => $this->faker->randomElement($array = $product)
        ];
    }
}
