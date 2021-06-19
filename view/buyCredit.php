<div id="kotakWalletStatus">
    <h1>WALLET STATUS: Rp.200.000</h1>
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
                    <option value="1">10000</option>
                    <option value="2">50000</option>
                    <option value="3">100000</option>
                </select>
                
                
            </div>
            <input type="submit" value="Pay" id="payBtn">
        </form>
    </div>
</div>