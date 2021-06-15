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

// function vUser(){
//     let valueUser = document.getElementById('uName');
//     if(valueUser.value.length >= 8){
//         document.getElementById('checker1').style.display = "inline";
//     }
//     else{
//         document.getElementById('checker1').style.display = "none";
//     }
// }
    
// function vPass(){
//     let valuePassword = document.getElementById('pass');
//     if(valuePassword.value.length >= 8){
//     document.getElementById('checker2').style.display = "inline";
//     }
//     else{
//     document.getElementById('checker2').style.display = "none";
//     }
// }

// function vEmail(){
//     let valueEmail = document.getElementById('email');
//     let mailFormat = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
//     if(valueEmail.value.match(mailFormat)){
//         document.getElementById('checker0').style.display = "inline";
//         console.log('email benar');
//     }
//     else{
//         document.getElementById('checker0').style.display = "none";
//         console.log('email salah');
//     }
// }

/*
-------------
VALIDASI FORM
-------------
*/

let Vuser = false;
let Vpass = false;

//menampilkan gambar centang untuk username dan mengecek validity username
function checkVuser() {
    let x = document.getElementById("uName").value;
    console.log(x);
    if(x.length >= 8){
        console.log('berhasil');
        document.getElementById("centang1").style.display = "block";
        Vuser = true;
    }else{
        document.getElementById("centang1").style.display = "none";
        Vuser = false;
    }
}

//menampilkan gambar centang untuk password dan mengecek validity password
function checkVpass() {
    var x = document.getElementById("pass").value;
    if(x.length >= 8){
        document.getElementById("centang2").style.display = "block";
        Vpass = true;
    }else{
        document.getElementById("centang2").style.display = "none";
        Vpass = false;
    }
}	

//mengecek validity form, menampilkan konfirmasi registrasi dan tombol register
function checkForValidity(){
    if(Vpass === true && Vuser === true){
        isValid = true;
        document.getElementById("startBtn").style.display = "flex";
    }else{
        isValid = false;
        alert("masih ada form yang belum valid!");
        document.getElementById("startBtn").style.display = "none";

    }
}

//menghilangkan konfirmasi registrasi dan tombol register jika user mengganti isi form
//user harus validasi ulang jika mengganti isi form
function hide(){
    document.getElementById("startBtn").style.display = "none";
}

