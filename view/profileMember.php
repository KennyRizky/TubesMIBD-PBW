<?php
    if(!isset($_SESSION['username'])){
        echo "Sign In First!";
        die;
    }
?>

<div id="kotakProfile">
    <div>
        <h1 style="color:black">My Profile</h1>
        <?php
		foreach ($result as $key => $row) {
			echo "<p>Username: ".$row->getUsername()."</p>";
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
    </div>
</div>
<br>
<a href="deleteAccount" class="deleteBtn" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</a>
