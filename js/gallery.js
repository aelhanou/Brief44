const all = document.getElementsByTagName("select");
const price = document.getElementsByName("pr1");
const min = document.getElementsByName("mn");
const max = document.getElementsByName("mx");
const book1 = document.getElementsByName("book1");

var a;



min[0].addEventListener("input", function () {

    
    
    for (var i = 0; i < price.length; i++) {
        if (price[i].innerHTML <= min[0].value) {
            book1[i].style.display = "block";
        }
        else {
            book1[i].style.display = "none";
        }
    }
    if(min[0].value == '')
    {
        for (var i = 0; i < price.length; i++) {
            book1[i].style.display = "block";
        }
        console.log("min block");
    }
    a = min[0].value;
});

max[0].addEventListener("input", function () {

    
    
    
    for (var i = 0; i < price.length; i++) {
        if (price[i].innerHTML <= max[0].value && (a ? price[i].innerHTML > a : true)) {
            book1[i].style.display = "block";
        }
        else {
            book1[i].style.display = "none";
        }
    
}

if(max[0].value == '')
{
    for (var i = 0; i < price.length; i++) {
        book1[i].style.display = "block";
    }
    
}
});

function Displaybooks() {

    
    for (var i = 0; i < books.length; i++) {
        if (all[0].value == "all") {
            var name = document.getElementById(books[i][0]["info"]["booksName"]);
            name.style.display = "flex";
        }
        else if (all[0].value == books[i][0]["info"]["nameofAuthor"]) {
            var name = document.getElementById(books[i][0]["info"]["booksName"]);
            name.style.display = "flex";
        }
        else {
            var name = document.getElementById(books[i][0]["info"]["booksName"]);
            name.style.display = "none";
        }
    }
}



const iconMenu = document.getElementById("iconMenu");
const menuMobile = document.getElementById("menuMobile");

menuMobile.style.display = "none";

iconMenu.addEventListener("click", function () {
    if (menuMobile.style.display == "flex") {
        menuMobile.style.display = "none";

    }
    else {
        menuMobile.style.display = "flex";

    }
});



