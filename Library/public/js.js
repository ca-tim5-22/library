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