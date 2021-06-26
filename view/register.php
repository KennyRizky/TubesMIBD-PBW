<script src="view/js/registerCheck.js" defer ></script>
    <div id="kotakForm">
        <h1 class="JudulForm">Register For Member</h1>
        <form action="submitRegister" method="POST">
                <div class="flexform">
                    <p>Email: </p>
                    <input class="registerinput" type="text" id="email" name="email" placeholder="email" oninput="checkVemail(); hide(); checkForValidity();">
                    <img src = "view/css/check.png" id="centang0">
                </div>

                <div class="flexform">
                    <p>Username: </p>
                    <input class="registerinput" type="text" id="uName" name="username" placeholder="username" oninput="checkVuser(); hide(); checkForValidity();">
                    <img src = "view/css/check.png" id="centang1">
                </div>

                <div class="flexform">
                    <p>Password: </p>   
                    <input class="registerinput" type="password" id="pass" name="password" placeholder="password" oninput="checkVpass(); hide(); checkForValidity();">
                    <img src = "view/css/check.png" id="centang2">
                </div>

                <div class="flexform">
                    <p>Address: </p>
                    <input class="registerinput" type="text" id="alamat" name="alamat" placeholder="address">
                </div>

                <div class="flexform">
                    <p>Date of Birth: </p>
                    <input class="registerinput" type="date" id="birthDate", name="birthDate">
                </div> 

                <hr>

            <div id ="startBtn">
                <input type="submit" value="register" id="butSignIn">
            </div>
        </form>
        <div class="notMe">
            <p>Already Have an Account? <a href="signin">Sign In</a></p>
            <p>Are You a Teacher? <a href="registerTeacher">Register as Teacher</a></p>
            <br>
            <p><a href="signin" class="tombolBack">Back</a></p>
        </div>
    </div>
