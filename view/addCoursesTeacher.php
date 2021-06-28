<?php
    if(!isset($_SESSION['usernameTeacher'])){
        echo "Sign In First!";
        die;
    }
?>

<h1 id="JudulTeacher">Add Courses</h1>

<div id="addCourseTeacher">
    <form action="addCourseTeacher2" id="addCourseTeacherForm" method="POST">
        <p>Course Title</p>
        <input type="text" name="courseTitle" class="addCourseInput">

        <p>Passing Grade</p>
        <input type="text" name="passingGrade" class="addCourseInput">

        <p>Course Description</p>
        <textarea name="courseDescription" rows="10" cols="85"></textarea>

        <p>Course Price</p>
        <input type="text" name="harga" class="addCourseInput"><br><br>

        <input type="submit" name="addCourse" value="Upload Course">
    </form>
    <br>
</div>