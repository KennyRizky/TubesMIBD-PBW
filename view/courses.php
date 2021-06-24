<h1 id='JudulTeacher'>Featured Course</h1>
<div id="kotakCourses">
  <div class="courses">  
    <h2>Course 1</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
    deserunt mollit anim id est laborum."</p>
  </div>

  <div class="courses">  
    <h2>Course 1</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
    deserunt mollit anim id est laborum."</p>
  </div>

  <div class="courses">  
    <h2>Course 1</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
    deserunt mollit anim id est laborum."</p>
  </div>

  <div class="courses">  
    <h2>Course 1</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
    deserunt mollit anim id est laborum."</p>
  </div>
</div>


<h1 id='JudulTeacher'>Other Courses</h1>
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