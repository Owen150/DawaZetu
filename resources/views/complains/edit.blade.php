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
    <li class="breadcrumb-item active" aria-current="page">Edit Complain</li>
  </ol>

  <div class="cancel">
    <div></div>
    <a href="{{route('complains.index')}}"><button class="btn btn-danger mb-1 mb-md-0">Cancel</button></a>
  </div>
</nav>

  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <h3 class="card-title">Edit Complain</h3>

        <form action="{{ route('complains.update', $complains->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">User Name</label>
                    <select class="form-select" name="user_id" id="users">
                        @foreach ($users as $users)
                        <option @if ($users->id == $complains->user_id)
                            selected
                        @endif value="{{ $users->id }}">{{ $users->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Facility</label>
                    <select class="form-select" name="facility_id" id="facilities">
                        @foreach ($facilities as $facility)
                        <option @if ($facility->id == $complains->facility_id)
                            selected
                        @endif value="{{ $facility->id }}">{{ $facility->facility_name }}</option>
                        @endforeach
                    </select>            
                </div>

                <div class="col-md-6">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                    <input type="text" name="status" value="{{ $complains->status }}" class="form-control" id="status" placeholder="">
                </div>

                <div class="col-md-6">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Type</label>
                    <input type="text" name="type" value="{{ $complains->type }}" class="form-control" id="type" placeholder="">
                </div>

                <div class="col-md-6">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Note</label>
                    <input type="text" name="note" value="{{ $complains->note }}" class="form-control" id="note" placeholder="">
                </div>

            </div>

          <div><button type="submit" class="btn btn-success mt-2">Update Complain</button></div>
        </form>

      </div>
    </div>
  </div>


@endsection
