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
                    @include('proposal_requests.basicform')
                </form>
            </div>
        </div>
    </div>
@stop
@section('scripts.footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
	<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    increaseArea: '20%' // optional
  });
});
</script>
<script>
$(document).ready(function(){
    $('.bool-select').on('change', function(e){
        var textbox = $(this).data('toggle');
       if($(textbox).prop('disabled'))
           return $(textbox).prop('disabled', false);
       $(textbox).prop('disabled', true);
    });
});
</script>
@stop
