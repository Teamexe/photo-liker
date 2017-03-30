<?php

require "db_conn.php";

if(!$_SESSION['create'])
{
	require 'session.php';
	//echo "session time if".$_SESSION['create'];
}

if(!$_REQUEST['j'])
	$j=0;
else	
	$j=$_REQUEST['j'];
$id1=$_SESSION["id"][$j];
$id2=$_SESSION["id"][($j+1)];

//echo "<p>j=".$id1."</p><p>j=".$id2."</p>";


if(isset($id1))
{
	echo '<img src="show.php?id='.$id1.'" class="img-circle img-responsive" width=200 height=200>
	<form method="get" action="like.php" enctype="multipart/form-data">
	<button name="id" value="'.$id1.'">Like</button>
	</form>';
	$sql="update image set view=view+1 where id=$id1;";
	if(mysqli_query($con,$sql))
	{}
	else
	{
		echo "error";
	}
}

if(isset($id2))
{
	echo '<img src="show.php?id='.$id2.'" class="img-circle img-responsive" width=200 height=200>
	<form method="get" action="like.php" enctype="multipart/form-data">
	<button name="id" value="'.$id2.'">Like</button>
	</form>';
	$sql="update image set view=view+1 where id=$id2;";
	if(mysqli_query($con,$sql))
	{}
	else
	{
		echo "error";
	}
}

if($j>1)
{	
	$jb=($j-2);
	echo '<a href="display.php?j='.$jb.'"><button>back</button></a>';
}

if($j<($_SESSION["val"]-2))
{	
	$jn=($j+2);
	echo '<a href="display.php?j='.$jn.'"><button>next</button></a>';
}
else
{
	session_destroy();
}




echo "j=". $_REQUEST['j'];

echo "<p> sesson = ".$_SESSION['val']." </p>";
//session_destroy();
?>