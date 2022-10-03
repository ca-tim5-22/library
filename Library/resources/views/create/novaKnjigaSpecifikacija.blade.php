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
    <title>New book | Specification | Library - ICT Cortex student project</title>
    @include('includes.layout.icon')
    <!-- End Title -->

   @include('includes.layout.icon') <!-- Styles -->
    @include('includes.layout.styles')
    <!-- End Styles -->
</head>
<?php



?>
<body class="overflow-hidden small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
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
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Nova knjiga
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
                                        <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                            Nova knjiga
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-b-[2px] py-4 text-gray-500 border-gray-300 pl-[30px]">
                        <a href="{{route('book.create');}}" class="inline hover:text-blue-800">
                            Osnovni detalji
                        </a>
                        <a href="#" class="inline active-book-nav ml-[70px] hover:text-blue-800 ">
                            Specifikacija
                        </a>
                        <a href="{{url('book/newBookMultimedia');}}" class="inline ml-[70px] hover:text-blue-800">
                            Multimedija
                        </a>
                    </div>
            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form class="text-gray-700" method="post" action="{{route('book.create');}}">
                @csrf
                @method("GET")
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[150px]">
                            <div class="mt-[20px]">
                           
                                <p>Broj strana <span class="text-red-500">*</span></p>
                                @if (isset($cache_number_of_pages))
                                     <input value="{{$cache_number_of_pages}}" type="text" name="number_of_pages" id="brStrana" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStrana()"/>


                                     @else
                                     <input type="text" name="number_of_pages" id="brStrana" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStrana()"/>
                                @endif



                                
                                <div id="validateBrStrana"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>Pismo <span class="text-red-500">*</span></p>
                                <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="alphabet" id="pismo" onclick="clearErrorsPismo()">
                                @foreach ($alphabets as $alphabet)
                                    @if ($alphabet->id == $cache_alphabet)
                                        <option value="{{$cache_alphabet}}" selected>{{$alphabet->name}}</option>
                                    @endif

                                     <option value="{{$alphabet->id}}" >{{$alphabet->name}}</option>
                                @endforeach
                                </select>
                                <div id="validatePismo"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>Povez <span class="text-red-500">*</span></p>
                                <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="binding" id="povez" onclick="clearErrorsPovez()">
                                   @foreach ($bindings as $binding)
                                    @if ($binding->id == $cache_binding)
                                        <option value="{{$cache_binding}}" selected>{{$binding->name}}</option>
                                    @endif

                                     <option value="{{$binding->id}}" >{{$binding->name}}</option>
                                @endforeach 
                                </select>
                                <div id="validatePovez"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>Format <span class="text-red-500">*</span></p>
                                <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="format" id="format" onclick="clearErrorsFormat()">
                                     @foreach ($formats as $format)

                                        @if ($format->id == $cache_format)
                                             <option value="{{$cache_format}}" selected>{{$format->name}}</option>
                                        @endif

                                        <option value="{{$format->id}}" >{{$format->name}}</option>
                                    @endforeach
                                </select>
                                <div id="validateFormat"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>International Standard Book Num <span class="text-red-500">*</span></p>
                                @if (isset($cache_ISBN))
                                     <input type="text" name="ISBN" id="isbn" value="{{$cache_ISBN}}" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbn()"/>
                                     @else
                                      <input type="text" name="ISBN" id="isbn" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbn()"/>
                                @endif
                               
                                <div id="validateIsbn"></div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <button type="reset"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                </button>
                                <button id="sacuvajSpecifikaciju" type="submit" name="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaSpecifikacija()">
                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                
            </div>
      
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    @include('includes.layout.inProgress')


    <!-- Scripts -->
    @include('includes.layout.scripts')
    <!-- End Scripts -->
    
</body>

</html>