<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Sign In</h1>
        <form action="">
        <div id= "formSignIn">       
            <input type="text" id="uName" name="username" onkeyup="vUser()" placeholder="username"><img src="view/css/checker.png" id="checker1"><br>
            <input type="password" id="pass" name="password" onkeyup="vPass()" placeholder="password"><img src="view/css/checker.png" id="checker2"><br>
        </div>
        <div id ="startBtn">
            <input type="submit" value="Sign In" id="butSignIn">
        </div>
        </form>
        <p>Don't have an account? <a href="register">Register</a></p>
    </div>
</body>
