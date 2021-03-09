<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("total");
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreignId('order_id')->constrained('orders');
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
        if (Schema::hasColumn('order_details', 'order_id'))
        {
            Schema::table('order_details', function (Blueprint $table) {
                $table->dropForeign(['order_id']);
            });
        }
        if (Schema::hasColumn('order_details', 'product_id'))
        {
            Schema::table('order_details', function (Blueprint $table) {
                $table->dropForeign(['product_id']);
            });
        }
        Schema::dropIfExists('order_details');
    }
}
