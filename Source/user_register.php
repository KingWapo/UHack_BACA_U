<?php
	$username = "root";
	$password = "";
	$hostname = "localhost"; 

	//connection to the database
	$dbhandle = mysql_connect($hostname, $username, $password)
		 or die("");
	echo "";

	//select a database to work with
	$selected = mysql_select_db("coursedatabase",$dbhandle)
		or die("Could not select examples");
		
	$name = $_POST['first'].' '.$_POST['last'];
	$email = $_POST['email'];
	$email2 = $_POST['email2'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	
	if($email != $email2){
		die("Your email addresses do not match");
	}
	
	if($pass != $pass2){
		die("Your passwords do not match");
	}
	
	$pass = md5($pass);
	
	$submit_query = mysql_query("INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$pass')");
	
	mysql_close($dbhandle);
?>