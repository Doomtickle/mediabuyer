<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('media_plan_id');
            $table->string('market');
            $table->integer('broadcast_radio');
            $table->integer('broadcast_cable_tv');
            $table->integer('digital_tv_hulu');
            $table->integer('digital_radio_pandora');
            $table->integer('digital_radio_spotify');
            $table->integer('digital_radio_iheart');
            $table->integer('digital_geofencing');
            $table->integer('digital_google_text_and_display');
            $table->integer('digital_youtube_and_google_video');
            $table->integer('market_split');
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
        Schema::dropIfExists('budget_proposals');
    }
}
