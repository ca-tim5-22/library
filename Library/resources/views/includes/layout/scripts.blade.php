<script src="{{asset('jquery.min.js');}}" defer=""></script>

<script src="{{asset('app.js');}}" defer=""></script>

<script src="{{asset('my.js');}}" defer=""></script>

<script src="{{asset('search.js');}}" defer></script>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<!-- File upload -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/create-file-list"></script>

<script>
    const dashboard = document.getElementById("dashboard-i")
const bibliotekari = document.getElementById("bibliotekari-i")
const ucenici = document.getElementById("ucenici-i")
const knjige = document.getElementById("knjige-i")
const autori = document.getElementById("autori-i")
const izdavanjeknjige = document.getElementById("izdavanjeknjige-i")

const dashboard_div = document.getElementById("dashboard-i")
const bibliotekari_div = document.getElementById("bibliotekari-i")
const ucenici_div = document.getElementById("ucenici-i")
const knjige_div = document.getElementById("knjige-i")
const autori_div = document.getElementById("autori-i")
const izdavanjeknjige_div = document.getElementById("izdavanjeknjige-i")

const dashboard_li = document.getElementById("dashboard-li")
const bibliotekari_li = document.getElementById("bibliotekari-li")
const ucenici_li = document.getElementById("ucenici-li")
const knjige_li = document.getElementById("knjige-li")
const autori_li = document.getElementById("autori-li")
const izdavanjeknjige_li = document.getElementById("izdavanjeknjige-li")
 let url = window.location.pathname
let newarray = url
    if(newarray.includes("librarian")){
       
        bibliotekari.classList.add("bg-[#3F51B5]","text-white","rounded-[3px]")
        bibliotekari.classList.remove("text-[#707070]","group-hover:text-[#576cdf]")
        bibliotekari_li.classList.add("bg-[#EAEAEA]")
        dashboard.classList.remove("bg-[#3F51B5]")
        dashboard_li.classList.toggle("bg-[#EAEAEA]")
        dashboard.classList.add("text-[#707070]","group-hover:text-[#576cdf]")
        ucenici.classList.remove("bg-[#3F51B5]")
        ucenici.classList.add("text-[#707070]")
        knjige.classList.remove("bg-[#3F51B5]")
        knjige.classList.add("text-[#707070]")
        autori.classList.remove("bg-[#3F51B5]")
        autori.classList.add("text-[#707070]")
        izdavanjeknjige.classList.remove("bg-[#3F51B5]")
        izdavanjeknjige.classList.add("text-[#707070]")
    }else if(newarray.includes("student")){
        ucenici.classList.add("bg-[#3F51B5]","text-white","rounded-[3px]")
        ucenici.classList.remove("text-[#707070]","group-hover:text-[#576cdf]")
        ucenici_li.classList.add("bg-[#EAEAEA]")
        dashboard.classList.remove("bg-[#3F51B5]")
        dashboard_li.classList.toggle("bg-[#EAEAEA]")
        dashboard.classList.add("text-[#707070]","group-hover:text-[#576cdf]")
        bibliotekari.classList.remove("bg-[#3F51B5]")
        bibliotekari.classList.add("text-[#707070]")
        knjige.classList.remove("bg-[#3F51B5]")
        knjige.classList.add("text-[#707070]")
        autori.classList.remove("bg-[#3F51B5]")
        autori.classList.add("text-[#707070]")
        izdavanjeknjige.classList.remove("bg-[#3F51B5]")
        izdavanjeknjige.classList.add("text-[#707070]")
    }else if(newarray.includes("book")){
        knjige.classList.add("bg-[#3F51B5]","text-white","rounded-[3px]")
        knjige.classList.remove("text-[#707070]","group-hover:text-[#576cdf]")
        knjige_li.classList.add("bg-[#EAEAEA]")
        dashboard.classList.remove("bg-[#3F51B5]")
        dashboard_li.classList.toggle("bg-[#EAEAEA]")
        dashboard.classList.add("text-[#707070]","group-hover:text-[#576cdf]")
        bibliotekari.classList.remove("bg-[#3F51B5]")
        bibliotekari.classList.add("text-[#707070]")
        ucenici.classList.remove("bg-[#3F51B5]")
        ucenici.classList.add("text-[#707070]")
        autori.classList.remove("bg-[#3F51B5]")
        autori.classList.add("text-[#707070]")
        izdavanjeknjige.classList.remove("bg-[#3F51B5]")
        izdavanjeknjige.classList.add("text-[#707070]")
    }else if(newarray.includes("author")){
        autori.classList.add("bg-[#3F51B5]","text-white","rounded-[3px]")
        autori.classList.remove("text-[#707070]","group-hover:text-[#576cdf]")
        autori_li.classList.add("bg-[#EAEAEA]")
        dashboard.classList.remove("bg-[#3F51B5]")
        dashboard_li.classList.toggle("bg-[#EAEAEA]")
        dashboard.classList.add("text-[#707070]","group-hover:text-[#576cdf]")
        bibliotekari.classList.remove("bg-[#3F51B5]")
        bibliotekari.classList.add("text-[#707070]")
        ucenici.classList.remove("bg-[#3F51B5]")
        ucenici.classList.add("text-[#707070]")
        knjige.classList.remove("bg-[#3F51B5]")
        knjige.classList.add("text-[#707070]")
        izdavanjeknjige.classList.remove("bg-[#3F51B5]")
        izdavanjeknjige.classList.add("text-[#707070]")
    }else if(newarray.includes("rent")){
        izdavanjeknjige.classList.add("bg-[#3F51B5]","text-white","rounded-[3px]")
        izdavanjeknjige.classList.remove("text-[#707070]","group-hover:text-[#576cdf]")
        izdavanjeknjige_li.classList.add("bg-[#EAEAEA]")
        dashboard.classList.remove("bg-[#3F51B5]")
        dashboard_li.classList.toggle("bg-[#EAEAEA]")
        dashboard.classList.add("text-[#707070]","group-hover:text-[#576cdf]")
        bibliotekari.classList.remove("bg-[#3F51B5]")
        bibliotekari.classList.add("text-[#707070]")
        ucenici.classList.remove("bg-[#3F51B5]")
        ucenici.classList.add("text-[#707070]")
        knjige.classList.remove("bg-[#3F51B5]")
        knjige.classList.add("text-[#707070]")
        autori.classList.remove("bg-[#3F51B5]")
        autori.classList.add("text-[#707070]")
    }
    </script>