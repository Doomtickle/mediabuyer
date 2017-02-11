@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container">
        <div class="col-md-10">
            <div class="row">
                <h1>Client: {{$rfp->clientName}}</h1>
                <h2>Campaign: {{$rfp->campaignName}}</h2>
                {{--<a class="btn btn-info" href="/proposal_requests/{{ $rfp->id }}/edit">--}}
                    {{--Edit this proposal request--}}
                {{--</a>--}}
            </div>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <div class="list-group">
                        <ul style="padding:0;margin:0;">
                            <li class="list-group-item" style="font-size:1.3em; text-align:center;">Basic Info</li>
                            <li class="list-group-item"><strong>Industry:</strong> {{ $rfp->clientIndustry }}</li>
                            <li class="list-group-item"><strong>Flight Date
                                                                start:</strong> {{ $rfp->flightDateStart }}</li>
                            <li class="list-group-item"><strong>Flight Date end:</strong> {{ $rfp->flightDateEnd }}
                            </li>
                            <li class="list-group-item"><strong>Gross Budget:</strong> ${{ $rfp->grossBudget }}</li>
                            <li class="list-group-item"><strong>Net Budget:</strong> ${{ $rfp->netBudget }}</li>
                            <li class="list-group-item"><strong>Staggered:</strong> {{ $rfp->staggered  }}</li>
                            {{--<li class="list-group-item"><strong>Created By:</strong> {{ $rfp->user->name  }}</li>--}}
                            {{--<li class="list-group-item"><strong>Created--}}
                                                                {{--on:</strong> {{ date_format($rfp->created_at, 'm/d/Y')  }}--}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 pull-right">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="text-align:center;">Basic Description</h3>
                            </div>
                            <div class="panel-body">
                                {!! nl2br($rfp->basicDescription) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="list-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="text-align:center;">Goals and Objectives</h3>
                                </div>
                                <div class="panel-body">
                                    {!! nl2br($rfp->goalsAndObjectives) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="list-group">
                        <ul style="padding:0;margin:0;">
                            <li class="list-group-item" style="font-size:1.3em; text-align:center;"><strong>Targeting</strong></li>
                            @if($rfp->targetingText)
                                <li class="list-group-item">Text</li>
                            @endif
                            @if($rfp->targetingDisplay)
                                <li class="list-group-item">Display</li>
                            @endif
                            @if($rfp->targetingVideo)
                                <li class="list-group-item">Video</li>
                            @endif
                            @if($rfp->targetingGeography)
                                <li class="list-group-item">Geography: {{ $rfp->describeGeography }}</li>
                            @endif
                            @if($rfp->targetingAgeGroup)
                                <li class="list-group-item">Age Group: {{ $rfp->describeAgeGroup }}</li>
                            @endif
                            @if($rfp->targetingHouseholdIncome)
                                <li class="list-group-item">Household Income: {{ $rfp->describeHouseHoldIncome }}</li>
                            @endif
                            @if($rfp->targetingGender)
                                <li class="list-group-item">Gender: {{ $rfp->describeGender}}</li>
                            @endif
                            @if($rfp->targetingInterests)
                                <li class="list-group-item">Interests: {{ $rfp->describeInterests }}</li>
                            @endif
                            @if($rfp->targetingDevices)
                                <li class="list-group-item">Devices: {{ $rfp->describeDevices }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="list-group">
                        <ul style="padding:0;margin:0;">
                            <li class="list-group-item" style="font-size:1.3em; text-align:center;"><strong>Ad Units</strong></li>
                            <li class="list-group-item">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Media Type</th>
                                        <th>Size</th>
                                        <th>Description</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rfp->adUnits as $adUnit)
                                          <tr>
                                            <td>{{ $adUnit->type }}</td>
                                            <td>{{ $adUnit->size }}</td>
                                            <td>{{ $adUnit->description }} </td>
                                          </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="list-group">
                        <ul style="padding:0;margin:0;">
                            <li class="list-group-item" style="font-size:1.3em; text-align:center;"><strong>Success Metrics</strong></li>
                            <li class="list-group-item">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Type</th>
                                        <th>Description</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rfp->successMetrics as $successMetric)
                                          <tr>
                                            <td>{{ $successMetric->type }}</td>
                                            <td>{{ $successMetric->description }} </td>
                                          </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center;">Specifications</h3>
                        </div>
                        <div class="panel-body">
                            {!! nl2br($rfp->specifications) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center;">Insertion Order Terms</h3>
                        </div>
                        <div class="panel-body">
                            {!! nl2br($rfp->orderTerms) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center;">Submission Instructions</h3>
                        </div>
                        <div class="panel-body">
                            {!! nl2br($rfp->submissionInstructions) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center;">Acceptable Proposal Formats</h3>
                        </div>
                        <div class="panel-body">
                            {!! nl2br($rfp->proposalFormat) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center;">Proposal Due Date</h3>
                        </div>
                        <div class="panel-body" style="text-align:center;">
                            {!! nl2br($rfp->proposalDueDate ) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center;">Decision Made By</h3>
                        </div>
                        <div class="panel-body" style="text-align:center;">
                            {!! nl2br($rfp->decisionMadeBy ) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center;">Selection Criteria</h3>
                        </div>
                        <div class="panel-body">
                            {!! nl2br($rfp->selectionCriteria) !!}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h3>Submitted Proposals</h3>
            @if($rfp->proposals->first())
                @foreach ($rfp->proposals as $proposal)
                    <a class="btn btn-info" target="_blank" href="/{{$proposal->path}}">Proposal {{$proposal->id}}</a>
                @endforeach
            @else
                No Proposals Yet
            @endif
            <hr>
            <h2>Upload your proposal</h2>
            <form id="addProposalsForm" action="/{{ $plan->title }}/proposal_requests/{{ $rfp->id }}/proposals"
                  method="POST"
                  class="dropzone"
                  enctype="multipart/form-data"
                  style="margin-bottom:50px;">
                {{ csrf_field() }}
            </form>
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
