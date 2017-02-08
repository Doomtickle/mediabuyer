@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon bg-default"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Users</span>
                                <span class="info-box-number">
                                        {{ App\User::count() }}
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon bg-default"><i class="fa fa-briefcase"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Clients</span>
                                <span class="info-box-number">
                                        {{ App\Client::count() }}
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon bg-info"><i class="fa fa-table"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Media Plans</span>
                                <span class="info-box-number">
                            {{ App\MediaPlan::count() }}
                        </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon bg-warning"><i class="fa fa-bullhorn"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">RFPs</span>
                                <span class="info-box-number">
                            {{ App\ProposalRequest::count() }}
                        </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon bg-danger"><i class="fa fa-comment-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Proposals</span>
                                <span class="info-box-number">
                                    {{ App\Proposal::count() }}
                                </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon bg-success"><i class="fa fa-money"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Budget</span>
                                <span class="info-box-number">
                                    @php
                                        $totalBudget = 0;
                                        foreach(App\ProposalRequest::all() as $rfp){
                                            $totalBudget += $rfp->grossBudget;
                                        }
                                    @endphp
                                    ${{ number_format($totalBudget, 2, '.', ',') }}
                                </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="list-group" style="max-height:500px; overflow: scroll;">
                            <a href="#" class="list-group-item active">
                                Clients
                            </a>
                            <div class="form-group list-group-item">
                                <input type="text" name="quicksearch2" class="quicksearch2 form-control"
                                       data-filter=".quicksearch2" placeholder="Search Clients" autofocus/>
                            </div>
                            <div class="grid2">
                                @foreach(App\Client::all() as $client)
                                    <a href="clients/{{ $client->name }}"
                                       class="list-group-item grid-item2">
                                        {{ $client->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="list-group" style="max-height:500px; overflow: scroll;">
                            <a href="#" class="list-group-item active">
                                Media Plans
                            </a>
                            <div class="form-group list-group-item">
                                <input type="text" name="quicksearch" class="quicksearch form-control"
                                       data-filter=".quicksearch" placeholder="Search by media plan or company"
                                       autofocus/>
                            </div>
                            <div class="grid">
                                @foreach(App\MediaPlan::with('client')->get() as $mediaPlan)
                                    <a href="media_plan/{{ $mediaPlan->id }}"
                                       class="list-group-item grid-item">
                                        {{ $mediaPlan->title }}<span
                                                style="display: none;">{{ $mediaPlan->client->name }}</span>
                                        <span class="pull-right">
                                    <strong>Start Flight Date:</strong> {{ date('M j, Y', strtotime($mediaPlan->flight_date_start)) }}
                                </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
    <script>

        var qsRegex2;

        var $grid2 = $('.grid2').isotope({
            itemSelector: '.grid-item2',
            filter: function () {
                var $this = $(this);
                var searchResult2 = qsRegex2 ? $this.text().match(qsRegex2) : true;
                return searchResult2;
            }
        });

        // use value of search field to filter
        var $quicksearch2 = $('.quicksearch2').keyup(debounce(function () {
            qsRegex2 = new RegExp($quicksearch2.val(), 'gi');
            $grid2.isotope();
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
