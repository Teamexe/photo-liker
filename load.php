<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
	<input type="file" name="image">
	<input type="submit" name="submit" value="upload">
</form>
<?php

$email='emailid';
$pass='password';

if($email!='\0' && $pass!='\0')
{

require "db_conn.php";

$file=$_FILES['image']['tmp_name'];

if(!isset($file))
{
	echo "please select an image";
}
else
{
	$image=addslashes(file_get_contents($file));

	print $image;
	$image_name=addslashes($_FILES['image']['name']);

	$imagesize=getimagesize($file);
	if($imagesize==false)
	{
		echo "this is not an image". "<br>";
	}
	else
	{
		//$qry="INSERT INTO user_image values(' ','$image_name','$image')";
		/*$sql = "INSERT INTO storeimages
                    (image, name,size)
                    VALUES
                    ('{$image}', '{$image_name}','{$_FILES['image']['size']}');";
         */
         
         $sql = "INSERT INTO image
                    (image, name,email)
                    VALUES
                    ('{$image}', '{$image_name}','$email');";


		if(mysqli_query($con,$sql))
		{
			
			$lastid=mysqli_insert_id();
			echo "uploaded"."<br>"."<img src='get.php?id=$lastid' >";

		}
		else
		{
			echo "error";

		}
	}
}
}
else
{
	echo "please login";
}
?>

</body>
</html>
