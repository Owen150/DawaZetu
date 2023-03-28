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
  <ol class="breadcrumb" style="flex-none">
    <li class="breadcrumb-item"><a href="{{ route('profomas.index') }}">Proforma Invoices</a></li>
    <li class="breadcrumb-item active" aria-current="page">Proforma Invoices Table</li>
  </ol>

  <div class="cancel">
    <div></div>
    <a href="{{route('profomas.create')}}"><button class="btn btn-success mb-1 mb-md-0">Generate Invoice</button></a>
  </div>
</nav>

<div class="row">

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Proforma Invoices Table</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table table-bordered table-hover mt-3">
            <thead>
              <tr>
                <th>#</th>
                <th>Financial Year</th>
                <th>Facility</th>
                <th>Total</th>
                <th>Status</th>
                <th>LPO</th>
                <th>Approved for Supply</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $number = 1; ?>
                                    
                @foreach ($invoiceProforma as $invoiceProforma)
                <tr>
                    <td>{{ $number }}</td>
                    <?php $number++; ?>
                    <td>{{ App\Models\FinancialYear::where('id','=', $invoiceProforma->financial_year_id)->first()->financial_year_name }}</td>
                    <td>{{ App\Models\Facility::where('id','=', $invoiceProforma->facility_id)->first()->facility_name }}</td>
                    <td>{{ $invoiceProforma->total }}</td>
                    <td>{{ $invoiceProforma->status }}</td>
                    <td>{{ $invoiceProforma->lpo }}</td>
                    <td>{{ $invoiceProforma->approved_for_supply }}</td>
                    <td style="display: flex; gap: 10px">
                        <a href="{{ route('profomas.edit', $invoiceProforma->id) }}"><span class="text-success">Edit</span></a>
                        <form id='frm'
                         action="{{ route('profomas.destroy', $invoiceProforma->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <span id="profoma-delete" class="text-danger">Delete</span>
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
    
    var del = document.getElementById('profoma-delete');
    var frm = document.getElementById('frm');
    del.addEventListener("click",function (e) {
        frm.submit();
    })
    
  </script>
@endpush