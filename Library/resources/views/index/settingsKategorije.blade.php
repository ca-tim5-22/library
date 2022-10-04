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
    <title>Polisa | Library - ICT Cortex student project</title>
    @include('includes.layout.icon')
    <!-- End Title -->

   @include('includes.layout.icon') <!-- Styles -->
    @include('includes.layout.styles')
    <!-- End Styles -->
</head>

<body onload="load();" class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
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
                <div class="border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] pb-[21px]">
                        <h1>
                            Settings
                        </h1>
                    </div>
                </div>
            </div>
            <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
                <a href="{{route('globalvariable.index');}}" class="inline hover:text-blue-800">
                    Polisa
                </a>
                <a href="{{route('category.index');}}" class="inline ml-[70px] hover:text-blue-800 active-book-nav">
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
                <a href="{{route('language.index');}}" class="inline ml-[70px] hover:text-blue-800">
                    Jezik
                </a>
                <a href="{{route('alphabet.index');}}" class="inline ml-[70px] hover:text-blue-800">
                    Pismo
                </a>
            </div>
            <div class="height-kategorije pb-[30px] scroll">
                <div class="flex items-center px-[50px] py-8 space-x-3 rounded-lg">
                    <a href="{{route('category.create');}}"
                        class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-plus mr-[15px]"></i> Nova kategorija
                    </a>
                </div>

                <div
                    class="inline-block min-w-full px-[50px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
                    <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                        <thead class="bg-[#EFF3F6]">
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input id="all_checked" type="checkbox" class="form-checkbox">
                                    </label>
                                </th>
                                <th id="default_checked"  class="px-4 py-4 leading-4 tracking-wider text-left">Naziv kategorije
                                <a 
                                @if (Route::current()->getName() == "category.index")
                                    href="{{route('category.sort');}}"
                                    @elseif(Route::current()->getName() == "category.sort")
                                    href="{{route('category.index');}}"
                                @endif
                                >

                                @if (Route::current()->getName() == "category.index")
                                    <i class="ml-3 fa-lg fas fa-long-arrow-alt-down"></i>

                                    @elseif(Route::current()->getName() == "category.sort")
                                     <i class="ml-3 fa-lg fas fa-long-arrow-alt-up"></i>
                                @endif
                                
                                
                                
                                </a>
                                </th>
                                <th id="default_checked"  class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Opis</th>
                                <th id="default_checked" class="px-4 py-4"> </th>

                                <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                    <form id="kat_delete_all" action="" method="POST">
                                        @csrf
                                        @method("get")
                                        <button style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" type="submit" name="submit">
                                            Izbrišite kategorije
                                        </button>


                                    </form>
                                </th>
                                <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                <th id="if_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
                                


                                
                                <th style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                    <a id="kat_edit" href="">
                                    Izmijeni kategoriju</a>
                                </th>
                                <th style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                    <form id="kat_delete" method="POST" action="">
                                        @csrf
                                        @method('DELETE')
                                        <button style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" type="submit" name="submit">
                                            Izbrišite kategoriju
                                        </button>
                                        
                                        </button>
                                        </form>
                                    
                                
                                </th>
                                <th style="color: rgb(58, 26, 152);font-weight:600;font-style:italic;" id="if_one_checked" class="none px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                    
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($categories as $c)
                            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input id="table_checkboxes" type="checkbox" class="form-checkbox" data-kat-id="{{$c->id}}">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    @if ($c->icon)
                                    <img class="pic" src="{{asset('storage/category_icons/crop/'.$c->icon)}}" class="bd-placeholder-img card-img-top" alt="" style="width:60px;height:60px;">
                                    @endif
                                   
                                    {{--  <i class="fas fa-utensils fa-lg text-[#707070]"></i>  --}}
                                    <p class="ml-4 text-center">{{$c->name}}</p>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$c->description}}</td>
                                <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p style="position:relative;" class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsCategory hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div style="position:absolute;right:80px;"
                                        class=" z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-category">
                                        <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                            aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                            
                                            <div class="py-1">

                                                <a href="{{url('/category/'.$c->id).'/edit'}}" tabindex="0"  class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                                   
                
                                                    <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izmijeni kategoriju</span>
                                                </a>


                                                <form action="{{route('category.destroy',$c->id)}}" method="POST"class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                    <span type="submit" class="px-4 py-0">Izbrisi kategoriju</span> 
                                                    </button>
                                                </form>



                                               {{--   <a href="category/$c->id" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    
                                                    <span class="px-4 py-0">Izbrisi kategoriju</span>
                                                </a>  --}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="flex flex-row items-center justify-end my-3">
                    
                       
                                
                        <div> 
                        @if (URL::current() == "http://127.0.0.1:8000/categorysort")
                             <form style="margin-right:20px;" id="formica" method="POST" action="{{route("category.sort")}}">
                             @else
                            <form style="margin-right:20px;" id="formica" method="POST" action="{{route("category.index")}}">
                        @endif
                       
                        @csrf
                        @method("GET")
                         <select onchange="this.form.submit()" id="selectica" form="formica" 
                                class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
                                name="paginate">

                                @if (isset($currentpag))
                                @if ($currentpag == 2)
                                <option id="selecticaoption" value="2" disabled selected>2</option>
                                <option id="selecticaoption" value="4">4</option>
                                <option id="selecticaoption" value="6">6</option>
                                <option id="selecticaoption" value="8">8</option>
                                <option id="selecticaoption" value="10">10</option>
                                @endif
                                @if ($currentpag == 4)
                                <option id="selecticaoption" value="2" >2</option>
                                <option id="selecticaoption" value="4" disabled selected>4</option>
                                <option id="selecticaoption" value="6">6</option>
                                <option id="selecticaoption" value="8">8</option>
                                <option id="selecticaoption" value="10">10</option>
                                @endif

                                @if ($currentpag == 6)
                                    <option id="selecticaoption" value="2" >2</option>
                                <option id="selecticaoption" value="4">4</option>
                                <option id="selecticaoption" value="6"  disabled selected>6</option>
                                <option id="selecticaoption" value="8">8</option>
                                <option id="selecticaoption" value="10">10</option>
                                @endif

                                @if ($currentpag == 8)
                                    <option id="selecticaoption" value="2" >2</option>
                                <option id="selecticaoption" value="4">4</option>
                                <option id="selecticaoption" value="6" >6</option>
                                <option id="selecticaoption" value="8"  disabled selected>8</option>
                                <option id="selecticaoption" value="10">10</option>
                                @endif

                                @if ($currentpag == 10)
                                    <option id="selecticaoption" value="2" >2</option>
                                <option id="selecticaoption" value="4" >4</option>
                                <option id="selecticaoption" value="6">6</option>
                                <option id="selecticaoption" value="8">8</option>
                                <option id="selecticaoption" value="10" disabled selected>10</option>
                                @endif

                                    @else
                            
                                @endif
                              
                            </select> 
                            
                            </form>
                          
 
                    </div>  
                            <p class="inline text-md">
                            
                              {{ $categories->onEachSide($currentpag)->links("vendor.pagination.tailwind") }}
                            </p>

                </div>

                </div>
            </div>

        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
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
                  
                    
                    var kat_edit = document.getElementById("kat_edit");
                    var kat_delete = document.getElementById("kat_delete");
                    
                    var id = e.dataset.katId;
                   
                   
                    
                    kat_edit.setAttribute("href","http://127.0.0.1:8000/category/"+id+"/edit");
                    kat_delete.setAttribute("action","http://127.0.0.1:8000/category/"+id);
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
                    var kat_delete_more = document.getElementById("kat_delete_all");
                    var checked = document.querySelectorAll("#table_checkboxes:checked");
                    var ids="";
                    checked.forEach(checked =>{
                        ids += "-"+checked.dataset.katId;
                    })
                    
                    ids = ids.slice(1);
                    kat_delete_more.setAttribute("action","http://127.0.0.1:8000/deletekat/"+ids)
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
        
        
                </script>
    <!-- Notification for small devices -->
    @include('includes.layout.inProgress')


    <!-- Scripts -->
    @include('includes.layout.scripts')
    <!-- End Scripts -->

</body>

</html>