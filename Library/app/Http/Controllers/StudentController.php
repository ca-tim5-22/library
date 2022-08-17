<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage; 
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use App\Models\Users;
use App\Models\UserType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\URL;
use Termwind\Components\Raw;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $url= URL::previous();
        if($request->paginate != null){
            $all_students = DB::table("users")->where("user_type_id","=",2)->orderBy("users.first_and_last_name","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $all_students = DB::table("users")->where("user_type_id","=",2)->orderBy("first_and_last_name","ASC")->paginate($currentpag,"*","page");
            
        }
        return view("student.ucenik",compact("all_students","currentpag","url"));
    }

    public function sort(Request $request)
    {
        $url= URL::previous();
        if($request->paginate != null){
            $all_students = DB::table("users")->where("user_type_id","=",2)->orderBy("users.first_and_last_name","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $all_students = DB::table("users")->where("user_type_id","=",2)->orderBy("first_and_last_name","DESC")->paginate($currentpag,"*","page");
            
        }
        return view("student.ucenik",compact("all_students","currentpag","url"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    

        return view("create.noviUcenik");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $user_type=UserType::findOrFail(2);
        $first_and_last_name=$request->first_and_last_name;
       
        
        $password=$request->password;
        $password2=$request->password2;
        if($password === $password2){


            if ($request->hasFile('photo')) {
                $widthofpre=$request->widthofpre;
                $heightofpre=$request->heightofpre;
                $photo=$request->file('photo');
                $photo_name_with_extension = $photo->getClientOriginalName();
                
                $photo_name = pathinfo($photo_name_with_extension, PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $photonametostore = $photo_name.'_'.uniqid().'.'.$extension;

                Storage::put('public/student_images/'. $photonametostore, fopen($request->file('photo'), 'r+'));
                Storage::put('public/student_images/crop/'. $photonametostore, fopen($request->file('photo'), 'r+'));

                $cropimage = public_path('storage/student_images/crop/'.$photonametostore);
                $img = Image::make($cropimage)->resize($widthofpre,$heightofpre)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);

                $path = asset('storage/student_images/crop/'.$photonametostore);
        
            
            $user=Users::create([
                    "user_type_id"=>$user_type->id,
                    'first_and_last_name'=>$first_and_last_name,
                    'email'=>$request->email,
                    'username'=>$request->username,
                    'PIN'=>$request->PIN,
                    'photo'=>$photonametostore,
                    'password'=>Hash::make($password)

                ]); 
               

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
            
                 return redirect('/student');

            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        
        $student=Users::findOrFail($student->id);
        return view("student.ucenikProfile",compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    { /* $user_types=DB::select(DB::raw("SELECT * FROM type_of_users")); */
       /*  $user_types = (object) $user_types; */
        $student=Users::findOrFail($student->id);
        return view("edit.editUcenik",compact("student"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student=Users::findOrFail($student->id);
        $password=$request->password;
        $password2=$request->password2;
        if($password === $password2){
            $widthofpre=$request->widthofpre;
            $heightofpre=$request->heightofpre;
            if ($request->hasFile('photo')) {
                $old=$student->photo;
                     
                $photo=$request->file('photo');
                if(!is_null($photo)){
        
                $photo_name_with_extension = $photo->getClientOriginalName();
                        
                $photo_name = pathinfo($photo_name_with_extension, PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                 
                $photonametostore = $photo_name.'_'.uniqid().'.'.$extension;
                        
                 
                Storage::put('public/student_images/'. $photonametostore, fopen($request->file('photo'), 'r+'));
                Storage::put('public/student_images/crop/'. $photonametostore, fopen($request->file('photo'), 'r+'));
                $cropimage = public_path('storage/student_images/crop/'.$photonametostore);
                $img = Image::make($cropimage)->resize($widthofpre,$heightofpre)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);
                $path = asset('storage/student_images/crop/'.$photonametostore);
        
                @unlink( 'public/student_images/'.$old);
                @unlink( 'public/student_images/crop/'.$old);
        
        
                $student->photo=$photonametostore;
                $student->first_and_last_name=$request->first_and_last_name;
                $student->email=$request->email;
                $student->username=$request->username;
                $student->PIN=$request->PIN;
                $student->password=Hash::make($password);
                    
                $student->save();}
        
}else{
            $student->first_and_last_name=$request->first_and_last_name;
            $student->email=$request->email;
            $student->username=$request->username;
            $student->PIN=$request->PIN;
            $student->password=Hash::make($password);
            
            $student->save();
}
            return redirect('/student');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student=Users::findOrFail($student->id);
        $student->delete();
        @unlink( 'public/student_images/'.$student->photo);
        @unlink( 'public/student_images/crop/'.$student->photo);
        return redirect("/student");
    }
}
