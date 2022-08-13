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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- Title -->
    <title>Edit book | Library - ICT Cortex student project</title>
    @include('includes\layout\icon')
    <!-- End Title -->

    @include('includes\layout\icon')
    <!-- Styles -->
    @include('includes\layout\styles')
    <!-- End Styles -->
</head>

<body class="overflow-hidden small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    @include('includes\layout\header')
    <!-- Header -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        <!-- Sidebar -->
        @include('includes\layout\sidebar')
        <!-- End Sidebar -->

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Izmijeni podatke
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{ route('book.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                            Evidencija knjiga
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-blue-600">
                                            Izmijeni podatke
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
                <p style="cursor:pointer;" id="info_link" class="inline active-book-nav hover:text-blue-800">
                    Osnovni detalji
                </p>
                <p style="cursor:pointer;" id="spec_link" class="inline ml-[70px] hover:text-blue-800 ">
                    Specifikacija
                </p>
                <p style="cursor:pointer;" id="mult_link" class="inline ml-[70px] hover:text-blue-800">
                    Multimedija
                </p>
            </div>
            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form class="text-gray-700" method="POST" action="{{ route('book.update', $book->id) }}">
                    @csrf
                    @method('PUT')
                    <div id="new_book_information" class="">

                        <div style="grid-template-columns:50% 50%;"class="grid ml-[30px] mb-[150px]">
                            <div style="grid-column:1;" class="w-[100%]">
                                <div class="mt-[20px]">
                                    <p>Naziv knjige <span class="text-red-500">*</span></p>
                                    <input type="text" name="title" id="nazivKnjiga" value="{{ $book->title }}"
                                        class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        onkeydown="clearErrorsNazivKnjiga()" />
                                    <div id="validateNazivKnjiga"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p class="inline-block mb-2">Kratki sadrzaj</p>
                                    <textarea name="content"
                                        class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">
    {{ $book->content }}
                                </textarea>
                                </div>
                                <div class="mt-[20px]">
                                    <p>Izaberite kategorije <span class="text-red-500">*</span></p>
                                    <div style="width:90.5%;" class="row d-flex justify-content-center mt-100">
                                        <div class="col-md-6">

                                            <select id="choices-multiple-remove-button" name="category_id[]" multiple>

@foreach ($categories_of_book as $cob)
<option value="{{$cob->id}}" selected>{{$cob->name}}</option>
    
@endforeach

@foreach ($categories as $category)
<option value="{{$category->id}}" >{{$category->name}}</option>
@endforeach
                                   
                                            </select>

                                        </div>
                                        <div id="validateKategorija"></div>
                                    </div>


                                </div>
                                <div class="mt-[20px]">
                                    <p>Izaberite zanrove <span class="text-red-500">*</span></p>
                                    <div style="width:90.5%;" class="row d-flex justify-content-center">
                                        <div class="col-md-6">
                                           
                                            <select id="choices-multiple-remove-button" name="genres_id[]" multiple>
                                                @foreach ($genres_of_book as $gob)
                                                <option value="{{$gob->id}}" selected>{{$gob->name}}</option>
                                                    
                                                @endforeach
                                                
                                                @foreach ($genres as $genre)
                                                <option value="{{$genre->id}}" >{{$genre->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="validateZanr"></div>
                                    </div>


                                </div>




                            </div>



                            <div style="grid-column:2;" class="w-[100%]">
                                <div class="mt-[20px]">
                                    <p>Izaberite autore <span class="text-red-500">*</span></p>
                                    <div style="width:90.5%;" class="row d-flex justify-content-center mt-100">
                                        <div class="col-md-6">
                                            
                                            <select id="choices-multiple-remove-button" name="author_id[]" multiple>
                                               
                                                @foreach ($authors_of_book as $aob)
                                                <option value="{{$aob->id}}" selected>{{$aob->first_and_last_name}}</option>
                                                    
                                                @endforeach
                                                
                                                @foreach ($authors as $author)
                                                <option value="{{$author->id}}" >{{$author->first_and_last_name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div id="validateKategorija"></div>
                                    </div>
                                    <div id="validateAutori"></div>

                                </div>


                                <div class="mt-[20px]">
                                    <p>Izdavac <span class="text-red-500">*</span></p>
                                    <select
                                        class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        name="publisher" id="izdavac" onclick="clearErrorsIzdavac()">
                                        <option value="{{ $book->publisher->id }}" selected>{{ $book->publisher->name }}
                                        </option>
                                        @foreach ($publishers as $publisher)
                                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validateIzdavac"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p>Godina izdavanja <span class="text-red-500">*</span></p>
                                    <select
                                        class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        name="release_date" id="godinaIzdavanja"
                                        onclick="clearErrorsGodinaIzdavanja()">
                                        <option value="{{ $book->release_date }}" selected>
                                            {{ $book->release_date }}.godina</option>
                                        @for ($i = 1900; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}">{{ $i }}.godina</option>
                                        @endfor
                                    </select>
                                    <div id="validateGodinaIzdavanja"></div>
                                </div>
                                <div class="mt-[20px]">
                                    <p>Kolicina <span class="text-red-500">*</span></p>
                                    <input type="text" name="total" id="knjigaKolicina"
                                        value="{{ $book->total }}"
                                        class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        onkeydown="clearErrorsKnjigaKolicina()" />
                                    <div id="validateKnjigaKolicina"></div>
                                </div>
                            </div>
                        </div>





                    </div>






                    <div id="new_book_specification" class="nonactive-form">
                        <div class="flex flex-row ml-[30px]">
                            <div class="w-[50%] mb-[150px]">
                                <div class="mt-[20px]">

                                    <p>Broj strana <span class="text-red-500">*</span></p>

                                    <input type="text" name="number_of_pages" id="brStrana"
                                        value="{{ $book->number_of_pages }}"
                                        class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        onkeydown="clearErrorsBrStrana()" />





                                    <div id="validateBrStrana"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p>Pismo <span class="text-red-500">*</span></p>
                                    <select
                                        class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        name="alphabet" id="pismo" onclick="clearErrorsPismo()">
                                        <option value="{{ $book->alphabet->id }}" selected>{{ $book->alphabet->name }}
                                        </option>
                                        @foreach ($alphabets as $alphabet)
                                            <option value="{{ $alphabet->id }}">{{ $alphabet->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validatePismo"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p>Povez <span class="text-red-500">*</span></p>
                                    <select
                                        class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        name="binding" id="povez" onclick="clearErrorsPovez()">
                                        <option value="{{ $book->binding->id }}" selected>{{ $book->binding->name }}
                                        </option>
                                        @foreach ($bindings as $binding)
                                            <option value="{{ $binding->id }}">{{ $binding->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validatePovez"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p>Format <span class="text-red-500">*</span></p>
                                    <select
                                        class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        name="format" id="format" onclick="clearErrorsFormat()">
                                        <option value="{{ $book->format }}" selected></option>
                                        @foreach ($formats as $format)
                                            <option value="{{ $format->id }}">{{ $format->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validateFormat"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p>International Standard Book Num <span class="text-red-500">*</span></p>

                                    <input type="text" name="ISBN" id="isbn" value="{{ $book->ISBN }}"
                                        class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                        onkeydown="clearErrorsIsbn()" />


                                    <div id="validateIsbn"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="new_book_multimedia" class="nonactive-form">

                        <div class="w-9/12 mx-auto bg-white rounded p7 mt-[40px] mb-[150px]">
                            <div x-data="dataFileDnD()"
                                class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                                <div x-ref="dnd"
                                    class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                    <input accept="*" type="file" multiple
                                        class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                        @change="addFiles($event)"
                                        @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                        @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                        @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                        title="" />

                                    <div class="flex flex-col items-center justify-center py-10 text-center">
                                        <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="m-0">Drag your files here or click in this area.</p>
                                    </div>
                                </div>

                                <template x-if="files.length > 0">
                                    <div class="grid grid-cols-4 gap-4 mt-4" @drop.prevent="drop($event)"
                                        @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                        <template x-for="(_, index) in Array.from({ length: files.length })">
                                            <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                style="padding-top: 100%;" @dragstart="dragstart($event)"
                                                @dragend="fileDragging = null"
                                                :class="{ 'border-blue-600': fileDragging == index }" draggable="true"
                                                :data-index="index">
                                                <!-- Checkbox -->
                                                <input
                                                    class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                    type="radio" name="chosen_image" />
                                                <!-- End checkbox -->
                                                <button
                                                    class="absolute bottom-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                    type="button" @click="remove(index)">
                                                    <svg class="w-[25px] h-[25px] text-gray-700"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        nviewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                                <template x-if="files[index].type.includes('audio/')">
                                                    <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                    </svg>
                                                </template>
                                                <template
                                                    x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                    <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                </template>
                                                <template x-if="files[index].type.includes('image/')">
                                                    <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                        x-bind:src="loadFile(files[index])" />
                                                </template>
                                                <template x-if="files[index].type.includes('video/')">
                                                    <video
                                                        class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                        <fileDragging x-bind:src="loadFile(files[index])"
                                                            type="video/mp4">
                                                    </video>
                                                </template>

                                                <div
                                                    class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                    <span class="w-full font-bold text-gray-900 truncate"
                                                        x-text="files[index].name">Loading</span>
                                                    <span class="text-xs text-gray-900"
                                                        x-text="humanFileSize(files[index].size)">...</span>
                                                </div>

                                                <div class="absolute inset-0 z-40 transition-colors duration-300"
                                                    @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                                                    :class="{
                                                        'bg-blue-200 bg-opacity-80': fileDropping == index &&
                                                            fileDragging !=
                                                            index
                                                    }">
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>
                    <div style="width:100%;display:grid;justify-content:center;" id="validaciona_poruka"></div>
            </div>


            </div>


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
                        <button id="sacuvajKnjigu"
                            class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                            onclick="validacijaKnjiga()">
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
    @include('includes\layout\inProgress')


    <!-- Scripts -->
    @include('includes\layout\scripts')
    <!-- End Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script>
        CKEDITOR.replace('content', {
            width: "90%",
            height: "150px"
        });
    </script>

</body>

</html>
