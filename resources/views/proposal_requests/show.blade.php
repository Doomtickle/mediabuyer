@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container">
        <div class="col-md-10">
            <div class="row">
                <h1>{{$rfp->clientName}}</h1>
                <h2>{{$rfp->campaignName}}</h2>
                <a class="btn btn-info" href="/proposal_requests/{{ $rfp->id }}/edit">
                    Edit this proposal request
                </a>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        <ul style="padding:0;margin:0;">
                            <li class="list-group-item" style="font-size:1.3em; text-align:center;">Snapshot</li>
                            <li class="list-group-item"><strong>Industry:</strong> {{ $rfp->clientIndustry }}</li>
                            <li class="list-group-item"><strong>Flight Date
                                                                start:</strong> {{ $rfp->flightDateStart }}</li>
                            <li class="list-group-item"><strong>Flight Date end:</strong> {{ $rfp->flightDateEnd }}
                            </li>
                            <li class="list-group-item"><strong>Budget:</strong> {{ $rfp->budget }}</li>
                            <li class="list-group-item"><strong>Staggered:</strong> {{ $rfp->staggered  }}</li>
                            <li class="list-group-item"><strong>Created By:</strong> {{ $rfp->user->name  }}</li>
                            <li class="list-group-item"><strong>Created
                                                                on:</strong> {{ date_format($rfp->created_at, 'm/d/Y')  }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="list-group">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="text-align:center;">Basic Description</h3>
                            </div>
                            <div class="panel-body">
                                {!! nl2br($rfp->basicDescription) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            {{--<h3>Submitted Proposals</h3>--}}
            {{--@if($rfp->proposals->first())--}}
                {{--@foreach ($rfp->proposals as $proposal)--}}
                    {{--<a class="btn btn-info" target="_blank" href="/{{$proposal->path}}">Proposal {{$proposal->id}}</a>--}}
                {{--@endforeach--}}
            {{--@else--}}
                {{--No Proposals Yet--}}
            {{--@endif--}}
            {{--<hr>--}}
            {{--<h2>Upload your proposal</h2>--}}
            {{--<form id="addProposalsForm" action="/{{ $rfp->clientName }}/{{ $rfp->campaignName }}/proposals"--}}
                  {{--method="POST"--}}
                  {{--class="dropzone"--}}
                  {{--enctype="multipart/form-data"--}}
                  {{--style="margin-bottom:50px;">--}}
                {{--{{ csrf_field() }}--}}
            {{--</form>--}}
        </div>
    </div>
@endsection

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>

        Dropzone.options.addProposalsForm = {

            paramName: 'proposal',
            maxFilesize: 3,
            acceptedFiles: '.docx, .pdf, .xlsx, .xls, .csv'

        };
    </script>
@endsection