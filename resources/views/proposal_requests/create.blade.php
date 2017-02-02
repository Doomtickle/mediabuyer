@extends('adminlte::layouts.app')

@section('main-content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>Create a new proposal request</h1>
                <hr>
                <form method="POST" action="/proposal_requests">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('proposal_requests.form')
                </form>
            </div>
        </div>
    </div>
@stop
