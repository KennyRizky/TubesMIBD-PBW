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
        <input type="text" name="courseTitle" class="addCourseInput" required>

        <p>Passing Grade: (minimum of 0 and maximum of 100)</p>
        <input type="number" name="passingGrade" class="addCourseInput" min="0" max="100" required>

        <p>Course Description</p>
        <textarea name="courseDescription" rows="10" cols="85" required></textarea>

        <p>Course Price</p>
        <input type="number" name="harga" class="addCourseInput" min="0" required><br><br>

        <input type="submit" name="addCourse" value="Upload Course">
    </form>
    <br>
</div>