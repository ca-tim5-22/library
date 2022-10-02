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
                    Izdavanje knjiga
                </h1>
            </div>
            <!-- Space for content -->
            <div class="scroll height-dashboard">
                <div class="flex items-center px-6 py-4 space-x-3 rounded-lg ml-[292px]">
                    <div class="flex items-center">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <input type="text" name="search" id="filter"
                                class="py-2 pl-2 text-sm text-white bg-white border-2 border-gray-200 rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                                placeholder="Pretrazi knjige..." autocomplete="off">
                        </div>
                    </div>
                    <a href="{{route('book.create');}}"
                        class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">Pretrazi
                    </a>
                </div>
                <div>
                    <!-- Space for content -->
                    <div class="flex justify-start pt-3 bg-white">
                        <div class="mt-[10px]">
                            <ul class="text-[#2D3B48]">
                                <li class="mb-[4px]">
                                    <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px]  flex justify-between fill-current">
                                            <div
                                                class="py-[15px] px-[20px] w-[268px] cursor-pointer bg-[#EFF3F6] rounded-[10px]">
                                                <a href="{{route('rent.index');}}" aria-label="Sve knjige"
                                                    class="flex items-center">
                                                    <i
                                                        class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[#576cdf] far fa-copy text-[20px]"></i>
                                                    <div>
                                                        <p
                                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[#576cdf] text-[15px] ml-[18px]">
                                                            Izdate knjige</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                                <li class="mb-[4px]">
                                    <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href=" {{route('rent.returned_index');}}" aria-label="Izdate knjige"
                                                    class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] fas fa-file transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[21px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Vracene knjige</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                                <li class="mb-[4px]">
                                    <div class="w-[300px] pl-[28px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="{{route('overdue_index');}}" aria-label="Knjige na raspolaganju"
                                                    class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] fas fa-exclamation-triangle transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[17px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Knjige u prekoracenju</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                                <li class="mb-[4px]">
                                    <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="{{route('active');}}" aria-label="Rezervacije"
                                                    class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] far fa-calendar-check transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Aktivne rezervacije</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                                <li class="mb-[4px]">
                                    <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="{{route('archive');}}" aria-label="Rezervacije"
                                                    class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] fas fa-calendar-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Arhivirane rezervacije</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="w-full mt-[10px] ml-2 px-2">

                     {{--     <div class="flex">
                             <pre>
                                <?php  print_r($rented_book_info);
                                ?>
                            </pre>

                    
                            <pre>
                                <?php  print_r($rented);
                                ?>
                            </pre>
</div>  --}}
<form id="r_a_form" action="" method="POST">
    @csrf
    @method("GET")
                            <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf]" id="myTable">
                                <thead class="bg-[#EFF3F6]">
                                   
                                   
                                    <tr class="border-b-[1px] border-[#e4dfdf]">
                                        <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" class="form-checkbox" id="all_checked">
                                            </label>
                                        </th>
                                        <th id="default_checked" class="px-4 py-4 leading-4 tracking-wider text-left">
                                            Naziv knjige
                                            <a 
                                @if (Route::current()->getName() == "rent.index")
                                    href="{{route('rent.sort');}}"
                                    @elseif(Route::current()->getName() == "rent.sort")
                                    href="{{route('rent.index');}}"
                                @endif
                                >

                                @if (Route::current()->getName() == "rent.index")
                                    <i class="ml-3 fa-lg fas fa-long-arrow-alt-down"></i>

                                    @elseif(Route::current()->getName() == "rent.sort")
                                     <i class="ml-3 fa-lg fas fa-long-arrow-alt-up"></i>
                                @endif
                                
                                
                                
                                </a>
                                        </th>
                                        <!-- Izdato uceniku + dropdown filter for ucenik -->
                                        <th id="default_checked" 
                                            class=" px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">
                                            Izdato uceniku <i style="position:relative;" class="ml-2 fas fa-filter"></i>
                                            <div id="uceniciDropdown" style="position:absolute;z-index: 999;top:300px;"
                                                class="uceniciMenu hidden rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
                                                <ul class="border-b-2 border-gray-300 list-reset">
                                                    <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                        <input
                                                            class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                            placeholder="Search"
                                                            id="searchUcenika"
                                                            id="searchUcenici"><br>
                                                        <button
                                                            class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </li>
                                                    <div class="h-[200px] scroll font-normal">
                                                        

                                                        @foreach ($s as $student)
                                                        
                                                          <li class="u_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                                            <label class="flex items-center justify-start">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                    <input id="zaucenika" type="checkbox" class="izdato absolute opacity-0" value="{{$student->first_and_last_name}}">
                                                                    <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                            @if ($student->photo != null)
                                                                <img  style="max-width:40px;max-height:30px;border-radius:50%;"
                                                                class="ml-[15px] rounded-full"
                                                                src="{{asset('storage/student_images/crop/'.$student->photo);}}">
                                                                @else
                                                                <img width="40px" height="30px"
                                                                class="ml-[15px] rounded-full"
                                                                src="profileExample.jpg">
                                                            @endif
                                                            
                                                            <p
                                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                                {{$student->first_and_last_name}}
                                                            </p>
                                                        </li>
                                                        
                                                        @endforeach
                                                        
                                                    </div>
                                                </ul>
                                                
                                            </div>
                                        </th>

                                        <!-- Datum izdavanja + dropdown filter for datum -->
                                        <th id="default_checked"
                                            class="px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                                            Datum izdavanja <i class="fas fa-filter"></i>
                                            <div id="datumDropdown" style="position: absolute;z-index:9999;top:300px;"
                                                class="datumMenu hidden rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
                                                <div
                                                    class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <div>
                                                        <label class="font-medium text-gray-500">Period od:</label>
                                                        <input id="periodod" type="date"
                                                            class="border-[1px] border-[#e4dfdf] period cursor-pointer focus:outline-none">
                                                    </div>
                                                    <div class="ml-[50px]">
                                                        <label class="font-medium text-gray-500">Period do:</label>
                                                        <input id="perioddo" type="date"
                                                            class="border-[1px] border-[#e4dfdf] period cursor-pointer focus:outline-none">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </th>

                                        <!-- Trenutno zadrzavanje + dropdown filter for zadrzavanje -->
                                        <th id="default_checked" class="px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer">
                                            Trenutno zadrzavanje knjige
                                        </th>
                                        <!-- Knjigu izdao + dropdown filter for bibliotekar -->
                                        <th id="default_checked"
                                            class=" px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer bibliotekariDrop-toggle">
                                            Knjigu izdao <i class="fas fa-filter"></i>
                                            <div id="bibliotekariDropdown"  style="position: absolute;z-index:9999;top:300px;right:5%;"
                                                class="bibliotekariMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] right-0 border-2 border-gray-300">
                                                <ul class="border-b-2 border-gray-300 list-reset">
                                                    <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                        <input
                                                            class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                            placeholder="Search"
                                                            id="searchBibliotekara"
                                                            id="searchBibliotekari"><br>
                                                        <button
                                                            class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </li>
                                                    <div class="h-[200px] scroll font-normal">

                                                        @foreach ($l as $l)
                                                        <li class="b_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                                            <label class="flex items-center justify-start">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                    <input id="odbibliotekara" type="checkbox" class="izdato absolute opacity-0" value="{{$l->first_and_last_name}}">
                                                                    <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                            <img width="40px" height="30px"
                                                                class="ml-[15px] rounded-full"
                                                                src="img/profileExample.jpg">
                                                            <p
                                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                                {{$l->first_and_last_name}}
                                                            </p>
                                                        </li>
                                                        @endforeach
                                                        
                                                        
                                                        
                                                    </div>
                                                </ul>
                                               
                                            </div>
                                        </th>
                                        <th id="default_checked" class="px-4 py-4"> </th>













                                        <th id="if_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                            <button style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="return_more" type="submit" name="submit">
                                            Vrati
                                            </button>
                                        </th>
                                        <th id="if_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <button style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="abandon_more" type="submit" name="submit">    
                                            Otpiši
                                        </a>
                                        </th>
                                        <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        
                                        <th style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                            <a id="rent_show" href="">
                                                Pogledaj detalje
                                            </a>
                                            
                                        </th>
                                        <th style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                            <a id="abandon" href="">
                                            Otpisi knjigu</a>
                                        </th>
                                        <th style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                           
                                                
                                                <a id="return" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" href="">
                                                    Vrati knjigu
                                                </a>
                                                
                                          
                                            
                                        
                                        </th>
                                        <th id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>



                                    </tr>
                                </thead>
                                <tbody class="bg-white">

                                    @foreach ($rented_book_info as $rent)
                                    <tr  class="trazi hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                        <td class="px-4 py-3 whitespace-no-wrap">
                                            <label class="inline-flex items-center">
                                                <input value="{{$rent[0]->renting_id}}" name="rent_id[]" type="checkbox" id="table_checkboxes" class="form-checkbox" data-rent-id="{{$rent[0]->renting_id}}">
                                            </label>
                                        </td>
                                        <td class="flex flex-row items-center px-4 py-3">
                                            {{-- <img class="object-cover w-8 mr-2 h-11" src="{{asset('storage/book_images/'.$rent[0]->photo);}}" alt="" /> --}}
                                            <a href="">
                                             {{$rent[0]->title}}
                                            </a>
                                        </td>
                                        <td id="ucenik_ime" class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">@foreach ($users as $student)
                                            @if($student->id == $rent[0]->user_who_rented_id)
                                                {{$student->first_and_last_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                        <td id="datum_izdavanja" class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$rent[0]->rent_date}}</td>
                                        <td id="zadrzavanje" class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div> 

                                                <?php
                                                $today=date("Y-m-d H:i:s");                                               
                                                $a= strtotime($today) - strtotime($rent[0]->created_at);
                                                $sec = $a;
                                                $a= round($a / 86400);
                                                ?>
                                                
                                                   
                                                

                                                @if($rent[0]->book_status_id==2)
                                                <span>{{datum($a,$sec);}}</span>
                                                @else
                                                <div class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                                    <span class="text-xs text-red-800">{{datum($a,$sec);}}</span>
                                                </div>
                                                @endif
                                               
                                            </div>
                                        </td>
                                        <td id="bibliotekar_ime" class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">@foreach ($users as $librarian)
                                            @if($librarian->id == $rent[0]->user_who_rented_out_id)
                                                {{$librarian->first_and_last_name}}
                                            @endif
                                        @endforeach</td>
                                        <td  class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p style="position: relative;" class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIzdateKnjige hover:text-[#606FC7]">
                                                <i 
                                                    class="fas fa-ellipsis-v"></i>
                                                </p>
                                            <div style="position:absolute;z-index: 9999;right:75px;"
                                           
                                               class="hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 izdate-knjige">
                                                <div class=" right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                    aria-labelledby="headlessui-menu-button-1"
                                                    id="headlessui-menu-items-117" role="menu">
                                                    <div class="py-1" >
                                                        <a href="{{ route('rent.show',$rent[0]->renting_id);}}" tabindex="0"
                                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                            role="menuitem">
                                                            <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Pogledaj detalje</span>
                                                        </a>
                                                        
                                                        <a href="{{route('rent.abandon',$rent[0]->renting_id);}}" tabindex="0"
                                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                            role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="{{route('rent.returnbook',$rent[0]->renting_id);}}" tabindex="0"
                                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                            role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </form>
                            

                        </div>
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
    <!-- End Scripts --><script>

    const checkboxes = document.querySelectorAll("#table_checkboxes");
    var if_checked = document.querySelectorAll("#if_checked");
    var default_checked = document.querySelectorAll("#default_checked");
    var if_one_checked =  document.querySelectorAll("#if_one_checked");
    var all_checked = document.getElementById("all_checked");
    
    var i = 0;
    function load(){
            const checkboxes = document.querySelectorAll("#table_checkboxes");
            
            var all_checked = document.getElementById("all_checked");
            if(all_checked.checked == true){
                all_checked.click();
            }
            checkboxes.forEach(e=>{
                if(e.checked == true){
                    e.click();
                }
            })
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
              
                var rent_show = document.getElementById("rent_show");
                var rent_abandon = document.getElementById("abandon");
                var rent_return = document.getElementById("return");
                
                var id = e.dataset.rentId;
                
               
                rent_show.setAttribute("href","http://127.0.0.1:8000/rent/"+id);
                rent_abandon.setAttribute("href","http://127.0.0.1:8000/abandon/"+id);
                rent_return.setAttribute("href","http://127.0.0.1:8000/returnbook/"+id);

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
                var return_more = document.getElementById("return_more");
                var abandon_more = document.getElementById("abandon_more");
                var checked = document.querySelectorAll("#table_checkboxes:checked");
                var r_a_form = document.getElementById("r_a_form")

                return_more.addEventListener("click",()=>{
                    r_a_form.setAttribute("action","http://127.0.0.1:8000/returnmore/");
                })

                abandon_more.addEventListener("click",()=>{
                    r_a_form.setAttribute("action","http://127.0.0.1:8000/abandonmore/");
                })
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
                })
            
            }
        })
      
    });
    
    
            </script>
                                       <?php

function datum($a,$sec){
        $value = 0;
        $end = "";
        if($a==0 && ($sec/60 <= 60)){
            for($i=1;$i<=60;$i++){
                if(round($sec/60) == $i){
                    $value = "$i minuta";
                }
            }
        }else {
            if((round($sec/3600) == 2) || (round($sec/3600) == 3) || (round($sec/3600) == 4) || (round($sec/3600) == 22) || (round($sec/3600) == 23) || (round($sec/3600) == 24)){
                $end=" sata";
            }else{
                $end = " sati";
            }
            for($i=1;$i<=24;$i++){
                if(round($sec/3600) == $i){
                    $value="$i".$end;
                }
            }
        }
    
    if($a>7){
        $dan = $a%7;
        $nedelja = ($a-$dan) / 7;
        $value = $nedelja." nedelja/e ".$dan." dan/a";
    }
       echo $value;
    }
    
    
    ?>
    
    ?>
</body>

</html>