<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vehicle_no');
            $table->float('length')->nullable();
            $table->float('breadth')->nullable();
            $table->float('height')->nullable();
            $table->string('dimension_uom')->nullable();
            $table->float('truck_capacity')->nullable();
            $table->string('truck_capacity_uom')->nullable();
            $table->double('cost',10,2)->nullable();
            $table->string('cost_uom')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trucks');
    }
}
