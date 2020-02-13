<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTypingScoreToInitialScreeningsTable extends Migration
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
            $table->integer('typing_score');
            $table->integer('typing_result');
            $table->renameColumn('test_score','comprehension_score');
            $table->renameColumn('test_result','comprehension_result');
            $table->dropColumn('test_id');
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
            $table->dropColumn('typing_score');
            $table->dropColumn('typing_result');
            $table->renameColumn('comprehension_score','test_score');
            $table->renameColumn('comprehension_result','test_result');
            $table->integer('test_id');
        });
    }
}
