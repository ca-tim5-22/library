<?php

namespace App\Http\Controllers;

use App\Models\IzdavanjeStatus;
use App\Http\Requests\StoreIzdavanjeStatusRequest;
use App\Http\Requests\UpdateIzdavanjeStatusRequest;

class IzdavanjeStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreIzdavanjeStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIzdavanjeStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IzdavanjeStatus  $izdavanjeStatus
     * @return \Illuminate\Http\Response
     */
    public function show(IzdavanjeStatus $izdavanjeStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IzdavanjeStatus  $izdavanjeStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(IzdavanjeStatus $izdavanjeStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIzdavanjeStatusRequest  $request
     * @param  \App\Models\IzdavanjeStatus  $izdavanjeStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIzdavanjeStatusRequest $request, IzdavanjeStatus $izdavanjeStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IzdavanjeStatus  $izdavanjeStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(IzdavanjeStatus $izdavanjeStatus)
    {
        //
    }
}
