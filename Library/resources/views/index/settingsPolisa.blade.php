<!DOCTYPE html>
<html lang="en">






<!-- Postaviti uslov kako bi izbjegli gresku sa varijablama -->







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
    <title>Polisa | Library - ICT Cortex student project</title>
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
                <div class="border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] pb-[21px]">
                        <h1>
                            Settings
                        </h1>
                    </div>
                </div>
            </div>
            <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
                <a href="{{route('globalvariable.index');}}" class="inline hover:text-blue-800 active-book-nav">
                    Polisa
                </a>
                <a href="{{route('category.index');}}" class="inline ml-[70px] hover:text-blue-800">
                    Kategorije
                </a>
                <a href="{{route('genre.index');}}" class="inline ml-[70px] hover:text-blue-800">
                    Zanrovi
                </a>
                <a href="{{route('publisher.index');}}" class="inline ml-[70px] hover:text-blue-800">
                    Izdavac
                </a>
                <a href="{{route('binding.index');}}" class="inline ml-[70px] hover:text-blue-800">
                    Povez
                </a>
                <a href="{{route('format.index');}}" class="inline ml-[70px] hover:text-blue-800">
                    Format
                </a>
                <a href="{{route('alphabet.index');}}" class="inline ml-[70px] hover:text-blue-800">
                    Pismo
                </a>
            </div>
            
            
            <div class="height-ucenikProfile pb-[30px] scroll">
                <!-- Space for content -->
                <div class="section- mt-[20px]">
                    <div class="flex flex-col">
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  pb-[20px]">
                            <div>
                                <h3>
                                    Rok za rezervaciju
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Opis za rok za rezervaciju
                                </p>
                            </div>
                           
                            <div class="relative flex ml-[60px] mt-[20px]">
                            <form class="flex" style="gap:20px;" method="POST" action="{{url('globalvariable/'.$ddl_for_reservation->id);}}">
                @csrf
                @method('PUT')
                                <input type="text" name="value"
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    value="{{$ddl_for_reservation->value}}" />
                                <p class="ml-[10px] mt-[10px]">dana</p>

                                <button style="max-height:50px;"  type="submit" name="submit" class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">Sačuvaj</button>
                            </form>
                            </div>
                        </div>
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">

                        
                            <div>
                                <h3>
                                    Rok vracanja
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Opis za rok vracanja
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                            <form class="flex" style="gap:20px;" method="POST" action="{{url('globalvariable/'.$ddl_for_return->id)}}">
                @csrf
                @method('PUT')
                                <input  type="text" name="value"
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    value="{{$ddl_for_return->value}}" />
                                <p   class="ml-[10px] mt-[10px]">dana</p>
                                <button style="max-height:50px;"  type="submit" name="submit" class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">Sačuvaj</button>
                            </form>
                            </div>
                        </div>
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                        
                            <div>
                                <h3>
                                    Rok konflikta
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Opis za rok konflikta
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                            <form class="flex" style="gap:20px;" method="POST" action="{{url('globalvariable/'.$ddl_for_conflict->id);}}">
                @csrf
                @method('PUT')
                                <input  type="text" name="value"
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px] border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    value="{{$ddl_for_conflict->value}}"  />
                                <p  class="ml-[10px] mt-[10px]">dana</p>
                                <button style="max-height:50px;"  type="submit" name="submit" class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">Sačuvaj</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </form>
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