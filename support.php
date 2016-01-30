<?php require_once('header.php');
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

<div id="page-wrapper">

            <div class="container-fluid supportpage">
			<div class="row">
                    <div class="col-lg-12">
                     
                        <ol class="breadcrumb">
                            
                            <li class="active">
                                <i class="fa fa-fw fa-user"></i> Support
                            </li>
                        </ol>
                    </div>
                </div>

  <div class="innerpage mainregisterbox">
  
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
</div>
</div>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/validate.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('a.reloadimg').click(function(){
			jQuery.ajax({
			  url: "capcha/captchaimage.php"
			})
			  .done(function( data ) {
				jQuery('img.captchaimg').attr('src',data);
			  });
		});
		
		jQuery.validator.addMethod("noSpace", function(value, element) { 
		  return value.indexOf(" ") < 0 && value != ""; 
		}, "No space please and don't leave it empty");
		
		jQuery.validator.addMethod("onlytext",function(value,element)
		{
			return this.optional(element) || /^[a-zA-Z ]+$/i.test(value); 
		},"Please enter only letter.");
		jQuery.validator.addMethod("validemail",function(value,element)
		{
			return this.optional(element) || /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i.test(value); 
		},"Please enter valid email.");
		jQuery.validator.addMethod("textnumber",function(value,element)
		{
			return this.optional(element) || /^[a-zA-Z][a-zA-Z0-9 ]+$/i.test(value); 
		},"Please enter only letter and number.");
		jQuery.validator.addMethod("textnumberdash",function(value,element)
		{
			return this.optional(element) || /^[a-zA-Z0-9,. ]+$/i.test(value); 
		},"Special characters are not allowed");
		
		jQuery.validator.addMethod("noSpace", function(value, element) { 
		  return value.indexOf(" ") < 0 && value != ""; 
		}, "No space please and don't leave it empty");
		
		jQuery('#support-form').validate({
			rules: {
				name: {
					onlytext: true
				}
			}
		});
	});
	</script>
<!-- Footer -->
<?php require_once('footer.php'); ?>