<?php

namespace App\Http\Controllers;

use App\Models\Alphabet;
use App\Http\Requests\StoreAlphabetRequest;
use App\Http\Requests\UpdateAlphabetRequest;

class AlphabetController extends Controller
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
     * @param  \App\Http\Requests\StoreAlphabetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlphabetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alphabet  $alphabet
     * @return \Illuminate\Http\Response
     */
    public function show(Alphabet $alphabet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alphabet  $alphabet
     * @return \Illuminate\Http\Response
     */
    public function edit(Alphabet $alphabet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlphabetRequest  $request
     * @param  \App\Models\Alphabet  $alphabet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlphabetRequest $request, Alphabet $alphabet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alphabet  $alphabet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alphabet $alphabet)
    {
        //
    }
}
