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
		$fname = $_GET["first_name"]; // "John"
        $lname = $_GET["last_name"];  // "Doe"
        $bdate = $_GET["birth_date"]; // "1969-05-30"
        $hdate = $_GET["hire_date"];  // "1999-05-30"
        $enumber = $_GET["emp_no"]; // "500000"

        echo "Updating " . $fname . " to " . $first_name;
        echo "<br><br>";
        echo "Updating " . $lname . " to " . $last_name;
        echo "<br><br>";
        echo "Updating " . $hdate . " to " . $hire_date;
        echo "<br><br>";
        echo "Updating " . $bdate . " to " . $birth_date;
        echo "<br><br>";
        echo "Updating " . $enumber . " to " . $emp_no;

		echo "<br><br>";
		
		//create the SQL select statement, notice the funky string concat at the end to variablize the query
		//based on using the GET attribute
		$sql = "UPDATE employees SET ".$fname." = '".$first_name."'";
        $sql = "UPDATE employees SET ".$lname." = '".$last_name."'";
        $sql = "UPDATE employees SET ".$hdate." = '".$hire_date."'";
        $sql = "UPDATE employees SET ".$bdate." = '".$birth_date."'";
        $sql = "UPDATE employees SET ".$enumber." = '".$emp_no."'";

		//run the update
        if ($conn->query($sql) === TRUE)
        {
        echo "Update Completed";
        } 
        else 
        {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }	
		
		//always close the DB connections, don't leave open 
		$conn->close();
		
?>
<br><br>
<a href="index.html" title="Home" target="_parent">Home Page</a>
</body>
</html>
