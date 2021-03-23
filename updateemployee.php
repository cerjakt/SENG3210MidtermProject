<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Employee</title>
</head>

<body>
	<h2>Update an Employee Record</h2>
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
		if ($conn->connect_error) 
		{
			die("MySQL Connection Failed: " . $conn->connect_error);
		}
		echo "MySQL Connection Succeeded<br><br>";
		
		//pull the attribute that was passed with the html form GET request and put into a local variable.
		$emp_no = $_GET["emp_no"];
		
	
		echo "<br><br>";

		$sql = "SELECT * FROM employees where emp_no = '".$emp_no."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{
			//print rows
			while($row = $result->fetch_assoc())
			{
				echo "Employee Detail: <br><br>First Name: ". $row["first_name"]. "<br>Last Name: ". $row["last_name"]. "<br> Birth Date: ". $row["birth_date"]. "<br> Hire Date: ". $row["hire_date"]. "<br> Employee Number: ". $row["emp_no"]. "<br>";
			}
		} 
		else 
		{
			echo "No Records Found";
		}
		
		//always close the DB connections, don't leave 'em hanging
		$conn->close();
		
	?>
	
	<!-- Form to update employee -->
	<br><br>
	<form action="updateemployeeattr.php">

		<label for="first_name">First name:</label><br>
		<input type="text" name="fname" value="John"><br>
		<label for="last_name">Last name:</label><br>
		<input type="text" name="lname" value="Doe"><br>
		<label for="birth_date">Birth Date:</label><br>
		<input type="text" name="bdate" value="1969-05-30"><br>
		<label for="hire_date">Hire Date:</label><br>
		<input type="text" name="hdate" value="1999-05-30"><br>
		<label for="emp_no">Employee Number:</label><br>
		<input type="text" name="enumber" value="499999"><br>
		<input type="submit" value="Submit">
	</form> 
</body>
</html>
