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

				$begin = $_POST["BeginClass"];
				
				if ($begin)
				{
					// Create new syllabus
					$syl_desc = $_POST["syllabus_description"];
					$syl_eval = $_POST["syllabus_eval"];
					
					// New Syll: courseId, userId, $syl_desc, $syl_eval
					$result = mysql_query("Insert Into Syllabus(CourseId, TeacherId, Description, Evaluation) Values( (select max(Id) from Course), (Select max(Id) from Users where Name = @Name), '$syl_desc', '$syl_eval')");
				}
				else
				{
					// Create new goal or topic
					$isGoal = $_POST["Goal"];
					if ($isGoal)
					{
						$goal = $_POST["new_goal"];
						
						// New Goal: goal
						$result = mysql_query("insert into coursegoal (Goal) values (" + $goal + ")");
					}
					else
					{
						$topic = $_POST["new_topic"];
						
						// New Goal: goal
						$result = mysql_query("insert into CourseTopic (Topic) values (" + $topic + ")");
					}
				}
				
				//close the connection
				mysql_close($dbhandle);
				
			?>
			<div id="create_syllabus">
			<form action = "goal_topic_creation.php" method="POST">
				<h3>Goal</h3>
				<textarea id="new_goal" name="new_goal"cols="30" rows="5" ></textarea><br /><br />
				<input name="BeginClass" value=False />
				<input name="Goal" value=True />
				<input type="submit" value="Submit" >
			</form>
			<form action = "goal_topic_creation.php" method="POST">
				<h3>Topic</h3>
				<textarea id="new_topic" name="new_topic"cols="30" rows="5" ></textarea><br /><br />
				<input name="BeginClass" value=False />
				<input name="Goal" value=False />
				<input type="submit" value="Submit" >
			</form>
			<!-- 
				Form to go to created class. Make the previous two buttons say "Add Goal/Topic" instead of Submit?
			-->
			</div>
		</div>
	
</html>

