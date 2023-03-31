<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Facility;
use App\Models\User;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complain = Complain::all();
        return view('complains.index', compact('complain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $facilities = Facility::all();
        return view('complains.create')->with([
            'users' => $users,
            'facilities' => $facilities,
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
            'facility_id' => 'required',
            'status' => 'required',
            'type' => 'required',
            'note' => 'required',
        ]);

        Complain::create($request->all());
        return redirect()->route('complains.index')
            ->with('Success', 'Note Proforma created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function show($complain)
    {
        return view('complains.show', compact('complain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function edit($complain)
    {
        $users = User::all();
        $facilities = Facility::all();
        $complain = Complain::find($complain);
        return view('complains.edit')->with([
            'users' => $users,
            'facilities' => $facilities,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $complain)
    {
        $request->validate([]);
        $complain = Complain::find($complain);
        $complain->update($request->all());

        return redirect()->route('complains.index')
            ->with('Success', 'Complain updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function destroy($complain)
    {
        $complain = Complain::find($complain);
        $complain->delete();
        return redirect()->route('complains.index')
            ->with('Success', 'Complain deleted successfully');
    }
}
