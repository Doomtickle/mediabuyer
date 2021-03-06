@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <form action="/media_plan/{{ $plan->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}" /> 
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $plan->title }}">
                    </div>
                    <div class="form-group">
                        <label for="flight_date_start">Flight Date Start</label>
                        <input type="date" name="flight_date_start" class="form-control" id="flight_date_start" value="{{ $plan->flight_date_start }}">
                    </div>
                    <div class="form-group">
                        <label for="flight_date_end">Flight Date End</label>
                        <input type="date" name="flight_date_end" class="form-control" id="flight_date_end" value="{{ $plan->flight_date_end }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

			</div>
		</div>
	</div>
@endsection
