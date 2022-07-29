<?php

namespace App\Http\Controllers;

use App\Models\GlobalVariable;
use App\Http\Requests\StoreGlobalVariableRequest;
use App\Http\Requests\UpdateGlobalVariableRequest;

class GlobalVariableController extends Controller
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
     * @param  \App\Http\Requests\StoreGlobalVariableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlobalVariableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GlobalVariable  $globalVariable
     * @return \Illuminate\Http\Response
     */
    public function show(GlobalVariable $globalVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GlobalVariable  $globalVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(GlobalVariable $globalVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGlobalVariableRequest  $request
     * @param  \App\Models\GlobalVariable  $globalVariable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalVariableRequest $request, GlobalVariable $globalVariable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GlobalVariable  $globalVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(GlobalVariable $globalVariable)
    {
        //
    }
}
