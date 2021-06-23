<h1 id='JudulTeacher'>My Courses</h1>

<div id="kotakCourses">
<?php
    
    foreach($result as $key=>$row){  
        echo '<div class="courses">';  
        echo "<h2>" . $row->getJudulCourse() . "</h2>";
        echo "<p>" .$row->getCourseDesc() . "</p>";
        echo "<form method='POST' action='seeMore'>";
            echo '<input type="hidden" name="IdC" value="' .$row->getIdC(). '">';
            echo '<input type="submit" value="See More">';
        echo "</form>";

        echo "</div>";   
    }
       
    
?>
    
</div>
<a id="addCoursesTeacherBtn" href="addCoursesTeacher">Add Courses</a>
