<form method="POST" action="/proposal_requests/{{ $pr->id }}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="form-group col-md-3">
            <label for="clientName">Client Name</label>
            <input type="text" name="clientName" id="clientName" class="form-control"
                   value="{{ $pr->clientName }}">
        </div>
        <div class="form-group col-md-3">
            <label for="clientIndustry">Client Industry</label>
            <input type="text" name="clientIndustry" id="clientIndustry" class="form-control"
                   value="{{ $pr->clientIndustry }}">
        </div>
        <div class="form-group col-md-3">
            <label for="campaignName">Campaign Name</label>
            <input type="text" name="campaignName" id="campaignName" class="form-control"
                   value="{{ $pr->campaignName }}">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-md-9">
            <label for="basicDescription">Basic Description</label>
            <textarea type="text" name="basicDescription" id="basicDescription"
                      class="form-control"
                      rows="5">{{$pr->basicDescription}}
                        </textarea>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-md-3">
            <label for="flightDateStart">Flight Date Start</label>
            <input class="form-control" type="date"
                   value="{{ date_format(new DateTime($pr->flightDateStart), 'Y-m-d') }}" name="flightDateStart" id="flightDateStart">
        </div>
        <div class="form-group col-md-3">
            <label for="flightDateEnd">Flight Date End</label>
            <input class="form-control" type="date"
                   value="{{ date_format(new DateTime($pr->flightDateEnd), 'Y-m-d') }}" name="flightDateEnd" id="flightDateEnd">
        </div>
        <div class="form-group col-md-3">
            <label for="staggered">Staggered?</label>
            <select name="staggered" id="staggered" class="form-control">
                @if ($pr->staggered == 'Yes')
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                @else
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                @endif
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            <label for="budget">Budget</label>
            <input type="text" name="budget" id="budget" class="form-control" value="{{ $pr->budget }}">
        </div>
    </div>
    <hr>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Edit Request &gt;</button>
    </div>
</form>
