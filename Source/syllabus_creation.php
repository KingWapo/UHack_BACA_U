<html>
	<title>BACA University</title>
	
	<head>
		<link rel="stylesheet" href="Style/style_index.css">
	</head>
	
	<body>
		<div id="content">
			<?php include "header.php";?>
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

				$courseName = $_POST['course_title'];
				$courseSubject = $_POST['course_subject'];
				$courseDescription = $_POST['description'];
				
				//execute the SQL query and return records
				$result = mysql_query("INSERT INTO course (Name, Subject, Description) VALUES ('$courseName', '$courseSubject', '$courseDescription')");
				
				//close the connection
				mysql_close($dbhandle);
				
			?>
			<div id="create_syllabus">
			<form action = "goal_topic_creation.php" method="POST">
				<h3>Syllabus Description</h3><br />
				<input id="syllabus_description" name="syllabus_description" type="text" size="30"><br /><br />
				
				<h3>Syllabus Evaluation</h3>
				<textarea id="syllabus_eval" name="syllabus_eval"cols="30" rows="5" ></textarea><br /><br />
				<input name="BeginClass" value=True />
				<input type="submit" value="Submit" >
			</form>
			</div>
		</div>
	
</html>

