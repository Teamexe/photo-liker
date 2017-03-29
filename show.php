<?php
 
// Store File in a name : DisplayPhoto.php 
 
            
 // some basic sanity checks
            
 if(isset($_GET['id']) && is_numeric($_GET['id'])) {
     //connect to the db
    require "db_conn.php";
 
     // get the image from the db
     $sql = "SELECT * FROM image WHERE id=" .$_GET['id'] . ";";
 
     // the result of the query
     $result = mysqli_query($con,$sql) or die("Invalid query: " . mysqli_error());
 
     // set the header for the image
     //header("Content-type: image/jpeg");

     if($data=mysqli_fetch_assoc($result))
     {    header("content-type: image/*");

          echo "".$data['image']."";
          //echo "<img src='arch.jpg'>";
          //echo "<img src='".$data['image']."'>";
     }

     //echo $result;
 
     // close the db link
     mysqli_close($link);
 
 }
 else {
     echo 'Please use a real id number';
 }
?>