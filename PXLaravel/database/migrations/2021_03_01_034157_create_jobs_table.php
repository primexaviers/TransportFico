<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("name");
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
        if (Schema::hasColumn('jobs', 'destination'))
        {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropForeign(['destination']);
            });
        }
        if (Schema::hasColumn('jobs', 'origin'))
        {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropForeign(['origin']);
            });
        }
        if (Schema::hasColumn('jobs', 'order_id'))
        {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropForeign(['order_id']);
            });
        }
        if (Schema::hasColumn('jobs', 'truck_id'))
        {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropForeign(['truck_id']);
            });
        }
        if (Schema::hasColumn('jobs', 'driver_id'))
        {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropForeign(['driver_id']);
            });
        }
        Schema::dropIfExists('jobs');
    }
}
