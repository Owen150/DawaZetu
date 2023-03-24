@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
  </ol>
</nav>

  <div class="col-md-8">
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

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary me-2">Add Category</button>
        </div>

@endsection
