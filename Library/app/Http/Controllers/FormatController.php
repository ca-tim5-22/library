<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Http\Requests\StoreFormatRequest;
use App\Http\Requests\UpdateFormatRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\URL;
class FormatController extends Controller
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
            $formats = DB::table("formats")->orderBy("name","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $formats = DB::table("formats")->orderBy("name","ASC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsFormat",compact("formats","url","currentpag"));
    }

    public function sort(Request $request){
        $url= URL::previous();
        if($request->paginate != null){
            $formats = DB::table("formats")->orderBy("name","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $formats = DB::table("formats")->orderBy("name","DESC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsFormat",compact("formats","url","currentpag"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create.noviFormat");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormatRequest $request)
    {
      
        Format::create([
        'name'             =>      $request->name,
        ]); 
                 
         return redirect('/format')->with('success','Format je uspjesno dodat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function show(Format $format)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function edit($format)
    {
        $f=Format::findOrFail($format);
        return view('edit.editFormat',compact('f'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormatRequest  $request
     * @param  \App\Models\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormatRequest $request,$format)
    {
        $f=Format::findOrFail($format);
    
        $f->name=$request->name;
        
        $f->save();
    
    return redirect('/format')->with('success','Format je uspjesno azuriran');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function destroy($format)
    {
        $f=Format::findOrFail($format);
        $f->delete();
        return redirect('/format')->with('success','Format je uspjesno obrisan');
    }

    public function destroy_format($form_id)
    {   
        foreach($form_id as $form_id){
        $f=Format::findOrFail($form_id);
        $f->delete();
        }
        return redirect('/format')->with('success','Format je uspjesno obrisan');
    }
}
