<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('title');
            $table->text('basicDescription', 500);
            $table->text('goalsAndObjectives', 500);
            $table->float('grossBudget');
            $table->float('netBudget');
            $table->date('flight_date_start');
            $table->date('flight_date_end');
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
        Schema::dropIfExists('media_plans');
    }
}
