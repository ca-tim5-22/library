<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage; 
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\BookStatus;
use App\Models\GlobalVariable;
use App\Models\Rent;
use App\Models\Reservation;
use App\Models\StatusesOfReservations;
use App\Models\User;
use App\Models\UserLogin;
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


        $logins=UserLogin::all();
      




        return view("student.ucenik",compact("all_students","logins","currentpag","url"));
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
        $number_of_logins="Nema loginova";
      
        $student=Users::findOrFail($student->id);

        $last_login=UserLogin::where('user_id','=',$student->id)->orderBy('time','desc')->get()->first();
       
        if($last_login)
        $last_login = $last_login->time;
        else
        $last_login="Nema loginova";

        $number_of_logins = DB::select(DB::raw("SELECT * FROM `user_logins` WHERE user_id = $student->id;"));
        $number_of_logins = count($number_of_logins);

      
            return view("student.ucenikProfile",compact("student","number_of_logins","last_login")); 
        
        
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



    public function rented($student)
    {
        $student=Users::findOrFail($student);

        $status1=BookStatus::where("name","=","U prekoracenju")->get()->first();
        $status2=BookStatus::where("name","=","Izdato")->get()->first();
    

        $rents =$student->userWhoRented()->join('rent_statuses', 'rent_statuses.renting_id', '=', 'rents.id')
        ->join('users as u1','u1.id','=','rents.user_who_rented_id')
        ->join('users as u2','u2.id','=','rents.user_who_rented_out_id')
        ->join('books','books.id','=','rents.book_id')
        ->join('galleries','galleries.book_id','=','rents.book_id')
        ->select('rents.*', 'rent_statuses.book_status_id as status','u1.first_and_last_name as student','u2.first_and_last_name as librarian','books.title','galleries.photo')
        ->whereIn('rent_statuses.book_status_id',[$status1->id,$status2->id])->get();
      
 
        return view('student.ucenikIzdate',compact('student','rents'));
    }

    public function overdue($student)
    {
        $student=Users::findOrFail($student);

        $status=BookStatus::where("name","=","U prekoracenju")->get()->first();    

        $overdues =$student->userWhoRented()
        ->join('rent_statuses', 'rent_statuses.renting_id', '=', 'rents.id')
        ->join('users','users.id','=','rents.user_who_rented_id')
        ->join('books','books.id','=','rents.book_id')->join('galleries','galleries.book_id','=','rents.book_id')
        ->select('rents.*', 'users.first_and_last_name as student','books.title','galleries.photo')
        ->whereIn('rent_statuses.book_status_id',[$status->id])->get();
    
        return view('student.ucenikPrekoracenje',compact('student','overdues'));
    }

    public function returned($student)
    {
        $student=Users::findOrFail($student);
          
        $status1=BookStatus::where("name","=","Vraceno")->get()->first();
        $status2=BookStatus::where("name","=","Vraceno sa prekoracenjem")->get()->first();       
        $returned =$student->userWhoRented()
        ->join('rent_statuses', 'rent_statuses.renting_id', '=', 'rents.id')
        ->join('users as u1','u1.id','=','rents.user_who_rented_id')
        ->join('users as u2','u2.id','=','rents.user_who_received_back_id')
        ->join('books','books.id','=','rents.book_id')->join('galleries','galleries.book_id','=','rents.book_id')
        ->select('rents.*', 'u1.first_and_last_name as student','u2.first_and_last_name as librarian','rent_statuses.updated_at','rent_statuses.book_status_id','books.title','galleries.photo')
        ->whereIn('rent_statuses.book_status_id',[$status1->id,$status2->id])->get();

        return view('student.ucenikVracene',compact('student','returned'));
    }

    public function active($student)
    {
        $student=Users::findOrFail($student);

        $status1=StatusesOfReservations::where("name","=","Rezervisano")->get()->first();
        $status2=StatusesOfReservations::where("name","=","Odbijeno")->get()->first();
        
        $deadline=GlobalVariable::where('variable','=','Reservation_deadline')->get()->first()->value;
           
        $active =$student->forUser()->join('reservation_statuses', 'reservation_statuses.reservation_id', '=', 'reservations.id')
        ->join('users','users.id','=','reservations.foruser_id')
        ->join('books','books.id','=','reservations.book_id')
        ->join('galleries','galleries.book_id','=','reservations.book_id')
        ->select('reservations.*', 'reservation_statuses.reservation_status_id as status','users.photo as student_img','users.first_and_last_name as student','books.title','galleries.photo')
        ->whereIn('reservation_statuses.reservation_status_id',[$status1->id,$status2->id])->get();

        return view('student.ucenikAktivne',compact('student','active','deadline'));
    }

    public function archive($student)
    {
        $student=Users::findOrFail($student);

        $status1=StatusesOfReservations::where("name","=","Rezervacija istekla")->get()->first();
        $status2=StatusesOfReservations::where("name","=","Izdato")->get()->first();
        $status3=StatusesOfReservations::where("name","=","Rezervacija otkazana")->get()->first();
        
        $deadline=GlobalVariable::where('variable','=','Reservation_deadline')->get()->first()->value;
           
        $archive =$student->forUser()->join('reservation_statuses', 'reservation_statuses.reservation_id', '=', 'reservations.id')
        ->join('users','users.id','=','reservations.foruser_id')
        ->join('books','books.id','=','reservations.book_id')
        ->join('galleries','galleries.book_id','=','reservations.book_id')
        ->select('reservations.*', 'reservation_statuses.reservation_status_id as status','users.photo as student_img','users.first_and_last_name as student','books.title','galleries.photo')
        ->whereIn('reservation_statuses.reservation_status_id',[$status1->id,$status2->id,$status3->id])->get();


        return view('student.ucenikArhivirane',compact('student','archive','deadline'));
    }
}
