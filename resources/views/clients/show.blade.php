@extends('adminlte::page')

@section('htmlheader_title')
    {{ $clientInfo->name }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <h1>{{$clientInfo->name}}</h1>
                <form action="/clients/{{ $clientInfo->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Delete it!</button>
                    </div>
                </form>
                <a href="/{{ $clientInfo->name }}/media_plan/create" class="btn btn-primary">Create a new media plan</a>
			</div>
		</div>
	</div>
@endsection
