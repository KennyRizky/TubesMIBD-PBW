<?php
    if(!isset($_SESSION['username'])){
        echo "Sign In First!";
        die;
    }
?>

<div id="kotakWalletStatus">
 <?php
        foreach ($result as $key => $row) {
            echo "<h1>Wallet Status: IDR ".$row."</h1>"; 
        }
    ?>
</div>

<div id="kotakWalletPayment">
    <h1>Payment Information:</h1>
    <div >
        <form action="buyCredit" method="POST" >
            <div class="paymentMethod">
                <p>Select Payment Method:</p>
                <select name ="paymentMethod" id="pilihanPembayaran">
                    <option value="OVO">Ovo</option>
                    <option value="gopay">Gopay</option>
                    <option value="BCA">BCA</option>
                </select>
            </div>
            <div class="paymentMethod">
                <p>Amount:</p>
                <select name ="amount" id="pilihanPembayaran">
                    <option value="1">IDR 10.000</option>
                    <option value="2">IDR 50.000</option>
                    <option value="3">IDR 100.000</option>
                </select>
                
                
            </div>
            <input type="submit" value="Pay" id="payBtn">
        </form>
    </div>
</div>

<a href="index" id="donebtn">Back To Home</a>