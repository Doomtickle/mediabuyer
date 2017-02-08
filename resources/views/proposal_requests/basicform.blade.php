{{ csrf_field() }}
<div class="row">
    <div class="form-group col-md-4">
        <input type="hidden" name="client_id" value="{{ $mediaPlan->client->id }}">
        <input type="hidden" name="media_plan_id" value="{{ $mediaPlan->id }}">
        <label for="clientName">Client</label>
        <select name="clientName" id="clientName" class="form-control">
            <?php $clients = App\Client::all() ?>
            <option value="{{ $mediaPlan->client->name }}">{{ $mediaPlan->client->name }}</option>
            @foreach($clients as $client)
                <option value="{{ $client->name }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <label for="clientIndustry">Client Industry</label>
        <input type="text" name="clientIndustry" id="clientIndustry" class="form-control"
               value="{{ $mediaPlan->client->clientIndustry }}">
    </div>
    <div class="form-group col-md-3">
        <label for="campaignName">Campaign</label>
        <input type="text" name="campaignName" id="campaignName" class="form-control"
               value="{{ $mediaPlan->title }}">
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group col-md-10">
        <label for="basicDescription">Basic Description</label>
        <textarea type="text" name="basicDescription" id="basicDescription"
                  class="form-control" value="{{ old('basicDescription') }}"
                  rows="5">
        </textarea>
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group col-md-10">
        <label for="goalsAndObjectives">Goals and Objectives</label>
        <textarea type="text" name="goalsAndObjectives" id="goalsAndObjectives"
                  class="form-control" value="{{ old('goalsAndObjectives') }}"
                  rows="5">
        </textarea>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="flightDateStart">Flight Date Start</label>
        <input class="form-control" type="date"
               value="{{ $mediaPlan->flight_date_start }}" name="flightDateStart" id="flightDateStart">
    </div>
    <div class="form-group col-md-3">
        <label for="flightDateEnd">Flight Date End</label>
        <input class="form-control" type="date"
               value="{{ $mediaPlan->flight_date_end }}" name="flightDateEnd" id="flightDateEnd">
    </div>
    <div class="form-group col-md-3">
        <label for="staggered">Staggered?</label>
        <select name="staggered" id="staggered" class="form-control">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
        </select>
    </div>
</div>
<hr />
<div class="row">
    <div class="form-group col-md-3">
        <label for="grossBudget">Gross Budget</label>
        <input type="text" name="grossBudget" id="grossBudget" class="form-control" value="{{ old('grossBudget') }}">
    </div>
    <div class="form-group col-md-offset-3 col-md-3">
        <label for="netBudget">Net Budget</label>
        <input type="text" name="netBudget" id="netBudget" class="form-control" value="{{ old('netBudget') }}">
    </div>
</div>
<hr/>
<h2>Targeting</h2>
<div class="row">
    <div class="checkbox targeting-boxes">
        <label class="checkbox-inline">
            <input type="checkbox" name="targetingText" value=1>Text
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="targetingDisplay" value=1>Display
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="targetingVideo" value=1>Video
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="targetingGeoFencing" value=1>Geo-Fencing
        </label>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-2">
        <label for="geography">Geography</label>
        <select class="form-control bool-select" id="geography" name="geography" data-toggle="#describeGeography">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="describeGeography">Details</label>
            <input type="text" name="describeGeography" class="form-control" id="describeGeography" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <label for="targetingAgeGroup">Age Group</label>
        <select class="form-control bool-select" id="targetingAgeGroup" name="targetingAgeGroup" data-toggle="#describeAgeGroup">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="describeAgeGroup">Details</label>
            <input type="text" name="describeAgeGroup" class="form-control" id="describeAgeGroup" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <label for="targetingHouseholdIncome">Household Income</label>
        <select class="form-control bool-select" id="targetingHouseholdIncome" name="targetingHouseholdIncome" data-toggle="#describeHouseholdIncome">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="describeHouseholdIncome">Details</label>
            <input type="text" name="describeHouseholdIncome" class="form-control" id="describeHouseholdIncome" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <label for="targetingGender">Gender</label>
        <select class="form-control bool-select" id="targetingGender" name="targetingGender" data-toggle="#describeGender">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="describeGender">Details</label>
            <input type="text" name="describeGender" class="form-control" id="describeGender" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <label for="targetingInterests">Interests</label>
        <select class="form-control bool-select" id="targetingInterests" name="targetingInterests" data-toggle="#describeInterests">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="describeInterests">Details</label>
            <input type="text" name="describeInterests" class="form-control" id="describeInterests" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <label for="targetingDevices">Devices</label>
        <select class="form-control bool-select" id="targetingDevices" name="targetingDevices" data-toggle="#describeDevices">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="describeDevices">Details</label>
            <input type="text" name="describeDevices" class="form-control" id="describeDevices" disabled>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-2">
        <label for="frequencyCapping">Frequency Capping</label>
        <select class="form-control bool-select" id="frequencyCapping" name="frequencyCapping" data-toggle="#describeFrequencyCapping">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="describeFrequencyCapping">Details</label>
            <input type="text" name="describeFrequencyCapping" class="form-control" id="describeFrequencyCapping" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <label for="dayParting">Day Parting</label>
        <select class="form-control bool-select" id="dayParting" name="dayParting" data-toggle="describeDayParting">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="describeDayParting">Details</label>
            <input type="text" name="describeDayParting" class="form-control" id="describeDayParting" disabled>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="form-group col-md-10">
        <label for="specifications">Specifications</label>
        <textarea class="form-control" name="specifications" id="specifications" rows="5"></textarea>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-10">
        <label for="orderTerms">Insertion order terms</label>
        <textarea class="form-control" name="orderTerms" id="orderTerms" rows="5"></textarea>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-10">
        <label for="submissionInstructions">Submission Instructions</label>
        <textarea class="form-control" name="submissionInstructions" id="submissionInstructions" rows="5"></textarea>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-10">
        <label for="proposalFormat">Acceptable proposal formats</label>
        <textarea class="form-control" name="proposalFormat" id="proposalFormat" rows="5"></textarea>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="proposalDueDate">Proposal Due Date</label>
        <input class="form-control" type="date"
                                    value="{{ Carbon\Carbon::now()->addDays(10)->toDateString() }}" name="proposalDueDate" id="proposalDueDate">
    </div>
    <div class="form-group col-md-offset-3 col-md-3">
        <label for="decisionMadeBy">Decision will be made by</label>
        <input class="form-control" type="date"
                                    value="{{ Carbon\Carbon::now()->addDays(12)->toDateString() }}" name="decisionMadeBy" id="decisionMadeBy">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-10">
        <label for="selectionCriteria">Selection Criteria</label>
        <textarea class="form-control" name="selectionCriteria" id="selectionCriteria" rows="5"></textarea>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save progress and add Media Units</button>
</div>
