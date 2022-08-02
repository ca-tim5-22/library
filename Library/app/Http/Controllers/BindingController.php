<?php

namespace App\Http\Controllers;

use App\Models\Binding;
use App\Http\Requests\StoreBindingRequest;
use App\Http\Requests\UpdateBindingRequest;

class BindingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index.settingsPovez");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create.noviPovez");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBindingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBindingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Binding  $binding
     * @return \Illuminate\Http\Response
     */
    public function show(Binding $binding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Binding  $binding
     * @return \Illuminate\Http\Response
     */
    public function edit(Binding $binding)
    {
        return view("editPovez");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBindingRequest  $request
     * @param  \App\Models\Binding  $binding
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBindingRequest $request, Binding $binding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Binding  $binding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Binding $binding)
    {
        //
    }
}
