<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_transfers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->float('total_product_transfer')->nullable();
            $table->float('total_weight_transfer')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreignId('job_warehouse_id')->constrained('job_warehouses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('inventory_transfers', 'job_warehouse_id'))
        {
            Schema::table('inventory_transfers', function (Blueprint $table) {
                $table->dropForeign(['job_warehouse_id']);
            });
        }
        Schema::dropIfExists('inventory_transfers');
    }
}
