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

        'budget',
        'client_id',
        'media_plan_id',
        'staggered',
        'clientName',
        'campaignName',
        'flightDateEnd',
        'clientIndustry',
        'flightDateStart',
        'basicDescription'

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
     * Proposals belong to a proposal request
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
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
    public function getBudgetAttribute($budget)
    {

        return number_format($budget, 2, '.', '');
    }
}

