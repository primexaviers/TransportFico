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
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('truck_id')->constrained('trucks');
            $table->foreignId('driver_id')->constrained('drivers');
            $table->foreignId('origin')->constrained('addresses');
            $table->foreignId('destination')->constrained('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('job_addresses', 'destination'))
        {
            Schema::table('job_addresses', function (Blueprint $table) {
                $table->dropForeign(['destination']);
            });
        }
        if (Schema::hasColumn('job_addresses', 'origin'))
        {
            Schema::table('job_addresses', function (Blueprint $table) {
                $table->dropForeign(['origin']);
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
