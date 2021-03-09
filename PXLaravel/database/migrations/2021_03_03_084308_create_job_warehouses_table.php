<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_warehouses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreignId('job_id')->constrained('jobs');
            $table->foreignId('truck_id')->constrained('trucks');
            $table->foreignId('driver_id')->constrained('drivers');
            $table->foreignId('inventory_transfer_detail_id')->constrained('inventory_transfer_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('job_warehouses', 'inventory_transfer_details'))
        {
            Schema::table('job_warehouses', function (Blueprint $table) {
                $table->dropForeign(['inventory_transfer_details']);
            });
        }
        if (Schema::hasColumn('job_warehouses', 'job_id'))
        {
            Schema::table('job_warehouses', function (Blueprint $table) {
                $table->dropForeign(['job_id']);
            });
        }
        if (Schema::hasColumn('job_warehouses', 'truck_id'))
        {
            Schema::table('job_warehouses', function (Blueprint $table) {
                $table->dropForeign(['truck_id']);
            });
        }
        if (Schema::hasColumn('job_warehouses', 'driver_id'))
        {
            Schema::table('job_warehouses', function (Blueprint $table) {
                $table->dropForeign(['driver_id']);
            });
        }
        Schema::dropIfExists('job_warehouses');
    }
}
