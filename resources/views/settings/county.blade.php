<form action="{{ route('store_county') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
        <label for="exampleInputUsername2" class="mb-2">County Name</label>
        <input type="text" name="county_name" class="form-control" placeholder="Enter County Name" required>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-success mt-3">Add County</button>
    </div>
</form>