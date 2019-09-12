
<?php
if(isset($_POST['submit']))
{
	include 'connect.php';
	$roll= $_POST['roll'];
	$pswd=$_POST['psw'];
	$sql= "SELECT * FROM student WHERE roll='$roll' AND pwd='$pswd'";
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