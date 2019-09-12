


<?php
if(isset($_POST['submit']))
{	include 'connect.php';
    $sdrn= $_POST['sdrn'];	
    $pass1=$_POST['pass1'];	
    $pass2=$_POST['pass2'];	
    $sql= "SELECT * FROM faculty  WHERE sdrn='$sdrn' AND email='$email' AND contact='$cont'";	
    $result=mysqli_query($con,$sql);	$check=mysqli_num_rows($result);	
    $row=mysqli_fetch_assoc($result);	
    if($check<1)	
    {	header("Location: reset.html?sdrn error");		
        exit();	}	
    else	
    {	if($pass1!=	$pass2)		
        {	header("Location: reset.html?password incorrect");		
            exit();
        }		
else		
{	$sqll = "UPDATE faculty SET password='$pass1' WHERE sdrn='$sdrn'";         
    $res=mysqli_query($con, $sqll);        
    $chec=mysqli_num_rows($res);
    if ($chec!=true) 
    { header("Location: ../codes/reset.html?fatal error");	
        exit();} 
    else 
    { 	header("Location: ../codes/login.html");	
        exit(); }
?>