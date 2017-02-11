<?php

namespace App\Http\Controllers;

use App\Client;
use App\MediaPlan;
use Illuminate\Http\Request;

class MediaPlansController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $mediaPlans = MediaPlan::with('client')->get();

       return view('media_plans.list', compact('mediaPlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $name
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        $client = Client::fromName($name);
        return view('media_plans.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'             => 'required',
            'flight_date_start' => 'required',
            'flight_date_end'   => 'required'
        ]);

        $mediaPlan = MediaPlan::create([
            'client_id'         => $request->client_id,
            'title'             => $request->title,
            'flight_date_start' => $request->flight_date_start,
            'flight_date_end'   => $request->flight_date_end,
        ]);

        return redirect()->to('media_plan/' . $mediaPlan->id );
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = MediaPlan::with('client')->find($id);

        return view('media_plans.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MediaPlan $mediaPlan
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(MediaPlan $mediaPlan)
    {
        $plan = $mediaPlan;
        $client = Client::fromId($plan->client_id);

        return view('media_plans.edit', compact('plan', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param MediaPlan $mediaPlan
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, MediaPlan $mediaPlan) 
    {
        $this->validate($request, [
            'title'             => 'required',
            'flight_date_start' => 'required',
            'flight_date_end'   => 'required',
        ]);

        $mediaPlan->update([
            'title' => $request->title,
            'flight_date_start' => $request->flight_date_start,
            'flight_date_end' => $request->flight_date_end,
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MediaPlan $mediaPlan
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(MediaPlan $mediaPlan)
    {
       $mediaPlan->delete();

       return redirect()->route('home');

    }
}
