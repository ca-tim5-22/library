<?php

namespace App\Http\Controllers;

use App\Models\Izdavanje;
use App\Http\Requests\StoreIzdavanjeRequest;
use App\Http\Requests\UpdateIzdavanjeRequest;

class IzdavanjeController extends Controller
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
     * @param  \App\Http\Requests\StoreIzdavanjeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIzdavanjeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function show(Izdavanje $izdavanje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function edit(Izdavanje $izdavanje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIzdavanjeRequest  $request
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIzdavanjeRequest $request, Izdavanje $izdavanje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Izdavanje $izdavanje)
    {
        //
    }
}
