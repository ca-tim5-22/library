<?php

namespace App\Http\Controllers;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage; 
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\URL;
class CategoryController extends Controller
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
            $categories = DB::table("categories")->orderBy("name","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $categories = DB::table("categories")->orderBy("name","ASC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsKategorije",compact("categories","url","currentpag"));
    }

    public function sort(Request $request){
        $url= URL::previous();
        if($request->paginate != null){
            $categories = DB::table("categories")->orderBy("name","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $categories = DB::table("categories")->orderBy("name","DESC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsKategorije",compact("categories","url","currentpag"));
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

        if ($request->hasFile('icon')) {
            $widthofpre=$request->widthofpre;
            $heightofpre=$request->heightofpre;
            $icon=$request->file('icon');
            $icon_name_with_extension = $icon->getClientOriginalName();
            
            $icon_name = pathinfo($icon_name_with_extension, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $iconnametostore = $icon_name.'_'.uniqid().'.'.$extension;

            Storage::put('public/category_icons/'. $iconnametostore, fopen($request->file('icon'), 'r+'));
            Storage::put('public/category_icons/crop/'. $iconnametostore, fopen($request->file('icon'), 'r+'));

            $cropimage = public_path('storage/category_icons/crop/'.$iconnametostore);
            $img = Image::make($cropimage)->resize($widthofpre,$heightofpre)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);

            $path = asset('storage/category_icons/crop/'.$iconnametostore);
            
            
            Category::create([
            'name'             =>      $request->name,
            'description'      =>      $request->description, 
            'icon'             =>      $iconnametostore
             ]); 

             
            
        }else{ 
    Category::create([
            'name'             =>      $request->name,
            'description'      =>      $request->description
        ]); 
         
      
          }
          return redirect('/category')->with('success','Kategorija je uspjesno dodata');
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


if ($request->hasFile('icon')) { 
    $widthofpre=$request->widthofpre;
    $heightofpre=$request->heightofpre;
    $icon=$request->file('icon');
    if(!is_null($icon)){

    $icon_name_with_extension = $icon->getClientOriginalName();
            
    $icon_name = pathinfo($icon_name_with_extension, PATHINFO_FILENAME);
    $extension = $request->file('icon')->getClientOriginalExtension();
     
    $iconnametostore = $icon_name.'_'.uniqid().'.'.$extension;
            
     
    Storage::put('public/category_icons/'. $iconnametostore, fopen($request->file('icon'), 'r+'));
    Storage::put('public/category_icons/crop/'. $iconnametostore, fopen($request->file('icon'), 'r+'));
    $cropimage = public_path('storage/category_icons/crop/'.$iconnametostore);
    $img = Image::make($cropimage)->resize($widthofpre,$heightofpre)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);
    $path = asset('storage/category_icons/crop/'.$iconnametostore);

    @unlink( 'public/category_icons/'.$old);
    @unlink( 'public/category_icons/crop/'.$old);

    $c->icon=$iconnametostore;}}


    $c->save();

return redirect('/category')->with('success','Kategorija je uspjesno azurirana');
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
    @unlink( 'public/category_icons/'.$c->icon);
    @unlink( 'public/category_icons/crop/'.$c->icon);
    $c->delete();
     return redirect('/category')->with('success','Kategorija je uspjesno izbrisana');
    }

    public function delete_kat($kat_id)
    {
        $kat_id = explode("-",$kat_id);
        foreach($kat_id as $kat_id){
    $c=Category::findOrFail($kat_id);
    @unlink( 'public/category_icons/'.$c->icon);
    @unlink( 'public/category_icons/crop/'.$c->icon);
    $c->delete();
        }
     return redirect('/category')->with('success','Kategorije su uspjesno izbrisane');
    }
}
