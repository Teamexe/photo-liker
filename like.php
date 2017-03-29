<?php

$email='emailid';

if(isset($_GET['id']) && is_numeric($_GET['id']) && $email!='\0') {

require "db_conn.php";
$id=$_GET['id'];

$sql="select * from likes where id='$id' and email_like='$email';";
$result = mysqli_query($con,$sql);


if($data=mysqli_fetch_assoc($result))
{  
	
	$sql="delete from likes where id='$id' and email_like='$email';";
	//echo "$sql";

	if(mysqli_query($con,$sql))
	{
		echo "unlike";
	}
	else
	{
		echo "error";
	} 
}
else
{	
	$sql = "INSERT INTO likes
	                    (id,email_like)
	                    VALUES
	                    ('$id','$email');";

	if(mysqli_query($con,$sql))
	{
		echo "liked".$id;
	}
	else
	{
		echo "error";
	}                    
}

}



?>