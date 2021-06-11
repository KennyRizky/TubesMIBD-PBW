<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="view/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="header">

		<a id="logo" href="index">Study Hub</a>
		<div id="nav">

			<a class="navbutton" href="index">Home</a>
			<a class="navbutton" href="index">Courses</a>
			<a class="navbutton"href="index">About</a>

			<div id="searchbar">
				<input id="logosearch" type="text" placeholder="Search..">
				<i class="fa fa-search"></i>
			</div>


		</div>
		<div id="account">
			<a class="navbutton" href="index">Sign In</a>
			<a class="navbutton" href="index">Register</a>
		</div>
	</div>
	<?php echo $content; ?>

</body>
</html>