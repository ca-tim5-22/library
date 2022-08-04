<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Http\Requests\StoreFormatRequest;
use App\Http\Requests\UpdateFormatRequest;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $format=Format::all();
        return view("index.settingsFormat",compact('format'));
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
                 
         return redirect('/format');  
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
    
    return redirect('/format');  
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
        return redirect('/format');
    }
}
