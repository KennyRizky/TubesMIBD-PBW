checkBalance();
function checkBalance(){
    let price = document.getElementById('price').innerHTML;
    let balance = document.getElementById('balance').innerHTML;
    console.log(price);

    if(parseInt(balance) >= parseInt(price)){
        document.getElementById('enrollNow').style.display = "block";
    }else{
        document.getElementById('enrollNow').style.display = "none";
    }
}