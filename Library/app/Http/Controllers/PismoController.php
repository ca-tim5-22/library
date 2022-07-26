<?php

namespace App\Http\Controllers;

use App\Models\Pismo;
use App\Http\Requests\StorePismoRequest;
use App\Http\Requests\UpdatePismoRequest;

class PismoController extends Controller
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
     * @param  \App\Http\Requests\StorePismoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePismoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pismo  $pismo
     * @return \Illuminate\Http\Response
     */
    public function show(Pismo $pismo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pismo  $pismo
     * @return \Illuminate\Http\Response
     */
    public function edit(Pismo $pismo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePismoRequest  $request
     * @param  \App\Models\Pismo  $pismo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePismoRequest $request, Pismo $pismo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pismo  $pismo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pismo $pismo)
    {
        //
    }
}
