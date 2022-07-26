<?php

namespace App\Http\Controllers;

use App\Models\Povez;
use App\Http\Requests\StorePovezRequest;
use App\Http\Requests\UpdatePovezRequest;

class PovezController extends Controller
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
     * @param  \App\Http\Requests\StorePovezRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePovezRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Povez  $povez
     * @return \Illuminate\Http\Response
     */
    public function show(Povez $povez)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Povez  $povez
     * @return \Illuminate\Http\Response
     */
    public function edit(Povez $povez)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePovezRequest  $request
     * @param  \App\Models\Povez  $povez
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePovezRequest $request, Povez $povez)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Povez  $povez
     * @return \Illuminate\Http\Response
     */
    public function destroy(Povez $povez)
    {
        //
    }
}
