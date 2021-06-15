<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Register</h1>
        <form action="submitRegister" method="POST">
            <div id= "formSignIn">
                <input type="text" id="email" name="email" placeholder="email">
                <input type="text" id="uName" name="username" placeholder="username" oninput="checkVuser();"><img src = "view/css/check.png" id="centang1">
                <input type="password" id="pass" name="password" placeholder="password" oninput="checkVpass(); hide();"><img src = "view/css/check.png" id="centang2">
                <input type="text" id="alamat" name="alamat" placeholder="alamat"><br>
                <input type="date" id="birthDate", name="birthDate"><br>   
            </div>

            <div id ="startBtn">
                <input type="submit" value="register" id="butSignIn">
            </div>
        </form>
        <p>Already have an Account? <a href="signin">Sign in</a></p>
        <p>Are you a teacher? <a href="registerTeacher">Register as Teacher</a></p>
    </div>
</body>
