<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuccessMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_metrics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('media_plan_id');
            $table->integer('proposal_request_id');
            $table->string('type');
            $table->text('description', 250);
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
        Schema::dropIfExists('success_metrics');
    }
}
