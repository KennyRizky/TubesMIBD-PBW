<div id="seeCourse">
    <div class="courses">
        <?php
            foreach($result as $key => $row){
                echo "<h2>Course Title: ".$row->getJudulCourse() . "</h2>";
                echo "<h2>Passing Grade: ".$row->getBatasNilai() . "</h2>";
                echo "<h2>Course Description: </h2>";
                echo "<p>".$row->getCourseDesc() ."</p>";
            }
        ?>
        <hr>
        <br>
        <?php
            
            foreach($resultModule as $key => $row){
                echo "<h2>Module Title: ".$row->getJudulMod() . "</h2>";
                echo "<h2>Content: </h2>";
                echo $row->getIsiMod();

            }
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<hr>";

            foreach($result as $key => $row){
                echo"<form method ='POST' action='attemptExam'>";
                    echo '<input type="hidden" name="IdC" value="' .$row->getIdC(). '">';
                    echo '<input type="submit" value="Attempt Exam" id="attemptExamBtn">';
                echo"</form>";
            }
        ?>

        
    </div>
</div>