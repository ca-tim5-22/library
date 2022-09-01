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

const newbookinfo = document.getElementById("new_book_information")
const newbookspec = document.getElementById("new_book_specification")
const newbookmult = document.getElementById("new_book_multimedia")

const info_link = document.getElementById("info_link")
const spec_link = document.getElementById("spec_link")
const mult_link = document.getElementById("mult_link")

const nbm = document.getElementById("new_book_multimedia");
var book_image = document.getElementById("book_image");
const all_images= document.getElementById("all_images");
var header_span = document.getElementById("header_span")
let url = window.location.pathname
var radio= [];

var currentDate = new Date()
var day = currentDate.getDate()
var month = currentDate.getMonth() + 1
var year = currentDate.getFullYear()

var trenutnidatum = + year + "/" + month + "/" + day;
if(url.includes("dashboardaktivnost")){
    localStorage.setItem("datum_pristupa",trenutnidatum);
    
}

nbm.addEventListener("change",()=>{

    var div = document.createElement("div");
    var text = "<input type='hidden' name='book_photo' value='"+book_image.value.substring(12)+"'/>";
    
    div.innerHTML = text;
    all_images.append(div);
   
});

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

    var array= [];
    var i = 0;
