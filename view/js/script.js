let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("slides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length){
        slideIndex = 1
    }
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 4000); 
}

function vUser(){
    let valueUser = document.getElementById('uName');
    if(valueUser.value.length >= 8){
        document.getElementById('checker1').style.display = "inline";
    }
    else{
        document.getElementById('checker1').style.display = "none";
    }
}
    
function vPass(){
    let valuePassword = document.getElementById('pass');
    if(valuePassword.value.length >= 8){
    document.getElementById('checker2').style.display = "inline";
    }
    else{
    document.getElementById('checker2').style.display = "none";
    }
}

function vEmail(){
    let valueEmail = document.getElementById('email');
    let mailFormat = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
    if(valueEmail.value.match(mailFormat)){
        document.getElementById('checker0').style.display = "inline";
        console.log('email benar');
    }
    else{
        document.getElementById('checker0').style.display = "none";
        console.log('email salah');
    }
}