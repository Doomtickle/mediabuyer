@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                @foreach($clientList as $client)
                    <a href="/clients/{{ $client->name }}">{{ $client->name }}</a>
                @endforeach
			</div>
		</div>
	</div>
@endsection
