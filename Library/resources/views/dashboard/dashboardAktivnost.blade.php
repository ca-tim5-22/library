<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['knjiga'])) {
        $knjiga = $_GET['knjiga'];
    } else {
        $knjiga = 'Sve';
    }
} else {
    $e = new Exception('Error', 222);
    echo '<h1>' . $e->getCode() . ' ' . $e->getMessage() . '</h1>';
}
?>
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
    <title>Activity | Library - ICT Cortex student project</title>
    @include('includes.layout.icon')
    <!-- End Title -->

    @include('includes.layout.icon')
    <!-- Styles -->
    @include('includes.layout.styles')
    <!-- End Styles -->
</head>

<body onload="fune();" class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
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
                <h1 class="pl-[30px] pb-[21px]  border-b-[1px] border-[#e4dfdf] ">
                    Prikaz aktivnosti
                </h1>
            </div>
            <!-- Space for content -->
            <div class="pl-[30px] overflow-auto scroll height-dashboard pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-between">
                    <div class="mr-[30px]">
                        <div class="text-[14px] flex flex-row mb-[30px]">
                            <div class="">
                                <div class="rounded">
                                    <div class="relative">
                                        <button class="w-auto rounded focus:outline-none uceniciDrop-toggle">
                                            <span class="float-left">Ucenici: Svi <span></span> <i
                                                    class="px-[7px] fas fa-angle-down"></i></span>
                                        </button>
                                        <div id="uceniciDropdown"
                                            class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search" id="searchUcenika"><br>
                                                    <button
                                                        class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </li>
                                                <div class="h-[200px] scroll">
                                                    @foreach ($student as $s)
                                                        <li
                                                            class="u_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato">
                                                            <label class="flex items-center justify-start">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                    <input id="ucenik" type="checkbox"
                                                                        class="absolute opacity-0 akch"
                                                                        value="{{ $s->first_and_last_name }}">
                                                                    <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                            @if ($s->photo != null)
                                                                <img width="40px" height="30"
                                                                    style="max-width:40px;max-height:30px;border-radius:50%;"
                                                                    class="ml-[15px] rounded-full"
                                                                    src="{{ asset('storage/student_images/crop/' . $s->photo) }}">
                                                            @else
                                                                <img width="40px" height="30px"
                                                                    class="ml-[15px] rounded-full"
                                                                    src="profileExample.jpg">
                                                            @endif
                                                            <p
                                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                                {{ $s->first_and_last_name }}
                                                            </p>
                                                        </li>
                                                    @endforeach

                                                </div>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-[25px]">
                                <div class="rounded">
                                    <div class="relative">
                                        <button class="w-auto rounded focus:outline-none bibliotekariDrop-toggle">
                                            <span class="float-left">Bibliotekari: Svi <span></span><i
                                                    class="px-[7px] fas fa-angle-down"></i></span>
                                        </button>
                                        <div id="bibliotekariDropdown"
                                            class="bibliotekariMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search" id="searchBibliotekara"><br>
                                                    <button
                                                        class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </li>
                                                <div class="h-[200px] scroll">
                                                    @foreach ($librarian as $l)
                                                        <li
                                                            class="b_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                                            <label class="flex items-center justify-start">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                    <input id="bibliotekar" type="checkbox"
                                                                        class="absolute opacity-0 akch"
                                                                        value="{{ $l->first_and_last_name }}">
                                                                    <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                            @if ($l->photo != null)
                                                                <img width="40px" height="30"
                                                                    style="max-width:40px;max-height:30px;border-radius:50%;"
                                                                    class="ml-[15px] rounded-full"
                                                                    src="{{ asset('storage/librarian_images/crop/' . $s->photo) }}">
                                                            @else
                                                                <img width="40px" height="30px"
                                                                    class="ml-[15px] rounded-full"
                                                                    src="profileExample.jpg">
                                                            @endif
                                                            <p
                                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                                {{ $l->first_and_last_name }}
                                                            </p>
                                                        </li>
                                                    @endforeach


                                                </div>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-[25px]">
                                <div class="rounded">
                                    <div class="relative">
                                        <button class="w-auto rounded focus:outline-none" id="knjigeMenu">
                                            <?php if ($knjiga === 'Sve') {
                                                echo "<span class='float-left'>";
                                            } else {
                                                echo "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>";
                                            }
                                            ?>
                                            Knjiga: <?php echo $knjiga; ?> <span></span><i
                                                class="px-[7px] fas fa-angle-down"></i></span>
                                        </button>
                                        <div id="knjigeDropdown"
                                            class="knjigeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search" id="searchKnjigu"><br>
                                                    <button
                                                        class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </li>
                                                <div class="h-[200px] scroll">
                                                    @foreach ($books as $b)
                                                        <li class="k_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-knjiga">
                                                            <label class="flex items-center justify-start">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                    <input id="knjiga" type="checkbox"
                                                                        class="absolute opacity-0 akch"
                                                                        value="{{ $b->title }}">
                                                                    <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                            <img width="30px" height="30px" class="ml-[15px]"
                                                                src="img/tomsojer.jpg">
                                                            <p
                                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                                {{ $b->title }}
                                                            </p>
                                                        </li>
                                                    @endforeach

                                                </div>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-[25px]">
                                <div class="rounded">
                                    <div class="relative">
                                        <button class="w-auto rounded focus:outline-none" id="transakcijeMenu">
                                            <span class="float-left">Transakcije: Sve <span></span><i
                                                    class="px-[7px] fas fa-angle-down"></i></span>
                                        </button>
                                        <div id="transakcijeDropdown"
                                            class="transakcijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search" id="searchTransakcije"><br>
                                                    <button
                                                        class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </li>
                                                <div class="h-[200px] scroll">
                                                    <li
                                                        class="t_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input id="trans" type="checkbox"
                                                                    class="absolute opacity-0 akch"
                                                                    value="Izdavanje knjige">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            Izdavanje knjige
                                                        </p>
                                                    </li>
                                                    <li
                                                        class="t_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input id="trans" type="checkbox"
                                                                    class="absolute opacity-0 akch"
                                                                    value="Vracanje knjige">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            Vracanje knjiga
                                                        </p>
                                                    </li>
                                                    <li
                                                        class="t_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input id="trans" type="checkbox"
                                                                    class="absolute opacity-0 akch"
                                                                    value="Unos nove knjige">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            Unos nove knjige
                                                        </p>
                                                    </li>
                                                    <li
                                                        class="t_trazi flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input id="trans" type="checkbox"
                                                                    class="absolute opacity-0 akch"
                                                                    value="Otpisivanje knjige">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            Otpisivanje knjige
                                                        </p>
                                                    </li>
                                                </div>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-[25px]">
                                <div class="rounded">
                                    <div class="relative">
                                        <button class="w-auto rounded focus:outline-none datumDrop-toggle">
                                            <span class="float-left">Datum: Svi <span></span><i
                                                    class="px-[7px] fas fa-angle-down"></i></span>
                                        </button>
                                        <div id="datumDropdown"
                                            class="datumMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                            <div
                                                class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <div>
                                                    <label class="font-medium text-gray-500">Period od:</label>
                                                    <input id="periodod" type="date"
                                                        class="border-[1px] border-[#e4dfdf] aktime cursor-pointer focus:outline-none">
                                                </div>
                                                <div class="ml-[50px]">
                                                    <label class="font-medium text-gray-500">Period do:</label>
                                                    <input id="perioddo" type="date"
                                                        class="border-[1px] border-[#e4dfdf] aktime cursor-pointer focus:outline-none">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-[35px] cursor-pointer hover:text-blue-600">
                                
                                <i id="resetallfilters" class="fas fa-sync-alt"></i>
                            
                            </div>
                        </div>
                        <!-- Activity Cards -->
                        @foreach ($all as $one)
                            <div class="trazi activity-card flex flex-row mb-[30px]">
                                <div class="w-[60px] h-[60px]">

                                    @foreach ($librarian as $l)
                                        @if ($l->id == $one->user_who_rented_out_id)
                                            @if ($l->photo != null)
                                                <img class="w-[60px] h-[60px] rounded-full"
                                                    src="{{ asset('storage/librarian_images/' . $l->photo) }}"
                                                    alt="">
                                            @else
                                                <img class="rounded-full" src="img/profileExample.jpg"
                                                    alt="">
                                            @endif
                                        @endif
                                    @endforeach

                                </div>
                                <div class="ml-[15px] mt-[5px] flex flex-col">
                                    <div class="text-gray-500 mb-[5px]">
                                        <p class="uppercase">
                                             <span id="trans_ime">
                                            
                                                @if ($one->book_status_id == 3)
                                                        Vracanje knjige
                                                        @elseif($one->book_status_id == 2 || $one->book_status_id == 4)
                                                        Izdavanje knjige
                                                        @elseif($one->book_status_id == 5)
                                                        Otpisivanje knjige
                                                        @elseif($one->book_status_id == 1)
                                                        Rezervisanje knjige
                                                        @endif
                                                 
                                             </span>
                                            <span class="inline lowercase">
                                                Prije <?php
                                                $date = date_create($one->created_at);
                                                
                                                $newdate = date_format($date, 'd-m-Y H:i:s');
                                                $today = date('d-m-Y H:i:s');
                                                
                                                $a = strtotime($today) - strtotime($newdate);
                                                $sec = $a;
                                                
                                                $a = abs(round($a / 86400));
                                                echo datum($a, $sec);
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="">
                                        <p>
                                            @if ($one->book_status_id == 2 || $one->book_status_id == 4 || $one->book_status_id == 1 || $one->book_status_id == 5)
                                            @foreach ($users as $l)
                                                @if ($l->id == $one->user_who_rented_out_id)
                                                    <a id="bibliotekar_ime"
                                                        href="{{ route('librarian.show', $l->id) }}"
                                                        class="text-[#2196f3] hover:text-blue-600">
                                                        {{ $l->first_and_last_name }}
                                                    </a>
                                                    @foreach ($muski as $m)
    
