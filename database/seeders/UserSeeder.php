<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Driver;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Address;
use App\Models\Truck;
use App\Models\Job;
use App\Models\JobTrack;
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
            Customer::factory()
            ->count(1)
            ->has(
                Order::factory()
                ->has(OrderDetail::factory()->count(5))
                ->has(
                    Job::factory()->has(JobTrack::factory()->count(1))->has(Perfomance::factory()->count(1))->count(1)
                )
                ->count(5)
            )            
        )
        ->create();
    }
}
