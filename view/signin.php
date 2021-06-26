<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Sign In For Member</h1>
        <form action="submitSignIn" method="POST" id="isiFormSignIn">
                    <div class="flexform">
                        Username: <br><input class="registerinput" type="text" id="uName" name="username" placeholder="username" oninput="checkVuser(); hide(); checkForValiditySignIn();">
                        <img src = "view/css/check.png" id="centang1">
                    </div>
                    <br>
                    <div class="flexform">
                        Password: <br><input class="registerinput" type="password" id="pass" name="password" placeholder="password" oninput="checkVpass(); hide(); checkForValiditySignIn();">
                        <img src = "view/css/check.png" id="centang2">
                    </div>
            <div id ="startBtnSignIn">
                <input type="submit" value="Sign In" id="butSignIn">
            </div>
            <p><a href="index" class="tombolBack">Back</a></p>
        </form>
        <p>Don't have an account? <a href="register">Register</a></p>
        <p>Are you a teacher? <a href="signinTeacher">Sign in as Teacher</a></p>
        <p>Are you a admin? <a href="signinAdmin">Sign in as Admin</a></p>
        
    </div>
</body>
