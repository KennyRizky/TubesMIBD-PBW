<script src="view/js/registerCheck.js" defer ></script>
<head>
    <script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
</head>

    <div id="kotakForm">
        <h1 class="JudulForm">Register As Teacher</h1>
        <form action="submitRegisterTeacher" method ="POST" enctype="multipart/form-data">
            <div class="flexform">
                <p>Email: </p>   
                <input class="registerinput" type="text" id="email" name="email" placeholder="email" oninput="checkVemail(); hide(); checkForValidity();">
                <img src = "view/css/check.png" id="centang0">
            </div>

            <div class="flexform">
                <p>Username: </p>   
                <input class="registerinput" type="text" id="uName" name="username" placeholder="username" oninput="checkVuser(); hide(); checkForValidity();">
                <img src = "view/css/check.png" id="centang1">
            </div>

            <div class="flexform">
                <p>Password: </p>   
                <input class="registerinput" type="password" id="pass" name="password" placeholder="password" oninput="checkVpass(); hide(); checkForValidity();">
                <img src = "view/css/check.png" id="centang2">
            </div>

            <div class="flexform">
                <p>Address: </p>   
                <input class="registerinput" type="text" id="alamat" name="alamat" required placeholder="address">
            </div>

            <div class="flexform">
                <p>Date of Birth: </p>   
                <input class="registerinput" type="date" id="birthDate", required name="birthDate">
            </div>
            
            <div class="uploadCV">
                <p>Upload CV: </p>  
                <input class="registerinput" type="file" id="CV", required name="CV">
            </div>
            
            <br>
            <br>
            <div id ="startBtn">
                <input type="submit" value="register" id="butSignIn">
            </div>
        </form>
        <br>
        <br>
        <div class="notMe">
            <p>Already have an Account? <a href="signinTeacher">Sign In</a></p>
            <p>Are You a Student? <a href="signin">Sign In as Student</a></p>

            <br>
            <p><a href="register" class="tombolBack">Back</a></p>
        </div>
    </div>

<script>
	let formData = new FormData();
	let fileField = document.querySelector("input[type='file']");

	formData.append('extra','abc123');
	formData.append('CV',fileField.files[0]);

	fetch('submitRegisterTeacher', {
		method: 'POST',
		body: formData
	})
	.then(response => response.json())
	.catch(error => console.error('Error:',error))
	.then(response =>
	console.log('Success:',JSON.stringify(response)));
</script>
