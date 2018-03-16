<?php 
$servername="localhost";
$username="root";
$password="";
$db="fb";
$conn=mysqli_connect($servername,$username,$password) or die("error in connection");
if(!$conn)
   echo"failed";
else
echo"connection established";
  mysqli_select_db($conn,$db);
?>
