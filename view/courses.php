<?php
  function custom_echo($x, $length)
  {
    if(strlen($x)<=$length)
    {
      echo $x;
    }
    else
    {
      $y=substr($x,0,$length) . '...';
      echo $y;
    }
  }
?>

<h1 id='JudulTeacher'>All Courses</h1>

<div id="kotakCourses">
<?php
  foreach($result as $key=>$row){
      echo'<div class="courses soft-shadow">';
        echo"<h2>". $row->getJudulCourse() . "</h2>";
        echo "<hr>";
        custom_echo( $row->getCourseDesc() ,300);
        echo "<hr>";
        echo "<p> <i class='fa fa-money'></i> " .$row->getHargaCourse() . "</p>";

      echo'</div>';
  }
?>
</div>
<hr style = "width: 95%">
<h1 id='JudulTeacher'>Courses Under IDR 50.000</h1>

<div id="kotakCourses">
<?php
  foreach($cheapCourses as $key=>$row){
      echo'<div class="courses soft-shadow">';
        echo"<h2>". $row->getJudulCourse() . "</h2>";
        echo "<hr>";
        custom_echo( $row->getCourseDesc() ,300);
        echo "<hr>";
        echo "<p> <i class='fa fa-money'></i> " .$row->getHargaCourse() . "</p>";
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