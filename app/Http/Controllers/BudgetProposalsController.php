<?php

namespace App\Http\Controllers;

use App\Client;
use App\BudgetProposal;
use App\MediaPlan;
use Illuminate\Http\Request;

class BudgetProposalsController extends Controller
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
    public function create($mediaPlan)
    {
        $mediaPlan = MediaPlan::fromTitle($mediaPlan);

        return view('budget_proposals.create', compact('mediaPlan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $bp = BudgetProposal::create($request->all());

        return response()->json($bp);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BudgetProposal  $budgetProposal
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetProposal $budgetProposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BudgetProposal  $budgetProposal
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetProposal $budgetProposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BudgetProposal  $budgetProposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetProposal $budgetProposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BudgetProposal  $budgetProposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetProposal $budgetProposal)
    {
        //
    }
}
