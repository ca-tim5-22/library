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

   @include('includes\layout\icon')
    <!-- Styles -->
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
                    <a href="#"
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
                                                class="py-[15px] px-[20px] w-[268px] cursor-pointer group hover:bg-[#EFF3F6] rounded-[10px]">
                                                <a href="{{route('rent.index');}}" aria-label="Sve knjige"
                                                    class="flex items-center">
                                                    <i
                                                        class="text-[#707070] transition duration-300 ease-in group-hover:text-[#576cdf] far fa-copy text-[20px]"></i>
                                                    <div>
                                                        <p
                                                            class="transition duration-300 ease-in group-hover:text-[#576cdf]  text-[15px] ml-[18px]">
                                                            Izdate knjige
                                                        </p>
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
                                                <a href="{{route('rent.returned_index');}}" aria-label="Vracene knjige"
                                                    class="flex items-center">
                                                    <i
                                                        class="transition duration-300 ease-in  text-[#707070] text-[20px] fas fa-file group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="transition duration-300 ease-in  text-[15px] ml-[21px] group-hover:text-[#576cdf]">
                                                            Vracene knjige
                                                        </p>
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
                                                        class="group-hover:text-[#576cdf] text-[#707070] text-[20px] fas fa-exclamation-triangle transition duration-300 ease-in "></i>
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
                                                class="group bg-[#EFF3F6] hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="{{route('active');}}" aria-label="Rezervacije"
                                                    class="flex items-center">
                                                    <i
                                                        class="text-[#576cdf] text-[20px] far fa-calendar-check transition duration-300 ease-in"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[19px] transition duration-300 ease-in text-[#576cdf]">
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
                            <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf] rezervacije" id="myTable">
                                <thead class="bg-[#EFF3F6]">
                                    <tr class="border-b-[1px] border-[#e4dfdf]">
                                        <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                            <label class="inline-flex items-center">
                                                <input id="all_checked" type="checkbox" class="form-checkbox">
                                            </label>
                                        </th>
                                        <th id="default_checked" class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">Naziv
                                            knjige<a href="#"><i  class="ml-2 fa-lg fas fa-long-arrow-alt-down"
                                                    onclick="sortTable()"></i></a>
                                        </th>

                                        <!-- Datum rezervacije + dropdown filter for date -->
                                        <th id="default_checked"
                                            class=" px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                                            Datum rezervacije<i class="ml-2 fas fa-filter"></i>
                                            <div id="datumDropdown" style="position: absolute;z-index:9999;top:300px;"
                                                class="datumMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
                                                <div
                                                    class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <div>
                                                        <label class="font-medium text-gray-500">Period od:</label>
                                                        <input id="periodod" type="date"
                                                            class="border-[1px] border-[#e4dfdf] periodi cursor-pointer focus:outline-none">
                                                    </div>
                                                    <div class="ml-[50px]">
                                                        <label class="font-medium text-gray-500">Period do:</label>
                                                        <input id="perioddo" type="date"
                                                            class="border-[1px] border-[#e4dfdf] periodi cursor-pointer focus:outline-none">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </th>

                                        <!-- Rezervacija istice + dropdown filter for date -->
                                        <th id="default_checked"
                                            class=" px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer zadrzavanjeDrop-toggle">
                                            Rezervacija
                                            istice<i class="ml-2 fas fa-filter"></i>
                                            <div id="zadrzavanjeDropdown" style="position: absolute;z-index:9999;top:300px;right:25%;"
                                                class="zadrzavanjeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] right-0 border-2 border-gray-300">
                                                <div
                                                    class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <div>
                                                        <label class="font-medium text-gray-500">Period od:</label>
                                                        <input id="istekod" type="date"
                                                            class="border-[1px] border-[#e4dfdf] periodi cursor-pointer focus:outline-none">
                                                    </div>
                                                    <div class="ml-[50px]">
                                                        <label class="font-medium text-gray-500">Period do:</label>
                                                        <input id="istekdo" type="date"
                                                            class="border-[1px] border-[#e4dfdf] periodi cursor-pointer focus:outline-none">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </th>

                                        <!-- Rezervaciju podnio + dropdown filter for ucenik -->
                                        <th id="default_checked"
                                            class=" px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">
                                            Rezervaciju
                                            podnio<i class="ml-2 fas fa-filter"></i>
                                            <div id="uceniciDropdown" style="position: absolute;z-index:9999;top:300px;right:15%;"
                                                class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px]  right-0 border-2 border-gray-300">
                                                <ul class="border-b-2 border-gray-300 list-reset">
                                                    <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                        <input
                                                            class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                            placeholder="Search"
                                                            id="searchUcenika"
                                                            ><br>
                                                        <button
                                                            class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </li>
                                                    <div class="h-[200px] scroll font-normal">
                                                        @foreach ($students as $s)
                                                            <li class="u_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                                            <label class="flex items-center justify-start">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                    <input id="poucenik" type="checkbox" class="absolute opacity-0 njemu ch" value="{{$s->first_and_last_name}}">
                                                                    <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                            @if ($s->photo != null)
                                                                <img width="40px" height="30"  style="max-width:40px;max-height:30px;border-radius:50%;"
                                                                class="ml-[15px] rounded-full"
                                                                src="{{asset('storage/student_images/crop/'.$s->photo);}}">
                                                                @else
                                                                <img width="40px" height="30px"
                                                                class="ml-[15px] rounded-full"
                                                                src="profileExample.jpg">
                                                            @endif
                                                            <p
                                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                                {{$s->first_and_last_name}}
                                                            </p>
                                                        </li>
                                                        @endforeach
                                                        
                                                       
                                                        
                                                    </div>
                                                </ul>
                                                
                                            </div>
                                        </th>

                                        <!-- Status + dropdown filter for status -->
                                        <th id="default_checked" 
                                            class="px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer statusDrop-toggle">
                                            Status<i class="ml-2 fas fa-filter"></i>
                                            <div id="statusDropdown" style="position: absolute;z-index:9999;top:300px;right:5%;"
                                                class="statusMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] right-0 border-2 border-gray-300">
                                                <ul class="border-b-2 border-gray-300 list-reset">
                                                    <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                        <input
                                                            class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                            placeholder="Search"
                                                            
                                                            id="searchStatus"><br>
                                                        <button
                                                            class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </li>
                                                    <div class="h-[200px] scroll font-normal">
                                                        <li class="s_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">
                                                            <label class="flex items-center justify-start">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                    <input id="status" type="checkbox" class="absolute opacity-0 ch" value="Rezervisano">
                                                                    <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                            <p
                                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                                Rezervisano
                                                            </p>
                                                        </li>
                                                        <li class="s_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">
                                                            <label class="flex items-center justify-start">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                    <input id="status" type="checkbox" class="absolute opacity-0 ch" value="Odbijeno">
                                                                    <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                            <p
                                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                                Odbijeno
                                                            </p>
                                                        </li>
                                                    </div>
                                                </ul>
                                                
                                            </div>
                                        </th>
                                        <th id="default_checked" class="px-4 py-4"> </th>
                                        <th id="if_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                            <button style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="rent_more" type="submit" name="submit">
                                            Izdaj 
                                            </button>
                                        </th>
                                        <th id="if_checked" style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        <button style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="decline_more" type="submit" name="submit">    
                                            Otkaži rezervacije
                                        </a>
                                        </th>
                                        <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        
                                        <th style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                            <a id="rent_out" href="">
                                                Izdaj knjigu
                                            </a>
                                            
                                        </th>
                                        <th style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                            <a id="decline" href="">
                                            Otkaži rezervaciju</a>
                                        </th>
                                        
                                        <th id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        <th id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="bg-white">

                                
                                @foreach ($active as $reservation)
                                
                                    <tr class="trazi hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                        <td class="px-4 py-3 whitespace-no-wrap">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" class="form-checkbox" id="table_checkboxes">
                                            </label>
                                        </td>
                                        <td class="flex flex-row items-center px-4 py-3">
                                            <img class="object-cover w-8 mr-2 h-11" src="{{asset('storage/book_images/'.$reservation->photo);}}" alt="" />
                                         <a href="{{route('book.show',$reservation->book_id);}}"> 
                                                <span class="font-medium text-center">{{$reservation->title}}</span>
                                            </a>
                                        </td>
                                        <td id="datum_izdavanja" class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$reservation->date_of_reservation}}</td>
                                        <td id="datum_isteka" class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                       
                                            <?php
                                            $date=date('Y-m-d', strtotime($reservation->date_of_reservation. ' + '.$deadline.' day'));
                                            echo $date;
                                            ?>

                                        </td>
                                        <td id="ucenik_ime"  class=" flex flex-row items-center px-4 py-3">
                                            <img class="object-cover w-8 h-8 rounded-full" src="{{asset('storage/student_images/crop/'.$reservation->student_img);}}"
                                                alt="" />
                                        <a href="{{route('student.show',$reservation->foruser_id);}}" class="ml-2 font-medium text-center">{{$reservation->student}}</a>
                                        </td>
                                        <td id="status_ime" class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">


                                        @if($reservation->status==1)
                                            <div
                                                class="inline-block px-[6px] py-[2px] font-medium bg-yellow-200 rounded-[10px]">
                                                <span class="text-xs text-yellow-700">Rezervisano</span>
                                            </div>
                                        @else
                                            <div
                                            class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                            <span class="text-xs text-red-800">Odbijeno</span>
                                        </div>
                                        @endif



                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p style="position: relative;"
                                                class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAktivneRezervacije hover:text-[#606FC7]">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div style="position: absolute;z-index:9999;right:65px;"
                                                class=" hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 aktivne-rezervacije">
                                                <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                    aria-labelledby="headlessui-menu-button-1"
                                                    id="headlessui-menu-items-117" role="menu">
                                                    <div class="py-1">
                                                        <a href="{{route('rent.reservation',$reservation->id)}}" tabindex="0"
                                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                            role="menuitem">
                                                            <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Izdaj knjigu</span>
                                                        </a>

                                                        <a href="#" tabindex="0"
                                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                            role="menuitem">
                                                            <i class="fas fa-undo mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otkazi rezervaciju</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

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
         /* var rent_decline = document.getElementById("decline");
                    var rent = document.getElementById("rent_out");
                    
                    var id = e.dataset.rentId;
                    
                   
                   
                    rent_decline.setAttribute("href","http://127.0.0.1:8000/povezi/"+id);
                    rent_out.setAttribute("href","http://127.0.0.1:8000/povezi/"+id); */
    
         /*  var rent_more = document.getElementById("rent_more");
                    var decline_more = document.getElementById("decline_more");
                    var checked = document.querySelectorAll("#table_checkboxes:checked");
                    var r_a_form = document.getElementById("r_a_form")
    
                    rent_more.addEventListener("click",()=>{
                        r_a_form.setAttribute("action","http://127.0.0.1:8000/rentmore/");
                    })
    
                    decline_more.addEventListener("click",()=>{
                        r_a_form.setAttribute("action","http://127.0.0.1:8000/declinemore/");
                    }) */
                </script>
</body>

</html>