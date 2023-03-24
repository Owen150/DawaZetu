@extends('layouts.app')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Products Table</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Products Table</h6>
        <a href="{{ route('products.create') }}"><button class="btn btn-primary mb-3">Add Product</button></a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table table-hover text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Manufacturers</th>
                <th>Strength</th>
                <th>Unit of Measure</th>
                <th>Package Size</th>
                <th>Package Quantity</th>
                <th>Items in Box</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $number = 1; ?>
                                    
                @foreach ($products as $product)
                <tr>
                    <td>{{ $number }}</td>
                    <?php $number++; ?>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->manufacturers }}</td>
                    <td>{{ $product->strength }}</td>
                    <td>{{ $product->unit_of_measure }}</td>
                    <td>{{ $product->package_size }}</td>
                    <td>{{ $product->package_quantity }}</td>
                    <td>{{ $product->no_of_items_in_box }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>
                      <a href="{{ route('products.edit', $product->id) }}"><button class="btn btn-primary">Edit</button></a>
                        <form id='frm'
                         action="{{ route('products.destroy',$product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <span id="product-delete"><button class="btn btn-danger">Delete</button></span>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script defer>
    
    var del = document.getElementById('product-delete');
    var frm = document.getElementById('frm');
    del.addEventListener("click",function (e) {
        frm.submit();
    })
    
  </script>
@endpush