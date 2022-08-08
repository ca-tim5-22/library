<?php

namespace App\Http\Controllers;

use App\Models\Binding;
use App\Http\Requests\StoreBindingRequest;
use App\Http\Requests\UpdateBindingRequest;
use Illuminate\Support\Facades\DB;
class BindingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $binding=DB::select(DB::raw("SELECT * FROM `bindings` ORDER BY `bindings`.`name` ASC"));
        return view("index.settingsPovez",compact("binding"));
    }
    public function sort(){
        $binding=DB::select(DB::raw("SELECT * FROM `bindings` ORDER BY `bindings`.`name` DESC"));
        return view("index.settingsPovez",compact("binding"));
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
}
