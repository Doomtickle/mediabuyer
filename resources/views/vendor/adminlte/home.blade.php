@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    Dashboard
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
                @if(App\Client::all())
                    @foreach(App\Client::all() as $client)
                        <h2>{{ $client->name }}</h2>
                    @endforeach
                @endif
			</div>
		</div>
	</div>
@endsection
