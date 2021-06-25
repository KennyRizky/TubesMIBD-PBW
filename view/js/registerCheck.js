/*
-------------
VALIDASI FORM
-------------
*/

//menampilkan gambar centang untuk username dan mengecek validity username
function checkVuser() {
    window.Vuser = false;
    let x = document.getElementById("uName").value;
    if(x.length >= 8){
        document.getElementById("centang1").style.display = "block";
        window.Vuser = true;
    }else{
        document.getElementById("centang1").style.display = "none";
        window.Vuser = false;
    }
}

//menampilkan gambar centang untuk email dan mengecek validity email
function checkVemail(){
    window.Vemail = false;
    let valueEmail = document.getElementById('email');
    let mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(valueEmail.value.match(mailFormat)){
        document.getElementById('centang0').style.display = "block";
        window.Vemail = true;
    }
    else{
        document.getElementById('centang0').style.display = "none";
        window.Vemail = false;
    }
}

//menampilkan gambar centang untuk password dan mengecek validity password
function checkVpass() {
    window.Vpass = false;
    let x = document.getElementById("pass").value;
    if(x.length >= 8){
        document.getElementById("centang2").style.display = "block";
        window.Vpass = true;
    }else{
        document.getElementById("centang2").style.display = "none";
        window.Vpass = false;
    }
}	

//mengecek validity form, menampilkan tombol register
function checkForValidity(){
    if(window.Vpass === true && window.Vuser === true && window.Vemail === true){
        window.isValid = true;
        document.getElementById("startBtn").style.display = "flex";
    }else{
        window.isValid = false;
        document.getElementById("startBtn").style.display = "none";
    }
}

//menghilangkan tombol register jika user mengganti isi form
//user harus validasi ulang jika mengganti isi form
function hide(){
    document.getElementById("startBtn").style.display = "none";
}