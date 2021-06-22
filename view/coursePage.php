

<div id="addCourseTeacher">
        <h2>Course Title</h2>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->getJudulCourse() . "</p>";
        }
        ?>

        <h2>Passing Grade</h2>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->getBatasNilai() . "</p>";
        }
        ?>

        <h2>Course Description</h2>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->getCourseDesc() . "</p>";
        }
        ?>

        <p>Course Price</p>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->gethargaCourse() . "</p>";
        }
        ?>

        
    <a href="addModule" class="addBtn">Add Module</a>
    <a href="addExam" class="addBtn">Add Exam</a>

</div>

<?php
    echo "<div id='addCourseTeacher'>";

    foreach($resultModule as $key => $row){
        echo "<h2>Module Title: " .$row->getJudulMod() ."</h2>";
        echo "<h2>Module Content:</h2>";
        echo "<p>" .$row->getIsiMod() ."</p>";
        echo "<hr>";
    }

    echo "</div>";
?>

<?php
    echo "<div id='addCourseTeacher'>";
    $counter = 0;
    foreach($resultExam as $key => $row){
        if($row->getjawaban() == 1){
            $counter++;
        }
    }

    for($i = 0; $i < $counter; $i++){
        echo "<h2>Exam Question: " .$resultExam[$i * 4]->getisi_pertanyaan() ."</h2>";
        echo "<h2>Exam Option:</h2>";

        for($j = $i * 4; $j < ($i + 1) * 4; $j++){
            if($resultExam[$j]->getjawaban() == 1){
                echo "<p>" .$resultExam[$j]->getoption_pertanyaan() ." (Correct)</p>";
            }else{
                echo "<p>" .$resultExam[$j]->getoption_pertanyaan() ."</p>";

            }
        }

        
        echo "<hr>";

    } 


    echo "</div>";
?>