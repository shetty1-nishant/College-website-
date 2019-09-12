<?php
if(isset($_POST['submit']))
{
	$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="data"; // Database name 
$con= mysqli_connect("$host", "$username", "$password", "$db_name");

	$sdr= $_POST['sdrn'];
	$email=$_POST['email'];
	$cont=$_POST['contact'];
	$subject="OTP";
	$rndno=rand(100000,999999);
	$txt="hello! RAITIAN your OTP is:".$rndno."";
	$headers="From: nishantshetty2017@gmail.com";
		$sql= "SELECT * FROM faculty WHERE sdrn='$sdr' AND email='$email' AND contact='$cont'";
	$result=mysqli_query($con,$sql);
	$check=mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);
	if($check<1)
	{
		header("Location: forgot.html");
		exit();
	}
	else                  
	{

		require 'PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'nishantshetty2017@gmail.com';        // SMTP username
		$mail->Password = 'patosato2017&';                      // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('nishantshetty2017@gmail.com', 'Sender');    //Sender;
		$mail->addAddress($email,'Student');     // Add a recipient;--

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = "otp | Reset Password ";
		$mail->Body    = "Your new OTP is : ". $rndno;
		$mail->AltBody = "From: rait";

		if(!$mail->send()) 
		{
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		else 
		{
		    echo '
		  	<center>Message has been sent check your email !</center>
		  	';
		}

       
	}
}
else
{
	header("Location: forgot.html");
	exit();
}

?>

