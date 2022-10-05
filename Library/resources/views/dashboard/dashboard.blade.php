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
    <title>Dashboard | Library - ICT Cortex student project</title>
    @include('includes.layout.icon')
    <!-- End Title -->


   @include('includes.layout.icon') <!-- Styles -->

    @include('includes.layout.styles')
    <!-- End Styles -->
</head>

<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    
    <header
    class="z-20 small:hidden  flex items-center text-white justify-between w-full h-[71px] pr-[30px] mx-auto bg-[#4558BE]">
    <!-- logo -->
    <div class="logo-font inline-flex bg-[#3F51B5] py-[18px] px-[30px]">
        <a class="_o6689fn" href="#">
            <div class="block">
                <a href="{{url('');}}" class="text-[20px] font-medium">
                    <div class="flex">
                        <img src='{{asset("img\logo.svg")}}' alt="" width="35px" height="35px">
                        <p class="text-[20px] mt-[5px]">&nbsp;&nbsp;Online Biblioteka</p>
                    </div>

                </a>
            </div>
        </a>
    </div>
    <!-- end logo -->

    <!-- login -->
    <div class="flex-initial">
        <div class="relative flex items-center justify-end">
            <div class="flex items-center">
                <!-- Notification Icon -->
                <div class="relative block">
                    <a href="{{url('dashboardaktivnost');}}" class="relative inline-block px-3 py-2 focus:outline-none"
                        aria-label="Notification">
                        <div class="flex items-center h-5">
                            <div class="_xpkakx">
                                <span
                                    class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px] ">
                                    <i class="far fa-bell"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    



                    <span id="header_span"
                        class="absolute bg-[#EF4F4C] text-[11px] font-medium text-white right-[10px] top-[-10px] pl-[4px] pr-[5px] pt-[1px] text-center"><?php 
                        //Mozda ce biti updated_at umjesto created_at
                                            foreach($all as $rent){
                        
                                            
                                                $only_date = $rent->created_at;
                                                
                                                $only_date = date_create($only_date);
                                                $only_date = date_format($only_date,"m/d/Y H:i:s");
                                                
                                                echo "<input id='rent_date' type='hidden' value='$only_date' >";
                                               } ?>
                        <script>
                            var fromstorage = localStorage.getItem("datum_pristupa");
                            var all_rents = document.querySelectorAll("#rent_date");
                            
                            var i = 0;
                        
                            var a_date = Date.parse(fromstorage);
                            
                            all_rents.forEach(date =>{
                                console.log(date);
                                var b_date = Date.parse(date.value);
                                
                                if(b_date > a_date ){
                              
                                    
                                    i++;
                                    
                                }
                            })
                            
                           
                            document.write(i)
                        
                            localStorage.setItem("br",i);
                        </script> 

                    </span>




                </div>
                <!-- Add Icon -->
                <a class="inline-block border-l-[1px] border-gray-300 px-3" href="#" aria-label="Add something" id="dropdownCreate">
                    <span
                        class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px]  ">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>

                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-create">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{route('librarian.create');}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-address-book mr-[8px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Bibliotekar</span>
                            </a>
                            <a href="{{route('student.create');}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-users mr-[5px] ml-[3px] py-1"></i>
                                <span class="px-4 py-0">Ucenik</span>
                            </a>
                            <a href="{{route('book.create');}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-copy mr-[10px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Knjiga</span>
                            </a>
                            <a href="{{route('author.create');}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-address-book mr-[10px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Autor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Bild Studio Icon -->
                <a href="https://www.bild-studio.com/">
                    <img class="obex" src="{{asset("obex.png");}}" alt="">
                </a>
                <!-- User Profile Icon -->
                <div class="ml-[10px] relative block">
                    <a href="#" class="relative inline-block px-3 py-2 focus:outline-none" id="dropdownProfile"
                        aria-label="User profile">
                        <div class="flex items-center h-5">
                            <div class="w-[40px] h-[40px] mt-[15px]">
@if (auth()->user() && auth()->user()->photo  && auth()->user()->user_type_id == 2)
   <img style="width:100%;height: 100%;" class="rounded-full" src="{{asset('storage/librarian_images/crop/'.auth()->user()->photo);}}" alt=""> 
   @elseif(auth()->user() && auth()->user()->photo != null && auth()->user()->user_type_id == 1)
   <img style="width:100%;height: 100%;" class="rounded-full" src="{{asset('storage/librarian_images/crop/'.auth()->user()->photo);}}" alt=""> 
   @else
   <img style="width:100%;height: 100%;" class="rounded-full" src="{{asset('img/profileExample.jpg');}}" alt=""> 
