<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="coursedatabase"; // Database name 


// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("Cannon connect to sql."); 

mysql_select_db("$db_name")or die("Cannot select databse.");
?>