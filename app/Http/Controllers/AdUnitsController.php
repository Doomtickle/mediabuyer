<?php

namespace App\Http\Controllers;

use App\AdUnit;
use App\ProposalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdUnitsController extends Controller
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
        $rfp = ProposalRequest::find($id)->id;

        return view('ad_units.create', compact('rfp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adUnit = AdUnit::create($request->all()); 
        $adUnit->proposal_request_id = $request->proposal_request_id;
        $adUnit->save();
        
        $data = [
            'id'                  => $adUnit->id,
            'proposal_request_id' => $adUnit->proposal_request_id,
            'size'                => $adUnit->size,
            'type'                => $adUnit->type,
            'description'         => $adUnit->description,
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
