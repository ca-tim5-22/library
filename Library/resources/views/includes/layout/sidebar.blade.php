<nav id="sidebar"
    class="fixed z-10 flex flex-col justify-between overflow-x-hidden overflow-y-auto bg-[#EFF3F6] sidebar nav-height">
    <div class="">
        <!-- Hamburger Icon -->
        <div 
            class="cursor-pointer text-[#707070]  text-[25px] border-b-[1px] border-[#e4dfdf] " >
            <i id="hamburger" class="pl-[30px] pt-[28px] pb-[27px] pr-[30px] hamburger-btn fas fa-bars" ></i>
        </div>
        <div class="mt-[30px]">
            <ul class="text-[#2D3B48] sidebar-nav">
                <!-- Dashboard Icon -->
                <li id="dashboard-li" class="bg-[#EAEAEA] pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA]">
                    <div class="ml-[25px]">
                        <span class="flex justify-between w-full fill-current whitespace-nowrap">
                            <div style="display:flex;" id="dashboard-div" >
                                <a style="display:flex;" href="{{url('dashboard');}}" aria-label="Dashboard">
                                    <i id="dashboard-i" class="text-white bg-[#3F51B5] px-[5px] pt-[4px] pb-[5px] fas fa-tachometer-alt text-[19px] rounded-[3px] "></i>
                                    <div class="hidden sidebar-item align-self-center">
                                        <p class="inline text-[15px] ml-[15px]">Dashboard</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Bibliotekari Icon -->
                <li id="bibliotekari-li" class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[25px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div style="display:flex;" id="bibliotekari-div">
                                <a style="display:flex;" href="{{route('librarian.index');}}" aria-label="Bibliotekari">
                                    <i style="padding:4px 5px 5px 5px;" id="bibliotekari-i" class="text-[25px] text-[#707070] far fa-address-book transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                    <div class="hidden sidebar-item align-self-center">
                                        <p 
                                            class=" inline text-[15px] ml-[15px]">
                                            Bibliotekari
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Ucenici Icon -->
                <li id="ucenici-li" class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[25px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div style="display:flex;" id="ucenici-div">
                                <a style="display:flex;" href="{{route('student.index');}}" aria-label="Ucenici">
                                    <i style="padding:4px 5px 5px 5px;"  id="ucenici-i" class="text-[18px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-users"></i>
                                    <div class="hidden sidebar-item align-self-center">
                                        <p
                                            class="inline text-[15px] ml-[15px]">
                                            Ucenici</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Knjige Icon -->
                <li id="knjige-li" class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[25px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div style="display:flex;" id="knjige-div">
                                <a style="display:flex;" href="{{route('book.index');}}" aria-label="Knjige">
                                    <i style="padding:4px 5px 5px 5px;"  id="knjige-i" class="text-[25px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] far fa-copy"></i>
                                    <div class="hidden sidebar-item align-self-center">
                                        <p
                                            class=" inline text-[15px] ml-[15px]">
                                            Knjige</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Autori Icon -->
                <li id="autori-li" class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[25px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div style="display:flex;" id="autori-div">
                                <a style="display:flex;" href="{{route('author.index')}}" aria-label="Knjige">
                                    <i style="padding:4px 5px 5px 5px;"  id="autori-i" class="text-[25px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] far fa-address-book"></i>
                                    <div class="hidden sidebar-item align-self-center">
                                        <p
                                            class="inline text-[15px] ml-[15px]">
                                            Autori</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Izdavanje Icon -->
                <li id="izdavanjeknjige-li" class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[25px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div style="display:flex;" id="izdavanjeknjige-div">
                                <a style="display:flex;" href="{{route('rent.index');}}" aria-label="Knjige">
                                    <i style="padding:4px 5px 5px 5px;"  id="izdavanjeknjiga-i" class="text-[22px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-exchange-alt"></i>
                                    <div class="hidden sidebar-item align-self-center">
                                        <p
                                            class=" inline text-[15px] ml-[15px]">
                                            Izdavanje
                                            knjiga
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                {{--  <!-- Expand menu example -->
                <li id="-li" class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA]">
                    <div style="margin-left:25px;">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div style="display:flex;" >
                                <a style="display:flex;" href="#" aria-label="Dashboard">
                                    <i style="padding:4px 5px 5px 5px;"  id="ex-i" class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[25px] text-[#707070] fas fa-expand"></i>
                                    <div class="hidden sidebar-item align-self-center">
                                        <p
                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Expand example</p>
                                    </div>
                                </a>
                            </div>
                            <div id="item-collapse_1"
                                class="asideArrow hidden sidebar-item transition duration-300 ease-in hover:text-[#576cdf] cursor-pointer">
                                <i id="arrow-collapse_1" class="inline arrow fas fa-angle-right"></i>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Expand menu - items -->
                <ul id="aside-item_1"
                    class="aside-item hidden pl-[70px] mt-[5px] pt-[8px] pb-[10px] text-[#778089] text-[14px]">
                    <li class="mb-[4px] py-[6px]">
                        <div class="transition duration-300 ease-in hover:text-[#2d3b48]">
                            <a href="#" aria-label="Dashboard">
                                <div class="hidden sidebar-item">
                                    <p class="inline">Basic expand</p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="mb-[4px] py-[6px]">
                        <div class="transition duration-300 ease-in hover:text-[#2d3b48]">
                            <a href="#" aria-label="Dashboard">
                                <div class="hidden sidebar-item">
                                    <p class="inline">Basic expand</p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="mb-[4px] py-[6px]">
                        <div class="transition duration-300 ease-in hover:text-[#2d3b48]">
                            <a href="#" aria-label="Dashboard">
                                <div class="hidden sidebar-item">
                                    <p class="inline">Basic expand</p>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>  --}}
            </ul>
        </div>
    </div>
    <div class="sidebar-nav py-[10px] border-t-[1px] border-[#e4dfdf] pt-[23px] pb-[29px]  group hover:bg-[#EFF3F6]">
        <!-- Settings Icon -->
        <a href="{{route('globalvariable.index');}}" aria-label="Settings" class="ml-[30px]">
            <span class="whitespace-nowrap">
                <i
                    class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[22px] text-[#707070] fas fa-cog"></i>
                <div class="hidden sidebar-item">
                    <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                        Settings</p>
                </div>
            </span>
        </a>
    </div>
</nav>