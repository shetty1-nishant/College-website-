11 of 32
faculty.php
Inbox
	x
Nishant Shetty <nishantshetty2017@gmail.com>
	
Sat, Jul 28, 2018, 4:39 PM
	
to me
<?php
if(isset($_POST['submit']))
{
	include 'connect.php';
	$sdr= $_POST['sdrn'];
	$pswd=$_POST['psw'];
	$sql= "SELECT * FROM faculty WHERE sdr='$sdr' AND password='$pswd'";
	$result=mysqli_query($con,$sql);
	$check=mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);
	if($check<1)
	{   
		header("Location: ../codes/login.html?login=error");
		exit();
	}
	else
	{
        header("Location: ../codes/dash.html");
       
	}
}
else
{   
	header("Location: ../codes/login.html");
	exit();
}

?>

	
	
