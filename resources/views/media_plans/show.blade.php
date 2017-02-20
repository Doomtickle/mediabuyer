@extends('adminlte::page')

@section('htmlheader_title')
    {{ $plan->title }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <h1>{{ $plan->client->name }}</h1>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>{{ $plan->title }}</h2>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <li class="list-group-item">Flight Date Start: {{ date('M j, Y', strtotime($plan->flight_date_start)) }}</li>
                            <li class="list-group-item">Flight Date End: {{ date('M j, Y', strtotime($plan->flight_date_end)) }}</li>
                            <li class="list-group-item">Basic description: {{ $plan->basicDescription }}</li>
                            <li class="list-group-item">Goals and objectives: {{ $plan->goalsAndObjectives }}</li>
                            <li class="list-group-item">Gross Budget: ${{ number_format($plan->grossBudget, 2, '.', ',') }}</li>
                            <li class="list-group-item">Net Budget: ${{ number_format($plan->netBudget, 2, '.', ',') }}</li>
                        </div>
                    </div>
                </div>
                <div class="media-plan-buttons">
                    <div class="media-plan-action-button">
                        <form action="/media_plan/{{ $plan->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger" disabled>Delete Media Plan</button>
                            </div>
                        </form>
                    </div>
                    <div class="media-plan-action-button">
                        <a class="btn btn-primary" href="/{{ $plan->title }}/rfp/create">Create a new RFP</a>
                    </div>
                    <div class="media-plan-action-button">
                        <a class="btn btn-primary" href="/{{ $plan->title }}/budget_proposal/create">Create a Budget Proposal</a>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection
