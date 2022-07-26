<?php

namespace App\Http\Controllers;

use App\Models\RezervacijaStatus;
use App\Http\Requests\StoreRezervacijaStatusRequest;
use App\Http\Requests\UpdateRezervacijaStatusRequest;

class RezervacijaStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRezervacijaStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRezervacijaStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RezervacijaStatus  $rezervacijaStatus
     * @return \Illuminate\Http\Response
     */
    public function show(RezervacijaStatus $rezervacijaStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RezervacijaStatus  $rezervacijaStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(RezervacijaStatus $rezervacijaStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRezervacijaStatusRequest  $request
     * @param  \App\Models\RezervacijaStatus  $rezervacijaStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRezervacijaStatusRequest $request, RezervacijaStatus $rezervacijaStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RezervacijaStatus  $rezervacijaStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(RezervacijaStatus $rezervacijaStatus)
    {
        //
    }
}
