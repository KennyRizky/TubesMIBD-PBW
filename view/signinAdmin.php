<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Sign In For Admin </h1>
        <form action="submitSignInAdmin" method="POST" id="isiFormSignIn">
                    <div class="flexform">
                        Username: <br><input class="registerinput" type="text" id="uName" name="username" placeholder="username" oninput="checkVuser(); hide(); checkForValiditySignIn();">
                        <img src = "view/css/check.png" id="centang1">
                    </div>

                    <div class="flexform">
                        Password: <br><input class="registerinput" type="password" id="pass" name="password" placeholder="password" oninput="checkVpass(); hide(); checkForValiditySignIn();">
                        <img src = "view/css/check.png" id="centang2">
                    </div>
            <div id ="startBtnSignIn">
                <input type="submit" value="Sign In" id="butSignIn">
            </div>
            <p><a href="signin" class="tombolBack">Back</a></p>
        </form>
    </div>
</body>
