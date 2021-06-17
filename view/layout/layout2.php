<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<script src="view/js/script.js" defer ></script>	
	<link rel="stylesheet" href="view/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == $usernamelogin && $password == $passwordlogin) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: myCourses.php");
        }
        else{
            header("Location: signin.php");
        }
    ?>
	<div id="header">

		<a id="logo" href="index">Study Hub</a>

		<div id="nav">
			<a class="navbutton" href="index">Home</a>
			<a class="navbutton" href="courses">Courses</a>
			<a class="navbutton" href="companyprofile">About</a>

			<div id="searchbar">
				<input id="logosearch" type="text" placeholder="Search..">
				<i class="fa fa-search"></i>
			</div>
		</div>

		<div id="account">

		</div>

	</div>
	
	<div id="main">
		<?php echo $content; ?>
	</div>
</body>
</html>