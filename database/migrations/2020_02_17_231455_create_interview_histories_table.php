<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('interviewer_id');
            $table->string('applicant_first_name');
            $table->string('applicant_middle_name');
            $table->string('applicant_last_name');
            $table->string('applicant_applied_for');
            $table->string('result');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('interview_histories');
    }
}
