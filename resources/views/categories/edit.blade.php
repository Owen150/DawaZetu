@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
  </ol>
</nav>

  <div class="col-md-12">
    <div class="card ">
      <div class="card-body">

        <h6 class="card-title">Edit Category</h6>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

          <div class="row mb-3">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control mt-2" id="categoryName" placeholder="">
                  </div>
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-success me-2">Edit Category</button>
          </div>
    
        </form>

      </div>
    </div>
  </div>


@endsection
