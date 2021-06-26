<script src="view/js/scoreExam.js" defer ></script>

<?php
    foreach($nilai as $key => $row){
        echo "<h1 id='judulExam'>Exam Result For: " . $row->getJudulCourse() . "</h1>";
    }
?>

<div id="hasilNilai">
    <h2>Your Score: </h2>
    <?php
        foreach($nilai as $key => $row){
            echo "<h1 id = 'score'>" . $row->getJumlahNilai() . "</h1>";
        }
    ?>

    <h2>Passing Grade: </h2>
    <?php
        foreach($nilai as $key => $row){
            echo "<h1 id = 'passingGrade'>" . $row->getPassingGrade() . "</h1>";
        }
    ?>

    <div id='lulus'>
        <h2>CONGRATULATIONS!!</h2>
        <p>Our administrator will validate your score in 24 hour.</p>
        <p>Your certificate will be sent to your email automatically after your score has been validated.</p>
        <a href="index" id="donebtn">Ok</a>
        
        <!-- // foreach($result as $key => $value){
        // echo "<form method='POST' action='validateNilai'>";
        //     echo '<input type="hidden" name="IdC" value="' .$row->getIdM(). '">';
        //     echo '<input type="hidden" name="IdN" value="' .$row->getIdN(). '">';
        //     echo '<input type="hidden" name="IdC" value="' .$row->getIdC(). '">';
        //     echo '<input type="hidden" name="judulCourse" value="' .$row->getJudulCourse(). '">';
        //     echo '<input type="hidden" name="jumlahNilai" value="' .$row->getJumlahNilai(). '">';
        //     echo '<input type="hidden" name="passingGrade" value="' .$row->getPassingGrade(). '">';
        //     echo '<input type="hidden" name="IdNValidasi" value="' .$row->getIdN_validasi(). '">';
        //     echo '<input type = "submit" value ="Validate Nilai">';
        // echo "</form>";
        // } -->

    </div>

    <div id='galulus'>
        <h2>BETTER LUCK NEXT TIME.</h2>
        <a href="index" id="donebtn">Back</a>
    </div>

</div>
