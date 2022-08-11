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

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_students=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=2 ORDER BY `users`.`first_and_last_name` ASC;"));
        $all_students = (object) $all_students;
        return view("student.ucenik",compact("all_students"));
    }

    public function sort()
    {
        $all_students=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=2 ORDER BY `users`.`first_and_last_name` DESC;"));
        $all_students = (object) $all_students;
        return view("student.ucenik",compact("all_students"));
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

                $photo=$request->file('photo');
                $photo_name_with_extension = $photo->getClientOriginalName();
                
                $photo_name = pathinfo($photo_name_with_extension, PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $photonametostore = $photo_name.'_'.uniqid().'.'.$extension;

                Storage::put('public/student_images/'. $photonametostore, fopen($request->file('photo'), 'r+'));
                Storage::put('public/student_images/crop/'. $photonametostore, fopen($request->file('photo'), 'r+'));

                $cropimage = public_path('storage/student_images/crop/'.$photonametostore);
                $img = Image::make($cropimage)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);

                $path = asset('storage/student_images/crop/'.$photonametostore);
        
            
            $user=Users::create([
                    'first_and_last_name'=>$first_and_last_name,
                    'email'=>$request->email,
                    'username'=>$request->username,
                    'PIN'=>$request->PIN,
                    'photo'=>$photonametostore,
                    'password'=>Hash::make($password)
                ]);
                
                $user_type->type()->save($user);
                return redirect('/student')->with(['success' => "Slika je uspjesno okacena.",'path' => $path]);
                
            }else{ 
           
            $user=Users::create([
                'first_and_last_name'=>$first_and_last_name,
                'email'=>$request->email,
                'username'=>$request->username,
                'PIN'=>$request->PIN,
                'password'=>Hash::make($password)
                ]); 

            $user_type->type()->save($user);
            return redirect('/student');
            }
          
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
                $img = Image::make($cropimage)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save($cropimage);
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
