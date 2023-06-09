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
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
  </ol>

  <div class="cancel">
    <div></div>
    <a href="{{route('categories.index')}}"><button class="btn btn-danger mb-1 mb-md-0">Cancel</button></a>
  </div>
</nav>

  <div class="col-md-12">
    <div class="card ">
      <div class="card-body">

        <h6 class="card-title">Add Category</h6>

        <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" class="form-control mt-2" placeholder="Enter Category Name" required>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-success me-2">Add Category</button>
        </div>

@endsection
