<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use Illuminate\Support\Facades\DB;
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres=DB::select(DB::raw("SELECT * FROM `genres` ORDER BY `genres`.`name` ASC"));
        return view("index.settingsZanrovi",compact("genres"));
    }
    
    public function sort(){
        $genres=DB::select(DB::raw("SELECT * FROM `genres` ORDER BY `genres`.`name` DESC"));
        return view("index.settingsZanrovi",compact("genres"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create.noviZanr");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenreRequest $request)
    {
        Genre::create([
            "name" => $request->name
        ]);
        
        return redirect("/genre");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {

        $genre = Genre::findOrFail($genre->id);
        
        return view("edit.editZanr",compact("genre"));
    }

    /**
     * Update the specified resource i
     * n storage.
     *
     * @param  \App\Http\Requests\UpdateGenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre=Genre::findOrFail($genre->id);
    
        $genre->name=$request->name;
        
        
        $genre->save();

        return redirect('/genre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre = Genre::findOrFail($genre->id);

        $genre->delete();

        return redirect('/genre');
    }
}
