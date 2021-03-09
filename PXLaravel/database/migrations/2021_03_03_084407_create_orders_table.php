<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->float('total_cost')->nullable();
            $table->float('discount')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreignId('customer_id')->constrained('customers');
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
        if (Schema::hasColumn('orders', 'destination'))
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['destination']);
            });
        }
        if (Schema::hasColumn('orders', 'origin'))
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['origin']);
            });
        }
        if (Schema::hasColumn('orders', 'customer_id'))
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['customer_id']);
            });
        }
        Schema::dropIfExists('orders');
    }
}
