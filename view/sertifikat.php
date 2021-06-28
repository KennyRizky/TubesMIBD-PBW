<?php
    if(!isset($_SESSION['usernameAdmin'])){
        echo "Sign In First!";
        die;
    }
?>

<div id="sertifikat">

    <h1 class="studyHubSertif">STUDY HUB CERTIFICATE</h1>
    <h2>CONGRATULATIONS YOU HAVE PASSED THE EXAM OF THIS COURSE!</h2>
    <p>
        <?php
            foreach($resultNilai as $key => $row){
                echo"<h2 class='studyHubSertif'>Course Title: ". $row->getJudulCourse() . "</h2>";
            }
            
            foreach($resultNama as $key => $row){
                echo "<h2 class='studyHubSertif'>". $resultNama[0] ."</h2>";
            }
        ?>
    </p>
</div>
<a href="admin" class=" sendSertif courseBtn">Send Certificate</a>
<br>
