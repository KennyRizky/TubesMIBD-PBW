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

        
    </div>
</div>