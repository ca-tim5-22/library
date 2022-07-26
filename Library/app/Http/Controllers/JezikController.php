<?php

namespace App\Http\Controllers;

use App\Models\Jezik;
use App\Http\Requests\StoreJezikRequest;
use App\Http\Requests\UpdateJezikRequest;

class JezikController extends Controller
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
     * @param  \App\Http\Requests\StoreJezikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJezikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jezik  $jezik
     * @return \Illuminate\Http\Response
     */
    public function show(Jezik $jezik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jezik  $jezik
     * @return \Illuminate\Http\Response
     */
    public function edit(Jezik $jezik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJezikRequest  $request
     * @param  \App\Models\Jezik  $jezik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJezikRequest $request, Jezik $jezik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jezik  $jezik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jezik $jezik)
    {
        //
    }
}
