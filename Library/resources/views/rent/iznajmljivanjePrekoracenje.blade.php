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
    <title>Osnovni detalji | Library - ICT Cortex student project</title>
    @include('includes\layout\icon')
    <!-- End Title -->

   @include('includes\layout\icon') <!-- Styles -->
    @include('includes\layout\styles')
    <!-- End Styles -->
</head>

<body onload="load();" class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    @include('includes\layout\header')
    <!-- Header -->

    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        <!-- Sidebar -->
        @include('includes\layout\sidebar')
        <!-- End Sidebar -->

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="py-[10px] flex flex-row">
                        <div class="w-[77px] pl-[30px]">
                            @if ($photo)
                            <img style="width:77px; height:100%" src="{{asset('storage/book_images/'.$photo);}}" alt="">
                            @else
                            <img src="img/tomsojer.jpg" alt="">
                            @endif
                        </div>
                        <div class="pl-[15px]  flex flex-col">
                            <div>
                                <h1>
                                    {{$book->title}}
                                </h1>
                            </div>
                            <div>
                                <nav class="w-full rounded">
                                    <ol class="flex list-reset">
                                        <li>
                                            <a href="{{route('book.index');}}" class="text-[#2196f3] hover:text-blue-600">
                                                Evidencija knjiga
                                            </a>
                                        </li>
                                        <li>
                                            <span class="mx-2">/</span>
                                        </li>
                                        <li>
                                            <a href="{{route('book.show',$book->id);}}"
                                                class="text-[#2196f3] hover:text-blue-600">
                                                KNJIGA-{{$book->id}}
                                            </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="pt-[24px] mr-[30px]">
                        <a href="{{route("abandon_index",$book->id);}}" class="inline hover:text-blue-600">
                            <i class="fas fa-level-up-alt mr-[3px]"></i>
                            Otpisi knjigu
                        </a>
                        <a href="{{route("rent.new",$book->id);}}" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                            <i class="far fa-hand-scissors mr-[3px]"></i>
                            Izdaj knjigu
                        </a>
                        <a href="{{route('return_index',$book->id);}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="fas fa-redo-alt mr-[3px] "></i>
                            Vrati knjigu
                        </a>
                        <a href="{{route('reservation.new',$book->id)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="far fa-calendar-check mr-[3px] "></i>
                            Rezervisi knjigu
                        </a>
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsIznajmljivanjePrekoracenje hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-iznajmljivanje-prekoracenje">
                            <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{route("book.edit",$book->id)}}" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izmijeni knjigu</span>
                                    </a>

                                    <form method="POST" action="{{route('book.destroy',$book->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" name="submit" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izbrisi knjigu</span>
                                        </button>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-row height-iznajmljivanje scroll">
                <div class="w-[80%]">
                    <div class="border-b-[1px] border-[#e4dfdf] py-4  border-gray-300 pl-[30px]">
                        <a href="{{route('book.show',$book->id);}}" class="inline hover:text-blue-800">
                            Osnovni detalji
                        </a>
                        <a href="{{route('book.show',$book->id);}}" class="inline ml-[70px] hover:text-blue-800 ">
                            Specifikacija
                        </a>
                        <a href="{{route('rent.rented',$book->id);}}" class="inline ml-[70px] active-book-nav hover:text-blue-800">
                            Evidencija iznajmljivanja
                        </a>
                        <a href="{{route('book.show',$book->id);}}" class="inline ml-[70px] hover:text-blue-800">
                            Multimedija
                        </a>
                    </div>
                    <div class="py-4 pt-[20px] pl-[30px] text-[#2D3B48]">
                        <a href="{{route('rent.rented',$book);}}"
                            class="py-[15px] px-[20px] w-[268px] cursor-pointer hover:bg-[#EFF3F6] rounded-[10px] inline hover:text-[#576cdf]">
                            <i class="text-[20px] far fa-copy mr-[3px]"></i>
                            Izdate knjige
                        </a>
                        <a href="{{route('rent.returned',$book);}}"
                            class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                            <i class="text-[20px]  group-hover:text-[#576cdf] fas fa-file mr-[3px]"></i>
                            Vracene knjige
                        </a>
                        <a href="{{route('rent.overdue',$book);}}"
                            class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] text-[#576cdf] bg-[#EFF3F6] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                            <i
                                class="text-[20px] group-hover:text-[#576cdf] fas fa-exclamation-triangle mr-[3px]"></i>
                            Knjige u prekoracenju
                        </a>
                        <a href="{{route('reservation.active',$book)}}"
                            class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                            <i
                                class="text-[20px] text-[#707070] group-hover:text-[#576cdf] far fa-calendar-check mr-[3px]"></i>
                            Aktivne rezervacije
                        </a>
                        <a href="{{route('reservation.archive',$book);}}"
                            class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                            <i
                                class="text-[20px] text-[#707070] group-hover:text-[#576cdf] fas fa-calendar-alt  mr-[3px]"></i>
                            Arhivirane rezervacije
                        </a>
                    </div>
                    <!-- Space for content -->
                    <form id="r_a_form" action="" method="POST">
                        @csrf
                        @method("GET")
                   
                    <div class="w-full mt-[10px] ml-2 px-4">
                        <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf]" id="myTable">
                            <thead class="bg-[#EFF3F6]">
                                <tr class="border-b-[1px] border-[#e4dfdf]">
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                        <label class="inline-flex items-center">
                                            <input id="all_checked" type="checkbox" class="form-checkbox">
                                        </label>
                                    </th>
                                    <th id="default_checked" class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Datum izdavanja
                                    </th>
                                    <th id="default_checked" class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato uceniku</th>
                                    <th id="default_checked" class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Prekoracenje u
                                        danima</th>
                                    <th id="default_checked" class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Trenutno
                                        zadrzavanje knjige</th>
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
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                              
                            @foreach ($overdue_book_info as $overdue)

                                <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-3 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" id="table_checkboxes" class="form-checkbox" data-rent-id="{{$overdue->id}}"
                                            name="rent_id[]" value="{{$overdue->id}}">
                                        </label>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$overdue->rent_date}}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                        
                                        @foreach ($users as $user)
                                    @if($user->id == $overdue->user_who_rented_id)
                                    {{$user->first_and_last_name}}
                                    @endif
                                    @endforeach

                                    </td>
                                    <?php

                                    echo "<pre>";


                                    echo "</pre>";
                                    $a= strtotime($today) - strtotime($overdue->return_date);

                                    $a= round($a / 86400);

                                    
                                            ?>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                        <div
                                            class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                            <span class="text-xs text-red-800">



