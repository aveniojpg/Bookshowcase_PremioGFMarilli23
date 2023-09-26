function showfilter(){
   var menu = document.getElementById("filtermenu");
   menu.style.left='0px';
   document.getElementById("removetoggler").style='display:block';
//    document.getElementById("filtertoggler").style='display:none';
}

function closefilter(){
    var menu =document.getElementById("filtermenu");
    menu.style.left='-300px';
    // document.getElementById("removetoggler").style='display:none'
    document.getElementById("filtertoggler").style='display:block';
    document.getElementById("pagetitle").style='display:block';
}

function openfilterbody1() {

    var counter1 = document.getElementById("filterbody1");


    if (counter1.style.display === "none") {
        counter1.style.display = "block";

    }

    else{
        counter1.style.display="none";
    }

}

function openfilterbody2() {

    var counter2 = document.getElementById("filterbody2");


    if (counter2.style.display === "none") {
        counter2.style.display = "block";

    }

    else{
        counter2.style.display="none";
    }

}

function openfilterbody3() {

    var counter3 = document.getElementById("filterbody3");


    if (counter3.style.display === "none") {
        counter3.style.display = "block";
        counter3.style.borderBottom = ' 1px solid rgb(203, 194, 194)';


    }

    else{
        counter3.style.display="none";
    }

}



   


