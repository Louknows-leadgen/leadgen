<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExitClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_clearances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id');
            $table->integer('ext_type');
            $table->date('last_employment_dt')->nullable();
            $table->date('last_pay_dt')->nullable();
            $table->integer('last_pay_amt')->nullable();
            $table->date('cleared_dt')->nullable();
            $table->date('claimed_dt')->nullable();
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exit_clearances');
    }
}
