<html>
	<title>BACA University</title>
	
	<head>
		<link rel="stylesheet" href="Style/style_index.css">
	</head>
	
	<body>
		<div id="content">
			<?php include "header.php";?>
			
			<div id="create_course">
			<form action = "syllabus_creation.php" method="POST">
				<h3>Course Title</h3><br />
				<input id="course_title" name="course_title" type="text" size="30"><br /><br />
				
				<h3>Subject</h3><br />
				<select name="course_subject">
					<option>Select...</option>
					<option>Math</option>
					<option>Computer Science</option>
					<option>English</option>
					<option>Other</option>
				</select><br /><br />
				
				<h3>Course Description</h3>
				<textarea id="description" name="description"cols="30" rows="5" ></textarea><br /><br />
				
				<input type="submit" value="Submit" >
			</form>
			</div>
		</div>
	
</html>

