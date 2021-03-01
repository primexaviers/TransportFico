<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
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
        if (Schema::hasColumn('job_tracks', 'job_id'))
        {
            Schema::table('job_tracks', function (Blueprint $table) {
                $table->dropForeign(['job_id']);
            });
        }
        Schema::dropIfExists('job_tracks');
    }
}
