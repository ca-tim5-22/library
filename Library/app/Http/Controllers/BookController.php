<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Alphabet;
use App\Models\Author;
use App\Models\Binding;
use App\Models\BookStatus;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use App\Models\Language;
use App\Models\Rent;
use App\Models\RentStatus;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\StatusesOfReservations;
use App\Models\Users;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    { $url= URL::previous();
        
        $book_headline=DB::select(DB::raw("SELECT * from galleries;"));
       
        if($request->paginate != null){
            $books = DB::table("books")->orderBy("title","ASC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $books = DB::table("books")->orderBy("title","ASC")->paginate($currentpag,"*","page");
            
        }
        $book_headline=(object) $book_headline;
        $categories_of_book = DB::select(DB::raw("SELECT * FROM book_categories;"));
        $authors_of_book =DB::select(DB::raw("SELECT * FROM book_authors;"));
        $authors = DB::select(DB::raw("SELECT * FROM authors;"));
        $categories = DB::select(DB::raw("SELECT * FROM categories;"));


        $status3=StatusesOfReservations::where("name","=","Rezervisano")->get()->first();
        $all_reservations=ReservationStatus::where("reservation_status_id","=",$status3->id)->get();
        $reservations=[];
        foreach($all_reservations as $reservation){
            $reservations[]=Reservation::findOrFail($reservation->reservation_id);
        }



         $status1=BookStatus::where('name','=','Izdato')->get()->first();
         $status2=BookStatus::where('name','=','U prekoracenju')->get()->first();
        $rent=RentStatus::where('book_status_id','=',$status1->id)->orWhere('book_status_id','=',$status2->id)->get();
        $rented=[];

        foreach($rent as $rentt){
            $rented[]=Rent::findOrFail($rentt->renting_id);
        }

        $users=Users::all();
        $preko=[];
        $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get()->first();
        $preko_=DB::table("rent_statuses")->where("book_status_id","=",$u_preko->id)->get(); 
        foreach ($preko_ as $prekoo){
            $prekoo=Rent::findOrFail($prekoo->renting_id);
            $preko[]=$prekoo;
        }

        return view("book.evidencijaKnjiga",compact("books","reservations","rented","currentpag","url","book_headline","categories_of_book","authors_of_book","authors","categories","preko"));
     
        
    }

    public function sort(Request $request)
    
    {  
       
        
        $url= URL::previous();
        
        $book_headline=DB::select(DB::raw("SELECT * from galleries;"));
        
        if($request->paginate != null){
            $books = DB::table("books")->orderBy("title","DESC")->paginate($request->paginate,"*","page");

            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $books = DB::table("books")->orderBy("title","DESC")->paginate($currentpag,"*","page");
            
        }
        $book_headline=(object) $book_headline;
        $categories_of_book = DB::select(DB::raw("SELECT * FROM book_categories;"));
        $authors_of_book =DB::select(DB::raw("SELECT * FROM book_authors;"));
        $authors = DB::select(DB::raw("SELECT * FROM authors;"));
        $categories = DB::select(DB::raw("SELECT * FROM categories;"));


        $status3=StatusesOfReservations::where("name","=","Rezervisano")->get()->first();
        $all_reservations=ReservationStatus::where("reservation_status_id","=",$status3->id)->get();
        $reservations=[];
        foreach($all_reservations as $reservation){
            $reservations[]=Reservation::findOrFail($reservation->reservation_id);
        }



         $status1=BookStatus::where('name','=','Izdato')->get()->first();
         $status2=BookStatus::where('name','=','U prekoracenju')->get()->first();
        $rent=RentStatus::where('book_status_id','=',$status1->id)->orWhere('book_status_id','=',$status2->id)->get();
        $rented=[];

        foreach($rent as $rentt){
            $rented[]=Rent::findOrFail($rentt->renting_id);
        }

        $users=Users::all();
        $preko=[];
        $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get()->first();
        $preko_=DB::table("rent_statuses")->where("book_status_id","=",$u_preko->id)->get(); 
        foreach ($preko_ as $prekoo){
            $prekoo=Rent::findOrFail($prekoo->renting_id);
            $preko[]=$prekoo;
        }

        return view("book.evidencijaKnjiga",compact("books","reservations","rented","currentpag","url","book_headline","categories_of_book","authors_of_book","authors","categories","preko"));
        
     
     
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::select(DB::raw("SELECT * FROM categories;"));
        $authors = DB::select(DB::raw("SELECT * FROM authors;"));
        $publishers = DB::select(DB::raw("SELECT * FROM publishers;"));
        $genres = DB::select(DB::raw("SELECT * FROM genres;"));
        $bindings = DB::select(DB::raw("SELECT * FROM bindings;"));
        $alphabets = DB::select(DB::raw("SELECT * FROM alphabets;"));
        $formats = DB::select(DB::raw("SELECT * FROM formats;"));
        $languages = DB::select(DB::raw("SELECT * FROM languages;"));

        return view("create.novaKnjiga",compact("categories","authors","publishers","genres","alphabets","bindings","formats","languages"));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

   if ($request->hasFile('book_photo')) {
    
    $categories=$request->valuesCategories[0];
    $genres=$request->valuesGenres[0];
    $authors=$request->valuesAuthors[0];


            $categories_array=explode(",",$categories);
       
            $genres_array=explode(",",$genres);
   
            $authors_array=explode(",",$authors);
        

      $alphabet=Alphabet::findOrFail($request->alphabet);
      $binding=Binding::findOrFail($request->binding);
      $publisher=Publisher::findOrFail($request->publisher);
      $format=Format::findOrFail($request->format);
      $language=Language::findOrFail($request->language);
      
     
        $category = Category::findOrFail($categories_array);
        $genre = Genre::findOrFail($genres_array);
        $author = Author::findOrFail($authors_array);

        $book=Book::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "number_of_pages"=>$request->number_of_pages,
            "release_date"=>$request->release_date,
            "total"=>$request->total,
            "ISBN"=>$request->ISBN

      ]);
        $alphabet->alphabet()->save($book);
        $binding->binding()->save($book);
        $publisher->publisher()->save($book);
        $format->format()->save($book);
        $language->language()->save($book);

        $book->categories()->attach($category);
        $book->genres()->attach($genre);
        $book->authors()->attach($author);
     
       foreach($request->files as $file){}
    
       for($i=0;$i<count($file);$i++){

        $photo=$file[$i];

        $photo_name_with_extension = $photo->getClientOriginalName();

        $photo_name = pathinfo($photo_name_with_extension, PATHINFO_FILENAME);
        $extension = $file[$i]->getClientOriginalExtension();
        $photonametostore = $photo_name.'_'.uniqid().'.'.$extension;

        Storage::put('public/book_images/'. $photonametostore, fopen($file[$i], 'r+'));
        if(count($file)==1){
            $gallery=Gallery::create([
                "photo"=>$photonametostore,
                "headline"=>1
            ]);
        }else{
            $gallery=Gallery::create([
                "photo"=>$photonametostore
            ]);
        }
      
       
        $book->gallery()->save($gallery);
       }
        }
     
       return redirect("/book");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book=Book::findOrFail($book->id);
        $id = $book->id;

       $notifications=$book->rent()->join('rent_statuses','rent_statuses.renting_id','=','rents.id')
       ->join('users as librarians','librarians.id','=','rents.user_who_rented_out_id')
       ->join('users as students','students.id','=','rents.user_who_rented_id')
       ->select('rents.*','rent_statuses.created_at','librarians.id as librarian_id','students.id as student_id','librarians.first_and_last_name as librarian','librarians.gender_id as gender','students.first_and_last_name as student')
       ->orderBy("created_at","desc")->get();


        $students=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=2 ORDER BY `users`.`first_and_last_name` ASC;"));
        $students = (object) $students;
        $librarian=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=1 ORDER BY `users`.`first_and_last_name` ASC;"));
        $librarian = (object) $librarian;
        $book_photos=DB::select(DB::raw("SELECT * from galleries "));
        $book_photos = (object) $book_photos;

        $naslovna =DB::table("galleries")->where("book_id", "=",$id)->where("headline","=",1)->get();
        
        $categories_of_book = $book->categories()->get();
        $authors_of_book = $book->authors()->get();
        $genres_of_book=$book->genres()->get();

        
        
        $bindings = DB::select(DB::raw("SELECT * FROM bindings;"));
      
        $alphabets = DB::select(DB::raw("SELECT * FROM alphabets;"));
  
        $publishers = DB::select(DB::raw("SELECT * FROM publishers;"));
        $languages = DB::select(DB::raw("SELECT * FROM languages;"));
        $formats = DB::select(DB::raw("SELECT * FROM formats;"));

        $izdato=DB::table("book_statuses")->where("name","=","Izdato")->get();
     $renteda=DB::table("rent_statuses")->where("book_status_id","=",$izdato[0]->id)->get();
     $users=Users::all();
     $rented_c=count($renteda);


        $reservation_count=$book->reservation_count();
         $overdue_count=$book->overdue_count();
         $rent_count=$book->rent_count()+$overdue_count;

    

        return view("book.knjigaOsnovniDetalji",compact("book","notifications","students","librarian","book_photos","categories_of_book","authors_of_book","genres_of_book","bindings","alphabets","publishers","formats","languages","naslovna","rented_c","reservation_count","overdue_count","rent_count"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book=Book::findOrFail($book->id);
      
        $categories_of_book = $book->categories()->get();
        $categories = DB::select(DB::raw("SELECT * FROM categories;"));
 foreach($categories_of_book as $category_of_book){

            for($i=0;$i<count($categories);$i++){

                if($category_of_book->id == $categories[$i]->id){
                   
                    unset($categories[$i]);
                    $categories=array_values($categories);
                    
                }

            }
        }
       

        $authors_of_book = $book->authors()->get();
        $authors = DB::select(DB::raw("SELECT * FROM authors;"));
        foreach($authors_of_book as $author_of_book){

            for($i=0;$i<count($authors);$i++){

                if($author_of_book->id == $authors[$i]->id){
                   
                    unset($authors[$i]);
                    $authors=array_values($authors);
                    
                }

            }
        }
        $genres_of_book=$book->genres()->get();
        $genres = DB::select(DB::raw("SELECT * FROM genres;"));
        foreach($genres_of_book as $genre_of_book){

            for($i=0;$i<count($genres);$i++){

                if($genre_of_book->id == $genres[$i]->id){
                   
                    unset($genres[$i]);
                    $genres=array_values($genres);
                    
                }

            }
        }


        $bindings = DB::select(DB::raw("SELECT * FROM bindings;"));
      
        $alphabets = DB::select(DB::raw("SELECT * FROM alphabets;"));
  
        $publishers = DB::select(DB::raw("SELECT * FROM publishers;"));

        $formats = DB::select(DB::raw("SELECT * FROM formats;"));

        $languages = DB::select(DB::raw("SELECT * FROM languages;"));
       





        return view("edit.editKnjiga",compact("book","authors","publishers","categories","bindings","alphabets","formats","genres","categories_of_book","authors_of_book","genres_of_book","languages"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        
        $book=Book::findOrFail($book->id);


        $categories=$request->category_id;
       
        $genres=$request->genres_id;
        $authors=$request->author_id;
        
      
       
                $book->title=$request->title;
                $book->content=$request->content;
                $book->number_of_pages=$request->number_of_pages;
                $book->release_date=$request->release_date;
                $book->total=$request->total;
                $book->ISBN=$request->ISBN;
        
         $book->save();

         if($book->binding_id != $request->binding){
            $binding=Binding::findOrFail($request->binding);
            $book->binding()->sync([]);
            $binding->binding()->save($book);
        }
        
        if($book->publisher_id != $request->publisher){
            $publisher=Publisher::findOrFail($request->publisher);
            $book->binding()->sync([]);
            $publisher->publisher()->save($book);
        }
            $current_categories=$book->categories()->get();

            $book->categories()->sync([]);
            $book->categories()->attach($categories);

            $current_genres=$book->genres()->get();

            $book->genres()->sync([]);
            $book->genres()->attach($genres);

            $current_authors=$book->authors()->get();

            $book->authors()->sync([]);
            $book->authors()->attach($authors);
            
           return redirect("/book");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book=Book::findOrFail($book->id);
        $book->authors()->sync([]);
        $book->genres()->sync([]);
        $book->categories()->sync([]);
        $book->gallery()->delete();
        $book->delete();

        return redirect("/book");
    }

    public function delete_more($ids)
    {
        foreach($ids as $id){
            $book=Book::findOrFail($id);
        $book->authors()->sync([]);
        $book->genres()->sync([]);
        $book->categories()->sync([]);
        $book->gallery()->delete();
        $book->delete();
        }
        

        return redirect("/book");
    }
}