@if ($l->gender_id == $m->id && ($one->book_status_id == 4 || $one->book_status_id == 2))
je izdao knjigu 
@elseif($l->gender_id == $m->id && $one->book_status_id == 1 )
je rezervisao
@elseif($l->gender_id == $m->id && $one->book_status_id == 5 )
je otpisao primjerak knjige
@endif
@endforeach

@foreach ($zenski as $z)
    

@if ($l->gender_id == $z->id && ($one->book_status_id == 4 || $one->book_status_id == 2))
je izdala knjigu 
@elseif($l->gender_id == $z->id && $one->book_status_id == 1 )
je rezervisala
@elseif($l->gender_id == $z->id && $one->book_status_id == 5 )
je otpisala primjerak knjige
@endif
@endforeach
                                                @endif
                                            @endforeach
                                            
                                            @elseif($one->book_status_id == 3)
                                        
                                            @foreach ($users as $s)
                                               @if ($s->id == $one->user_who_rented_id)
            
        @foreach ($muski as $m)
        
    @if ($s->gender_id == $m->id)
    Ucenik 
    <a id="ucenik_ime" href="{{route('student.show',$s->id);}}" class="text-[#2196f3] hover:text-blue-600">
        {{$s->first_and_last_name}} 
</a>                          
    je vratio knjigu
    
    @endif
 
    @endforeach
    
    @foreach ($zenski as $z)
    @if ($s->gender_id == $z->id)
    Ucenica
    <a id="ucenik_ime" href="{{route('student.show',$s->id);}}" class="text-[#2196f3] hover:text-blue-600">
        {{$s->first_and_last_name}} 
