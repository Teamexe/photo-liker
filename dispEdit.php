<?php

require "db_conn.php";

ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start(); 

if(!$_SESSION["val"])
{	
	echo "**if**";
	$_SESSION["val"]=1;
$sql="select id from image order by view;";
$result = mysqli_query($con,$sql);
$i=0;
while($data=mysqli_fetch_assoc($result))
{ 
	
	$_SESSION["id"][$i]=$data['id'];
	echo ".........id=".$_SESSION["id"][$i].".......\n";
	$i++;
}
$_SESSION["val"]=$i;
$id1=$_SESSION["id"][0];
$id2=$_SESSION["id"][1];
echo '---ID1='.$id1." id2=".$id2."///";

}
else
{
	$j=$_REQUIRE['j'];
	echo "j===$j";
	echo "**else**";
if($j<$_SESSION["val"])
{	echo "$j less";
	$id1=$_SESSION["id"][$j++];
	if($j<$_SESSION["val"])
		$id2=$_SESSION["id"][$j++];
	else
		$j=0;
}
else
{
	echo "$j more";
	$j=0;
}

}
echo 'ID1='.$id1." id2=".$id2;
echo "dd=".$_SESSION["val"];


echo '<img src="show.php?id='.$id1.'" class="img-circle img-responsive" width=200 height=200>
<form method="get" action="like.php" enctype="multipart/form-data">
<button name="id" value="'.$id1.'">1</button>
</form>';
if(isset($id1))
{$sql="update image set view=view+1 where id=$id1;";
if(mysqli_query($con,$sql))
{}
else
{
	echo "error";
}
}
echo '<img src="show.php?id='.$id2.'" class="img-circle img-responsive" width=200 height=200>
<form method="get" action="like.php" enctype="multipart/form-data">
<button name="id" value="'.$id2.'">2</button>
</form>';

if(isset($id2))
{$sql="update image set view=view+1 where id=$id2;";
if(mysqli_query($con,$sql))
{}
else
{
	echo "error";
}
}
echo "\ni = ".$id." val =". $_SESSION['val']." j=".$j;


echo '
<form method="get" action="display.php?j='.$j.'" enctype="multipart/form-data">
<button name="id" value="next">1</button>
</form>';

//session_destroy();
?>