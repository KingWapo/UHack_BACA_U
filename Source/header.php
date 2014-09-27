<div id="header">
	<div id="banner">
		BACA University
	</div>
	<div id="login">
		<ul>
			<li>
				<?php
					$username = "root";
					$password = "";
					$hostname = "localhost";
					$name = "Austin";

					//connection to the database
					$dbhandle = mysql_connect($hostname, $username, $password)
					 or die("Unable to connect to MySQL");

					//select a database to work with
					$selected = mysql_select_db("coursedatabase",$dbhandle)
					  or die("Could not select examples");

					//execute the SQL query and return records
					$result = mysql_query("SELECT Id, Name FROM users WHERE Name like '".$name."%'");

					//fetch tha data from the database
					while ($row = mysql_fetch_array($result)) {
						$name = $row{'Name'};
					   echo "<a href='/uhack-superhero-cards/Source/profile.php'>".$row{'Name'}."  ID:".$row{'Id'}."</a><br/>";
					}
					//close the connection
					mysql_close($dbhandle);
				?>
			</li>
			<li>
			</li>
			<li><a href="/uhack-superhero-cards/Source/register.php">register</a></li>
		</ul>
	</div>
</div>

<div id="navigation">
	<ul>
		<li>about us</li>
		<li>contact us</li>
		<li>get registered</li>
	</ul>
</div>