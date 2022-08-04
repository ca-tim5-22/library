<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use App\Models\Users;
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
        $all_students=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=1;"));
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
        $user_types=DB::select(DB::raw("SELECT * FROM type_of_users"));
        $user_types = (object) $user_types;

        return view("create.noviUcenik",compact("user_types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
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
    { $user_types=DB::select(DB::raw("SELECT * FROM type_of_users"));
        $user_types = (object) $user_types;
        $student=Users::findOrFail($student->id);
        return view("edit.editUcenik",compact("student","user_types"));
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

        if( $file=$request->file('photo')){
            $old=$student->photo;
            $file=$request->file('photo');
            if(!is_null($file)){
            $name=$file->getClientOriginalName();
            $file->move('category_icon',$name);
            $input=$name;
            @unlink( 'category_icon/'.$old);
            $student->photo=$input;
            $student->user_type_id=$request->user_type_id;
            $student->first_and_last_name=$request->first_and_last_name;
            $student->email=$request->email;
            $student->username=$request->username;
            $student->PIN=$request->PIN;
            $student->password=Hash::make($password);
            dd($student->password);
            $student->save();
        }
}else{
            $student->user_type_id=$request->user_type_id;
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
        return redirect("/student");
    }
}
