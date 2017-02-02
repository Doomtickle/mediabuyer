<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('media_plan_id');
            $table->integer('client_id');
            $table->string('clientName', 40);
            $table->string('clientIndustry', 40);
            $table->string('campaignName', 80);
            $table->text('basicDescription', 500);
            $table->date('flightDateStart');
            $table->date('flightDateEnd');
            $table->string('staggered');
            $table->float('budget');
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
        Schema::dropIfExists('proposal_requests');
    }
}
