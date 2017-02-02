<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Client ID</th>
            <th>Client name</th>
            <th>Client Industry</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->industry }}</td>
                <td>
                    <a class="glyphicon glyphicon-eye-open btn btn-info"
                       href="/client_list/{{  $client->name }}">
                    </a>
                </td>
                <td>
                    <a class="btn btn-info glyphicon glyphicon-edit" href="/client_list/{{ $client->id }}/edit">
                    </a>
                </td>
                <td>
                    <form class="delete_form" method="POST" action="/client_list/{{ $client->id }}">
                        {{ method_field('DELETE') }}
                        {{csrf_field()}}
                        <div class="form-group">
                            <button class="btn btn-danger glyphicon glyphicon-trash delete-btn"></button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
