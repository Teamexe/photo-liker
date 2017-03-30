<?php include 'db_conn.php';>

<?php

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$roll_no = $_POST['roll_no'];
$department = $_POST['department'];
$year = $_POST['year'];


mysqli_query($connect"INSERT INTO employees1(first_name,last_name,roll_no,department,year)
				VALUES('$first_name','$last_name','roll_no','$department','$year')");
