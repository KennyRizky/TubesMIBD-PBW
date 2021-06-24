<div id="kotakCourses">
    <div id="orderSummary">
        <h2>Order Summary</h2>
        <?php
        foreach($result as $key=>$row){
        echo"<h1>".$row->getJudulCourse(). "</h1>";
        $IdC = $row->getIdC();
        echo"<h2>".$row->gethargaCourse(). "</h2>";
        }
        foreach($resultInfoMember as $key => $row){
            echo"<p> Balance :" .$row->getWallet()."</p>";
            $IdM = $row->getID();
        }
        foreach($result as $key=>$row){
        echo"<p>".$row->getJudulCourse()." : ". $row->gethargaCourse(). "</p>";
        }
        echo"<br>";
        echo"<hr>";
        echo"<br>";
        echo'<a href="buyCredit" class="btnProfile">Buy Credit</a>';
        echo"<form method ='POST' action='enroll'>";
            echo '<input type="hidden" name="IdM" value="'.$IdM.'">';
            echo '<input type="hidden" name="IdC" value="'.$IdC.'">';
            echo"<br>";
            echo"<br>";
            echo '<input type="submit" value="Enroll Now!">';
        echo"</form>";
        ?>
    </div>
</div>