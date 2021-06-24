
    <div id="orderSummary">
        <h2>Order Summary</h2>
        <?php
            foreach($result as $key=>$row){
                echo"<h1> Title: ".$row->getJudulCourse(). "</h1>";
                $IdC = $row->getIdC();
                echo"<h2 id = 'price'> Price: ".$row->gethargaCourse(). "</h2>";
            }
            
            foreach($resultInfoMember as $key => $row){
                echo"<p id = 'balance'> Balance: " .$row->getWallet()."</p>";
                $IdM = $row->getID();
            }

            echo"<br>";
            echo"<hr>";
            echo"<br>";
            echo'<a href="buyCredit" class="btnProfile">Buy Credit</a>';
            echo"<form method ='POST' action='enroll' id='enrollNow'>";
                echo '<input type="hidden" name="IdM" value="'.$IdM.'">';
                echo '<input type="hidden" name="IdC" value="'.$IdC.'">';
                echo"<br>";
                echo"<br>";
                echo '<input type="submit" value="Enroll Now!">';
            echo"</form>";
        ?>
    </div>
