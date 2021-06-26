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

        <h2>Course Price</h2>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->gethargaCourse() . "</p>";
        }
        ?>

    <br>
    <a href="addModule" class="addBtn">Add Module</a>
    <a href="addExam" class="addBtn">Add Exam</a>


</div>


<?php
    echo "<div id='addCourseTeacherM'>";

    foreach($resultModule as $key => $row){
        echo "<h2>Module Title: " .$row->getJudulMod() ."</h2>";
        echo "<h2>Module Content:</h2>";
        echo "<p>" .$row->getIsiMod() ."</p>";
        echo "<hr>";
    }

    echo "</div>";
?>