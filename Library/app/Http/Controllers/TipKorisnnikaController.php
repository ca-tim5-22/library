<?php

namespace App\Http\Controllers;

use App\Models\TipKorisnnika;
use App\Http\Requests\StoreTipKorisnnikaRequest;
use App\Http\Requests\UpdateTipKorisnnikaRequest;

class TipKorisnnikaController extends Controller
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
     * @param  \App\Http\Requests\StoreTipKorisnnikaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipKorisnnikaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipKorisnnika  $tipKorisnnika
     * @return \Illuminate\Http\Response
     */
    public function show(TipKorisnnika $tipKorisnnika)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipKorisnnika  $tipKorisnnika
     * @return \Illuminate\Http\Response
     */
    public function edit(TipKorisnnika $tipKorisnnika)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipKorisnnikaRequest  $request
     * @param  \App\Models\TipKorisnnika  $tipKorisnnika
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipKorisnnikaRequest $request, TipKorisnnika $tipKorisnnika)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipKorisnnika  $tipKorisnnika
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipKorisnnika $tipKorisnnika)
    {
        //
    }
}
