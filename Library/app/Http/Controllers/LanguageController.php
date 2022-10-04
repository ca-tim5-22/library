<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ViewErrorBag;

class LanguageController extends Controller
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
            $languages = DB::table("languages")->orderBy("name","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $languages = DB::table("languages")->orderBy("name","ASC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsJezici",compact("languages","url","currentpag"));
    }

    public function sort(Request $request)
    {
        

        $url= URL::previous();
        if($request->paginate != null){
            $languages = DB::table("languages")->orderBy("name","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $languages = DB::table("languages")->orderBy("name","DESC")->paginate($currentpag,"*","page");
            
        }
        
        return view("index.settingsJezici",compact("languages","url","currentpag"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create.noviJezik");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguageRequest $request)
    {
        Language::create([
                "name"=>$request->name

        ]);
        return redirect("/language")->with('success','Jezik je uspjesno dodat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        
        $f=Language::findOrFail($language->id);
        return view('edit.editJezik',compact('f'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguageRequest  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
    
        $f=Language::findOrFail($language->id);
    
        $f->name=$request->name;
        
        $f->save();
    
    return redirect('/language')->with('success','Jezik je uspjesno azuriran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $f=Language::findOrFail($language->id);
        $f->delete();
        return redirect('/language')->with('success','Jezik je uspjesno izbrisan');
    }

    public function delete_lang($lang_id)
    {
        foreach($lang_id as $lang_id){
            $f=Language::findOrFail($lang_id);
        $f->delete();
        }
        
        return redirect('/language')->with('success','Jezici su uspjesno izbrisani');
    }
}
