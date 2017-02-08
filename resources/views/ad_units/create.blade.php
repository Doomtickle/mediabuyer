@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>Add media units</h1>
                <hr>
                <form method="POST" action="/ad_units" id="adUnits">
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
                    <input type="hidden" name="proposal_request_id" value="{{ $rfp }}">
                    @include('ad_units.form')
                </form>
                <hr />
                @php
                    $adUnits = App\AdUnit::where('proposal_request_id', '=', $rfp )->get();
                @endphp
                @if($adUnits)
                    <h2>Current Media Units</h2>
                    <div class="allMediaUnits">
                        <div class="mediaUnits col-md-10">
							<table class="table table-striped">
								<thead>
								  <tr>
									<th>Media Type</th>
									<th>Size</th>
									<th>Description</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									@foreach($adUnits as $adUnit)
										<td>{{ $adUnit->type }}</td>
										<td>{{ $adUnit->size }}</td>
										<td>{{ $adUnit->description }} </td>
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
        $('#adUnits').submit(function (e) {

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
            var myurl = "/ad_units";
            $.ajax({
                type: "POST",
                url: myurl,
                data: $(this).serialize(),
                success: function (data) {
					$('.table').append("<tr><td>" + data.type + "</td><td>" + data.size + "</td><td>" + data.description + "</td></tr>");
					$('#adUnits').each(function(){
						this.reset();
					});
                    console.log(data);
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
