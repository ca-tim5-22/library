<?php

namespace App\Http\Controllers;

use App\Models\Rezervacija;
use App\Http\Requests\StoreRezervacijaRequest;
use App\Http\Requests\UpdateRezervacijaRequest;

class RezervacijaController extends Controller
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
     * @param  \App\Http\Requests\StoreRezervacijaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRezervacijaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rezervacija  $rezervacija
     * @return \Illuminate\Http\Response
     */
    public function show(Rezervacija $rezervacija)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rezervacija  $rezervacija
     * @return \Illuminate\Http\Response
     */
    public function edit(Rezervacija $rezervacija)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRezervacijaRequest  $request
     * @param  \App\Models\Rezervacija  $rezervacija
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRezervacijaRequest $request, Rezervacija $rezervacija)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rezervacija  $rezervacija
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rezervacija $rezervacija)
    {
        //
    }
}
