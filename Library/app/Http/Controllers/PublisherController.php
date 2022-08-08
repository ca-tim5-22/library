<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use Illuminate\Support\Facades\DB;
class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers=DB::select(DB::raw("SELECT * FROM `publishers` ORDER BY `publishers`.`name` ASC"));

        return view("index.settingsIzdavac",compact("publishers"));
    }

    public function sort(){
        $publishers=DB::select(DB::raw("SELECT * FROM `publishers` ORDER BY `publishers`.`name` DESC"));
        return view("index.settingsIzdavac",compact("publishers"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create.noviIzdavac");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublisherRequest $request)
    {
  
        Publisher::create([
            "name" => $request->name
        ]);
        
        return redirect("/publisher");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        
        $publisher = Publisher::findOrFail($publisher->id);
        
        return view("edit.editIzdavac",compact("publisher"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublisherRequest  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher=Publisher::findOrFail($publisher->id);
    
        $publisher->name=$request->name;
        
        
        $publisher->save();

        return redirect('/publisher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher = Publisher::findOrFail($publisher->id);

        $publisher->delete();

        return redirect('/publisher');
    }
}
