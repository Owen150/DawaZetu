@extends('layouts.app')

@push('plugin-styles')
<style>
  .mynav{
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .cancel{
    display: flex;
    flex-direction: row-reverse;
  }
</style>
@endpush
@section('content')
<nav class="mynav page-breadcrumb">
  <ol class="breadcrumb" style="flex-none">
    <li class="breadcrumb-item"><a href="{{ route('complains.index') }}">Complains</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Complain</li>
  </ol>

  <div class="cancel">
    <div></div>
    <a href="{{route('complains.index')}}"><button class="btn btn-danger mb-1 mb-md-0">Cancel</button></a>
  </div>
</nav>

  <div class="col-md-12">
    <div class="card ">
      <div class="card-body">

        <h6 class="card-title">Add Complain</h6>

        <form action="{{ route('complains.store') }}" method="POST">
        @csrf

        <div class="row">

          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="exampleInputUsername2">User Name</label>
              <select class="form-select" name="user_id" id="users">
                  @foreach ($users as $users)
                  <option value="{{ $users->id }}">{{ $users->name }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputUsername2">Facility Name</label>
              <select class="form-select" name="facility_id" id="facilities">
                  @foreach ($facilities as $facility)
                  <option value="{{ $facility->id }}">{{ $facility->facility_name }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="exampleInputUsername2">Status</label>
            <input type="text" name="status" class="form-control" placeholder="Status" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="exampleInputUsername2">Type</label>
            <input type="text" name="type" class="form-control" placeholder="Type" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="exampleInputUsername2">Note</label>
            <input type="text" name="note" class="form-control" placeholder="Note" required>
          </div>

        </div>

        <div>
          <button type="submit" class="btn btn-success mt-3">Add Invoice</button>
        </div>
        </form>

      </div>
    </div>
  </div>

@endsection
