<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\MediaPlan;
use App\ProposalRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RFPRequest;
use Illuminate\Support\Facades\Redirect;


/**
 * @property  user_id
 */
class ProposalRequestsController extends Controller
{

    /**
     *
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $title
     * @return \Illuminate\Http\Response
     */
    public function create($title)
    {
        $mediaPlan = MediaPlan::fromTitle($title);
        $user_id = \Auth::user()->id;

        return view('proposal_requests.basicInfo', compact('mediaPlan', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RFPRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RFPRequest $request)
    {
        $pr=ProposalRequest::create($request->all());
        $pr->user_id = \Auth::user()->id;

        $pr->save();

        return redirect()->action('AdUnitsController@create', ['proposal_request_id' => $pr->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param $mediaPlan
     * @param $proposalRequest
     * @return \Illuminate\Http\Response
     * @internal param $clientName
     * @internal param $campaignName
     * @internal param int $id
     */
    public function show($mediaPlan, $proposalRequest)
    {
        $rfp=ProposalRequest::planInfo($mediaPlan, $proposalRequest)->with('client', 'adUnits', 'successMetrics')->find($proposalRequest);
        $plan = MediaPlan::fromTitle($mediaPlan);

        return view('proposal_requests.show', compact('rfp', 'plan'));
    }

    /**
     * Add the proposal document to the RFP
     * @param $mediaPlan
     * @param $proposalRequest
     * @param Request $request
     * @return string
     * @internal param $clientName
     * @internal param $campaignName
     */
    public function addFile($mediaPlan, $proposalRequest, Request $request)
    {
        $this->validate($request, [

            'proposal'=>'required|mimes:docx,pdf,xlsx'

        ]);

        $proposal=Proposal::fromForm($request->file('proposal'));

        return ProposalRequest::planInfo($mediaPlan, $proposalRequest)->addProposal($proposal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param ProposalRequest $proposalRequest
     * @internal param int $id
     */
    public function edit($id)
    {
        $pr = ProposalRequest::find($id);


        return view('proposal_requests.edit', compact('pr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RFPRequest|Request $request
     * @param ProposalRequest $proposalRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(RFPRequest $request, ProposalRequest $proposalRequest)
    {

        $proposalRequest->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProposalRequest $proposalRequest
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(ProposalRequest $proposalRequest)
    {
        /** @var ProposalRequest $proposalRequest */
        $proposalRequest->delete();

        return back();
    }

}

