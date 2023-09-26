
var corrente = 0;

function succ(){
    corrente++;
    if(corrente==1) {
        document.querySelector(".imgcontainer img:nth-child(1)").style.display = "none";
        document.querySelector(".imgcontainer img:nth-child(2)").style.display = "block";
    }

    else{
        corrente=0;
        document.querySelector(".imgcontainer img:nth-child(2)").style.display = "none";
        document.querySelector(".imgcontainer img:nth-child(1)").style.display = "block";
    }   

}

function prec(){
    corrente++;
    if(corrente==1) {
        document.querySelector(".imgcontainer img:nth-child(1)").style.display = "none";
        document.querySelector(".imgcontainer img:nth-child(2)").style.display = "block";
    }

    else{
        corrente=0;
        document.querySelector(".imgcontainer img:nth-child(2)").style.display = "none";
        document.querySelector(".imgcontainer img:nth-child(1)").style.display = "block";
    }   


}



