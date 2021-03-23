<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Employee</title>
</head>

<body>
	<h2>Employee Updated</h2>
	<hr>
	<?php
		
		//variables
		$servername = "192.168.1.110";  //IP of the database server
		$username = "admin";    	//username for database
		$password = "123";		//password for the user
		$dbname = "employees";  	//the database that will be used
	
		//this is the php object oriented style of creating a mysql connection
		$conn = new mysqli($servername, $username, $password, $dbname);  
	
		//check for connection success
		if ($conn->connect_error) 
		{
			die("MySQL Connection Failed: " . $conn->connect_error);
		}
		echo "MySQL Connection Succeeded<br><br>";
		

		//pull the attribute that was passed with the html form GET request and put into a local variable.
		$fname = $_GET["fname"];    // "John"
		$lname = $_GET["lname"];    // "Doe"
		$bdate = $_GET["bdate"];    // "1969-05-30"
		$hdate = $_GET["hdate"];    // "1999-05-30"
		$emp_no = $_GET["enumber"]; // 499999

		echo "Updating " .$first_name. " to " .$fname;
		echo "<br>";
		echo "Updating " .$last_name. " to " .$lname;
		echo "<br>";
		echo "Updating " .$hire_date. " to " .$hdate;
		echo "<br>";
		echo "Updating " .$birth_date. " to " .$bdate;

		echo "<br><br>";
		
		//SQL select statements
		$sql = "UPDATE employees SET ".$fname." = '".$first_name."' where ".$emp_no." = '".$emp_no."'";
		$sql = "UPDATE employees SET ".$last_name." = '".$lname."' where ".$emp_no." = '".$emp_no."'";
		$sql = "UPDATE employees SET ".$hire_date." = '".$hdate."' where ".$emp_no." = '".$emp_no."'";
		$sql = "UPDATE employees SET ".$birth_date." = '".$bdate."' where ".$emp_no." = '".$emp_no."'";

		//run the update
		if ($conn->query($sql) === TRUE)
		{
		echo "Update Completed";
		} 
		else 
		{
		echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
		//closing DB connection
		$conn->close();
		
?>
<br><br>
<a href="index.html" title="Home" target="_parent">Home Page</a>
</body>
</html>
