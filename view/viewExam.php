<?php
    echo "<div id='attemptExam'>";
        echo"<form method='POST' action='submitExam'>";
            $counter = 0;
            foreach($resultExam as $key => $row){
                if($row->getjawaban() == 1){
                    $counter++;
                }
            }

            for($i = 0; $i < $counter; $i++){
                echo "<h2>Question: " .$resultExam[$i * 4]->getisi_pertanyaan() ."</h2>";
                echo "<h2>Option:</h2>";

                for($j = $i * 4; $j < ($i + 1) * 4; $j++){
                    echo "<input type='radio' id='option".$j."' name='option".$i."' value='".$resultExam[$j]->getjawaban()."'><label for='option".$j."' name='option".$i."'>".$resultExam[$j]->getoption_pertanyaan()."</label><br>";
                }
                echo "<hr>";
            }
            
            echo '<input type="hidden" name="IdC" value="'.$IdC.'">';
            echo '<input type="hidden" name="counter" value="'.$counter.'">';

            echo"<input type = 'submit' name='submitExam' value='Submit Exam' id='attemptExamBtn'>";
        echo"</form>";
    echo "</div>";
    
?>
        
    
