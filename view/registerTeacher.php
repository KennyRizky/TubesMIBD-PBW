<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <div id="kotakForm">
        <h1 class="JudulForm">Register</h1>
        <form action="submitRegisterTeacher" method ="POST" id = "isiform" enctype="multipart/form-data">
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
            
            <div class="flexform">
                <input class="registerinput" type="file" id="ijazah", name="ijazah">
            </div>
            
            <div id ="startBtn">
                <input type="submit" value="register" id="butSignIn">
            </div>
        </form>
        <p>Already have an Account? <a href="signin">Sign in</a></p>
    </div>
</body>

<script>
	let formData = new FormData();
	let fileField = document.querySelector("input[type='file']");

	formData.append('extra','abc123');
	formData.append('ijazah',fileField.files[0]);

	fetch('submitRegisterTeacher', {
		method: 'POST',
		body: formData
	})
	.then(response => response.json())
	.catch(error => console.error('Error:',error))
	.then(response =>
	console.log('Success:',JSON.stringify(response)));
</script>
