<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfomancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfomances', function (Blueprint $table) {
            $table->id();
            $table->integer('rating')->default(0);
            $table->text('comment')->nullable( );
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreignId('job_id')->constrained('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('perfomances', 'job_id'))
        {
            Schema::table('perfomances', function (Blueprint $table) {
                $table->dropForeign(['job_id']);
            });
        }
        Schema::dropIfExists('perfomances');
    }
}
