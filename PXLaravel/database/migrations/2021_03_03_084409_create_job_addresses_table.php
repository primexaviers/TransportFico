<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_addresses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreignId('job_id')->constrained('jobs');
            $table->foreignId('truck_id')->constrained('trucks');
            $table->foreignId('driver_id')->constrained('drivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('job_addresses', 'job_id'))
        {
            Schema::table('job_addresses', function (Blueprint $table) {
                $table->dropForeign(['job_id']);
            });
        }
        if (Schema::hasColumn('job_addresses', 'order_id'))
        {
            Schema::table('job_addresses', function (Blueprint $table) {
                $table->dropForeign(['order_id']);
            });
        }
        if (Schema::hasColumn('job_addresses', 'truck_id'))
        {
            Schema::table('job_addresses', function (Blueprint $table) {
                $table->dropForeign(['truck_id']);
            });
        }
        if (Schema::hasColumn('job_addresses', 'driver_id'))
        {
            Schema::table('job_addresses', function (Blueprint $table) {
                $table->dropForeign(['driver_id']);
            });
        }
        Schema::dropIfExists('job_addresses');
    }
}
