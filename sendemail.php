<?php @ob_start();
require_once('includes/head.php'); 
$errors=array();

if(isset($_POST['requestdemo']))
{
	$redirect=$_POST['redirect'];
	if($redirect==''){$redirect='index.php';}
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	if(trim($email)=='')
	{
		array_push($errors,'Please enter email.');
	}
	$website=$_POST['website'];
	$company=$_POST['company'];
	$title=$_POST['title'];
	$phoneno=$_POST['phoneno'];
	$comments=$_POST['comments'];
	
	if(empty($errors))
	{
		
		$to      = 	'sales@sigmaways.com';
		$subject = $sitname.' : Request Demo';	
		$from = $email;
		$fromname=$sitname;
		
		
		$message="Dear Admin,<br /><br />
		Following user has been contact you for demo. The user detail is given below<br /><br />
		First Name: ".$first_name."<br />
		Last Name: ".$last_name."<br />
		Email: ".$email."<br />
		Website: ".$website."<br />
		Company: ".$company."<br />
		Phone Number: ".$phoneno."<br />
		Comments: ".$comments."<br /><br />";
		$message.=$email_signature;
		Sendemail( $to, $subject, $message,$from,$from,$fromname);
		
		$_SESSION['message']='Thanks for sending message.';
		@header('Location: '.$redirect);
	}
	@header('Location: '.$redirect);
}
if(isset($_POST['requestsupport']))
{
	$redirect=$_POST['redirect'];
	if($redirect==''){$redirect='index.php';}
	$name=$_POST['name'];
	$email=$_POST['email'];
	if(trim($email)=='')
	{
		array_push($errors,'Please enter email.');
	}
	$website=$_POST['website'];
	$message1=$_POST['message'];
	
	if(empty($errors))
	{
		
		$to      = 	'support@sigmaways.com';
		$subject = $sitname.' : Request Demo';	
		$from = $email;
		$fromname=$sitname;
		
		$message="Dear Admin,<br /><br />
		Following user has been contact you for support. The user detail is given below<br /><br />
		Name: ".$name."<br />
		Email: ".$email."<br />
		Website: ".$website."<br />
		Message: ".$message1."<br /><br />";
		$message.=$email_signature;
		Sendemail( $to, $subject, $message,$from,$from,$fromname);
		
		$_SESSION['message']='Thanks for sending message.';
		@header('Location: '.$redirect);
	}
	@header('Location: '.$redirect);
}