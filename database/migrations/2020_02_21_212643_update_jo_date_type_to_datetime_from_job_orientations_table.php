<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJoDateTypeToDatetimeFromJobOrientationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_orientations', function (Blueprint $table) {
            //
            $table->datetime('jo_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_orientations', function (Blueprint $table) {
            //
            $table->date('jo_date')->change();
        });
    }
}
