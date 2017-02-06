@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

				<div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $user->name }}</h3>
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
                                <strong>Title: </strong>{{ $user->title }}
                            </div>
                            <div class="list-group-item">
                                <strong>Email: </strong><a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </div>
                            <div class="list-group-item">
                                <strong>Company: </strong>{{ $user->company }}
                            </div>
                            <div class="list-group-item">
                                <strong>Phone: </strong>{{ $user->phone }}
                            </div>
                            <div class="list-group-item">
                                <strong>Address: </strong>{{ $user->address }}
                            </div>
                            <div class="list-group-item">
                                <strong>Role: </strong>{{ $role }}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
@endsection
