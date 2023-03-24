@extends('layouts.app')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
  </ol>
</nav>

  <div class="col-md-8">
    <div class="card ">
      <div class="card-body">

        <h6 class="card-title">Create Product</h6>

        <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="row mb-3">   
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" id="categories">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
        </div>

          <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" class="form-control" placeholder="product name" required>
                </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Manufacturers</label>
                    <input type="text" name="manufacturers" class="form-control" placeholder="manufacturers" required>
                </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Strength</label>
                    <input type="number" name="strength" class="form-control" placeholder="strength" required>
                </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Unit of Measure</label>
                    <input type="text" name="unit_of_measure" class="form-control" placeholder="unit of measure" required>
                </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Package Size</label>
                    <input type="text" name="package_size" class="form-control" placeholder="package size" required>
                </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Package Quantity</label>
                    <input type="number" name="package_quantity" class="form-control" placeholder="package quantity" required>
                </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Number of Items in Box</label>
                    <input type="number" name="no_of_items_in_box" class="form-control" placeholder="Items in box" required>
                </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary mb-2">Add Product</button>
          </div>
        </form>

      </div>
    </div>
  </div>


@endsection
