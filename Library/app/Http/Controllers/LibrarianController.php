<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use App\Http\Requests\StoreLibrarianRequest;
use App\Http\Requests\UpdateLibrarianRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $librarians=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=2 ORDER BY users.first_and_last_name ASC;"));
        $librarians = (object) $librarians;
        return view("the_librarian.bibliotekari",compact("librarians"));
    }

    public function sort()
    {
        $librarians=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=2 ORDER BY users.first_and_last_name DESC;"));
        $librarians = (object) $librarians;
        return view("the_librarian.bibliotekari",compact("librarians"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $librarian_type=DB::select(DB::raw("SELECT * FROM type_of_users WHERE type_of_users.name=\"Librarian\";"));
        $librarian_type = (object) $librarian_type;
        return view("create.noviBibliotekar",compact("librarian_type"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLibrarianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibrarianRequest $request)
    {
        
        $first_and_last_name=$request->first_and_last_name;
       
        
        $password=$request->password;
        $password2=$request->password2;
        if($password === $password2){
        if($file=$request->file('photo')){
            $photo_name=$file->getClientOriginalName();
            $file->move('category_icon',$photo_name);
            $input=$photo_name;
        
            Users::create([
                    'user_type_id'=>$request->user_type_id,
                    'first_and_last_name'=>$first_and_last_name,
                    'email'=>$request->email,
                    'username'=>$request->username,
                    'PIN'=>$request->PIN,
                    'photo'=>$input,
                    'password'=>Hash::make($password)
                ]); 
            }else{ 

           
        
            Users::create([
                'user_type_id'=>$request->user_type_id,
                'first_and_last_name'=>$first_and_last_name,
                'email'=>$request->email,
                'username'=>$request->username,
                'PIN'=>$request->PIN,
                'password'=>Hash::make($password)
                ]); 
                 
            }
                 return redirect('/librarian');
            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function show(Librarian $librarian)
    {
        $librarian = Users::findOrFail($librarian->id);
        return view("the_librarian.bibliotekarProfile",compact("librarian"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function edit(Librarian $librarian)
    {

        $librarian= Users::findOrFail($librarian->id);
       
        $user_types= DB::select(DB::raw("SELECT * FROM type_of_users"));
        return view("edit.editBibliotekar",compact("librarian","user_types"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLibrarianRequest  $request
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibrarianRequest $request, Librarian $librarian)
    {
        
        $librarian=Users::findOrFail($librarian->id);
        $password=$request->password;
        $password2=$request->password2;
        
        if($password === $password2){

          
        if($request->file('photo')){
            
            $old=$librarian->photo;
            $file=$request->file('photo');

            if(!is_null($file)){
            $name=$file->getClientOriginalName();
            $file->move('category_icon',$name);
            
            @unlink( 'category_icon/'.$old);
            $librarian->photo=$name;
            $librarian->user_type_id=$request->user_type_id;
            $librarian->first_and_last_name=$request->first_and_last_name;
            $librarian->email=$request->email;
            $librarian->username=$request->username;
            $librarian->PIN=$request->PIN;
            $librarian->password=Hash::make($password);
            
            $librarian->save();
        }
}else{
    
            $librarian->user_type_id=$request->user_type_id;
            $librarian->first_and_last_name=$request->first_and_last_name;
            $librarian->email=$request->email;
            $librarian->username=$request->username;
            $librarian->PIN=$request->PIN;
            $librarian->password=Hash::make($password);
            
            $librarian->save();
}
            return redirect('/librarian');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Librarian $librarian)
    {
        $librarian = Users::findOrFail($librarian->id);
        $librarian->delete();

        return redirect("/librarian");
    }
}
