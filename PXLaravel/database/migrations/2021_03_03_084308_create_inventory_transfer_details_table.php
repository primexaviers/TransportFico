<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTransferDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_transfer_details', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("total");
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreignId('inventory_transfer_id')->constrained('inventory_transfers');
            $table->foreignId('product_id')->constrained('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('inventory_transfer_details', 'inventory_transfers'))
        {
            Schema::table('inventory_transfer_details', function (Blueprint $table) {
                $table->dropForeign(['inventory_transfers']);
            });
        }
        if (Schema::hasColumn('inventory_transfer_details', 'product_id'))
        {
            Schema::table('inventory_transfer_details', function (Blueprint $table) {
                $table->dropForeign(['product_id']);
            });
        }
        Schema::dropIfExists('inventory_transfer_details');
    }
}
