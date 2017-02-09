<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalRequest extends Model
{
    /**
     *
     */
    protected $table = 'proposal_requests';

    protected $fillable = [
        'client_id',
        'media_plan_id',
        'staggered',
        'clientName',
        'campaignName',
        'goalsAndObjectives',
        'flightDateEnd',
        'clientIndustry',
        'flightDateStart',
        'basicDescription',
        'grossBudget',
        //new fields
        'netBudget',
        'targetingText',
        'targetingDisplay',
        'targetingVideo',
        'targetingGeoFencing',
        'targetingGeography',
        'geography',
        'describeGeography',
        'targetingAgeGroup',
        'describeAgeGroup',
        'targetingHouseholdIncome',
        'describeHouseHoldIncome',
        'targetingGender',
        'describeGender',
        'targetingInterests',
        'describeInterests',
        'targetingDevices',
        'describeDevices',
        'frequencyCapping',
        'describeFrequencyCapping',
        'dayParting',
        'describeDayParting',
        'specifications',
        'orderTerms',
        'submissionInstructions',
        'proposalFormat',
        'proposalDueDate',
        'decisionMadeBy',
        'selectionCriteria',

    ];

    /**
     * Proposal requests belong to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function mediaPlan()
    {
        return $this->belongsTo(MediaPlan::class, 'media_plan_id');
    }


    public function successMetrics()
    {
        return $this->hasMany(SuccessMetric::class);
    }
    
    /**
     * Proposals belong to a proposal request
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function adUnits()
    {
        return $this->hasMany(AdUnit::class, 'proposal_request_id');
             
    }

    /**
     * Find the ProposalRequest with the given params
     * @param $mediaPlan
     * @param $proposalRequest
     * @return mixed
     */
    public static function planInfo($mediaPlan, $proposalRequest)
    {
        $mediaPlan = MediaPlan::fromTitle($mediaPlan);
        $media_plan_id = $mediaPlan->id;
        $id = $proposalRequest;

        return static::where(compact('media_plan_id', 'id'))->with('client')->first();

    }
    /**
     * @param Proposal $proposal
     * @return Model
     */
    public function addProposal(Proposal $proposal)
    {
        return $this->proposals()->save($proposal);
    }

    /**
     * Convert the budget to dollars and cents
     * @param $budget
     * @return string
     */

    public function getGrossBudgetAttribute($grossBudget)
    {
        return number_format($grossBudget, 2, '.', '');
    }

    public function getNetBudgetAttribute($netBudget)
    {
       return number_format($netBudget, 2, '.', ''); 
    }
    
}

