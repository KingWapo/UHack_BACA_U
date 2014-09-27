<?php

ob_start();
include('dbconnect.php');
$tbl_name="users"; // Table name 
$_SESSION['loggedemail'] = "";

if(isset($_POST['loginemail']) && !empty($_POST['loginemail']) AND isset($_POST['loginpass']) && !empty($_POST['pw'])){
	// E-mail and password sent from form 
	$email=$_REQUEST['loginemail']; 
	$pw=$_REQUEST['loginpass']; 

	function statusMsg($text) {
		echo('<div class="statusmessage">'.$text.'</div>');
	}

	// To protect MySQL injection (
	$email = stripslashes($email);
	$pw = stripslashes($pw);
	$email = mysql_real_escape_string($email);
	$pw = mysql_real_escape_string($pw);
	$pwh = md5($pw);

	$sql="SELECT * FROM $tbl_name WHERE Email='$email' AND (Password='$pwh' OR Password='$pw')";
	$result=mysql_query($sql);


	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	// If result matched $email and $pw, table row must be 1 row

	if($count==1){
		$founduser = mysql_fetch_assoc($result);
			
			// Register $email, $pw and redirect to file "login_success.php"
			$_SESSION['loggedemail']=$email;
			$_SESSION['loggedpw']=$pw;
			header("location:profile.php;");
	} else {
		statusMsg("Incorrect e-mail or password. Please try again.");
	}
}

ob_end_flush();
?>