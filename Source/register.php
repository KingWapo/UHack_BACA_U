<html>
	<title>BACA University</title>
	
	<head>
		<link rel="stylesheet" href="Style/style_index.css">
	</head>
	
	<body>
		<div id="content">
			<?php include "header.php";?>
			
			<div id="register_form">
				<form action="user_register.php" method="POST">
					<h3><label for="first">First Name:</label></h3><br /><input id="first" name="first" type="text" size="30"><br /><br />
					<h3><label for="last">Last Name:</label></h3><br /><input id="last" name="last" type="text" size="30"><br /><br />
					<h3><label for="email">E-Mail Address:</label></h3><br /><input id="email" name="email" type="text" size="30"><br /><br />
					<h3><label for="email2">Confirm E-mail Address:</label></h3><br /><input id="email2" name="email2" type="text" size="30"><br /><br />
					<h3><label for="pass">Password:</label></h3><br /><input id="pass" name="pass" type="password" size="30"><br /><br />
					<h3><label for="pass2">Confirm Password:</label></h3><br /><input id="pass2" name="pass2" type="password" size="30"><br /><br />
					<input type="submit" value="Submit"><br />
				</form>
			</div>
		</div>
	
</html>