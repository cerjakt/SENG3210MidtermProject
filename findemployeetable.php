<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Find Employee</title>
	
	<!-- a little snippet of Cascading Style Sheet style of formatting for the data table -->
	<!-- create a 1 pixel border, with a collapsed single border -->
	<style>
		table, th, td {
  		border: 1px solid black;
		border-collapse: collapse
		}
	</style>
	
</head>

<body>
	<h2>Find an Employee Record</h2>
	<hr>
	<?php
		//php code is used to generate the html when the page is requested. 
		//html is create using the 'echo' (similar to print) command
		echo "<h3>PHP Code Generates This:</h3>";
		
		//variables
		$servername = "192.168.1.110";  //IP of the database server
		$username = "admin";    	//username for database
		$password = "123";		//password for the user
		$dbname = "employees";  	//the database that will be used
	
		//this is the php object oriented style of creating a mysql connection
		$conn = new mysqli($servername, $username, $password, $dbname);  
	
		//check for connection success
		if ($conn->connect_error) {
			die("MySQL Connection Failed: " . $conn->connect_error);
		}
		echo "MySQL Connection Succeeded<br><br>";
		
		//pull the attribute that was passed with the html form GET request and put into a local variable.
		$lastname = $_GET["lastname"];
		echo "Searching for: " . $lastname;
	
		echo "<br><br>";
		
		//SQL select statement
		$sql = "SELECT first_name,last_name FROM employees where last_name = '".$lastname."'";
	
		//putting the result into a variable
		$result = $conn->query($sql);
	
		//if there were no records found say so, otherwise create a while loop that loops through all rows
		//and echos each line to the screen. You do this by creating some crazy looking echo statements
		// in the form of HTMLText . row[column] . HTMLText . row[column].   etc...
		// the dot "." is PHP's string concatenator operator
		// here HTML Table tags are used to create a table and table rows.
		echo "<strong>Employee First and Last Names</strong><br><br>";
	    	echo "<table style=\"width:25%\">";
	    	echo "<tr><td><strong>First Name</strong></td><td><strong>Last Name</strong></td></tr>";
	
		if ($result->num_rows > 0)
		{
			//print rows
			while($row = $result->fetch_assoc())
			{
				echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td></tr>";
			}
		} 
		else 
		{
			echo "No Records Found";
		}
	
		echo "</table>";
	
		//closing DB connection
		$conn->close();
		
	?>
</body>
</html>
