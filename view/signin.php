<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Sign In For Member</h1>
        <form action="submitSignIn" method="POST">
                    <div class="flexform">
                        <p>Username: </p><input class="registerinput" type="text" id="uName" name="username" placeholder="username" required oninput="checkVuser(); hide(); checkForValiditySignIn();">
                        <img src = "view/css/check.png" id="centang1">
                    </div>
                    <br>
                    <div class="flexform">
                        <p>Password: </p><input class="registerinput" type="password" id="pass" name="password" placeholder="password" required oninput="checkVpass(); hide(); checkForValiditySignIn();">
                        <img src = "view/css/check.png" id="centang2">
                    </div>
                    <br>
                    <br>
            <div id ="startBtnSignIn">
                <input type="submit" value="Sign In" id="butSignIn">
            </div>
            <br>
            <hr>
            <br>

        </form>
        <p>Don't have an account? <a href="register">Register</a></p>
        <p>Are you a teacher? <a href="signinTeacher">Sign In as Teacher</a></p>
        <p>Are you a admin? <a href="signinAdmin">Sign In as Admin</a></p>
        <br>
        <p><a href="index" class="tombolBack">Back</a></p>

        
    </div>
</body>
