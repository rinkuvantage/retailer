<?php require_once('header-withoutlogin.php');
$errors=array();

$name='';
$email='';
$website='';
$subject='';
$message='';

function isValidEmail($email)
{
	return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email);
}

if(isset($_POST['sendmsg']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	if(trim($name)=='')
	{
		array_push($errors,'Please enter your name.');		
	}
	else if(!preg_match('/^[a-zA-Z0-9 ]+$/', trim($name)))
	{
		array_push($errors,'Please enter valid name.');
	}
	if(trim($email)=='')
	{
		array_push($errors,'Please enter email.');
	}
	else if(!isValidEmail($email))
	{
		array_push($errors,'Invalid email address');
	}
	if(trim($message)=='')
	{
		array_push($errors,'Please enter message.');
	}
	else if(!preg_match('/^[a-zA-Z0-9,. ]+$/', trim($message)))
	{
		array_push($errors,'Please enter valid message.');
	}
	
	
	
	$website=$_POST['website'];
	$message1=$_POST['message'];
	if($_SESSION['captcha']['code']!=$_POST['captchacode'])
	{
		array_push($errors,'Captcha did not match.');
	}
	if(empty($errors))
	{		
		$to      = 	'support@sigmaways.com';
		$subject = $sitname.' : Request Demo';	
		$from = $email;
		$fromname=$sitname;
		
		$message="Dear Admin,<br /><br />
		Following user has been contact you for support. The user detail is given below<br /><br />
		Name: ".$name."<br />
		Email: ".$email."<br />";
		if($website != "")
		{
		 $message .= "Website: ".$website."<br />";
		}
		
		$message .= "Message: ".$message1."<br /><br />";
		$message.=$email_signature;
		Sendemail( $to, $subject, $message,$from,$from,$fromname);
		$_SESSION['message'] = "Thank You, Your message has been sent successfully. We will get back to you shortly.";
		@header('Location: support.php');
		
	}
	else
	{
		foreach($_POST as $key=>$value)
		{
			${$key}=$value;
		}
	}
}

 ?>
<!-- Header -->
<!-- Portfolio Grid Section -->

<div class="container common_cntr innerpage">
<div class="banner"><img src="img/support.png"/></div>

  <div class="row contactusblock">
  
   
    
        <p>Our average response time is 9 hours.</p>
        <p id="request_message"><a href="#" target="_blank">Active customers automatically get priority support</a>.</p>
        
	  <form id="support-form" name="support-form" method="post" action="">
		<?php if(!empty($errors)){foreach($errors as $error){echo '<span class="error">'.$error.'</span><br />';}} ?>
        
          <div class="form-group">
            <label>Name*</label>
            <div class="controls">
              <input name="name" type="text" value="<?php echo $name; ?>" placeholder="Your name" class="form-control required">
            </div>
          </div>
          <div class="form-group">
            <label>Email*</label>
            <div class="controls">
              <input name="email" type="text" value="<?php echo $email; ?>" placeholder="Your email address" class="form-control required email">
            </div>
          </div>
          <div class="form-group">
            <label>Website</label>
            <div class="controls">
              <input name="website" type="text" value="<?php echo $website; ?>" placeholder="Your website (if relevant)" class="form-control url" data-optional="true">
            </div>
          </div>
          <div class="form-group">
            <label>Message*</label>
            <div class="controls">
              <textarea name="message" placeholder="Your message..." style="height: 210px" class="form-control required"><?php echo $message; ?></textarea>
            </div>
          </div>
		  <div class="form-group">
            <label><img src="<?php require_once('capcha/captchaimage.php'); ?>" class="captchaimg" alt="Catcha" /><a href="javascript:;" class="reloadimg"><img src="img/reload_icon.gif" alt="reload" /></a></label>
            <div class="controls">
              <input name="captchacode" id="captchacode" type="text" value="" class="form-control required">
            </div>
          </div>
        
      <input class="btn btn-info" type="submit" id="requestsupport" name="sendmsg" value="Submit Request" />
	  </form>
    
  </div>
</div>
<!-- Footer -->
<?php require_once('footer-withoutlogin.php'); ?>