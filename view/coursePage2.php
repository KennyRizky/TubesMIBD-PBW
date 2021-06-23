<div id="addCourseTeacher">
        <h2>Course Title</h2>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->getJudulCourse() . "</p>";
        }
        ?>

        <h2>Passing Grade</h2>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->getBatasNilai() . "</p>";
        }
        ?>

        <h2>Course Description</h2>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->getCourseDesc() . "</p>";
        }
        ?>

        <h2>Course Price</h2>
        <?php
        foreach($result as $key => $row){
            echo "<p>" .$row->gethargaCourse() . "</p>";
        }
        ?>

        
    <a href="addModule" class="addBtn">Add Module</a>

</div>