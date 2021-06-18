
<div id="kotakProfile">
    <div>
        <?php
		foreach ($result as $key => $row) {
			echo "<p>Username: ".$row->getUsername()."</p>";
            echo "<p>Password: ".$row->getPassword()."</p>";
            echo "<p>Role: Member";
			echo "<p>Email: ".$row->getEmail()."</p>";
			echo "<p>Date of Birth: ".$row->getBirthDate()."</p>";
			echo "<p>Wallet: ".$row->getWallet()."</p>";

        }
        // <p>Username :</p>
        // <p>Password :</p>
        // <p>Role :</p>
        // <p>Date of Birth :</p>
        // <p>Wallet :</p>
        ?>

        <a href="index">Back</a>
        <a href="editProfile">Edit Profile</a>
        <a href="buyCredit">Buy Credit</a>

    </div>
</div>