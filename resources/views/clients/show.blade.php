@extends('adminlte::page')

@section('htmlheader_title')
    {{ $clientInfo->name }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8">
                <h1>{{$clientInfo->name}}</h1>
                <a href="/{{ $clientInfo->name }}/media_plan/create" class="btn btn-primary">Create a new media plan</a>
			</div>
            <form action="/clients/{{ $clientInfo->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete this client</button>
                </div>
            </form>
		</div>
        <hr>
        @foreach($clientInfo->mediaPlans as $mediaPlan)
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $mediaPlan->title }}</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <a href="/media_plan/{{ $mediaPlan->id }}">View</a> &nbsp; |
                            <a href="/media_plan/{{ $mediaPlan->id }}/edit"> &nbsp; Edit</a>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        @endforeach
    </div>
@endsection
