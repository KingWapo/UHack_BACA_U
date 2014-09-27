<html>
	<title>BACA University</title>
	
	<head>
		<link rel="stylesheet" href="Style/style_index.css">
	</head>
	
	<body>
		<div id="content">
			<?php include "header.php";?>
		
			<div id="news">
				<div id="left_content">
					<div class="profile_large">
						<h2>News</h2>
						<h3>Video Lecture - Section 2.1 (SEP 29)</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
						<br/>
						<h3>Syllabus Update</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
						<br/>
						<h3>Homework 3 Tips</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
					</div>
					<div class="profile_large">
						<div style="float:left;">
							<h3>Instructor</h3>
							<ul>
								<li>Dr. John Doe</li>
								<li>doej@university.edu</li>
								<li>123-456-0987</li>
								<li>doe.john.skype</li>
							</ul>
						</div>
						<div style="float:right;text-align:right;">
							<h3>Class Resources</h3>
							<ul>
								<li>Statistics of the D20 (textbook)</li>
								<li>Probability of a Roll (ebook)</li>
							</ul>
						</div>
					</div>
					<div class="profile_large">
						<h2>Calendar</h2>
						<table id="calendar" border="1">
							<tr>
								<th colspan="7"><h4>October 2014</h4></th>
							</tr>
							<tr>
								<td class="grey"><h5>28</h5></td>
								<td class="grey"><h5>29</h5></td>
								<td class="grey"><h5>30</h5></td>
								<td><h5>1</h5></td>
								<td><h5>2</h5></td>
								<td><h5>3</h5></td>
								<td><h5>4</h5></td>
							<tr>
							<tr>
								<td><h5>5</h5></td>
								<td><h5>6</h5></td>
								<td><h5>7</h5></td>
								<td><h5>8</h5></td>
								<td><h5>9</h5></td>
								<td><h5>10</h5></td>
								<td><h5>11</h5></td>
							<tr>
							<tr>
								<td><h5>12</h5></td>
								<td><h5>13</h5></td>
								<td><h5>14</h5></td>
								<td><h5>15</h5></td>
								<td><h5>16</h5></td>
								<td><h5>17</h5></td>
								<td><h5>18</h5></td>
							<tr>
							<tr>
								<td><h5>19</h5></td>
								<td><h5>20</h5></td>
								<td><h5>21</h5></td>
								<td><h5>22</h5></td>
								<td><h5>23</h5></td>
								<td><h5>24</h5></td>
								<td><h5>25</h5></td>
							<tr>
							<tr>
								<td><h5>26</h5></td>
								<td><h5>27</h5></td>
								<td><h5>28</h5></td>
								<td><h5>29</h5></td>
								<td><h5>30</h5></td>
								<td><h5>31</h5></td>
								<td class="grey"><h5>1</h5></td>
							<tr>
						</table>
					</div>
				</div>
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
					$result = mysql_query("SELECT * FROM assignments WHERE ".$_GET['id']." = CourseId and Completed = 1");
					
					echo "<div id='right_content'><div class='news_small'><h3>Completed Homework</h3><ul>";
					
					//fetch tha data from the database
					while ($row = mysql_fetch_array($result)) {
						echo "<li>".$row{'Name'}."</li>";
					}
					
					echo "</ul></div>";
					
					//close the connection
					mysql_close($dbhandle);

					//connection to the database
					$dbhandle = mysql_connect($hostname, $username, $password)
					 or die("Unable to connect to MySQL");

					//select a database to work with
					$selected = mysql_select_db("coursedatabase",$dbhandle)
					  or die("Could not select examples");
					
					//execute the SQL query and return records
					$result = mysql_query("SELECT * FROM assignments WHERE ".$_GET['id']." = CourseId and Completed = 0");
					
					echo "<div id='right_content'><div class='news_small'><h3>Upcoming Homework</h3><ul>";
					
					//fetch tha data from the database
					while ($row = mysql_fetch_array($result)) {
						echo "<li>".$row{'Name'}."</li>";
					}
					
					echo "</ul></div>";
					
					//close the connection
					mysql_close($dbhandle);
				?>
					<div class="news_small">
						<h3>Video Lectures</h3>
						<ul>
							<li>Section 2.1<br/>(SEP 29)</li>
							<li>Section 1.12<br/>(SEP 26)</li>
							<li>Section 1.8<br/>(SEP 24)</li>
							<li>Section 1.7<br/>(SEP 22)</li>
							<li>more</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>