
<div id="kotakProfile">
    <div>
        <?php
		foreach ($result as $key => $row) {
			echo "<p>Username: ".$row->getUsername()."</p>";
            echo "<p>Password: ".$row->getPassword()."</p>";
            echo "<p>Role: Member";
			echo "<p>Email: ".$row->getEmail()."</p>";
			echo "<p>Date of Birth: ".$row->getBirthDate()."</p>";
            echo "<p>Alamat: ".$row->getAlamat()."</p>";
			echo "<p>Wallet: ".$row->getWallet()."</p>";

        }
        ?>

        <div>
        <a href="index" class="btnProfile">Back</a>
        <a href="editProfile" class="btnProfile">Edit Profile</a>
        <a href="buyCredit" class="btnProfile">Buy Credit</a>
        </div>

        <div id="myCourse">
            <h3>My Courses</h3>
            <table>
                <tr>
                    <td>Course 1 <a href="">see course<a> </td>
                    <td>Course 2 <a href="">see course<a></td>
                </tr>
                <tr>
                    <td>Course 1 <a href="">see course<a> </td>
                    <td>Course 2 <a href="">see course<a></td>
                </tr>

            </table>
        </div>
    </div>
</div>
<br>
<a href="deleteAccount" class="deleteBtn" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</a>
