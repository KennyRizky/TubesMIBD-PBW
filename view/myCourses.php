<h1 id='JudulTeacher'>My Courses</h1>

<div id="kotakCourses">
    <?php
    if(isset($resultCourse)){
        foreach($resultCourse as $key=>$row){  
            echo '<div class="courses">';  
            echo "<h2>" . $row->getJudulCourse() . "</h2>";
            echo "<p>" .$row->getCourseDesc() . "</p>";
            echo"<form method ='POST' action='seeCourse'>";
                echo '<input type="hidden" name="IdC" value="' .$row->getIdC(). '">';
                echo '<input type="submit" value="See Course">';
            echo"</form>";
            echo "</div>";   
        }
    }

    ?>
</div>

<h1 id='JudulTeacher'>Other Courses</h1>

<div id="kotakCourses">
    <?php
    foreach($result as $key=>$row){
        echo'<div class="courses">';
            echo"<h2>". $row->getJudulCourse() . "</h2>";
            echo "<p>" .$row->getCourseDesc() . "</p>";
        
        echo"<form method ='POST' action='orderSummary'>";
            echo '<input type="hidden" name="IdC" value="' .$row->getIdC(). '">';
            echo '<input type="submit" value="Enroll">';
        echo"</form>";
        echo"</div>";
    }
    ?>
</div>

<?php
echo "<div id = 'paginationBtn'>";
for ($i = 1; $i <= $pageCount ; $i++){ ?>
        <form action="myCourses" method="POST">
            <input type="hidden" name="currentPage" value="<?php echo $i?>">
            <input type="submit" name="currentPage" value="<?php echo $i?>">
        </form>
    <?php 
    } 
echo "</div>";
?>
