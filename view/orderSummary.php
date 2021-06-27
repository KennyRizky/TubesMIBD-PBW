<script src="view/js/balance.js" defer ></script>
    <div id="orderSummary">
        <?php
            foreach($result as $key=>$row){
                echo"<h1> Title: ".$row->getJudulCourse(). "</h1>";
                echo "<h2>Course Description: </h2>";
                echo"<p id = 'price'>".$row->getCourseDesc(). "</p>";
                echo"<form method ='POST' action='viewTeacher'>";
                    echo '<input type="hidden" name="IdC" value="' .$row->getIdC(). '">';
                    echo '<input type="submit" value="About the Teacher" id="attemptExamBtn">';
                echo"</form>";

                echo "<h2>Price: </h2>";
                echo"<h2 id = 'price'>".$row->gethargaCourse(). "</h2>";
                $IdC = $row->getIdC();
                $hargaCourse = $row->gethargaCourse();

            }
            
            foreach($resultInfoMember as $key => $row){
                echo "<h2>Balance: </h2>";

                echo"<h2 id = 'balance'> " .$row->getWallet()."</h2>";
                $IdM = $row->getID();
            }

            echo"<br>";
            echo"<hr>";
            echo"<br>";
            echo'<a href="buyCredit" class="btnProfile">Buy Credit</a>';
            echo"<form method ='POST' action='enroll' id='enrollNow'>";
                echo '<input type="hidden" name="IdM" value="'.$IdM.'">';
                echo '<input type="hidden" name="IdC" value="'.$IdC.'">';
                echo '<input type="hidden" name="hargaCourse" value="'.$hargaCourse.'">';

                echo"<br>";
                echo"<br>";
                echo '<input type="submit" id="enrollbtn" value="Enroll Now!">';
            echo"</form>";
        ?>
    </div>
