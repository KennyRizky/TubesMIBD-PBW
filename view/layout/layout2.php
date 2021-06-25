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
	<div id="header">

		<a id="logo" href="index">Study Hub</a>

		<div id="nav">
			<a class="navbutton" href="index">Home</a>
			<a class="navbutton" href="myCourses">Courses</a>
			<a class="navbutton" href="companyprofile">About</a>

			<div id="searchbar">
				<input id="logosearch" type="text" placeholder="Search..">
				<i class="fa fa-search"></i>
			</div>
		</div>

		<div id="account">
			<a class="navbutton" href="logoutMember" onclick="return confirm('Are you sure you want to logout?');">Log Out</a>
			<a class="navbutton" href="profileMember"> <?php echo $_SESSION['username']?></a>


		</div>

	</div>
	
	<div id="main">
		<?php echo $content; ?>
	</div>
</body>
</html>