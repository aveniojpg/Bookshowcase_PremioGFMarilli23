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


   
   


