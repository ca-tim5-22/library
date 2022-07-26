<?php

namespace App\Http\Controllers;

use App\Models\Galerija;
use App\Http\Requests\StoreGalerijaRequest;
use App\Http\Requests\UpdateGalerijaRequest;

class GalerijaController extends Controller
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
     * @param  \App\Http\Requests\StoreGalerijaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalerijaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galerija  $galerija
     * @return \Illuminate\Http\Response
     */
    public function show(Galerija $galerija)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galerija  $galerija
     * @return \Illuminate\Http\Response
     */
    public function edit(Galerija $galerija)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGalerijaRequest  $request
     * @param  \App\Models\Galerija  $galerija
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalerijaRequest $request, Galerija $galerija)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galerija  $galerija
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galerija $galerija)
    {
        //
    }
}
