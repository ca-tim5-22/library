<?php

namespace App\Http\Controllers;

use App\Models\TipKorisnika;
use App\Http\Requests\StoreTipKorisnikaRequest;
use App\Http\Requests\UpdateTipKorisnikaRequest;

class TipKorisnikaController extends Controller
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
     * @param  \App\Http\Requests\StoreTipKorisnikaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipKorisnikaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipKorisnika  $tipKorisnika
     * @return \Illuminate\Http\Response
     */
    public function show(TipKorisnika $tipKorisnika)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipKorisnika  $tipKorisnika
     * @return \Illuminate\Http\Response
     */
    public function edit(TipKorisnika $tipKorisnika)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipKorisnikaRequest  $request
     * @param  \App\Models\TipKorisnika  $tipKorisnika
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipKorisnikaRequest $request, TipKorisnika $tipKorisnika)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipKorisnika  $tipKorisnika
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipKorisnika $tipKorisnika)
    {
        //
    }
}
