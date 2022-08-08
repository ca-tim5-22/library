<?php

namespace App\Http\Controllers;

use App\Models\BookGenre;
use App\Http\Requests\StoreBookGenreRequest;
use App\Http\Requests\UpdateBookGenreRequest;

class BookGenreController extends Controller
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
     * @param  \App\Http\Requests\StoreBookGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookGenreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function show(BookGenre $bookGenre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function edit(BookGenre $bookGenre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookGenreRequest  $request
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookGenreRequest $request, BookGenre $bookGenre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookGenre $bookGenre)
    {
        //
    }
}
