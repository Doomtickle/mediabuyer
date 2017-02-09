<?php

namespace App\Http\Controllers;

use App\SuccessMetric;
use App\ProposalRequest;
use Illuminate\Http\Request;

class SuccessMetricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pr = ProposalRequest::with('adUnits')->find($id);

        return view('success_metrics.create', compact('pr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $successMetric = SuccessMetric::create($request->all()); 

        $successMetric->proposal_request_id = $request->proposal_request_id;
        $successMetric->media_plan_id = $request->media_plan_id;
        $successMetric->client_id = $request->client_id;

        $successMetric->save();
        
        $data = [
            'id'                  => $successMetric->id,
            'proposal_request_id' => $successMetric->proposal_request_id,
            'media_plan_id'       => $successMetric->media_plan_id,
            'client_id'           => $successMetric->client_id,
            'type'                => $successMetric->type,
            'description'         => $successMetric->description,
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuccessMetric  $successMetric
     * @return \Illuminate\Http\Response
     */
    public function show(SuccessMetric $successMetric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuccessMetric  $successMetric
     * @return \Illuminate\Http\Response
     */
    public function edit(SuccessMetric $successMetric)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuccessMetric  $successMetric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuccessMetric $successMetric)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuccessMetric  $successMetric
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuccessMetric $successMetric)
    {
        //
    }
}
