<?php

namespace App\Http\Controllers;

use App\Models\StatusRezervacije;
use App\Http\Requests\StoreStatusRezervacijeRequest;
use App\Http\Requests\UpdateStatusRezervacijeRequest;

class StatusRezervacijeController extends Controller
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
     * @param  \App\Http\Requests\StoreStatusRezervacijeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusRezervacijeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusRezervacije  $statusRezervacije
     * @return \Illuminate\Http\Response
     */
    public function show(StatusRezervacije $statusRezervacije)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusRezervacije  $statusRezervacije
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusRezervacije $statusRezervacije)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusRezervacijeRequest  $request
     * @param  \App\Models\StatusRezervacije  $statusRezervacije
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusRezervacijeRequest $request, StatusRezervacije $statusRezervacije)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusRezervacije  $statusRezervacije
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusRezervacije $statusRezervacije)
    {
        //
    }
}
