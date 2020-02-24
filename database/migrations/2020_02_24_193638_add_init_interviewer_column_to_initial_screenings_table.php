<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInitInterviewerColumnToInitialScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('initial_screenings', function (Blueprint $table) {
            //
            $table->integer('init_interviewer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('initial_screenings', function (Blueprint $table) {
            //
            $table->dropColumn('init_interviewer');
        });
    }
}
