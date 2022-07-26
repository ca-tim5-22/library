<?php

namespace App\Http\Controllers;

use App\Models\Izdavac;
use App\Http\Requests\StoreIzdavacRequest;
use App\Http\Requests\UpdateIzdavacRequest;

class IzdavacController extends Controller
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
     * @param  \App\Http\Requests\StoreIzdavacRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIzdavacRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Izdavac  $izdavac
     * @return \Illuminate\Http\Response
     */
    public function show(Izdavac $izdavac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Izdavac  $izdavac
     * @return \Illuminate\Http\Response
     */
    public function edit(Izdavac $izdavac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIzdavacRequest  $request
     * @param  \App\Models\Izdavac  $izdavac
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIzdavacRequest $request, Izdavac $izdavac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Izdavac  $izdavac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Izdavac $izdavac)
    {
        //
    }
}
