@extends('layouts.app')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <style>
    table {
        border-top-color: rgb(203 213 225);
        border-top-width: 2px;
        border-top-style: solid;
    }
    </style>
@endpush

@section('content')
<nav class="page-breadcrumb rights-nav">
    <div class="row">
        <div class="col-sm-9">
            <div class="flex-initial">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">County Top Up Requests</a></li>
                </ol>
            </div>
        </div>
    </div>  
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">County Top Up Requests</h6>
                {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> </p> --}}
                <div class="table-responsive m-3">

                    <table id="dataTableExample" class="table table-striped table-bordered">
                        <thead style="">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Facility</th>
                                <th>Ward</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="rights-tbody">
                            <?php $number = 1; ?>
                            @foreach ($facility_products as $facilityProduct)
                                <tr>
                                    <td>{{ $number }}</td>
                                    <?php $number++; ?>
                                    <td>
                                        @php 
                                            $productName = App\Models\Product::where('id', '=', $facilityProduct->product_id)->first()->product_name;
                                        @endphp
                                        {{$productName}}
                                    </td>
                                    <td>
                                        @if ($facilityProduct->quantity > $facilityProduct->reorder_level)
                                            <p class="text-success">{{$facilityProduct->quantity}}</p>
                                        @else
                                            <p class="text-danger">{{$facilityProduct->quantity}}</p>
                                        @endif
                                    </td>
                                    <td>
                                    @php 
                                        $facilityName = App\Models\Facility::where('id', '=', $facilityProduct->facility_id)->first()->name;
                                    @endphp
                                    {{$facilityName}}
                                    </td>
                                    <td>
                                        @php 
                                            $wardName = App\Models\Facility::where('id', '=', $facilityProduct->facility_id)->first()->ward;
                                        @endphp
                                        {{$wardName}}
                                    </td>
                                    <td>
                                        @php 
                                            $locationName = App\Models\Facility::where('id', '=', $facilityProduct->facility_id)->first()->location;
                                        @endphp
                                        {{$locationName}}
                                    </td>
                                    <td>
                                        <p class="text-warning" id="show-details" data-bs-toggle="modal" data-bs-target="#facilityProduct_{{$facilityProduct->id}}">Process</a>
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

<!-- Modal -->
@foreach ($facility_products as $facilityProduct)
<div class="modal fade" id="facilityProduct_{{$facilityProduct->id}}" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLongTitle">{{ App\Models\Facility::where('id', '=', $facilityProduct->facility_id)->first()->name; }} Facility Products Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <p class="mb-1"><span class="text-muted">Facility Name: </span> {{ App\Models\Facility::where('id', '=', $facilityProduct->facility_id)->first()->name; }}</p>
          <p class="mb-1"><span class="text-muted">Facility Pha: </span> {{ App\Models\Facility::where('id', '=', $facilityProduct->facility_id)->first()->name;}}</p>
          <p class="mb-1"><span class="text-muted">Contact: </span> {{ App\Models\Facility::where('id', '=', $facilityProduct->facility_id)->first()->name;}}</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        $(document).ready(function () {
            $('#dataTableExample').DataTable();
        });

    </script>
@endpush