@extends('layouts.app')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <style>
    table {
        border-top-color: rgb(203 213 225);
        border-top-width: 2px;
        border-top-style: solid;

    }
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
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categories Table</li>
  </ol>

  <div class="cancel">
    <div></div>
    <a href="{{route('categories.create')}}"><button class="btn btn-success mb-1 mb-md-0">Add Category</button></a>
  </div>
</nav>

<div class="mb-4"> 
  <input type="text" id="search-criteria"/>
  <input type="button" id="search" value="search" onClick="tes();"/> 
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Categories Table</h6>
        <div class="table-responsive ">

          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <table class="table table-bordered table-hover mt-3" id="dataTableExample">
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
                <td style="display: flex; gap: 10px">
                    <a href="{{ route('categories.edit', $category->id) }}"><span class="text-success">Edit</span></a><br>
                    <form id='cat'
                     action="{{ route('categories.destroy',$category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <span id="category-delete" class="text-danger">Delete</span>
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
    
    var del = document.getElementById('category-delete');
    var cat = document.getElementById('cat');
    del.addEventListener("click",function (e) {
        cat.submit();
    })
    
  </script>
@endpush