<div id="isi_admin"> 
    <h1 id="judul_admin">Wallet Info</h1>
    <table id = "tabel_admin">
        <tr>
            <th>IdM</th>
            <th>username</th>
            <th>amount</th>
            <th>payment method</th>
            <th>validate wallet</th>
            <!-- <th>enrollment</th>
            <th>validate_enrollment</th>
            <th>nilai ujian</th>
            <th>validate nilai</th>
            <th>sertif</th> -->
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
</div>