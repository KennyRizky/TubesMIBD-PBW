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

        <h1>ADMIN PAGE</h1>

	</div>
	
	<div id="main">
		<?php echo $content; ?>
	</div>
</body>
</html>