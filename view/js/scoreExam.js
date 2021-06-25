function checkKelulusan(){
    let score = document.getElementById("score").innerHTML;
    let passingGrade = document.getElementById("passingGrade").innerHTML;

    if(parseInt(score) < parseInt(passingGrade)){
        document.getElementById('galulus').style.display = "block";
    }else{
        document.getElementById('lulus').style.display = "block";
    }
}

checkKelulusan();
