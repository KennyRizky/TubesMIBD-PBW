<div id="seeTeacher">
    <div>
        <h1 style="display: flex; justify-content:center">Teacher's Profile<h1>
        <br>
        <?php

            foreach($resultTeacher as $key => $row){
                echo "<h2>Email: ". $row->getEmail() . "</h2>";
                echo "<h2>Username: ". $row->getUsername() . "</h2>";
                echo "<h2>Date of Birth: ".$row->getBirthDate() . "</h2>";
                echo "<h2>CV:</h2>";
                echo "<br>";
                echo "<img id='teacherCV' src='uploads/CV/" .$row->getCV(). "'>";
            }
        ?>
        <hr>
        <br>
        <?php
        echo"<form method ='POST' action='myCourses'>";
                echo '<input type="hidden" name="IdC" value="' .$IdC .'">';
                echo '<input type="submit" class="courseBtn" value="Back">';
            echo"</form>";
            echo "</div>";   
        ?>
        
    </div>
</div>