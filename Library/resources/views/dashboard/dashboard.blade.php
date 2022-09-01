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
                                <img class="rounded-full" src="img/profileExample.jpg" alt="">
                            </div>
                            <div class="ml-[15px] mt-[5px] flex flex-col">
                                <div class="text-gray-500 mb-[5px]">
                                    <p class="uppercase">
                                        Izdavanje knjige
                                        <span class="inline lowercase">
                                            - Izracunacemo
                                        </span>
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        
                                            @foreach ($librarian as $l)
                                           @if ($l->id == $rent->user_who_rented_out_id)
                                           <a href="{{route('librarian.show',$l->id);}}" class="text-[#2196f3] hover:text-blue-600">
{{$l->first_and_last_name}}                           
</a>                    
@foreach ($muski as $m)
    
@if ($l->gender_id == $m->id)
je izdao knjigu 
@endif
@endforeach

@foreach ($zenski as $z)
    

@if ($l->gender_id == $z->id)
je izdala knjigu 
@endif
@endforeach


                                           @endif
                                               
                                          
                                       
                                            
                                        
                                       
                                        
                                        @endforeach<span class="font-medium">
                                            @foreach ($books as $book)
                                            @if ($book->id == $rent->book_id)
                                                {{$book->title}}
                                            @endif
                                        @endforeach</span>
                                        korisniku

                                           @foreach ($student as $s)
                                           @if ($s->id == $rent->user_who_rented_id)
                                           <a href="{{route('student.show',$s->id);}}" class="text-[#2196f3] hover:text-blue-600">
{{$s->first_and_last_name}}                   
    </a>                          
                                           @endif
                                               
                                           @endforeach
                                      
                                        dana 
                                        
                                        <span class="font-medium">{{$rent->rent_date}}</span>
                                        <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                            pogledaj detaljnije >>
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
                                    <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="aktivneRezervacije.php">
                                        Rezervisane knjige
                                    </a>
                                    <div style="background: yellow;width:0px;" class="ml-[30px] bg-yellow-600 transition duration-200 ease-in  hover:bg-yellow-900   h-[26px]">
                                    
                                    </div>
                                    <p class="ml-[10px] text-[#2196f3] hover:text-blue-600 number-yellow">
                                        Rezervisano
                                    </p>
                                </div>
                                <div class="flex pb-[30px]">
                                    <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="knjigePrekoracenje.php">
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

    <!-- Notification for small devices -->
    @include('includes\layout\inProgress')
    <?php 
    //Mozda ce biti updated_at umjesto created_at
                        foreach($all as $one){
    
                        
                            $only_date = explode(" ",$one->created_at);
                            $only_date[0] = date_create($only_date[0]);
                            $only_date[0] = date_format($only_date[0],"m/d/Y");
    
                            echo '<input id="rent_date" type="hidden" value='."$only_date[0]".'>';
                           } ?>
    <script defer>
        var fromstorage = localStorage.getItem("datum_pristupa");
        var all_rents = document.querySelectorAll("#rent_date");
        
        var i = 0;
    
        var a_date = Date.parse(fromstorage) / (1000 * 60 * 60 * 24);
        all_rents.forEach(date =>{
            var b_date = Date.parse(date.value) / (1000 * 60 * 60 * 24);
            
            if(b_date - a_date > 0){
                i++;
            }
        })
    
       localStorage.setItem("br",i);
    
     console.log(i)
    </script>

    <!-- Scripts -->
    @include('includes\layout\scripts')
    <!-- End Scripts -->

</body>

</html>