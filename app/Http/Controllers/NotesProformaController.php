<?php

namespace App\Http\Controllers;

use App\Models\NotesProfoma;
use App\Models\User;
use App\Models\InvoiceProforma;
use Illuminate\Http\Request;

class NotesProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notesProfoma = NotesProfoma::orderBy('created_at', 'desc')->get();
        return view('notes.index', compact('notesProfoma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $invoiceProforma = InvoiceProforma::all();
        return view('notes.create')->with([
            'users' => $users,
            'invoiceProforma' => $invoiceProforma,
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
            'user_id' => 'required',
            'invoice_proforma_id' => 'required',
            'notes' => 'required',
        ]);

        NotesProfoma::create($request->all());

        return redirect()->route('notes.index')
            ->with('Success', 'Note Proforma created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotesProfoma  $notesProfoma
     * @return \Illuminate\Http\Response
     */
    public function show(NotesProfoma $notesProfoma)
    {
        return view('notes.show', compact('notesProfoma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotesProfoma  $notesProfoma
     * @return \Illuminate\Http\Response
     */
    public function edit($notesProfoma)
    {
        $users = User::all();
        $invoiceProforma = InvoiceProforma::all();
        $notesProfoma = NotesProfoma::find($notesProfoma);
        return view('notes.edit')->with([
            'users' => $users,
            'invoiceProforma' => $invoiceProforma,
            'notesProfoma' => $notesProfoma,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotesProfoma  $notesProfoma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $notesProfoma)
    {
        $request->validate([]);
        $notesProfoma = NotesProfoma::find($notesProfoma);
        $notesProfoma->update($request->all());

        return redirect()->route('notes.index')
            ->with('Success', 'Note Proforma updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotesProfoma  $notesProfoma
     * @return \Illuminate\Http\Response
     */
    public function destroy($notesProfoma)
    {
        $notesProfoma = NotesProfoma::find($notesProfoma);
        $notesProfoma->delete();
        return redirect()->route('notes.index')
        ->with('Success', 'Invoice deleted successfully');
    }
}
