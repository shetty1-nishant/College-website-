<?php
$host="localhost";
$username="root";
$password="";
$dbname="data";
$con = mysqli_connect("$host","$username","$password","$dbname");
if($con==true)
{
	echo "connected";
}
else
{
	echo "not connected";
}
?>