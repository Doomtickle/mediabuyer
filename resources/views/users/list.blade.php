@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <h1>Users</h1>
                <hr>
                <a href="/user/create" class="btn btn-lg btn-primary">Add a new user</a>
                <hr>
                <div class="list-group big-box">
                    <div class="list-group-item active">
                        <h4>All Users</h4>
                    </div>
                    <div class="form-group list-group-item">
                        <input type="text" name="quicksearch" class="quicksearch form-control"
                               data-filter=".quicksearch" placeholder="Search" autofocus/>
                    </div>
                    <div class="grid">
                        @foreach($users as $user)
                            <a href="/user/{{ $user->id }}"
                               class="list-group-item grid-item">
                                {{ $user->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts.footer')
@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.2/isotope.pkgd.min.js"></script>
    <script>
        var qsRegex;

        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            filter: function () {
                var $this = $(this);
                var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                return searchResult;
            }
        });

        // use value of search field to filter
        var $quicksearch = $('.quicksearch').keyup(debounce(function () {
            qsRegex = new RegExp($quicksearch.val(), 'gi');
            $grid.isotope();
        }));


        // debounce so filtering doesn't happen every millisecond
        function debounce(fn, threshold) {
            var timeout;
            return function debounced() {
                if (timeout) {
                    clearTimeout(timeout);
                }
                function delayed() {
                    fn();
                    timeout = null;
                }

                setTimeout(delayed, threshold || 100);
            };
        }


    </script>
@endsection
