<?php

ini_set('session.gc_maxlifetime', 0);//time in sec
session_set_cookie_params(0);//time in sec 
session_start(); 

$sql="select id,view from image order by view;";
$result = mysqli_query($con,$sql);
$i=0;
$_SESSION['create']=time();
if(!$_SESSION["val"])
{	
while($data=mysqli_fetch_assoc($result))
{ 
	
	$_SESSION["id"][$i]=$data['id'];
	//echo "<p>id=".$_SESSION["id"][$i]."  view = ".$data['view']."</p>";
	$i++;
}
//echo "<p>i=$i</p>";
$_SESSION["val"]=$i;
}

?>