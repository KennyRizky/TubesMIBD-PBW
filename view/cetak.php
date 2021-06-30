<h1 style="display:flex; justify-content:center">STUDY HUB</h1>

<h2 style="display:flex; justify-content:center">Enrollment Report</h2>
<table id="tableCetak">
    <tr>
        <th>Id Member</th>
        <th>Username Member</th>
        <th>Id Course</th>
        <th>Course Name</th>
        <th>Id Enrollment</th>
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

<script>
    window.print();
</script>