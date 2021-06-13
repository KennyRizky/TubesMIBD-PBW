<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Sign In</h1>
        <form action="">
            <fieldset>
                <label for="uName">Username</label>:
                <input type="text" id="uName" name="username" onkeyup="vUser()"><img src="css/checker.png" id="checker1"><br>
            
                <label for="pass">Password</label>:
                <input type="password" id="pass" name="password" onkeyup="vPass()"><img src="css/checker.png" id="checker2"><br>

                <input type="submit" value="Sign In" id="butSignIn">
            </fieldset>
        </form>
    </div>
</body>
