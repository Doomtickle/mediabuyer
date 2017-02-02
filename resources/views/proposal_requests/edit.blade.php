@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <h1>Edit the Proposal Request</h1>
                <hr>
                @include('partials.edit_pr_form')
            </div>
        </div>
    </div>
@stop
