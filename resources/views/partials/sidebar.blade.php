<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-stacked">
        <li class="active"><a href="/home">Overview <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Analytics</a></li>
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="/clients/all" role="button" aria-haspopup="true"
               aria-expanded="false">
                Clients <span class="caret pull-right"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/clients/all">View All</a></li>
                <?php $clients=App\Client::all();?>
                @foreach ($clients as $client)
                    <?php $link=strtolower(str_replace(' ', '_', $client->name))?>
                    <li><a href="/client_list/{{ $link }}">{{ $client->name }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
