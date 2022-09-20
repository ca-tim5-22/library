<?php

namespace App\Http\Controllers;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage; 
use App\Models\Librarian;
use App\Http\Requests\StoreLibrarianRequest;
use App\Http\Requests\UpdateLibrarianRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\UserType;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\URL;
class LibrarianController extends Controller
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
            $librarians = DB::table("users")->where("user_type_id","=",1)->orderBy("users.first_and_last_name","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $librarians = DB::table("users")->where("user_type_id","=",1)->orderBy("first_and_last_name","ASC")->paginate($currentpag,"*","page");
            
        }
        $last_login = Librarian::lastLogin();
        return view("the_librarian.bibliotekari",compact("librarians","url","currentpag","last_login"));
    }

    public function sort(Request $request)
    {
        $url= URL::previous();
        if($request->paginate != null){
            $librarians = DB::table("users")->where("user_type_id","=",1)->orderBy("users.first_and_last_name","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $librarians = DB::table("users")->where("user_type_id","=",1)->orderBy("first_and_last_name","DESC")->paginate($currentpag,"*","page");
            
        }
        $last_login = Librarian::lastLogin();
        return view("the_librarian.bibliotekari",compact("librarians","url","currentpag","last_login"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $librarian_type=DB::select(DB::raw("SELECT * FROM type_of_users WHERE type_of_users.name=\"Librarian\";"));
        $librarian_type = (object) $librarian_type; */
        return view("create.noviBibliotekar"/* ,compact("librarian_type") */);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLibrarianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibrarianRequest $request)
    {
        $user_type=UserType::findOrFail(1);
        $first_and_last_name=$request->first_and_last_name;
       
        
        $password=$request->password;
        $password2=$request->password2;
        if($password === $password2){
            $widthofpre=$request->widthofpre;
            $heightofpre=$request->heightofpre;
            if ($request->hasFile('photo')) {
              
                $photo=$request->file('photo');
                $photo_name_with_extension = $photo->getClientOriginalName();

                $photo_name = pathinfo($photo_name_with_extension, PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $photonametostore = $photo_name.'_'.uniqid().'.'.$extension;

                Storage::put('public/librarian_images/'. $photonametostore, fopen($request->file('photo'), 'r+'));
                Storage::put('public/librarian_images/crop/'. $photonametostore, fopen($request->file('photo'), 'r+'));

                $cropimage = public_path('storage/librarian_images/crop/'.$photonametostore);
                $img = Image::make($cropimage)->resize($widthofpre,$heightofpre)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);

                $path = asset('storage/librarian_images/crop/'.$photonametostore);
         
            $user=Users::create([
                "user_type_id"=>$user_type->id,
                    'first_and_last_name'=>$first_and_last_name,
                    'email'=>$request->email,
                    'username'=>$request->username,
                    'PIN'=>$request->PIN,
                    'photo'=>$photonametostore,
                    'password'=>Hash::make($password)
                ]); 

           

                
                return redirect('/librarian')->with(['success' => "Slika je uspjesno okacena.", 'path' => $path]);

            }else{ 

        
            $user=Users::create([
                "user_type_id"=>$user_type->id,
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
        $number_of_logins = DB::select(DB::raw("SELECT COUNT(id) as number_of_logins from user_logins WHERE user_id = $librarian->id"));
        $last_login = DB::select(DB::raw("SELECT time as last_login from user_logins WHERE user_id = $librarian->id ORDER BY user_logins.time DESC LIMIT 1"));

        
        return view("the_librarian.bibliotekarProfile",compact("librarian","number_of_logins","last_login"));
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
       
        /* $user_types= DB::select(DB::raw("SELECT * FROM type_of_users")); */
        return view("edit.editBibliotekar" ,compact("librarian"));
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
            $widthofpre=$request->widthofpre;
            $heightofpre=$request->heightofpre;
        if ($request->hasFile('photo')) {
        $old=$librarian->photo;
             
        $photo=$request->file('photo');
        if(!is_null($photo)){

        $photo_name_with_extension = $photo->getClientOriginalName();
                
        $photo_name = pathinfo($photo_name_with_extension, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
         
        $photonametostore = $photo_name.'_'.uniqid().'.'.$extension;
                
         
        Storage::put('public/librarian_images/'. $photonametostore, fopen($request->file('photo'), 'r+'));
        Storage::put('public/librarian_images/crop/'. $photonametostore, fopen($request->file('photo'), 'r+'));
        $cropimage = public_path('storage/librarian_images/crop/'.$photonametostore);
        $img = Image::make($cropimage)->resize($widthofpre,$heightofpre)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);
        $path = asset('storage/profile_images/crop/'.$photonametostore);

        @unlink( 'public/librarian_images/'.$old);
        @unlink( 'public/librarian_images/crop/'.$old);


        $librarian->photo=$photonametostore;
        $librarian->first_and_last_name=$request->first_and_last_name;
        $librarian->email=$request->email;
        $librarian->username=$request->username;
        $librarian->PIN=$request->PIN;
        $librarian->password=Hash::make($password);
            
        $librarian->save();}
        
}else{
    
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
        @unlink( 'public/librarian_images/'.$librarian->photo);
        @unlink( 'public/librarian_images/crop/'.$librarian->photo);

        return redirect("/librarian");
    }

    public function destroy_more($lib_id)
    {
        
        $lib_id = explode("-",$lib_id);
        foreach($lib_id as $lib_id){
             $librarian = Users::findOrFail($lib_id);
        $librarian->delete();
        @unlink( 'public/librarian_images/'.$librarian->photo);
        @unlink( 'public/librarian_images/crop/'.$librarian->photo);
        }
       

        return redirect("/librarian");
    }
    
}
