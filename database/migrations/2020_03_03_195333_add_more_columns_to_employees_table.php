<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->string('company_number');
            $table->string('bank_account')->nullable();
            $table->integer('cost_center_id');
            $table->string('cluster')->nullable();
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
            $table->date('medilink_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->dropColumn([
                'company_id',
                'bank_account',
                'cost_center_id',
                'cluster',
                'site_id',
                'job_id',
                'status',
                'company_id',  
                'date_signed',
                'contract_id',
                'department_id',
                'employee_id',
                'jo_date',
                'nesting_date',
                'eval_period',
                'reprofile_date',
                'trng_ext_date',                
                'start_date',
                'month_eval3',
                'month_eval5',
                'assoc_date',
                'consultant_date',
                'regularize_date',
                'medilink_id'
            ]);
        });
    }
}
