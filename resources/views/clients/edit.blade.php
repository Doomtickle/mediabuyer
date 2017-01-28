@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <h1>Edit {{ $clientInfo->name }}</h1>
                <form action="/clients/{{ $clientInfo->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                   <div class="form-group">
                       <label for="name">Client Name:</label>
                       <input type="text" name="name" class="form-control" id="name" value="{{ $clientInfo->name }}">
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary">Edit {{ $clientInfo->name }}</button>
                   </div>
                </form>
			</div>
		</div>
	</div>
@endsection
