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
    @include('includes\layout\icon')
    <!-- End Title -->

   @include('includes\layout\icon') <!-- Styles -->
    @include('includes\layout\styles')
    <!-- End Styles -->
</head>

<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    @include('includes\layout\header')
    <!-- Header -->

    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        <!-- Sidebar -->
        @include('includes\layout\sidebar')
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
                            <input type="search" name="q"
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
                                            <input type="checkbox" class="form-checkbox checkAll">
                                        </label>
                                    </th>
                                    <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">
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
                                    <th id="autoriMenu"
                                        class=" px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer ">
                                        Autor<i class="ml-2 fas fa-filter"></i>

                                        <div id="autoriDropdown" style="top:298px;"
                                            class="autoriMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search"
                                                        onkeyup="filterFunction('searchAutori', 'autoriDropdown')"
                                                        id="searchAutori"><br>
                                                    <button
                                                        class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </li>
                                                <div class="h-[200px] scroll font-normal">
                                                   
                                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            Autor Autorovic 6
                                                        </p>
                                                    </li>


                                                </div>
                                            </ul>
                                            <div class="flex pt-[10px] text-white ">
                                                <a href="#"
                                                    class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                                </a>
                                                <a href="#"
                                                    class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <!-- Kategorija + dropdown filter for kategorija -->
                                    <th id="kategorijeMenu" class=" px-4 py-4 text-sm leading-4 tracking-wider text-left">Kategorija<i
                                            class="ml-2 fas fa-filter"></i>
                                        <div style="top:298px;" id="kategorijeDropdown" style="z-index:999;" class="kategorijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search"
                                                        onkeyup="filterFunction('searchKategorije', 'kategorijeDropdown')"
                                                        id="searchKategorije"><br>
                                                    <button
                                                        class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </li>
                                                <div class="h-[200px] scroll font-normal">
                                                    
                                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            Trileri
                                                        </p>
                                                    </li>

                                                    
                                                </div>
                                            </ul>
                                            <div class="flex pt-[10px] text-white ">
                                                <a href="#"
                                                    class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                                </a>
                                                <a href="#"
                                                    class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Na raspolaganju
                                    </th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervisano</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">U prekoracenju</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Ukupna kolicina
                                    </th>
                                    <th class="px-4 py-4"> </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php $prekoracenje=0;?>
                                @foreach ($books as $book)
                                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-4 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox checkOthers">
                                        </label>
                                    </td>
                                    <td class="flex flex-row items-center px-4 py-4">
                                        @foreach ($book_headline as $photo)
                                        @if ($photo->book_id == $book->id && $photo->headline == 1)
                                        <img class="object-cover w-8 mr-2 h-11" src="{{asset('storage/book_images/'.$photo->photo);}}" alt="" />
                                        @endif
                                       
                                        @endforeach
                                        
                                        <a href="{{route('book.show',$book->id)}}">
                                            <span class="font-medium text-center">{{$book->title}}</span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    @foreach ($authors as $author)
                                       @foreach ($authors_of_book as $author_of_book)
                                           @if ($author->id == $author_of_book->author_id && $author_of_book->book_id == $book->id)
                                               <p>{{$author->first_and_last_name}}</p>
                                           @endif
                                       @endforeach
                                    @endforeach
                                </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    
                                        @foreach ($categories as $category)
                                      
                                        @foreach ($categories_of_book as $category_of_book)
                                            @if ($category->id == $category_of_book->category_id && $category_of_book->book_id == $book->id )
                                               
                                                
                                                {{$category->name}}
                                                &nbsp;
                                            @endif
                                           
                                            
                                        @endforeach
                                     @endforeach


                                    </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$book->total - $book->rented}}</td>
                                    <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                            href="aktivneRezervacije.php">Rezervisano</td>
                                    <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                            href="{{route('rent.index');}}">{{$book->rented}}</td>
                                    <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                            href="knjigePrekoracenje.php">

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

                                                    <a href="otpisiKnjigu.php" tabindex="0"
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

                                                    <a href="rezervisiKnjigu.php" tabindex="0"
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

    <!-- Notification for small devices -->
    @include('includes\layout\inProgress')


    <!-- Scripts -->
    @include('includes\layout\scripts')
    <!-- End Scripts -->

</body>

</html>