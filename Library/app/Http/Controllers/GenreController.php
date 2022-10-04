<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage; 
use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\URL;
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $url= URL::previous();
        if($request->paginate != null){
            $genres = DB::table("genres")->orderBy("name","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $genres = DB::table("genres")->orderBy("name","ASC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsZanrovi",compact("genres","url","currentpag"));
    }

    public function sort(Request $request){
        $url= URL::previous();
        if($request->paginate != null){
            $genres = DB::table("genres")->orderBy("name","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $genres = DB::table("genres")->orderBy("name","DESC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsZanrovi",compact("genres","url","currentpag"));
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

             
            
        }else{ 
            Genre::create([
            'name'             =>      $request->name,
        ]); 
         
       }
       return redirect('/genre')->with('success','Zanr je uspjesno dodat');
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
    
    return redirect('/genre')->with('success','Zanr je uspjesno azuriran');  
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

        return redirect('/genre')->with('success','Zanr je uspjesno izbrisan');

    }
    public function delete_zanr($zanr_id)
    {
        $zanr_id = explode("-",$zanr_id);
        foreach($zanr_id as $zanr_id){
            $genre = Genre::findOrFail($zanr_id);
            @unlink( 'public/genre_icons/'.$genre->icon);
            @unlink( 'public/genre_icons/crop/'.$genre->icon);
            $genre->delete();
        }
     return redirect('/genre')->with('success','Zanrovi su uspjesno izbrisani');
    }
    
}
