<form action="{{ route('store_subcounty') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="exampleInputUsername2">Subcounty Name</label>
            <input type="text" name="subcounty_name" class="form-control" placeholder="Enter Subcounty Name" required>
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
    <button type="submit" class="btn btn-success mt-3">Add Subcounty</button>
</div>
</form>