@endif

                                
                            </div>
                        </div>
                    </a>
                </div>
                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-profile">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{route("librarian.show",auth()->user()->id);}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-file mr-[8px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Profile</span>
                            </a>
                            <form method="POST" action="{{route("logout")}}">
                                @csrf
                                @method("POST")
                            <button name="submit" type="submit" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-sign-out-alt mr-[5px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Logout</span>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
</header>
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
                    Dashboard
                </h1>
            </div>
           

            <!-- Space for content -->
            <div class="pl-[30px] scroll height-dashboard overflow-auto mt-[20px] pb-[30px]">
                <div class="flex flex-row justify-between">
                    <div class="mr-[30px]">
                        <h3 class="uppercase mb-[20px]">Aktivnosti</h3>
                        <!-- Activity Cards -->

                        @foreach ($all as $rent)
                            <div class="activity-card flex flex-row mb-[30px]">
                            <div class="w-[60px] h-[60px]">
                                @foreach ($librarian as $l)
                                    @if ($l->id == $rent->user_who_rented_out_id)
                                        @if ($l->photo != null)
                                         <img class="w-[60px] h-[60px] rounded-full" src="{{asset('storage/librarian_images/'.$l->photo)}}" alt="">
                                         @else
                                         <img class="rounded-full" src="img/profileExample.jpg" alt="">
                                        @endif
                                   
                                    @endif
                                @endforeach
                            </div>
                            <div class="ml-[15px] mt-[5px] flex flex-col">
                                <div class="text-gray-500 mb-[5px]">
                                    <p class="uppercase">
                                        @if ($rent->book_status_id == 3)
                                                        Vracanje knjige
                                                        @elseif($rent->book_status_id == 2 || $rent->book_status_id == 4)
                                                        Izdavanje knjige
                                                        @elseif($rent->book_status_id == 5)
                                                        Otpisivanje knjige
                                                        @elseif($rent->book_status_id == 1)
                                                        Rezervisanje knjige
                                        @endif
                                        <span class="inline lowercase">
                                            prije
                                            <?php 
                                            $date = date_create($rent->created_at);
                                            
                                      
$newdate=date_format($date,"d-m-Y H:i:s");

$today=date("d-m-Y H:i:s");
$a= strtotime($today) - strtotime($newdate);

$sec = $a;

$a= abs(round($a / 86400));
echo datum($a,$sec);
?>
                                        </span>
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        @if ($rent->book_status_id == 2 || $rent->book_status_id == 4 || $rent->book_status_id == 1 || $rent->book_status_id == 5)
                                        @foreach ($users as $l)
                                            @if ($l->id == $rent->user_who_rented_out_id)
                                                <a id="bibliotekar_ime"
                                                    href="{{ route('librarian.show', $l->id) }}"
                                                    class="text-[#2196f3] hover:text-blue-600">
                                                    {{ $l->first_and_last_name }}
                                                </a>
                                                @foreach ($muski as $m)

@if ($l->gender_id == $m->id && ($rent->book_status_id == 4 || $rent->book_status_id == 2))
je izdao knjigu 
@elseif($l->gender_id == $m->id && $rent->book_status_id == 1 )
je rezervisao
@elseif($l->gender_id == $m->id && $rent->book_status_id == 5 )
je otpisao primjerak knjige
@endif
@endforeach

@foreach ($zenski as $z)


@if ($l->gender_id == $z->id && ($rent->book_status_id == 4 || $rent->book_status_id == 2))
je izdala knjigu 
@elseif($l->gender_id == $z->id && $rent->book_status_id == 1 )
je rezervisala
@elseif($l->gender_id == $z->id && $rent->book_status_id == 5 )
je otpisala primjerak knjige
@endif
@endforeach
                                            @endif
                                        @endforeach
                                        
                                        @elseif($rent->book_status_id == 3)
                                    
                                        @foreach ($users as $s)
                                           @if ($s->id == $rent->user_who_rented_id)
                                           
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
                                        <span class="font-medium">
                                            @foreach ($books as $book)
                                            @if ($book->id == $rent->book_id)
                                                {{$book->title}}
                                            @endif
                                        @endforeach</span>
                                        @if($rent->book_status_id != 5)
                                        @if ($rent->book_status_id != 3)
                                             @foreach ($users as $s)
                                            @if ($s->id == $rent->user_who_rented_id)
                                                <a id="ucenik_ime" href="{{ route('student.show', $s->id) }}"
                                                    class="text-[#2196f3] hover:text-blue-600">
                                                    {{ $s->first_and_last_name }}
                                                </a>
                                            @endif
                                        @endforeach
                                        @else
                                        @foreach ($users as $s)
                                            @if ($s->id == $rent->user_who_rented_out_id)
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
                                            @if($rent->book_status_id == 3 || $rent->book_status_id == 5)
                                            <?php $datum = explode(" ",$rent->updated_at);?>
                                        <span id="datum_izdavanja"
                                            class="font-medium">{{ $datum[0] }} u {{$datum[1]}}</span>
                                            @else
                                            <span id="datum_izdavanja"
                                            class="font-medium">{{ $rent->rent_date }}</span>
                                            @endif
                                        <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                            |DETALJNIJE|
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        
                        <div class="inline-block w-full mt-4">
                            <a href="{{url('dashboardaktivnost');}}" 
                                class="btn-animation block text-center w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                                Show
                            </a>
                        </div>
                    </div>
                    <div class="mr-[50px] ">
                        <h3 class="uppercase mb-[20px] text-left">
                            Rezervacije knjiga
                        </h3>
                        <div>
                            <table class="w-[560px] table-auto">
                                <tbody class="bg-gray-200">

                                    
                                    <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                                        <td class="flex flex-row items-center px-2 py-4">
                                            <img class="object-cover w-8 h-8 rounded-full "
                                            src="img/profileStudent.jpg" alt="" />
                                            <a href="" class="ml-2 font-medium text-center">Pero Perovic</a>

                                        <td>
                                        </td>
                                        <td class="px-2 py-2">
                                            <a href="">
                                                Tom Sojer
                                            </a>          
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">31.02.2021</span>
                                        </td>
                                        <td class="px-2 py-2">
                                            <a href="#" class="hover:text-green-500 mr-[5px]">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="#" class="hover:text-red-500 ">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-right mt-[5px]">
                                <a href="aktivneRezervacije.php" class="text-[#2196f3] hover:text-blue-600">
                                    <i class="fas fa-calendar-alt mr-[4px]" aria-hidden="true"></i>
                                    Prikazi sve
                                </a>
                            </div>
                        </div>
                        <div class="relative">
                            <h3 class="uppercase mb-[20px] text-left py-[30px]">
                                Statistika
                            </h3>
                            <div class="text-right">
                                <div class="flex pb-[30px]">
                                    <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route('rent.index');}}">
                                        Izdate knjige
                                    </a>
                                    <div style="background: green;width:{{$rented}}px;" class="ml-[30px] bg-green-600 transition duration-200 ease-in hover:bg-green-900 h-[26px]">
                                    
                                    </div>
                                    <p class="ml-[10px] number-green text-[#2196f3] hover:text-blue-600">
                                        {{$rented}}
                                      
                                    </p>
                                </div>
                                <div class="flex pb-[30px]">
                                    <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route("active");}}">
                                        Rezervisane knjige
                                    </a>
                                    <div style="background: rgb(255, 166, 0);width:{{$nor[0]->nor}}px;" class="ml-[30px] bg-yellow-600 transition duration-200 ease-in  hover:bg-yellow-900   h-[26px]">
                                    
                                    </div>
                                    <p  class="ml-[10px] text-[#2196f3] hover:text-blue-600 number-yellow">
                                        {{$nor[0]->nor}}
                                    </p>
                                </div>
                                <div class="flex pb-[30px]">
                                    <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route('overdue_index');}}">
                                        Knjige u prekoracenju
                                    </a>
                                    <div style="background: red;width:{{$u_preko}}px;" class="ml-[30px] bg-red-600 transition duration-200 ease-in hover:bg-red-900  h-[26px]">
                                    
                                    </div>
                                    <p class="ml-[10px] text-[#2196f3] hover:text-blue-600 number-red">
                                        {{$u_preko}}
                                    </p>
                                </div>
                            </div>
                            <div class="absolute h-[220px] w-[1px] bg-black top-[78px] left-[174px]">
                            </div>
                            <div class="absolute flex conte left-[175px] border-t-[1px] border-[#e4dfdf] top-[248px] pr-[87px]">
                                <p style="margin-left:-13px">
                                    0
                                </p>
                                <p style="margin-left:47px">
                                    50
                                </p>
                                <p style="margin-left:47px">
                                    100
                                </p>
                                <p style="margin-left:47px">
                                    150
                                </p>
                                <p style="margin-left:47px">
                                    200
                                </p>
                           
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
    <?php

    function datum($a,$sec){
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
    @include('includes.layout.inProgress')
    

    <!-- Scripts -->
    @include('includes.layout.scripts')
    <!-- End Scripts -->

</body>

</html>