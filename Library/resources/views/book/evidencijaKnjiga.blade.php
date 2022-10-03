<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="ICT Cortex Library - project for high school students..." />
    <meta name="keywords" content="ict cortex, cortex, bild, bildstudio, highschool, students, coding" />
    <meta name="author" content="bildstudio" />
    <!-- End Meta -->

    <!-- Title -->
    <title>Profile | Library - ICT Cortex student project</title>
    @include('includes.layout.icon')
    <!-- End Title -->

   @include('includes.layout.icon') <!-- Styles -->
    @include('includes.layout.styles')
    <!-- End Styles -->
</head>

<body onload="load();" class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    @include('includes.layout.header')
    <!-- Header -->

    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        <!-- Sidebar -->
        @include('includes.layout.sidebar')
        <!-- End Sidebar -->

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <h1 class="pl-[30px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
                    Knjige
                </h1>
            </div>
            <!-- Space for content -->
            <div class="scroll height-evidencija">
                <div class="flex items-center justify-between px-[30px] py-4 space-x-3 rounded-lg">
                    <a href="{{route('book.create');}}"
                        class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-plus mr-[15px]"></i> Nova knjiga
                    </a>
                    <div class="flex items-center">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </span>
                            <input type="text" name="search" id="filter"
                                class="py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                                placeholder="Search..." autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- Space for content -->
                <div class="px-[30px] pt-2 bg-white">
                    <div class="w-full mt-2">
                        <!-- Table -->
                        <table class="w-full overflow-hidden shadow-lg rounded-xl" id="myTable">
                            <!-- Table head-->
                            <thead class="bg-[#EFF3F6]">
                                <tr class="border-b-[1px] border-[#e4dfdf]">
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" id="all_checked" class="form-checkbox">
                                        </label>
                                    </th>
                                    <th id="default_checked" class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">
                                        Naziv knjige
                                        <a 
                                @if (Route::current()->getName() == "book.index")
                                    href="{{route('book.sort');}}"
                                    @elseif(Route::current()->getName() == "book.sort")
                                    href="{{route('book.index');}}"
                                @endif
                                >

                                @if (Route::current()->getName() == "book.index")
                                    <i class="ml-3 fa-lg fas fa-long-arrow-alt-down"></i>

                                    @elseif(Route::current()->getName() == "book.sort")
                                     <i class="ml-3 fa-lg fas fa-long-arrow-alt-up"></i>
                                @endif
                                
                                
                                
                                </a>
                                    </th>

                                    <!-- Autor + dropdown filter for autor -->
                                    <th id="default_checked" id="autoriMenu"
                                        class=" px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer ">
                                        Autor<i id="autoriMenu" class="ml-2 fas fa-filter"></i>

                                        <div id="autoriDropdown" style="top:298px;z-index:100;"
                                            class="autoriMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input  class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search"
                                                        
                                                        id="searchAutori"><br>
                                                    
                                                </li>
                                                <div class="h-[200px] scroll font-normal">
                                                   
                                                    @foreach ($authors as $auth)
                                                        
                                                   
                                                    <li class="filter_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input id="autor" type="checkbox" class="absolute opacity-0 filter_name" value="{{$auth->first_and_last_name}}" >
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            {{$auth->first_and_last_name}}
                                                        </p>
                                                    </li>

                                                        @endforeach
                                                </div>
                                            </ul>
                                            
                                        </div>
                                    </th>

                                    <!-- Kategorija + dropdown filter for kategorija -->
                                    <th id="default_checked" id="kategorijeMenu" class=" px-4 py-4 text-sm leading-4 tracking-wider text-left">Kategorija<i style="cursor: pointer;" id="kategorijeMenu"
                                            class="ml-2 fas fa-filter"></i>
                                        <div style="top:298px;" id="kategorijeDropdown" style="z-index:999;" class="kategorijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search"
                                                        
                                                        id="searchKategorije"><br>
                                                   
                                                </li>
                                                <div class="h-[200px] scroll font-normal">
                                                    @foreach ($categories as $category)
                                                        
                                                    
                                                    <li class="filter_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input id="kategorija" type="checkbox" class="absolute opacity-0 filter_name" value="{{$category->name}}">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            {{$category->name}}
                                                        </p>
                                                    </li>
