<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompensationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id');
            $table->integer('basic_salary');
            $table->integer('meal_allowance')->nullable();
            $table->integer('transpo_allowance')->nullable();
            $table->integer('comm_allowance')->nullable();
            $table->integer('rice_subsidy')->nullable();
            $table->integer('night_diff')->nullable();
            $table->integer('double_allowance')->nullable();
            $table->integer('attendance_bonus')->nullable();
            $table->integer('toic_qa_allowance')->nullable();
            $table->integer('productivity_bonus')->nullable();
            $table->integer('team_perf_bonus')->nullable();
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
        Schema::dropIfExists('compensation');
    }
}
