const pr1 = document.getElementById("pr1");
const body1 = document.getElementById("body1");

function checked(){
    if(pr1.checked == true){
        body1.style.opacity = 1;
    } else {
        body1.style.opacity = 0;
    }
}