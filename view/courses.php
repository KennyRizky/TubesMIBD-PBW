<h1 id='JudulTeacher'>Courses</h1>

<div id="kotakCourses">
<?php
  foreach($result as $key=>$row){
      echo'<div class="courses">';
        echo"<h2>". $row->getJudulCourse() . "</h2>";
        echo "<hr>";
        echo "<p>" .$row->getCourseDesc() . "</p>";
      echo'</div>';
  }
?>
</div>
<h1 id='JudulTeacher'>Courses Under IDR 50.000</h1>

<div id="kotakCourses">
<?php
  foreach($cheapCourses as $key=>$row){
      echo'<div class="courses">';
        echo"<h2>". $row->getJudulCourse() . "</h2>";
        echo "<hr>";
        echo "<p>" .$row->getCourseDesc() . "</p>";
      echo'</div>';
  }
?>
</div>
<?php
echo "<div id = 'paginationBtn'>";
for ($i = 1; $i <= $pageCount ; $i++){ ?>
        <form action="courses" method="POST">
            <input type="hidden" name="currentPage" value="<?php echo $i?>">
            <input type="submit" name="currentPage" value="<?php echo $i?>">
        </form>
    <?php 
    } 
echo "</div>";
?> 