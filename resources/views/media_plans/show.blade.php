@extends('adminlte::page')

@section('htmlheader_title')
    {{ $plan->title }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <h1>{{ $plan->client->name }}</h1>
                <h2>{{ $plan->title }}</h2>
                <ul>
                    <li>Flight Date Start: {{ date('M j, Y', strtotime($plan->flight_date_start)) }}</li>
                    <li>Flight Date End: {{ date('M j, Y', strtotime($plan->flight_date_end)) }}</li>
                </ul>
				<form action="/media_plan/{{ $plan->id }}" method="post">
					{{ csrf_field() }}
					{{ method_field('delete') }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Delete Media Plan</button>
                    </div>
				</form>
                <a class="btn btn-primary" href="/{{ $plan->title }}/rfp/create">Create a new RFP</a>
			</div>
		</div>
	</div>
@endsection
