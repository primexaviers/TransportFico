<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Address;
use App\Models\Warehouse;
use App\Models\User;
use App\Models\Driver;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Truck;
use App\Models\Job;
use App\Models\JobWarehouse;
use App\Models\JobAddress;
use App\Models\Perfomance;
use App\Models\InventoryTransfer;
use App\Models\InventoryTransferDetail;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        Product::factory()
        ->count(100)
        ->create();
        Warehouse::factory()
        ->count(15)
        ->create();
        Address::factory()
        ->count(50)
        ->create();
        Truck::factory()
        ->count(50)
        ->create();
        User::factory()
        ->count(50)
        ->has(Driver::factory()->count(1))
        ->create();
        User::factory()
        ->count(50)
        ->has(
            Customer::factory()->count(1)         
        )
        ->create();
        InventoryTransfer::factory()
        ->count(3)
        ->has(
            InventoryTransferDetail::factory()->count(30)         
        )
        ->create();

        $selectInventoryTransfers = InventoryTransfer::all();
        
        foreach($selectInventoryTransfers as $selectInventoryTransfer){
            $inventoryTransferDetails = InventoryTransferDetail::where('inventory_transfer_id',$selectInventoryTransfer->id)->get();
            $totalWeight = 0;
            $totalProduct = $inventoryTransferDetails->sum('total');
            foreach($inventoryTransferDetails as $inventoryTransferDetail){
                $product = Product::where("id",$inventoryTransferDetail->product_id)->first();
                $totalWeightProduct = $product->weight * $inventoryTransferDetail->total;
                $totalWeight += $totalWeightProduct;
            }
            $selectInventoryTransfer->total_weight_transfer = $totalWeight;
            $selectInventoryTransfer->total_product_transfer = $totalProduct;
            $selectInventoryTransfer->save();
        }

    }
}
