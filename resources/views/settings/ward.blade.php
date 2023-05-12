<form action="{{ route('store_ward') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="exampleInputUsername2">Ward Name</label>
            <input type="text" name="ward_name" class="form-control" placeholder="Enter Ward Name" required>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputUsername2">Location ID</label>
                <select class="form-select" name="location_id" id="locations">
                    @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->id }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputUsername2">Subcounty ID</label>
                <select class="form-select" name="subcounty_id" id="subcounties">
                    @foreach ($subcounties as $subcounty)
                    <option value="{{ $subcounty->id }}">{{ $subcounty->id }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputUsername2">County ID</label>
                <select class="form-select" name="county_id" id="counties">
                    @foreach ($counties as $county)
                    <option value="{{ $county->id }}">{{ $county->id }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        

    </div>
<div>
    <button type="submit" class="btn btn-success mt-3">Add Ward</button>
</div>
</form>