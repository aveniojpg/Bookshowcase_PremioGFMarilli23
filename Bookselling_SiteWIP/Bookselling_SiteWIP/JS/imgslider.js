var n_img = 2;
var corrente = 1;

function succ(){
    corrente++;
    if(corrente > n_img){
        corrente = 1;
    }
  
    for(var i = n_img; i > 0; i--){
        document.querySelector(".imgcontainer img:nth-child(" + i + ")").style.display = "none";
    }
    document.querySelector("img.container img:nth-child(" + corrente + ")").style.display = "block";
}

function prec(){
    corrente--;
    if(corrente == 0){
        corrente = n_img;
    }
  
    for(var i = n_img; i > 0; i--){
        document.querySelector(".imgcontainer img:nth-child(" + i + ")").style.display = "none";
    }
    document.querySelector("#.imgcontainer img:nth-child(" + corrente + ")").style.display = "block";
}



