@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create New Account</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="/users"
                              method="POST"
                              style="margin-bottom:50px;">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title">Job Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="company">Company</label>
                                    <input type="text" name="company" id="company" class="form-control" value="{{ old('company') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="10">{{ old('address') }}</textarea>
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" id="password" class="form-control">
                                </div>
                                <hr>
                                <div class="form-group col-md-4">
                                    <label for="role">Role:</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="client">Client</option>
                                        <option value="vendor">Vendor</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
@endsection
