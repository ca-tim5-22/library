<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage; 
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
        
        if ($request->hasFile('icon')) {
            $widthofpre=$request->widthofpre;
            $heightofpre=$request->heightofpre;
            $icon=$request->file('icon');
            $icon_name_with_extension = $icon->getClientOriginalName();
            
            $icon_name = pathinfo($icon_name_with_extension, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $iconnametostore = $icon_name.'_'.uniqid().'.'.$extension;

            Storage::put('public/genre_icons/'. $iconnametostore, fopen($request->file('icon'), 'r+'));
            Storage::put('public/genre_icons/crop/'. $iconnametostore, fopen($request->file('icon'), 'r+'));

            $cropimage = public_path('storage/genre_icons/crop/'.$iconnametostore);
            $img = Image::make($cropimage)->resize($widthofpre,$heightofpre)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);

            $path = asset('storage/genre_icons/crop/'.$iconnametostore);
            
            
            Genre::create([
            'name'             =>      $request->name,
            'icon'             =>      $iconnametostore
             ]); 

             return redirect('/genre')->with(['success' => "Slika je uspjesno okacena.",'path' => $path]);  
            
        }else{ 
            Genre::create([
            'name'             =>      $request->name,
        ]); 
         
      
         return redirect('/genre');  }
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
    public function update(UpdateGenreRequest $request,$genre)
    {
        $genre=Genre::findOrFail($genre);
    
        $old=$genre->icon;
        $genre->name=$request->name;
        $genre->description=$request->description;
    
    
    if ($request->hasFile('icon')) { 
        $widthofpre=$request->widthofpre;
        $heightofpre=$request->heightofpre;
        $icon=$request->file('icon');
        if(!is_null($icon)){
    
        $icon_name_with_extension = $icon->getClientOriginalName();
                
        $icon_name = pathinfo($icon_name_with_extension, PATHINFO_FILENAME);
        $extension = $request->file('icon')->getClientOriginalExtension();
         
        $iconnametostore = $icon_name.'_'.uniqid().'.'.$extension;
                
         
        Storage::put('public/genre_icons/'. $iconnametostore, fopen($request->file('icon'), 'r+'));
        Storage::put('public/genre_icons/crop/'. $iconnametostore, fopen($request->file('icon'), 'r+'));
        $cropimage = public_path('storage/genre_icons/crop/'.$iconnametostore);
        $img = Image::make($cropimage)->resize($widthofpre,$heightofpre)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);
        $path = asset('storage/genre_icons/crop/'.$iconnametostore);
    
        @unlink( 'public/genre_icons/'.$old);
        @unlink( 'public/genre_icons/crop/'.$old);
    
        $genre->icon=$iconnametostore;}}
    
    
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
        @unlink( 'public/genre_icons/'.$genre->icon);
        @unlink( 'public/genre_icons/crop/'.$genre->icon);
        $genre->delete();

        return redirect('/genre');
    }
}
