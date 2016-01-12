<?php @ob_start();

//Include database config file
require_once('db_connection.php');

//Website global configuration
global $prefix;

//Database table prefix.
$prefix="ret_";

//Salt using for creating password and activation key.
$_salt='R{2dX8fi7SD#J(1f[Sus&&Q9dcAUUo:k_,k@5I8rIdUh/:@O =^N[Y}aOD;l;jE6';

//Website url
$siteurl='http://localhost/retailernew';

//Website Name use for title in head tag
$sitname='Sigmaways Retail Analytics';

//Global email for recieving and sending emails.

$owner_email='info@sigmaways.com';

//Email signature
$email_signature='<br />Sincerely,<br />Sigmaways Team';

require_once('class/users.php');

$sepratefiles=explode('/',$_SERVER['REQUEST_URI']);
$currentpage=$sepratefiles[count($sepratefiles)-1];
if($currentpage==''){$currentpage='index.php';}
else{$currentpage=$currentpage.'.php';}
$login_active=false;
if(isset($_SESSION["User_id"]) && isset($_SESSION["User_type"])){ 
	$login_active=true;
	$user_type=$_SESSION["User_type"];
	$uid=$_SESSION["User_id"];
	$skey=$_SESSION["User_key"];
}
if(isset($_REQUEST['activateaccount']) && isset($_REQUEST['email']))
{
	$email=$_REQUEST['email'];
	$activateaccount=$_REQUEST['activateaccount'];
	$check=$user->Userfield('user_email', $email);
	$active=0;
	if(!empty($check))
	{
		$uid=$check[1]['ID'];
		$udate=$user->Userdetail($uid,'udate', true);
		$storedcode=sha1($email.$_salt.$udate);
		if($storedcode==$activateaccount){
			$post['active']=1;
			$res=$user->updateUser($uid ,$post);
			if($res>0)
			{
				$to      = 	$email;
				$subject = 'Welcome to Sigmaways Retail Analytics';	
				$from = $owner_email;
				$fromname=$sitname;
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= "Content-type: text/html; charset=utf-8" . "\r\nFrom: $fromname <$from>\r\nReply-To: $from";
				
				$message="Dear ".$user->Userdetail($uid,'fname', true)." ".$user->Userdetail($uid,'lname', true).",<br /><br />
				Congrats!<br /><br />
				Your account has been activated.</a><br />";
				$message.=$email_signature;
				@mail($to, $subject, $message, $headers);
				
				$_SESSION['message']='Account Activated. Please click on login to get inside.';
				echo"<script type='text/javascript'>window.location='".$siteurl."';</script>";
				exit();
			}
		}
		else
		{
			$_SESSION['message']='Activation code is not matched.';
			echo"<script type='text/javascript'>window.location='".$siteurl."';</script>";
			exit();
		}
	}
	else
	{
		$_SESSION['message']='Activation code is not matched.';
		echo"<script type='text/javascript'>window.location='".$siteurl."';</script>";
		exit();
	}
}
ob_start();
if(isset($_REQUEST['fileid']))
{
	$file1=$_REQUEST['fileid'];
	$file=$file1;
	if(file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/force-download');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		
		//exit;
	}
	else{ echo'file not exist';}
}