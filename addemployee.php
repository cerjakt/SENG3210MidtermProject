<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Employee</title>
</head>

<body>
	<h2>Add an Employee Record</h2>
	<br><br>
	<?php
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
		$last_name = $_GET["last_name"];
		$first_name = $_GET["first_name"];
		$birth_date = $_GET["birth_date"];
		$hire_date = $_GET["hire_date"];
		$gender = $_GET["gender"];
		$emp_no = $_GET["emp_no"];
		echo "Adding record for: " . $firstname . " " . $lastname;
	
		echo "<br><br>";
		
		//create the SQL insert statement, notice the funky string concat at the end to variablize the query
		//based on using the GET attribute
		//this statement needs to be variablized to put in the data passed from the form
		//right now it is hardcoded.
		$sql = "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) VALUES
		('".$emp_no."', '".$birth_date."', '".$first_name."', '".$last_name."', '".$gender."', '".$hire_date."')";
	
		if ($conn->query($sql) === TRUE)
		{	
			echo "New Employee Created Successfully";	
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;	
		}
		
		//always close the DB connections, don't leave 'em hanging
		$conn->close();
		
	?>
</body>
</html>
