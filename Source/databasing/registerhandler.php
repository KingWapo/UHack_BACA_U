<?php

include('dbconnect.php');

function statusMsg($text) {
	echo('<div class="statusmessage">'.$text.'</div>');
}

$formData = array(	
	"required" => array("first"=>"", "last"=>"", "email"=>"", "email2"=>"", "pass"=>"", "pass2"=>""), 
	"other"=>array()
);

$dbData = array("password"=>"", "email"=>"", "verify"=>"", "fname"=>"",);

function uberCheck() {
	global $formData;
	global $dbData;
	global $tbl_name;
	
	// Check that all required fields are filled in.
	foreach ($formData["required"] as $key => $value) {
		$tv = $_POST[$key]; // Temp Variable -> tv
		if (isset($tv) && !empty($tv)) {
			// Register form element
			$formData["required"][$key] = $_POST[$key];
		} else {
			statusMsg("One or more of the required fields have not been filled out.");
			return false;
		}
	}
	
	// Get all non-required fields.
	foreach ($formData["other"] as $key => $value) {
		$tv = $_POST[$key]; // Temp Variable -> tv
		if (isset($tv) && !empty($tv)) {
			// Register form element
			$formData["other"][$key] = $_POST[$key];
		}
	}

	/////////////////////////////////////////////////////////////////////////// This might actually cause some problems later on. Rework pending.

	// Protect the SQL!
	foreach ($formData as $kout => $vout) {
		foreach ($vout as $kin => $vin) {
			$safetycheck = stripslashes($vin);
			$safetycheck = mysql_real_escape_string($vin);
			if ($safetycheck !== $vin) {
				statusMsg("Invalid character(s) used somewhere. Please review your form and try again.");
				return false;
			}
			$formData[$kout][$kin] = $safetycheck;
		}
	}
	
	///////////////////////////////////////////////////////////////////////////
	// Insert anything that doesn't need special checks:
	//$dbData["fullname"] = $formData["required"]["newname"];
	$dbData["name"] = $formData["required"]["first"] + " " + $formData["required"]["last"];
	
	///////////////////////////////////////////////////////////////////////////
	// Make appropriate e-mail checks:
	$newemail = $formData["required"]["email"];
	
	if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) { 
		statusMsg("Please enter a valid e-mail address.");
		return false;
	}
	if ($newemail !== $formData["required"]["email2"]) {
		statusMsg("The e-mail addresses entered to not match.");
	}
	$email_check = mysql_query("SELECT * FROM $tbl_name WHERE email='$newemail'") or die(mysql_error());
	$do_email_check = mysql_num_rows($email_check);
	if ($do_email_check > 0) {
		statusMsg("The e-mail address you provided is already in use.");
		return false;
	}
	$dbData["email"] = $newemail
	
	///////////////////////////////////////////////////////////////////////////	
	// Make appropriate password checks:
	$pw = $formData["required"]["pass"];
	
	if (strlen($pw) < 8) {
		statusMsg("Password must contain at least 8 characters.");
		return false;
	}
	if ($pw !== $formData["required"]["pass2"]) {
		statusMsg("The passwords entered do not match.");
		return false;
	}
	$bannedPWs = array("password", "password1", "12345678", "qwertyui", "asdfghjk", "zxcvbnm,", "87654321", "username");
	foreach ($bannedPWs as $val) {
		if (strtolower($pw) == $val) {
			statusMsg("Please use a more secure passsword.");
			return false;
		}
	}
	$dbData["password"] = md5($pw);
	
	return true;
}
// End of uberCheck();	///////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (uberCheck()) {
	// If the script has managed to avoid dying thus far, then put the user in the database.

	$dbData["verify"] = md5(rand(1437, 208659));
	
	// Prepare the insertion query
	$querystr = "INSERT INTO $tbl_name (";
	foreach ($dbData as $k => $v) {
		if ($v !== "") {
			$querystr = $querystr.$k.", ";
		}
	}
	$querystr = trim($querystr, ", ").") VALUES (";
	foreach ($dbData as $k => $v) {
		if ($v !== "") {
			$querystr = $querystr."'".$v."'".", ";
		}
	}
	$querystr = trim($querystr, ", ").")";
	
//	statusMsg(htmlentities($querystr));
//	die();
	
	$insert = mysql_query($querystr);
	
	if(!$insert){
		die("There's little problem: ".mysql_error());
	} else {

		// Send an account verification email //////////////////////////////////////////////////////////////////////////////////
		$recipient = $dbData["email"]; // Send email to our user 
		$subject = 'Welcome to BACA U!'; // Give the email a subject 
		$message = ' 

Thanks for signing up! 
Your account has been created, and you can login with the following credentials after you have activated your account by pressing the url below. 
 
 
Please click this link to activate your account: 
 
http://www.uofbaca.com/databasing/verify.php?email='.$dbData["email"].'&code='.$dbData["verify"].' 
 
'; // Our message above including the link 
							 
		$headers = 'From:noreply@uofbaca.com' . "\r\n"; // Set from headers 
		mail($recipient, $subject, $message, $headers); // Send our email 
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		header("location:usersystem/registersuccess.php");
	}
}

?>