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
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                {{$librarian->first_and_last_name}}
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{route('librarian.index');}}" class="text-[#2196f3] hover:text-blue-600">
                                            Svi bibliotekari
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="{{route('librarian.show',$librarian->id);}}" class="text-[#2196f3] hover:text-blue-600">
                                            ID-{{$librarian->id}}
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


                        <a href="{{route('librarian.edit',$librarian->id)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="fas fa-edit mr-[3px] "></i>
                            Izmjeni podatke
                        </a>
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsLibrarianProfile hover:text-[#606FC7]"
                            id="dropdownStudent">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-librarian-profile">
                            <div class="absolute right-0 w-56 mt-[10px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <form method="POST" action="{{route('librarian.destroy',$librarian->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" tabindex="0"
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
            <!-- Space for content -->
            <div class="pl-[30px] height-profile pb-[30px] scroll mt-[20px]">
                <div class="flex flex-row">
                    <div class="mr-[30px]">
                        <div class="mt-[20px]">
                            <span class="text-gray-500">Ime i prezime</span>
                            <p class="font-medium">{{$librarian->first_and_last_name}}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Tip korisnika</span>
                            <p class="font-medium">Bibliotekar</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">JMBG</span>
                            <p class="font-medium">{{$librarian->PIN}}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Email</span>
                            <a
                                class="cursor-pointer block font-medium text-[#2196f3] hover:text-blue-600">{{$librarian->email}}</a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Korisnicko ime</span>
                            <p class="font-medium">{{$librarian->username}}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Broj logovanja</span>
                            <p class="font-medium">{{$number_of_logins}}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Poslednji put logovan/a</span>
                            @if (isset($last_login->time))
                            <?php 
                                $datum = explode(" ",$last_login->time)
                            ?>
                            <p class="font-medium">{{$datum[0]}} u {{$datum[1]}}</p>
                            @else
                            <p class="font-medium">Nikad nije logovan</p>
                            @endif
                            
                        </div>

                    </div>
                    <div class="ml-[100px]  mt-[20px]">
                    @if (empty($librarian->photo))
                                            <img class="p-2 border-2 border-gray-300" src="{{asset('img/profileStudent.jpg');}}" alt=""/>

                                           @else <img class="p-2 border-2 border-gray-300" src="{{asset('storage/librarian_images/crop/'.$librarian->photo)}}" alt=""/>
                                        @endif
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->

    <!-- This code will show up when we press reset password -->
    <div
        class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 modal">
        <!-- Modal -->
        <div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
                <h3>Resetuj sifru: {{$librarian->first_and_last_name}}</h3>
                <button class="text-black close-modal">&cross;</button>
            </div>
            <!-- Modal Body -->
            <form  method="POST" action="{{route('resetpassword.update',$librarian->id);}}" >
                
                <div class="flex flex-col px-[30px] py-[30px]">
                    @csrf
                @method("PUT")
                    <div class="flex flex-col pb-[30px]">
                        <span>Unesi novu sifru <span class="text-red-500">*</span></span>
                        <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="password" id="pwResetBibliotekar" onkeydown="clearErrorsPwResetBibliotekar()">
                        <div id="validatePwResetBibliotekar"></div>
                    </div>
                    <div class="flex flex-col pb-[30px]">
                        <span>Ponovi sifru <span class="text-red-500">*</span></span>
                        <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="password2" id="pw2ResetBibliotekar" onkeydown="clearErrorsPw2ResetBibliotekar()">
                        <div id="validatePw2ResetBibliotekar"></div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                    <button type="reset"
                        class="shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                        Ponisti <i class="fas fa-times ml-[4px]"></i>
                    </button>
                    <button id="resetujSifruBibliotekar" type="submit"
                        class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                        onclick="validacijaSifraBibliotekar()">
                        Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notification for small devices -->
    @include('includes.layout.inProgress')


    <!-- Scripts -->
    @include('includes.layout.scripts')
    <!-- End Scripts -->

</body>

</html>