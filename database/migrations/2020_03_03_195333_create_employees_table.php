<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->integer('employee_id')->nullable();
            $table->integer('person_id')->nullable();
            $table->string('company_number');
            $table->string('bank_account')->nullable();
            $table->integer('cost_center_id');
            $table->integer('cluster_id')->nullable();
            $table->integer('site_id');
            $table->integer('job_id');
            $table->string('status');
            $table->integer('company_id');
            $table->date('date_signed')->nullable();
            $table->integer('contract_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->date('jo_date')->nullable();
            $table->date('nesting_date')->nullable();
            $table->date('eval_period')->nullable();
            $table->date('reprofile_date')->nullable();
            $table->date('trng_ext_date')->nullable();
            $table->date('start_date');
            $table->date('month_eval3')->nullable();
            $table->date('month_eval5')->nullable();
            $table->date('assoc_date')->nullable();
            $table->date('consultant_date')->nullable();
            $table->date('regularize_date')->nullable();
            $table->string('medilink_id')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