@endforeach
                                                    
                                                </div>
                                            </ul>
                                           
                                        </div>
                                    </th>
                                    <th id="default_checked"  class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Na raspolaganju
                                    </th>
                                    <th id="default_checked"  class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervisano</th>
                                    <th id="default_checked"  class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato</th>
                                    <th id="default_checked"  class="px-4 py-4 text-sm leading-4 tracking-wider text-left">U prekoracenju</th>
                                    <th id="default_checked"  class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Ukupna kolicina
                                    </th>
                                    <th id="default_checked"  class="px-4 py-4"> </th>

                                    <th id="if_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                       <form action="" id="del_form" >
                                        @csrf
                                        @method("GET")
                                            <button style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" type="submit" name="submit">Izbriši knjige</button>
                                    
                                    </form> 
                                    </th>
                                    <th id="if_checked"  class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>
                                    <th id="if_checked"  class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>
                                    <th id="if_checked"  class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>
                                    <th id="if_checked"  class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>
                                    <th id="if_checked"  class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>
                                    <th id="if_checked"  class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>
                                    <th id="if_checked"  class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>
                                    <th id="if_checked"  class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>


                                    <th id="if_one_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class=" none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <a href="" id="det">
                                        Pogledaj detalje</a>
                                    </th>
                                    <th id="if_one_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class=" none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <a href="" id="cha">Izmijeni knjigu</a>
                                    </th>
                                    <th id="if_one_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class=" none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <a href="" id="aba">Otpiši knjigu</a>
                                    </th>
                                    <th id="if_one_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class=" none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <a href="" id="rent">Izdaj knjigu</a>
                                    </th>
                                    <th id="if_one_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class=" none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <a href="" id="ret">Vrati knjigu</a>
                                    </th>
                                    <th id="if_one_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class=" none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <a href="" id="res">Rezerviši knjigu</a>
                                    </th>
                                    <th id="if_one_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class=" none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <form id="del_form" method="post" action="">
                                            @csrf
                                            
                                            <button style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" type="submit" name="submit">Izbriši knjigu</button>
                                        </form>
                                    </th>
                                    <th id="if_one_checked"  class=" none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>
                                    <th id="if_one_checked"  class=" none  px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        
                                    </th>

                                </tr>
                            </thead>
                            
                                    
                            <tbody class="bg-white">
                            
                                @foreach ($books as $book)
                                
                                <?php $prekoracenje=0;
                                $rentedd=0;
                                $reserved=0;?>
                                    <tr id="trazi" class="trazi hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-4 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" id="table_checkboxes" class="form-checkbox" data-book-id="{{$book->id}}">
                                        </label>
                                    </td>
                                    <td id="naslov" class="flex flex-row items-center px-4 py-4">
                                        @foreach ($book_headline as $photo)
                                        @if ($photo->book_id == $book->id && $photo->headline == 1)
                                        <img class="object-cover w-8 mr-2 h-11" src="{{asset('storage/book_images/'.$photo->photo);}}" alt="" />
                                        @endif
                                       
                                        @endforeach
                                        
                                        <a href="{{route('book.show',$book->id)}}">
                                            <span class="font-medium text-center">{{$book->title}}</span>
                                        </a>
                                    </td>
                                    <td id="aut" class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    @foreach ($authors as $author)
                                       @foreach ($authors_of_book as $author_of_book)
                                           @if ($author->id == $author_of_book->author_id && $author_of_book->book_id == $book->id)
                                               <p class="autor_ime">{{$author->first_and_last_name}}</p>
                                           @endif
                                       @endforeach
                                    @endforeach
                                </td>
                                    <td id="kat" class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    
                                        @foreach ($categories as $category)
                                      
                                        @foreach ($categories_of_book as $category_of_book)
                                            @if ($category->id == $category_of_book->category_id && $category_of_book->book_id == $book->id )
                                               
                                                
                                                <span  class="kategorija_ime">{{$category->name}}</span>
                                                &nbsp;
                                            @endif
                                           
                                            
                                        @endforeach
                                     @endforeach

                                     @foreach($rented as $rent)
                                     @if($book->id==$rent->book_id)
                                     <?php $rentedd++; ?>
                                     @endif
                                     @endforeach

                                     @foreach($reservations as $reservation)
                                     @if($book->id==$reservation->book_id)
                                     <?php $reserved++; ?>
                                     @endif
                                     @endforeach


                                    </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$book->total-($reserved+$rentedd)}}</td>
                                    <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('reservation.active',$book->id)}}" >

                                    
                                            {{$reserved}}
                                        
                                        
                                        
                                        </td>
                                    <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                            href="{{route('rent.rented',$book->id);}}">

                                 
                                            {{$rentedd}}
                                            
                                        </td>
                                    <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                            href="{{route('rent.overdue',$book->id)}}" >

                                           @foreach($preko as $prekoo)
                                        @if($book->id==$prekoo->book_id)
                                        <?php $prekoracenje++; ?>
                                        @endif
                                        @endforeach
                                        {{$prekoracenje}}
                                        
                                        
                                        
                                        </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$book->total}}</td>
                                    <td class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p style="position:relative;" class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsKnjige hover:text-[#606FC7]">
                                            <i
                                                class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div style="right:80px;"
                                            class="absolute z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-knjige">
                                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                aria-labelledby="headlessui-menu-button-1"
                                                id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">

                                                    <a href="{{route("book.show",$book->id);}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Pogledaj detalje</span>
                                                    </a>

                                                    <a href="{{route("book.edit",$book->id)}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fas fa-edit mr-[6px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izmijeni knjigu</span>
                                                    </a>

                                                    <a href="{{route("abandon_index",$book->id);}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Otpisi knjigu</span>
                                                    </a>

                                                    <a href="{{route('rent.new',$book->id);}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izdaj knjigu</span>
                                                    </a>

                                                    <a href="{{route('return_index',$book->id);}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Vrati knjigu</span>
                                                    </a>

                                                    <a href="{{route('reservation.new',$book->id)}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Rezervisi knjigu</span>
                                                    </a>
                                                    <form method="POST" action="{{route("book.destroy",$book->id)}}">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" name="submit" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izbrisi knjigu</span>
                                                    </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                               
                                
                            </tbody>
                        </table>

                        <div class="flex flex-row items-center justify-end my-3">
                    
                       
                                
                            <div> 
                            @if (URL::current() == "http://127.0.0.1:8000/booksort")
                                 <form style="margin-right:20px;" id="formica" method="POST" action="{{route("book.sort")}}">
                                 @else
                                <form style="margin-right:20px;" id="formica" method="POST" action="{{route("book.index")}}">
                            @endif
                           
                            @csrf
                            @method("GET")
                             <select onchange="this.form.submit()" id="selectica" form="formica" 
                                    class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
                                    name="paginate">

                                    @if (isset($currentpag))
                                    @if ($currentpag == 2)
                                    <option id="selecticaoption" value="2" disabled selected>2</option>
                                    <option id="selecticaoption" value="4">4</option>
                                    <option id="selecticaoption" value="6">6</option>
                                    <option id="selecticaoption" value="8">8</option>
                                    <option id="selecticaoption" value="10">10</option>
                                    @endif
                                    @if ($currentpag == 4)
                                    <option id="selecticaoption" value="2" >2</option>
                                    <option id="selecticaoption" value="4" disabled selected>4</option>
                                    <option id="selecticaoption" value="6">6</option>
                                    <option id="selecticaoption" value="8">8</option>
                                    <option id="selecticaoption" value="10">10</option>
                                    @endif

                                    @if ($currentpag == 6)
                                        <option id="selecticaoption" value="2" >2</option>
                                    <option id="selecticaoption" value="4">4</option>
                                    <option id="selecticaoption" value="6"  disabled selected>6</option>
                                    <option id="selecticaoption" value="8">8</option>
                                    <option id="selecticaoption" value="10">10</option>
                                    @endif

                                    @if ($currentpag == 8)
                                        <option id="selecticaoption" value="2" >2</option>
                                    <option id="selecticaoption" value="4">4</option>
                                    <option id="selecticaoption" value="6" >6</option>
                                    <option id="selecticaoption" value="8"  disabled selected>8</option>
                                    <option id="selecticaoption" value="10">10</option>
                                    @endif

                                    @if ($currentpag == 10)
                                        <option id="selecticaoption" value="2" >2</option>
                                    <option id="selecticaoption" value="4" >4</option>
                                    <option id="selecticaoption" value="6">6</option>
                                    <option id="selecticaoption" value="8">8</option>
                                    <option id="selecticaoption" value="10" disabled selected>10</option>
                                    @endif

                                        @else
                                
                                    @endif
                                  
                                </select> 
                                
                                </form>
                              
     
                        </div>  
                                <p class="inline text-md">
                                
                                  {{ $books->onEachSide($currentpag)->links("vendor\pagination.tailwind") }}
                                </p>

                    </div>
                </div>
            </div>

        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
    <script>

        const checkboxes = document.querySelectorAll("#table_checkboxes");
        var if_checked = document.querySelectorAll("#if_checked");
        var default_checked = document.querySelectorAll("#default_checked");
        var if_one_checked =  document.querySelectorAll("#if_one_checked");
        var all_checked = document.getElementById("all_checked");
        
        var i = 0;
        function load(){
                const checkboxes = document.querySelectorAll("#table_checkboxes");
                var if_checked = document.querySelectorAll("#if_checked");
        var default_checked = document.querySelectorAll("#default_checked");
        var if_one_checked =  document.querySelectorAll("#if_one_checked");
        var all_checked = document.getElementById("all_checked");
                
                if(all_checked.checked == true){
                    all_checked.click();
                }
                checkboxes.forEach(e=>{
                    if(e.checked == true){
                        e.click();
                    }
                });
                default_checked.forEach(l =>{
                        l.classList.remove("none");
                    });
                    if_one_checked.forEach(o =>{
                        o.classList.add("none");
                    })
                    if_checked.forEach(p =>{
                        p.classList.add("none")
                    });
               }
        all_checked.addEventListener("change",()=>{
            var nmb_of_checked = document.querySelectorAll("#table_checkboxes:checked").length
            var is = document.getElementById("all_checked");
           if(is.checked == true){
            checkboxes.forEach(e => {
                if(e.checked == false){
                    e.click();
                }
            })
           }else{
            checkboxes.forEach(e => {
                if(e.checked == true){
                    e.click();
                }
            })
           }
            
        })
        checkboxes.forEach(e => {
            e.addEventListener("change",()=>{
                
                var is = document.getElementById("all_checked");
                var nmb_of_checked = document.querySelectorAll("#table_checkboxes:checked").length
              
                if(nmb_of_checked == 1){
                    var show = document.getElementById("det");
                    var edit = document.getElementById("cha");
                    var del = document.getElementById("del_form");
                    var aba = document.getElementById("aba");
                    var rent = document.getElementById("rent");
                    var ret = document.getElementById("ret");
                    var res = document.getElementById("res");
                    var id = e.dataset.bookId;
            
           
            show.setAttribute("href","http://127.0.0.1:8000/book/"+id);
            edit.setAttribute("href","http://127.0.0.1:8000/book/"+id+"/edit");
            aba.setAttribute("href","http://127.0.0.1:8000/abandonbookindex/"+id);
            rent.setAttribute("href","http://127.0.0.1:8000/newrent/"+id);
            res.setAttribute("href","http://127.0.0.1:8000/newreservation/"+id);
            ret.setAttribute("href","http://127.0.0.1:8000/returnbookindex/"+id)
            del.setAttribute("action","http://127.0.0.1:8000/book/"+id);
                   
                   
                    default_checked.forEach(l =>{
                        l.classList.add("none");
                    });
                    if_checked.forEach(p =>{
                        p.classList.add("none")
                    })
                    if_one_checked.forEach(o =>{
                        o.classList.remove("none");
                    })
                }else if(nmb_of_checked > 1){
                    var delete_more = document.getElementById("del_form");
                    var checked = document.querySelectorAll("#table_checkboxes:checked");
                    var ids="";
                    checked.forEach(checked =>{
                            ids += "-"+checked.dataset.bookId;
                    })
            
            ids = ids.slice(1);
            delete_more.setAttribute("action","http://127.0.0.1:8000/deletebooks/"+ids);
                    default_checked.forEach(l =>{
                        l.classList.add("none");
                    });
                    if_one_checked.forEach(o =>{
                        o.classList.add("none");
                    })
                    if_checked.forEach(p =>{
                        p.classList.remove("none")
                    })
                }else if (nmb_of_checked == 0){
                    default_checked.forEach(l =>{
                        l.classList.remove("none");
                    });
                    if_one_checked.forEach(o =>{
                        o.classList.add("none");
                    })
                    if_checked.forEach(p =>{
                        p.classList.add("none")
                    });
                
                }
            })
          
        });
        
                </script>
    <!-- Notification for small devices -->
    @include('includes.layout.inProgress')


    <!-- Scripts -->
    @include('includes.layout.scripts')
    <!-- End Scripts -->

</body>

</html>