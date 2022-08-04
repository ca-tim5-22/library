<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories=DB::select(DB::raw("SELECT * FROM `categories` ORDER BY `categories`.`name` ASC"));
        
       /*  $categories=Category::orderBy('created_at','desc')->paginate(4,"*","Page");*/

        return view('index.settingsKategorije',compact("categories"));
    }

    public function sort(){
        $categories=DB::select(DB::raw("SELECT * FROM `categories` ORDER BY `categories`.`name` DESC"));
        return view("index.settingsKategorije",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create.novaKategorija");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
    if($file=$request->file('icon')){
    $name=$file->getClientOriginalName();
    $file->move('category_icon',$name);
    $input=$name;

    Category::create([
            'name'             =>      $request->name,
            'description'      =>      $request->description, 
            'icon'             =>      $input
        ]); 
    }

    Category::create([
            'name'             =>      $request->name,
            'description'      =>      $request->description
        ]); 
         
      
         return redirect('/category');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $c=Category::findOrFail($category);
        return view('edit.editKategorija',compact('c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        
    $c=Category::findOrFail($id);
    
    $old=$c->icon;
    
    
    $c->name=$request->name;
    $c->description=$request->description;

    $file=$request->file('icon');
    if(!is_null($file)){
    $name=$file->getClientOriginalName();
    $file->move('category_icon',$name);
    $input=$name;
    @unlink( 'category_icon/'.$old);
    $c->icon=$input;
}

    $c->save();

return redirect('/category');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $c=Category::findOrFail($category);
    //@unlink( 'category_icon/'.$c->icon); 
    $c->delete();
     return redirect('/category');
    }
}
