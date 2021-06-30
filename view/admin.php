<?php
    if(!isset($_SESSION['usernameAdmin'])){
        echo "You are not an admin!";
        die;
    }
?>

<div id="isi_admin"> 
    <h1 id="judul_admin">Wallet Info</h1>
    <table id = "tabel_admin">
        <tr>
            <th>IdM</th>
            <th>username</th>
            <th>amount</th>
            <th>payment method</th>
            <th>validate wallet</th>
        </tr>
        <?php
            foreach($result as $key => $row){
                echo "<tr>";
                echo "<td>" .$row->getID()."</td>";
                echo "<td>" .$row->getUsername()."</td>";
                echo "<td>" .$row->getWallet()."</td>";
                echo "<td>" .$row->getPaymentMethod(). "</td>" ;
                echo "<td> 
                <form action='validateWallet' method='POST'>
                    <input type='hidden' name='idTR' value='" .$row->getIDTR(). "'>
                    <input type='hidden' name='amount' value='" .$row->getWallet(). "'>

                    <input type='submit' value='validate'>
                </form>
                </td>" ;
            }
        ?>
    </table>

    <h1 id="judul_admin">Exam Score Info</h1>
    <table id = "tabel_admin">
        <tr>
            <th>IdM</th>
            <th>IdN</th>
            <th>IdC</th>
            <th>Course Title</th>
            <th>Score</th>
            <th>Passing Grade</th>
            <th>Validate Score</th>
        </tr>
        <?php
            foreach($resultNilai as $key => $row){
                echo "<tr>";
                echo "<td>" .$row->getIdM()."</td>";
                echo "<td>" .$row->getIdN()."</td>";
                echo "<td>" .$row->getIdC()."</td>";
                echo "<td>" .$row->getJudulCourse(). "</td>" ;
                echo "<td>" .$row->getJumlahNilai(). "</td>" ;
                echo "<td>" .$row->getPassingGrade(). "</td>" ;
                echo "<td> 
                <form action='validateNilai' method='POST'>
                    <input type='hidden' name='IdN' value='" .$row->getIdN(). "'>
                    <input type='submit' value='validate'>
                </form>
                </td>" ;
            }
        ?>
    </table>

    <h1 id="judul_admin">Enrollment Info</h1>
    <table id = "tabel_admin">
        <tr>
            <th>IdM</th>
            <th>Username</th>
            <th>IdC</th>
            <th>Course Name</th>
            <th>IdE</th>
            <th>Enrollment Date</th>
        </tr>
        <?php
            foreach($resultEnrollment as $key => $row){
                echo "<tr>";
                echo "<td>" .$row->getIdM()."</td>";
                echo "<td>" .$row->getUsername()."</td>";
                echo "<td>" .$row->getIdC()."</td>";
                echo "<td>" .$row->getnamaCourse(). "</td>" ;
                echo "<td>" .$row->getIdE(). "</td>" ;
                echo "<td>" .$row->getwktEnrollment(). "</td>" ;
            }
        ?>
    </table>
    <br>
    <a id="cetakBtn" href="cetak" target="_blank">PRINT REPORT</a>
    <br>
    <h1 id="judul_admin">Certificate</h1>
    <table id = "tabel_admin">
        <tr>
            <th>IdM</th>
            <th>IdE</th>
            <th>Send Certificate</th>
        </tr>
        <?php
            foreach($resultNilaiValidasi as $key => $row){
                echo "<tr>";
                echo "<td>" .$row->getIdM()."</td>";
                echo "<td>" .$row->getIdN(). "</td>" ;
                echo "<td>" ;
                    echo"<form method='POST' action ='sertifikat'>";
                        echo"<input type='hidden' name='IdN' value='".$row->getIdN()."'>";
                        echo"<input type='hidden' name='IdE' value='".$row->getIdC()."'>";
                        echo"<input type='hidden' name='IdM' value='".$row->getIdM()."'>";
                        echo"<input type='submit' name='sendSertifikat' value='Send Certificate'>";
                    echo"</form>";
                echo"</td>" ;
            }
        ?>
    </table>



</div>