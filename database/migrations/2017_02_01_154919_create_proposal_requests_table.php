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
            $table->text('goalsAndObjectives', 500);
            $table->float('grossBudget');
            $table->float('netBudget');
            $table->string('staggered');
            $table->date('flightDateStart');
            $table->date('flightDateEnd');
            $table->boolean('geography')->default(false);
            $table->text('describeGeography', 250);
            $table->boolean('targetingAgeGroup')->default(false);
            $table->text('describeAgeGroup', 100);
            $table->boolean('targetingHouseholdIncome')->default(false);
            $table->text('describeHouseHoldIncome', 100);
            $table->boolean('targetingGender')->default(false);
            $table->text('describeGender', 100);
            $table->boolean('targetingInterests')->default(false);
            $table->text('describeInterests', 100);
            $table->boolean('targetingDevices')->default(false);
            $table->text('describeDevices', 100);
            $table->boolean('frequencyCapping')->default(false);
            $table->text('describeFrequencyCapping', 500);
            $table->text('specifications', 500);
            $table->text('orderTerms', 500);
            $table->text('submissionInstructions', 500);
            $table->text('proposalFormat', 500);
            $table->date('proposalDueDate');
            $table->date('decisionMadeBy');
            $table->text('selectionCriteria', 500);
            $table->timestamps();
            //eventual fields
            //////////////////////////////////////////////////
            /*$table->boolean('metricImpressions')->default('false');
            $table->boolean('metricCostPerImpression')->default('false');
            $table->boolean('metricClickThrus')->default('false');
            $table->boolean('metricCTR')->default('false');
            $table->boolean('metricCPC')->default('false');
            $table->boolean('metricClickToCall')->default('false');
            $table->text('describeSuccessMetrics', 500);*/
           /////////////////////////////////////////// 
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
