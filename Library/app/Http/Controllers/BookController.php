<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Alphabet;
use App\Models\Binding;
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
            $currentpag=$request->paginate;
            return view("book.evidencijaKnjiga",compact("books","currentpag","url"));
        }else{
            $books = DB::table("books")->orderBy("title","ASC")->paginate(2,"*","page");
            $currentpag=2;
            return view("book.evidencijaKnjiga",compact("books","currentpag","url"));
        }
       
       
     
        
    }

    public function sort(Request $request)
    
    {  
       
        
        
        $url= URL::previous();
        if($request->paginate != null){
            $books = DB::table("books")->orderBy("title","DESC")->paginate($request->paginate,"*","page");
            $currentpag=$request->paginate;
            return view("book.evidencijaKnjiga",compact("books","currentpag","url"));
        }else{
            $books = DB::table("books")->orderBy("title","DESC")->paginate(2,"*","page");
            $currentpag=2;
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
    
       $book=Book::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "number_of_pages"=>$request->number_of_pages,
            "release_date"=>$request->release_date,
            "total"=>$request->total,
            "ISBN"=>$request->ISBN

      ]);
      $alphabet=Alphabet::findOrFail($request->alphabet);
      $alphabet->alphabet()->save($book);

      $binding=Binding::findOrFail($request->binding);
      $binding->binding()->save($book);

      $publisher=Publisher::findOrFail($request->publisher);
      $publisher->publisher()->save($book);

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
        return view("book.knjigaOsnovniDetalji");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
