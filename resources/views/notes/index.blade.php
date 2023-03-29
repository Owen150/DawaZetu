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
    <li class="breadcrumb-item"><a href="{{ route('notes.index') }}">Notes Proforma Invoices</a></li>
    <li class="breadcrumb-item active" aria-current="page">Notes Proforma Invoices Table</li>
  </ol>

  <div class="cancel">
    <div></div>
    <a href="{{route('notes.create')}}"><button class="btn btn-success mb-1 mb-md-0">Generate Invoice</button></a>
  </div>
</nav>

<div class="row">

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Notes Proforma Invoices Table</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table table-bordered table-hover mt-3">
            <thead>
              <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Invoice Proforma</th>
                <th>Note</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $number = 1; ?>
                                    
                @foreach ($notesProfoma as $notesProfoma)
                <tr>
                    <td>{{ $number }}</td>
                    <?php $number++; ?>
                    <td>{{ App\Models\User::where('id','=', $notesProfoma->user_id)->first()->name }}</td>
                    <td>{{ App\Models\InvoiceProforma::where('id','=', $notesProfoma->invoice_proforma_id) }}</td>
                    <td>{{ $notesProfoma->note }}</td>
                    <td style="display: flex; gap: 10px">
                        <a href="{{ route('notes.edit', $notesProfoma->id) }}"><span class="text-success">Edit</span></a>
                        <form id='frm'
                         action="{{ route('notes.destroy', $notesProfoma->id) }}" method="post">
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