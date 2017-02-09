@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>Success Metrics</h1>
                <hr>
                <form method="POST" action="/success_metrics" id="successMetrics">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="proposal_request_id" value="{{ $pr->id }}">
                    <input type="hidden" name="media_plan_id" value="{{ $pr->media_plan_id }}">
                    <input type="hidden" name="client_id" value="{{ $pr->client_id }}">
                    @include('success_metrics.form')
                </form>
                <hr />
                @php
                    $successMetrics = App\SuccessMetric::where('proposal_request_id', '=', $pr->id )->get();
                @endphp
                @if($successMetrics)
                    <h2>Current Success Metrics</h2>
                    <div class="allSuccessMetrics">
                        <div class="successMetrics col-md-10">
							<table class="table table-striped">
								<thead>
								  <tr>
									<th>Type</th>
									<th>Description</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									@foreach($successMetrics as $successMetric)
										<td>{{ $successMetric->type }}</td>
										<td>{{ $successMetric->description }} </td>
									</tr>
									@endforeach
							</tbody>
						</table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
@section('scripts.footer')
    <script>
        $('#successMetrics').submit(function (e) {

            //TODO: find out why I have to do this
            //this is a workaround for ajax requests sometimes throwing a 500 Internal Server
            //error.  This will prefilter before each request.
            $.ajaxPrefilter(function (options, originalOptions, xhr) { // this will run before each request
                var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
                }
            });

            e.preventDefault();

            var el = $(this);
            var myurl = "/success_metrics";
            $.ajax({
                type: "POST",
                url: myurl,
                data: $(this).serialize(),
                success: function (data) {
					$('.table').append("<tr><td>" + data.type + "</td><td>" + data.description + "</td></tr>");
					$('#successMetrics').each(function(){
						this.reset();
					});
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert('There was an error processing your request. Please notify an administrator \n Error: ' + thrownError);
                    console.log(xhr.status);
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            })
        });
    </script>
@stop
