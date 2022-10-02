<?php

namespace App\Http\Controllers;

use App\Models\Binding;
use App\Http\Requests\StoreBindingRequest;
use App\Http\Requests\UpdateBindingRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\URL;
class BindingController extends Controller
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
            $bindings = DB::table("bindings")->orderBy("name","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $bindings = DB::table("bindings")->orderBy("name","ASC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsPovez",compact("bindings","url","currentpag"));
    }

    public function sort(Request $request){
        $url= URL::previous();
        if($request->paginate != null){
            $bindings = DB::table("bindings")->orderBy("name","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $bindings = DB::table("bindings")->orderBy("name","DESC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsPovez",compact("bindings","url","currentpag"));
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
        
        
        Binding::create([
        'name'             =>      $request->name,          
        ]); 
                 
              
        return redirect('/binding');  
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
    public function edit($binding)
    {
        $b=Binding::findOrFail($binding);
        return view('edit.editPovez',compact('b'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBindingRequest  $request
     * @param  \App\Models\Binding  $binding
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBindingRequest $request,$binding)
    {
        $b=Binding::findOrFail($binding);
    
        $b->name=$request->name;
        
        $b->save();
    
    return redirect('/binding');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Binding  $binding
     * @return \Illuminate\Http\Response
     */
    public function destroy($binding)
    {
        $b=Binding::findOrFail($binding);
        $b->delete();
        return redirect('/binding');
    }

    public function destroy_bind($bind_id)
    {
        foreach($bind_id as $bind_id){
             $b=Binding::findOrFail($bind_id);
        $b->delete();
        }
        return redirect('/binding');
    }
}
