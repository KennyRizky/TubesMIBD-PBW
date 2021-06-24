<h1 id='JudulTeacher'>Courses</h1>
<div id="kotakCourses">
<?php
  foreach($result as $key=>$row){
      echo'<div class="courses">';
        echo"<h2>". $row->getJudulCourse() . "</h2>";
        echo "<p>" .$row->getCourseDesc() . "</p>";
      echo'</div>';
  }
?>
</div>