

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

var currentDate = new Date()
var day = currentDate.getDate()
var month = currentDate.getMonth() + 1
var year = currentDate.getFullYear()

var trenutnidatum = month + "/" + day + "/" + year;
if(url.includes("dashboardaktivnost")){
    localStorage.setItem("datum_pristupa",trenutnidatum);
    
}

nbm.addEventListener("change",()=>{

    var div = document.createElement("div");
    var text = "<input type='hidden' name='book_photo' value='"+book_image.value.substring(12)+"'/>";
    
    div.innerHTML = text;
    all_images.append(div);
   
});

    var array= [];
    var i = 0;
