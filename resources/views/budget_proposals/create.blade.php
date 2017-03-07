@extends('adminlte::page')

@section('htmlheader_title')
    Create a new budget proposal
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
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow:auto;">
                        <h1>Create a budget proposal</h1>
                        <p>Client: {{ $mediaPlan->client->name }}</p>
                        <p>Media Plan: {{ $mediaPlan->title }}</p>
                        <form action="/budget_proposals" method="post">
                            {{ csrf_field() }}
                                <table id="budget_proposal_table" class="display table-responsive" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Market</th>
                                            <th>Broadcast Radio</th>
                                            <th>Broadcast Cable TV</th>
                                            <th>Digital TV (Hulu)</th>
                                            <th>Digital Radio (Pandora)</th>
                                            <th>Digital Radio (Spotify)</th>
                                            <th>Digital Radio (iHeart)</th> <th>Digital Geofencing</th>
                                            <th>Google Text &amp; Display</th>
                                            <th>Youtube &amp; Google Video</th>
                                            <th>Market Split</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
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
                                            <th>Options</th>
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
			var table = $('#budget_proposal_table').DataTable({
                "paging": false,
                "searching": false,
                //This will disable the inputs of the previous row upon new row creation
                "createdRow": function ( row, data, index ){
                    $('td', (row - 1)).find("input").attr("disabled", "disabled");
                    $('td', (row-1)).find($(".edit-btn")).attr("disabled", false);
                },
                "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<a class=\"btn btn-warning\">Edit</a>"
                }]
            });
            $('#budget_proposal_table tbody').on( 'click', 'a', function () {
                var data = table.row( $(this).parents('tr') ).data();
                alert(data[0]);
            });

			$('#addRow').on( 'click', function () {

                if (counter > 0 ){
                    $('#submit').click();
                }
                table.row.add( [
                    //for the ID
                    '<span id="budget_proposal_' + (counter + 1) + '_id"></span>',
                    '<input type="text" name="market" placeholder="Enter the Region">',
                    '<input type="text" name="broadcast_radio" placeholder="Amount">',
                    '<input type="text" name="broadcast_cable_tv" placeholder="Amount">',
                    '<input type="text" name="digital_tv_hulu" placeholder="Amount">',
                    '<input type="text" name="digital_radio_pandora" placeholder="Amount">',
                    '<input type="text" name="digital_radio_spotify" placeholder="Amount">',
                    '<input type="text" name="digital_radio_iheart" placeholder="Amount">',
                    '<input type="text" name="digital_geofencing" placeholder="Amount">',
                    '<input type="text" name="digital_google_text_and_display" placeholder="Amount">',
                    '<input type="text" name="digital_youtube_and_google_video" placeholder="Amount">',
                    '<input type="text" name="market_split" placeholder="Amount">',
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
                        $('#budget_proposal_' + (counter - 1)  + '_id').html(data.id);
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
