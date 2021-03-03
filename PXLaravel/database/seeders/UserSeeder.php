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
    }
}
