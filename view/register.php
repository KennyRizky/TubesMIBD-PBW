    <div id="kotakForm">
        <h1 class="JudulForm">Register</h1>
        <form action="submitRegister" method="POST" id="isiform">
                <div class="flexform">
                    <input class="registerinput" type="text" id="email" name="email" placeholder="email" oninput="checkVemail(); hide(); checkForValidity();">
                    <img src = "view/css/check.png" id="centang0">
                </div>

                <div class="flexform">
                    <input class="registerinput" type="text" id="uName" name="username" placeholder="username" oninput="checkVuser(); hide(); checkForValidity();">
                    <img src = "view/css/check.png" id="centang1">
                </div>

                <div class="flexform">
                    <input class="registerinput" type="password" id="pass" name="password" placeholder="password" oninput="checkVpass(); hide(); checkForValidity();">
                    <img src = "view/css/check.png" id="centang2">
                </div>

                <div class="flexform">
                    <input class="registerinput" type="text" id="alamat" name="alamat" placeholder="alamat">
                </div>

                <div class="flexform">
                    <input class="registerinput" type="date" id="birthDate", name="birthDate">
                </div> 

            <div id ="startBtn">
                <input type="submit" value="register" id="butSignIn">
            </div>
        </form>
        <p>Already have an Account? <a href="signin">Sign in</a></p>
        <p>Are you a teacher? <a href="registerTeacher">Register as Teacher</a></p>
    </div>
