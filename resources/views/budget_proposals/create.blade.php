@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Budget Proposal Worksheet</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>314074269
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow:auto;">
                        <h1>Create a budget proposal</h1>
                        <p>Client: {{ $mediaPlan->client->name }}</p>
                        <p>Media Plan: {{ $mediaPlan->title }}</p>
                        <form action="/budget_proposals" method="post">
                            {{ csrf_field() }}
                                <table id="budget_proposal_table" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Market</th>
                                            <th>Broadcast Radio</th>
                                            <th>Broadcast Cable TV</th>
                                            <th>Digital TV (Hulu)</th>
                                            <th>Digital Radio (Pandora)</th>
                                            <th>Digital Radio (Spotify)</th>
                                            <th>Digital Radio (iHeart)</th>
                                            <th>Digital Geofencing</th>
                                            <th>Google Text &amp; Display</th>
                                            <th>Youtube &amp; Google Video</th>
                                            <th>Market Split</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Market</th>
                                            <th>Broadcast Radio</th>
                                            <th>Broadcast Cable TV</th>
                                            <th>Digital TV (Hulu)</th>
                                            <th>Digital Radio (Pandora)</th>
                                            <th>Digital Radio (Spotify)</th>
                                            <th>Digital Radio (iHeart)</th>
                                            <th>Digital Geofencing</th>
                                            <th>Google Text &amp; Display</th>
                                            <th>Youtube &amp; Google Video</th>
                                            <th>Market Split</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            <a id="addRow" class="btn btn-info">Add Row</a>
                            <button id="submit" type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
@endsection
@section('scripts.footer')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script>
		$(document).ready(function(){
			var counter = 0; 
			var table = $('#budget_proposal_table').DataTable();

			$('#addRow').on( 'click', function () {

                if (counter > 0 ){
                    $('#submit').click();
                }
                    table.row.add( [
                        '<td><input type="text" name="market" placeholder="Enter the Region"></td>',
                        '<td><input type="text" name="broadcast_radio" placeholder="Amount"></td>',
                        '<td><input type="text" name="broadcast_cable_tv" placeholder="Amount"></td>',
                        '<td><input type="text" name="digital_tv_hulu" placeholder="Amount"></td>',
                        '<td><input type="text" name="digital_radio_pandora" placeholder="Amount"></td>',
                        '<td><input type="text" name="digital_radio_spotify" placeholder="Amount"></td>',
                        '<td><input type="text" name="digital_radio_iheart" placeholder="Amount"></td>',
                        '<td><input type="text" name="digital_geofencing" placeholder="Amount"></td>',
                        '<td><input type="text" name="digital_google_text_and_display" placeholder="Amount"></td>',
                        '<td><input type="text" name="digital_youtube_and_google_video" placeholder="Amount"></td>',
                        '<td><input type="text" name="market_split" placeholder="Amount"></td>',
                        '</form>'
                    ]).draw( false );

                    counter++;
			});
 
			// Automatically add a first row of data
            $('#addRow').click();

            $('#submit').on( 'click', function(e){

                e.preventDefault();

                var formdata = table.$('input').serializeArray();
                formdata.push({ name: "client_id", value: {{ $mediaPlan->client->id }} });
                formdata.push({ name: "media_plan_id", value: {{ $mediaPlan->id }} });

                $.ajaxPrefilter(function (options, originalOptions, xhr) { // this will run before each request
                    var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
                    }
                });
                var myurl = "/budget_proposals";
                $.ajax({
                    type: "POST",
                    url: myurl,
                    data: formdata, 
                    success: function (data) {
                        {{--$('.table').append("<tr><td>" + data.type + "</td><td>" + data.size + "</td><td>" + data.description + "</td></tr>");--}}
                        {{--$('#adUnits').each(function(){--}}
                            {{--this.reset();--}}
                        {{--});--}}
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
        });
    </script>
@stop
