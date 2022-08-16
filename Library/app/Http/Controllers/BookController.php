<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Alphabet;
use App\Models\Author;
use App\Models\Binding;
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

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    { $url= URL::previous();
        

     
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
        
        return view("book.evidencijaKnjiga",compact("books","currentpag","url"));
     
        
    }

    public function sort(Request $request)
    
    {  
       
        
        $url= URL::previous();
        if($request->paginate != null){
            $books = DB::table("books")->orderBy("title","DESC")->paginate($request->paginate,"*","page");
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            return view("book.evidencijaKnjiga",compact("books","currentpag","url"));
          
        }else{
            
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            $books = DB::table("books")->orderBy("title","DESC")->paginate($currentpag,"*","page");
            return view("book.evidencijaKnjiga",compact("books","currentpag","url"));
        }
        
       
       
     
        
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
        return view("create.novaKnjiga",compact("categories","authors","publishers","genres","alphabets","bindings","formats"));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
    dd($request);
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
        
        $book->categories()->attach($category);
        $book->genres()->attach($genre);
        $book->authors()->attach($author);
     
     
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

        $students=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=1 ORDER BY `users`.`first_and_last_name` ASC;"));
        $students = (object) $students;
        $librarian=DB::select(DB::raw("SELECT * FROM users WHERE user_type_id=2 ORDER BY `users`.`first_and_last_name` ASC;"));
        $librarian = (object) $librarian;

        return view("book.knjigaOsnovniDetalji",compact("book","students","librarian"));
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

       





        return view("edit.editKnjiga",compact("book","authors","publishers","categories","bindings","alphabets","formats","genres","categories_of_book","authors_of_book","genres_of_book",));
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
        $book->delete();

        return redirect("/book");
    }
}
