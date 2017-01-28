@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-offset-2 col-md-4">
                <form action="/clients" method="post">
                    {{ csrf_field() }}
                   <div class="form-group">
                       <label for="name">Client Name:</label>
                       <input type="text" name="name" class="form-control" id="name" placeholder="Enter Client Name">
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                </form>
			</div>
		</div>
	</div>
@endsection
