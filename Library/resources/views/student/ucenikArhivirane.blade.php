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

<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    @include('includes.layout.header')
    <!-- Header -->

    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        <!-- Sidebar -->
        @include('includes.layout.sidebar')
        <!-- End Sidebar -->

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                {{$student->first_and_last_name}}
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{route('student.index');}}" class="text-[#2196f3] hover:text-blue-600">
                                            Svi ucenici
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="{{route('student.show',$student->id);}}" class="text-[#2196f3] hover:text-blue-600">
                                            ID-{{$student->id}}
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="pt-[24px] pr-[30px]">
                        <a href="#" class="inline hover:text-blue-600 show-modal">
                            <i class="fas fa-redo-alt mr-[3px]"></i>
                            Resetuj sifru
                        </a>
                        <a href={{route('student.edit',$student->id);}} class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="fas fa-edit mr-[3px] "></i>
                            Izmjeni podatke
                        </a>
                        <p
                            class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsUcenikKnjigeArhivirane hover:text-[#606FC7]">
                            <i class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 ucenik-arhivirane-knjige">
                            <div class="absolute right-0 w-56 mt-[10px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <form method="POST" action="{{route("student.destroy",$student->id);}}">
                                        @csrf
                                        @method("DELETE")
                                        <button name="submit" type="submit" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Izbrisi korisnika</span>
                                        </button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-b-[1px] py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                <a href="{{route('student.show',$student->id);}}" class="inline hover:text-blue-800">
                    Osnovni detalji
                </a>
                <a href="{{route('student.rented',$student->id);}}" class="inline ml-[70px] active-book-nav">
                    Evidencija iznajmljivanja
                </a>
            </div>
            <!-- Space for content -->
            <div class="flex justify-start pt-3 bg-white height-ucenikIzdate scroll">
                <div class="mt-[10px]">
                    <ul class="text-[#2D3B48]">
                        <li class="mb-[4px]">
                            <div class="w-[300px] pl-[32px]">
                                <span class=" whitespace-nowrap w-full text-[25px]  flex justify-between fill-current">
                                    <div
                                        class="py-[15px] px-[20px] w-[268px] cursor-pointer group hover:bg-[#EFF3F6] rounded-[10px]">
                                        <a href="{{route('student.rented',$student->id);}}" aria-label="Sve knjige" class="flex items-center">
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
                                <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                    <div
                                        class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                        <a href="{{route('student.returned',$student->id);}}" aria-label="Vracene knjige"
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
                                <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                    <div
                                        class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                        <a href="{{route('student.overdue',$student->id);}}" aria-label="Knjige na raspolaganju"
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
                                <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                    <div
                                        class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                        <a href="{{route('student.active',$student->id);}}" aria-label="Rezervacije"
                                            class="flex items-center">
                                            <i
                                                class="text-[#707070] group-hover:text-[#576cdf] text-[20px] far fa-calendar-check transition duration-300 ease-in"></i>
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
                                <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                    <div
                                        class="group bg-[#EFF3F6] hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                        <a href="{{route('student.archive',$student->id);}}" aria-label="Rezervacije"
                                            class="flex items-center">
                                            <i
                                                class="text-[#707070] text-[20px] fas fa-calendar-alt transition duration-300 ease-in text-[#576cdf]"></i>
                                            <div>
                                                <p
                                                    class="text-[15px] ml-[19px] transition duration-300 ease-in text-[#576cdf]">
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
                                <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </th>
                                <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">Naziv
                                    knjige<a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down"
                                            onclick="sortTable()"></i></a></th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Datum rezervacije</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervacija istice</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervaciju podnio</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Status</th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">

                            @foreach($archive as $reservation)
                            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-3 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-3">
                                    <img class="object-cover w-8 mr-2 h-11" src="{{asset('storage/book_images/'.$reservation->photo);}}" alt="" />
                                    <a href="{{route('book.show',$reservation->book_id);}}">
                                        <span class="font-medium text-center">{{$reservation->title}}</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$reservation->date_of_reservation}}</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">

                                    <?php
                                    $date=date('Y-m-d', strtotime($reservation->date_of_reservation. ' + '.$deadline.' day'));
                                    echo $date;
                                    ?>
                                    
                                </td>
                                <td class="flex flex-row items-center px-4 py-3">
                                    <img class="object-cover w-8 h-8 rounded-full" src="{{asset('storage/student_images/crop/'.$reservation->student_img);}}"
                                        alt="" />
                                    <a href="{{route('student.show',$reservation->foruser_id);}}" class="ml-2 font-medium text-center">{{$reservation->student}}</a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">

                                @if($reservation->status==3)

                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                    <span class="text-xs text-red-800">Rezervacija istekla</span>
                                    </div>
                                @elseif($reservation->status==4)
                                    <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-green-200 rounded-[10px]">
                                    <span class="text-xs text-green-800">Knjiga izdata</span>
                                    </div>
                                @else
                                    <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                    <span class="text-xs text-red-800">Rezervacija otkazana</span>
                                    </div>
                                @endif

                                

                                </td>
                                <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsUcenikArhiviraneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 ucenik-arhivirane-knjige-tabela">
                                        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                            aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117"
                                            role="menu">
                                            <div class="py-1">
                                                <a href="{{route('book.show',$reservation->book_id);}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Pogledaj detalje</span>
                                                </a>

                                                <a href="{{route('book.edit',$reservation->book_id);}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-edit mr-[6px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izmijeni knjigu</span>
                                                </a>

                                                <a href="{{route('rent.new',$reservation->book_id);}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izdaj knjigu</span>
                                                </a>

                                                <a href="{{route('reservation.new',$reservation->book_id);}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Rezervisi knjigu</span>
                                                </a>

                                                <a href="{{route('rent.returnbook',$reservation->book_id);}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Vrati knjigu</span>
                                                </a>

                                                <a href="{{route('abandon_index',$reservation->book_id);}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Otpisi knjigu</span>
                                                </a>

                                                <form action="{{route('book.destroy',$reservation->book_id);}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                <buttpn type="submit" name="submit" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
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
        </section>
        <!-- End Content -->
    </main>
    <!-- This code will show up when we press reset password -->
    <div
        class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 modal">
        <!-- Modal -->
        <div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
                <h3>Resetuj sifru: {{$student->first_and_last_name}}</h3>
                <button class="text-black close-modal">&cross;</button>
            </div>
            <!-- Modal Body -->
            <form method="post" action="{{route('resetpassword.update',$student->id);}}">
                @csrf
                @method("PUT")
                <div class="flex flex-col px-[30px] py-[30px]">
                    <div class="flex flex-col pb-[30px]">
                        <span>Unesi novu sifru <span class="text-red-500">*</span></span>
                        <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="password" id="pwResetUcenik" onkeydown="clearErrorsPwResetUcenik()">
                        <div id="validatePwResetUcenik"></div>
                    </div>
                    <div class="flex flex-col pb-[30px]">
                        <span>Ponovi sifru <span class="text-red-500">*</span></span>
                        <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="password2" id="pw2ResetUcenik" onkeydown="clearErrorsPw2ResetUcenik()">
                        <div id="validatePw2ResetUcenik"></div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                    <button type="reset"
                        class="shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                        Ponisti <i class="fas fa-times ml-[4px]"></i>
                    </button>
                    <button id="resetujSifruUcenik" type="submit"
                        class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                        onclick="validacijaSifraUcenik()">
                        Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    @include('includes.layout.inProgress')


    <!-- Scripts -->
    @include('includes.layout.scripts')
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



</body>

</html>