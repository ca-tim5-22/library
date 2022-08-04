<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Support\Facades\DB;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author=DB::select(DB::raw("SELECT * FROM `authors` ORDER BY `authors`.`first_and_last_name` ASC"));
        return view("author.autori",compact('author'));
    }

    public function sort(){
        $author=DB::select(DB::raw("SELECT * FROM `authors` ORDER BY `authors`.`first_and_last_name` DESC"));
        return view("author.autori",compact("author"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create.noviAutor");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create([
            'first_and_last_name'       =>      $request->first_and_last_name,
            'biography'                 =>      $request->biography       
            ]); 
                     
                  
            return redirect('/author');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($author)
    {
        $a=Author::findOrFail($author);
        return view('author.autorProfile',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($author)
    {
        $a=Author::findOrFail($author);
        return view("edit.editAutor",compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request,$author)
    {
        $a=Author::findOrFail($author);
    
        $a->first_and_last_name=$request->first_and_last_name;
        $a->biography=$request->biography;
        
        $a->save();
    
    return redirect('/author');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($author)
    {
        $a=Author::findOrFail($author);
        $a->delete();
        return redirect('/author');
    }
}
