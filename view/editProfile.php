
<div id="kotakProfile">
    <div>
        <h1 style="color:black">Edit Profile</h1>
        <form action="updateProfile" method="POST" id="isieditform">
            <div class="editProfileForm">
                <p>Email:</p>
                <input class="registerinput" type="text" id="email" name="email" placeholder="email" oninput="checkVemail(); hide();">
                <img src = "view/css/check.png" id="centang0">
            </div>

            <div class="editProfileForm">
                <p>Password:</p>
                <input class="registerinput" type="password" id="pass" name="password" placeholder="password" oninput="checkConfirmPass(); hide();">
                <img src = "view/css/check.png" id="centang1">
            </div>

            <div class="editProfileForm">
                <p>Confirm Password:</p>
                <input class="registerinput" type="password" id="confirmpass" name="confirmpassword" placeholder="confirm password" oninput="checkConfirmPass(); hide();">
                <img src = "view/css/check.png" id="centang2">
            </div>

            <div class="editProfileForm">
                <p>Alamat:</p>
                <input class="registerinput" type="text" id="alamat" name="alamat" placeholder="alamat">
            </div>

            <div class="editProfileForm">
                <p>Date of Birth:</p>
                <input class="registerinput" type="date" id="birthDate" name="birthDate" placeholder="password">
            </div>
            <br>

            <input type="submit" value="Save" id="saveProfile">
        </form>
        <br><br>
        <a href="profileMember" class="btnCancel">Cancel</a>

        <br>
    </div>
</div>
<br>