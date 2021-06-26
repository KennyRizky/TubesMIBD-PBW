<h1 id='JudulTeacher'>My Courses</h1>

<div id="kotakCourses">
<?php
    
    foreach($result as $key=>$row){  
        echo '<div class="courses">';  
        echo "<h2>" . $row->getJudulCourse() . "</h2>";
        echo "<p>" .$row->getCourseDesc() . "</p>";
        echo "<form method='POST' action='seeMore'>";
            echo '<input type="hidden" name="IdC" value="' .$row->getIdC(). '">';
            echo '<input type="submit" class="courseBtn" value="See More">';
        echo "</form>";

        echo "</div>";   
    }
       

?>
</div>
<?php
echo "<div id = 'paginationBtn'>";
for ($i = 1; $i <= $pageCount ; $i++){ ?>
        <form action="myCoursesTeacher" method="POST">
            <input type="hidden" name="currentPage" value="<?php echo $i?>">
            <input type="submit" name="currentPage" value="<?php echo $i?>">
        </form>
    <?php 
    } 
echo "</div>";
?>   

<a id="addCoursesTeacherBtn" href="addCoursesTeacher">Add Courses</a>
