<?php

namespace App\Http\Controllers;

use App\Models\KorisnikLogin;
use App\Http\Requests\StoreKorisnikLoginRequest;
use App\Http\Requests\UpdateKorisnikLoginRequest;

class KorisnikLoginController extends Controller
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
     * @param  \App\Http\Requests\StoreKorisnikLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKorisnikLoginRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KorisnikLogin  $korisnikLogin
     * @return \Illuminate\Http\Response
     */
    public function show(KorisnikLogin $korisnikLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KorisnikLogin  $korisnikLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(KorisnikLogin $korisnikLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKorisnikLoginRequest  $request
     * @param  \App\Models\KorisnikLogin  $korisnikLogin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKorisnikLoginRequest $request, KorisnikLogin $korisnikLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KorisnikLogin  $korisnikLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(KorisnikLogin $korisnikLogin)
    {
        //
    }
}
