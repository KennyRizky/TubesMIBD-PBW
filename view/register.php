<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Register</h1>
        <form action="">
        <div id= "formSignIn">
            <select name="role" id="role">
                <option value ="member">Member</option>
                <option value ="teacher">Teacher</option>
            </select>
            <input type="text" id="email" name="email" onkeyup="vEmail()" placeholder="email"><img src="css/checker.png" id="checker0"><br>   
            <input type="text" id="uName" name="username" onkeyup="vUser()" placeholder="username"><img src="css/checker.png" id="checker1"><br>
            <input type="password" id="pass" name="password" onkeyup="vPass()" placeholder="password"><img src="css/checker.png" id="checker2"><br>
            <input type="date" id="birthDate", name="birthDate">
        </div>
        <div id ="startBtn">
            <input type="submit" value="register" id="butSignIn">
        </div>
        </form>
        <p>Already have an Account? <a href="signin">Sign in</a></p>
    </div>
</body>