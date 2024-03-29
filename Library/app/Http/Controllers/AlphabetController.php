<?php

namespace App\Http\Controllers;

use App\Models\Alphabet;
use App\Http\Requests\StoreAlphabetRequest;
use App\Http\Requests\UpdateAlphabetRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Request;
class AlphabetController extends Controller
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
            $alphabets = DB::table("alphabets")->orderBy("name","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $alphabets = DB::table("alphabets")->orderBy("name","ASC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsPismo",compact("alphabets","url","currentpag"));
    }

    public function sort(Request $request){
        $url= URL::previous();
        if($request->paginate != null){
            $alphabets = DB::table("alphabets")->orderBy("name","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $alphabets = DB::table("alphabets")->orderBy("name","DESC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsPismo",compact("alphabets","url","currentpag"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create.novoPismo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlphabetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlphabetRequest $request)
    {
        Alphabet::create([
            'name'             =>      $request->name
            
        ]); 
        return redirect("/alphabet")->with('success','Pismo je uspjesno dodato');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alphabet  $alphabet
     * @return \Illuminate\Http\Response
     */
    public function show(Alphabet $alphabet)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alphabet  $alphabet
     * @return \Illuminate\Http\Response
     */
    public function edit(Alphabet $alphabet)
    {
        $pismo=Alphabet::findOrFail($alphabet->id);
        return view("edit.editPismo", compact('pismo'));
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
        $pismo=Alphabet::findOrFail($alphabet->id);
        $pismo->name=$request->name;
        $pismo->save();
        return redirect('/alphabet')->with('success','Pismo je uspjesno azurirano');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alphabet  $alphabet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alphabet $alphabet)
    {
        $pismo=Alphabet::findOrFail($alphabet->id);
        $pismo->delete();
        return redirect('/alphabet')->with('success','Pismo je uspjesno izbrisano');
    }
}
