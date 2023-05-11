<form action="{{ route('store_subcounty') }}" method="POST">
    @csrf
    <div class="row">
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
        <div class="col-md-6 mb-3">
            <label for="exampleInputUsername2">Constituency Name</label>
            <input type="text" name="constituency_name" class="form-control" placeholder="Enter Constituency Name" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="exampleInputUsername2">Ward</label>
            <input type="text" name="ward" class="form-control" placeholder="Enter Ward Name" required>
        </div>
    </div>
<div>
    <button type="submit" class="btn btn-success mt-3">Add Sub-county</button>
</div>
</form>