@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

                @foreach($mediaPlans as $mediaPlan)
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <a href="/media_plan/{{ $mediaPlan->id }}">
                                    <h3 class="box-title">{{ $mediaPlan->title }}</h3>
                                </a>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="list-group">
                                    <div class="list-group-item">
                                        Client: <a href="/clients/{{ $mediaPlan->client->name }}">{{ $mediaPlan->client->name }}</a>
                                    </div>
                                    <div class="list-group-item">
                                        Flight Date Start: {{ date('M j, Y', strtotime($mediaPlan->flight_date_start)) }}
                                    </div>
                                    <div class="list-group-item">
                                        Flight Date End: {{ date('M j, Y', strtotime($mediaPlan->flight_date_start)) }}
                                    </div>
                                </div>
                            </div>
                        <!-- /.box-body -->
                        </div>
                @endforeach
			</div>
		</div>
	</div>
@endsection
