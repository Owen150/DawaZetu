<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FinancialYear;
use App\Models\InvoiceProforma;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoiceProforma = InvoiceProforma::all();
        return view('profoma_invoice.index', compact('invoiceProforma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities = Facility::all();
        $financialYears = FinancialYear::all();
        $users = User::all();
        return view('profoma_invoice.create')->with([
            'facilities' => $facilities,
            'financialYears' => $financialYears,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'financial_year_id' => 'required',
            'facilities_id' => 'required',
            'total' => 'required',
            'status' => 'required',
            'lpo' => 'required',
            'approved_for_supply' => 'required',
        ]);

        InvoiceProforma::create($request->all());

        return redirect()->route('profoma_invoice.index')
            ->with('Success', 'Invoice created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceProforma  $invoiceProforma
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceProforma $invoiceProforma)
    {
        return view('profoma_invoice.show', compact('invoiceProforma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceProforma  $invoiceProforma
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceProforma $invoiceProforma)
    {
        return view('profoma_invoice.edit', compact('invoiceProforma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceProforma  $invoiceProforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceProforma $invoiceProforma)
    {
        $request->validate([]);
        $invoiceProforma->update($request->all());

        return redirect()->route('profoma_invoice.index')
            ->with('Success', 'Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceProforma  $invoiceProforma
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceProforma $invoiceProforma)
    {
        $invoiceProforma->delete();
        return redirect()->route('profoma_invoice.index')
            ->with('Success', 'Invoice deleted successfully');
    }
}
