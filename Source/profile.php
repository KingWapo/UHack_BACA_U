<html>
	<title>BACA University</title>
	
	<head>
		<link rel="stylesheet" href="Style/style_index.css">
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
		<meta charset="UTF-8"> 
	</head>
	
	<body>
		<div id="content">
			<?php include "header.php";?>
		
			<div id="news">
				<!--Use php to add x large news items-->
				<?php
					$username = "root";
					$password = "";
					$hostname = "localhost"; 

					//connection to the database
					$dbhandle = mysql_connect($hostname, $username, $password)
					 or die("Unable to connect to MySQL");

					//select a database to work with
					$selected = mysql_select_db("coursedatabase",$dbhandle)
					  or die("Could not select examples");
					
					//execute the SQL query and return records
					$result = mysql_query("CALL GetCoursesForStudent('".$name."')");
				?>
				<div id='left_content'><div class='profile_large'><h2>My Courses</h2><ul>
				<?php
					//fetch the data from the database
					while ($row = mysql_fetch_array($result)) {
					   echo "<li><a href='course_home.php?id=".$row{'Id'}."'>(".$row{'Subject'}.") - ".$row{'Name'}."</a><br/> - ".$row{'Description'}."</li><br/>";
					}
				?>	
					</ul></div>
					
					<div class='profile_large'>
							<h2>Achievements</h2>
							<ul>
								<li id='badge_drop'>ICON On the Job - finish 10 assignments</li>
								<li>ICON Quiz Master - complete 250 problems</li>
								<li>ICON Associate of Science - Complete 1 science course</li>
							</ul>
							<h3>Almost there..</h3>
							<ul>
								<li>ICON Bachelor of Science - Complete 5 science courses</li>
								<li>ICON Working Hard - finish 50 assignments</li>
							</ul>
						</div>
					</div>
				<?php	
					mysql_close($dbhandle);
					$email = "stewarta0140@my.uwstout.edu";
					$url = "https://uDLh18c0hG0VvYWL6od_:@sandbox.youracclaim.com/api/v1/organizations/f06881a6-5e3e-451e-b7c9-096d21f792a8/badges?filer=query:stewarta0140@my.uwstout.edu";
					$info = "";
					$response = file_get_contents($url);
					
					//print_r($response);
					echo "
					<script>
						var returnData = JSON.parse("."'".$response."'".");
					
						var leBadge = new Image();
						leBadge.src = returnData.data[0].badge_template.image_url;
						
						
						document.getElementById('badge_drop').appendChild(leBadge);
					</script>
					";

					//connection to the database
					$dbhandle = mysql_connect($hostname, $username, $password)
					 or die("Unable to connect to MySQL");

					//select a database to work with
					$selected = mysql_select_db("coursedatabase",$dbhandle)
					  or die("Could not select examples");
					
					$result = mysql_query("CALL GetAssignmentsForStudent('".$name."')");
					
					if($result==false){
						echo"query failed";
						}
					echo "<div id='right_content'><div class='profile_small'><h3>Upcoming Homework</h3><ul>";
					
					//fetch tha data from the database
					while ($row = mysql_fetch_array($result)) {
					   echo "<li>".$row{'Name'}."</li>";
					}
					
					echo "</ul></div></div>";
					
					//close the connection
					mysql_close($dbhandle);
				?>
			</div>
		</div>
	</body>
</html>