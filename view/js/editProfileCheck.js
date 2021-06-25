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

function checkConfirmPass(){
    let pass = document.getElementById("pass").value;
    let email = document.getElementById("email").value;
    let conpass = document.getElementById("confirmpass").value;
    if(pass === conpass){
        document.getElementById("centang1").style.display = "block";
        document.getElementById("centang2").style.display = "block";
    }else{
        document.getElementById("centang1").style.display = "none";
        document.getElementById("centang2").style.display = "none";
    }

    if(document.getElementById("centang1").style.display = "block" && document.getElementById("centang2").style.display == "block" && document.getElementById("centang0").style.display == "block"){
        document.getElementById("saveProfile").style.display = "block";
    }else{
        document.getElementById("saveProfile").style.display = "none";
    }
}