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
    <title>Otpisi knjigu | Library - ICT Cortex student project</title>
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
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="py-[10px] flex flex-row">
                        <div class="w-[77px] pl-[30px]">
                            @foreach ($gall as $pic)
                                    @if ($pic->book_id == $book->id)
                                        <img src="{{asset('storage/book_images/'.$pic->photo);}}"
                                    alt="" />
                                    @endif
                                @endforeach
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
                                        <li>
                                            <span class="mx-2">/</span>
                                        </li>
                                        <li>
                                            <a href="{{route("abandon_index",$book->id)}}" class="text-[#2196f3] hover:text-blue-600">
                                                Otpisi knjigu
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
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsOtpisiKnjigu hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-otpisi-knjigu">
                            <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{route('book.edit',$book->id);}}" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izmijeni knjigu</span>
                                    </a>
                                    <form action="{{route('book.destroy',$book->id);}}" method="POST">
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

            <div class="scroll height-dashboard px-[30px]">
                <div class="flex items-center justify-between py-4 pt-[20px] space-x-3 rounded-lg">
                    <h3>
                        Otpisi knjigu
                    </h3>
                    <div class="relative text-gray-600 focus-within:text-gray-400">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </span>
                        <input type="text" name="search" id="filter"
                            class="py-2 pl-10 border-[#e4dfdf] text-sm text-white border-[1px] bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                            placeholder="Search..." autocomplete="off">
                    </div>
                </div>
                <form id="fos" action="" method="post">
                    @csrf
                    @method("GET")
                <div
                    class="inline-block min-w-full pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
                    <table class="min-w-full border-[1px] border-[#e4dfdf]" id="vratiKnjiguTable">
                        <thead class="bg-[#EFF3F6]">
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="select-all form-checkbox">
                                    </label>
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Izdato uceniku
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Datum izdavanja
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Trenutno zadrzavanje knjige
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Prekoracenje u danima
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Knjigu izdao
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($rented_book_info as $rent)

                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input name="rent_id[]" type="checkbox" id="c" class="form-checkbox" value="{{$rent->id}}">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    @foreach ($gall as $pic)
                                    @if ($pic->book_id == $rent->book_id)
                                        <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{asset('storage/book_images/'.$pic->photo);}}"
                                    alt="" />
                                    @endif
                                @endforeach
                                
                                <a href="">
                                    <span class="font-medium text-center">@foreach ($users as $u)
                                        @if ($u->id == $rent->user_who_rented_id)
                                            {{$u->first_and_last_name}}
                                        @endif
                                    @endforeach</span>
                                </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$rent->rent_date}}</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    
                                    <?php 

                                    foreach ($rented as $rentt) {
                                        $date = date_create($rentt->created_at);
                                    
                              
                                    $newdate=date_format($date,"d-m-Y H:i:s");
                                    
                                    $today=date("d-m-Y H:i:s");
                                    $a= strtotime($today) - strtotime($newdate);
                                    
                                    $sec = $a;
                                    
                                    $a= round($a / 86400);
                                    
                                   
                                    echo datum($a,$sec);
                                    break;
                                    }
                                    
?></td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    
                                        <?php 

                                    foreach ($rented as $rentt) {
                                        $date = date_create($rent->return_date);
                                    
                              
                                    $newdate=date_format($date,"d-m-Y H:i:s");
                                    
                                    $today=date("d-m-Y H:i:s");
                                    $a= strtotime($today) - strtotime($newdate);
                                    
                                    $sec = $a;
                                    
                                    $a= round($a / 86400);
                                    if($a > 0){
                                        echo "<span class='px-[6px] py-[2px] bg-red-200 text-red-800 rounded-[10px]'>";
                                            echo datum($a,$sec);
                                            echo "</span>";
                                    break;
                                    }else{
                                        echo "<span>".datum($a,$sec)."</span>";
                                        break;
                                    }
                                   
                                    
                                    }
                                    
?>
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">@foreach ($users as $u)
                                    @if ($u->id == $rent->user_who_rented_out_id)
                                        {{$u->first_and_last_name}}
                                    @endif
                                @endforeach</td>
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
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                        <button type="button"
                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit" name="submit"
                            class="btn-animation disabled-btn shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                            disabled>
                            Otpiši knjigu <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    @include('includes.layout.inProgress')


    <!-- Scripts -->
    @include('includes.layout.scripts')
    <!-- End Scripts -->
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

    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <script >
        $(document).ready(function(){
         $("input[type='checkbox']").change(function(){
         console.log("SSADA");
         var ids="";
         if($("input#c:checked").length > 1){
             $("input#c:checked").each(function(){
             ids += "-" + $(this).val();
             
             
             console.log($("#fos").attr("action"));
         });
         ids = ids.slice(1);
         $("#fos").attr("action","http://127.0.0.1:8000/abandonmorebooks/"+ids);
         }else if($("input#c:checked").length == 1 ){
             var id = $("input#c:checked").val();
             $("#fos").attr("action","http://127.0.0.1:8000/abandon/"+id);
         }else{
             $("input[type='checkbox']").each(function(i,e){
                 if(e.checked == true){
                     $(this).click();
                 }
             })
         }
         
     });
        });
     </script>
</body>

</html>