</a>                          
    je vratila knjigu
    @endif

    @endforeach
                                               @endif
                                                   
                                               @endforeach 
                                            @endif
                                            <span id="knjiga_ime" class="font-medium">
                                                @foreach ($books as $book)
                                                @if ($book->id == $one->book_id)
                                                    {{$book->title}}
                                                @endif
                                            @endforeach</span>
                                            @if ($one->book_status_id != 5)
                                                
                                            
                                            @if ($one->book_status_id != 3)
                                                 @foreach ($users as $s)
                                                @if ($s->id == $one->user_who_rented_id)
                                                    <a id="ucenik_ime" href="{{ route('student.show', $s->id) }}"
                                                        class="text-[#2196f3] hover:text-blue-600">
                                                        {{ $s->first_and_last_name }}
                                                    </a>
                                                @endif
                                            @endforeach
                                            @elseif($one->book_status_id)
                                            @foreach ($users as $s)
                                                @if ($s->id == $one->user_who_rented_out_id)
                                                bibliotekaru
                                                    <a id="bibliotekar_ime" href="{{ route('librarian.show', $s->id) }}"
                                                        class="text-[#2196f3] hover:text-blue-600">
                                                        {{$s->first_and_last_name}}
                                                    </a>
                                                @endif
                                            @endforeach
                                            @endif
                                            @endif
                                           

                                            dana
                                                @if($one->book_status_id == 3 || $one->book_status_id == 5)
                                                <?php $datum = explode(" ",$one->updated_at);?>
                                            <span id="datum_izdavanja"
                                                class="font-medium">{{ $datum[0] }} u {{$datum[1]}}</span>
                                                @else
                                                <span id="datum_izdavanja"
                                                class="font-medium">{{ $one->rent_date }}</span>
                                                @endif
                                            <a href="{{ route('rent.show', $one->id) }}"
                                                class="text-[#2196f3] hover:text-blue-600">
                                                |DETALJNIJE|
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="inline-block w-full mt-4">
                            <button type="button"
                                class="btn-animation w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded activity-showMore hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                                Show more
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
    <?php
    
    function datum($a, $sec)
    {
        $value = $a . ' dana';
        $end = '';
        if ($a == 0 && $sec / 60 <= 60) {
            for ($i = 1; $i <= 60; $i++) {
                if (round($sec / 60) == $i) {
                    $value = "$i minuta";
                }
            }
        } else {
            if (round($sec / 3600) == 2 || round($sec / 3600) == 3 || round($sec / 3600) == 4 || round($sec / 3600) == 22 || round($sec / 3600) == 23 || round($sec / 3600) == 24) {
                $end = ' sata';
            } elseif (round($sec / 3600) == 1 || round($sec / 3600) == 21) {
                $end = ' sat';
            } else {
                $end = ' sati';
            }
            for ($i = 1; $i <= 24; $i++) {
                if (round($sec / 3600) == $i) {
                    $value = "$i" . $end;
                }
            }
        }
    
        if ($a > 7) {
            $dan = $a % 7;
            $nedelja = ($a - $dan) / 7;
            $value = $nedelja . ' nedelja/e ' . $dan . ' dan/a';
        }
        echo $value;
    }
    
    ?>
    <script>
        function fune(){
    let a = localStorage.getItem("ime");
    $(".k_trazi").each(function(i,el){
        var b = $(this).find("input");
       if($(this).find("input").val() == a){
        console.log("aaa");
            b.click();
       }
    });
}
    </script>
    <!-- Notification for small devices -->
    @include('includes.layout.inProgress')


    <!-- Scripts -->
    @include('includes.layout.scripts')
    <!-- End Scripts -->

</body>

</html>
