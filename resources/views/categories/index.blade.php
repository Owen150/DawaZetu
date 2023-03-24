@extends('layouts.app')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categories Table</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Categories Table</h6>
        <div class="text-right">
          <a href="{{ route('categories.create') }}"><button class="btn btn-primary mb-3">Add Category</button></a>
        </div>
        <div class="table-responsive ">
          <table id="dataTableExample" class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php $number = 1; ?>

            @foreach ($categories as $category)
            <tr>
                <td>{{ $number }}</td>
                <?php $number++; ?>
                <td>{{ $category->category_name }}</td>
                <div class="row">
                  <td>
                    <a href="{{ route('categories.edit', $category->id) }}"><button class="btn btn-primary">Edit</button></a><br>
                    <form id='cat'
                     action="{{ route('categories.destroy',$category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <span id="category-delete"><button class="btn btn-danger">Delete</button></span>
                    </form>
                  </td>
                </div>
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
    
    var del = document.getElementById('category-delete');
    var cat = document.getElementById('cat');
    del.addEventListener("click",function (e) {
        cat.submit();
    })
    
  </script>
@endpush