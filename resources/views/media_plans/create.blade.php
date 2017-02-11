@extends('adminlte::page')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <h1>{{ $client->name }}</h1>
                <h2>Add a media plan</h2>
                <form action="/{{ $client->name }}/media_plan" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}" /> 
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="flight_date_start">Flight Date Start</label>
                                <input type="date" name="flight_date_start" class="form-control" id="flight_date_start" value="{{ Carbon\Carbon::now()->toDateString() }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="flight_date_end">Flight Date End</label>
                                <input type="date" name="flight_date_end" class="form-control" id="flight_date_end" value="{{ Carbon\Carbon::now()->addDays(30)->toDateString()}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="basicDescription">Basic Description</label>
                        <textarea name="basicDescription" class="form-control" id="basicDescription" rows=5></textarea>
                    </div>
                    <div class="form-group">
                        <label for="goalsAndObjectives">Goals and Objectives</label>
                        <textarea name="goalsAndObjectives" class="form-control" id="goalsAndObjectives" rows=5></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="grossBudget">Gross Budget</label>
                                <input type="text" name="grossBudget" id="grossBudget" class="form-control" value="{{ old('grossBudget') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="netBudget">Net Budget</label>
                                <input type="text" name="netBudget" id="netBudget" class="form-control" value="{{ old('netBudget') }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
@endsection
