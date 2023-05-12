<?php

namespace App\Http\Controllers;

use App\Models\CountyTopUpRequest;
use App\Models\FacilityProduct;
use Illuminate\Http\Request;

class CountyTopUpRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$facility_products = FacilityProduct::find(1);
        $facility_products = FacilityProduct::all();
        return view('county-top-up-requests.index', compact('facility_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountyTopUpRequest  $countyTopUpRequest
     * @return \Illuminate\Http\Response
     */
    public function show(CountyTopUpRequest $countyTopUpRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CountyTopUpRequest  $countyTopUpRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CountyTopUpRequest $countyTopUpRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CountyTopUpRequest  $countyTopUpRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountyTopUpRequest $countyTopUpRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountyTopUpRequest  $countyTopUpRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountyTopUpRequest $countyTopUpRequest)
    {
        //
    }
}