{{$a}} dan/a




                                            </span>
                                        </div>
                                    </td>
                                    
                                  
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                        <div>
                                            
                                            <?php
                                            $today=date("Y-m-d");
                                           
                                            $a= strtotime($today) - strtotime($overdue->rent_date);
                                        
                                            $a= round($a / 86400);
                                           

?>
                                            
                                            
                                            
                                                
<span>{{datum($a);}}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p stlye="position:relative;" class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeKnjigePrekoracenje hover:text-[#606FC7]">
                                            <i
                                                class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div style="margin-left:35px;"
                                            class="absolute z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-knjige-prekoracenje">
                                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                aria-labelledby="headlessui-menu-button-1"
                                                id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">
                                                    <a href="{{route('rent.show',$overdue->id);}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Pogledaj detalje</span>
                                                    </a>

                                                    <a href="{{route('rent.new',$book->id);}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izdaj knjigu</span>
                                                    </a>

                                                    <a href="{{route('rent.returnbook',$overdue->id);}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                        <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Vrati knjigu</span>
                                                    </a>

                                                    <a href="{{route('reservation.new',$book->id);}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Rezervisi knjigu</span>
                                                    </a>

                                                    <a href="{{route('rent.abandon',$overdue->id)}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Otpisi knjigu</span>
                                                    </a>

                                    
{{-- 
                                                    <form method="POST" action="{{route('book.destroy',$book->id)}}">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" name="submit" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izbrisi knjigu</span>
                                                        </button>
                                                        </form> --}}


                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </form>
                        <div class="flex flex-row items-center justify-end my-2">
                            <div>
                                <p class="inline text-md">
                                    Rows per page:
                                </p>
                                <select
                                    class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
                                    name="ucenici">
                                    <option value="">
                                        20
                                    </option>
                                    <option value="">
                                        Option1
                                    </option>
                                    <option value="">
                                        Option2
                                    </option>
                                    <option value="">
                                        Option3
                                    </option>
                                    <option value="">
                                        Option4
                                    </option>
                                </select>
                            </div>

                            <div>
                                <nav class="relative z-0 inline-flex">
                                    <div>
                                        <a href="#"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px font-medium leading-5 transition duration-150 ease-in-out bg-white text-md focus:z-10 focus:outline-none">
                                            1 of 1
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="relative inline-flex items-center px-2 py-2 font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                            aria-label="Previous"
                                            v-on:click.prevent="changePage(pagination.current_page - 1)">
                                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div v-if="pagination.current_page < pagination.last_page">
                                        <a href="#"
                                            class="relative inline-flex items-center px-2 py-2 -ml-px font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                            aria-label="Next">
                                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="min-w-[20%] border-l-[1px] border-[#e4dfdf] ">
                    <div class="border-b-[1px] border-[#e4dfdf]">
                        <div class="ml-[30px] mr-[70px] mt-[20px] flex flex-row justify-between">
                            <div class="text-gray-500 ">
                                <p>Na raspolaganju:</p>
                                <p class="mt-[20px]">Rezervisano:</p>
                                <p class="mt-[20px]">Izdato:</p>
                                <p class="mt-[20px]">U prekoracenju:</p>
                                <p class="mt-[20px]">Ukupna kolicina:</p>
                            </div>
                            <div class="text-center pb-[30px]">
                                <p class=" bg-green-200 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">{{$book->total-($reservation_count+$rent_count)}}</p>
                                <a href="{{route('reservation.active',$book->id);}}">
                                    <p
                                        class=" mt-[16px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                        {{$reservation_count}}</p>
                                </a>
                                <a href="{{route('rent.rented',$book->id);}}">
                                    <p
                                        class=" mt-[16px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                        {{$rent_count}}</p>
                                </a>
                                <a href="{{route('rent.overdue',$book->id);}}">
                                    <p
                                        class=" mt-[16px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                        {{$overdue_count}}</p>
                                </a>
                                <p
                                    class=" mt-[16px] border-[1px] border-green-700 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                    {{$book->total}} primjeraka</p>
                            </div>
                        </div>
                    </div>
                    <?php $i=0?>
                    <div class="mt-[40px] mx-[30px]">
                        @foreach($notifications as $notification)
                        <?php $i++ ?>
                        <div class="mt-[40px] flex flex-col max-w-[304px]">
                            <div class="text-gray-500 ">
                                <p class="inline uppercase">
                                    Izdavanja knjige
                                </p>
                                <span> prije
                                    <?php 
                                    $date = date_create($notification->created_at);


                                    $newdate=date_format($date,"d-m-Y H:i:s");
                                     $today=date("d-m-Y H:i:s");
                                     
                                    $a= strtotime($today) - strtotime($newdate);
                                    $sec = $a;
                                   $a= abs(round($a / 86400));
                                   
                                   echo datumm($a,$sec);
                                      ?>
                                </span>
                            </div>
                            <div>
                                <p>
                                    <a href="{{route('librarian.show',$notification->librarian_id);}}" class="text-[#2196f3] hover:text-blue-600">
                                        {{$notification->librarian}}
                                    </a>

                                    @if($notification->gender==1)
                                    je izdao knjigu
                                    @else
                                    je izdala knjigu
                                    @endif
                                    <a href="{{route('student.show',$notification->student_id);}}" class="text-[#2196f3] hover:text-blue-600">
                                        {{$notification->student}}
                                    </a>
                                    dana
                                    <span class="font-medium">
                                       {{$notification->rent_date}}
                                    </span>
                                </p>
                            </div>
                            <div>
                                <a href="{{route('rent.show',$notification->id);}}" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </div>
                        </div>
                        @if($i>=3)
                        @break
                        @endif
                        @endforeach
                        <div class="mt-[40px]">
                            <a href="{{url("dashboardaktivnost")}}" data-book-name="{{$book->title}}" class="text-[#2196f3] hover:text-blue-600">
                                <i class="fas fa-history"></i> Prikazi sve
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        {{--     // <input id="vrij" type="hidden" value="{{$array}}">  --}}
        //Finish date
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
    <?php
    function datumm($a,$sec){
        $value = $a. " dana";
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
    <!-- Notification for small devices -->
    @include('includes\layout\inProgress')

    <!-- Scripts -->
    @include('includes\layout\scripts')
    <!-- End Scripts -->
    <?php

    function datum($a){
        $value = 0;
        if($a==0){
            $value ="Danas";
        }
    
    if($a>7){
        $dan = $a%7;
        $nedelja = ($a-$dan) / 7;
        $value = $nedelja." nedelja/e ".$dan." dan/a";
    }else {
        $dan = $a;
        $value =$dan . " dan/a";
    }
       echo $value;
    }
    
    
    ?>

<script>

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
</body>

</html>