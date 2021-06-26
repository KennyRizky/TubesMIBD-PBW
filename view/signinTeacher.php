<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Sign In For Teacher</h1>
        <form action="signinTeacher" method="POST" id="isiFormSignIn">
                    <div class="flexform">
                        <p>Username: </p>
                        <input class="registerinput" type="text" id="uName" name="username" placeholder="username" required oninput="checkVuser(); hide(); checkForValiditySignIn();">
                        <img src = "view/css/check.png" id="centang1">
                    </div>

                    <div class="flexform">
                        <p>Password: </p>
                        <input class="registerinput" type="password" id="pass" name="password" placeholder="password" required oninput="checkVpass(); hide(); checkForValiditySignIn();">
                        <img src = "view/css/check.png" id="centang2">
                    </div>
            <div id ="startBtnSignIn">
                <input type="submit" value="Sign In" id="butSignIn">
            </div>
        </form>
        <br>
        <br>
        <p>Don't have an account? <a href="registerTeacher">Register Teacher</a></p>
        <p><a href="signin" class="tombolBack">Back</a></p>
    </div>
</body>
