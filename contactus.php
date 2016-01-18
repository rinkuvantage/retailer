<?php require_once('header-withoutlogin.php');
$errors=array();

$name='';
$email='';
$website='';
$subject='';
$message='';



if(isset($_POST['sendmsg']))
{
	$name=$_POST['name'];
	if(trim($name)=='')
	{
		array_push($errors,'Please enter your name.');
	}elseif(!preg_match('/^[a-zA-Z][a-zA-Z ]*$/', trim($name)))
	{
		array_push($errors,'Please enter valid  name.');	
	}
	$email=$_POST['email'];
	if(trim($email)=='')
	{
		array_push($errors,'Please enter your email.');
	}else if(!isValidEmail($email))
	{
		array_push($errors, 'Invalid email address');
		
	}
	$website=$_POST['website'];
	
	$subject2=$_POST['subject'];
	if(trim($subject2)=='')
	{
		array_push($errors,'Please select subject.');
	}
	$message=$_POST['message'];
	if(trim($message)=='')
	{
		array_push($errors,'Please enter message.');
	}elseif(!preg_match('/^[a-zA-Z][a-zA-Z,. ]*$/', trim($message)))
	{
		array_push($errors,'Please enter valid message.');	
	}
	
	if(empty($errors))
	{	
		$to  = 	$owner_email;
		$subject = $sitname.' : Contact Us';	
		$from = $email;
		$fromname=$sitname;
				
		$message="Dear Admin,<br /><br />
		Following user has been contact you. The user detail is given below<br /><br />
		Name: ".$name."<br />
		Email: ".$email."<br />
		Website: ".$website."<br />
		Subject: ".$subject2."<br />
		Message: ".$message."<br /><br />";
		$message.=$email_signature;
		Sendemail( $to, $subject, $message,$from,$from,$fromname);		
		
		
		$_SESSION['message']='Thanks for sending message.';	
		
		
		@header('Location: contactus.php');
		
	}
	else
	{
		foreach($_POST as $key=>$value)
		{
			${$key}=$value;
		}
	}
}
function isValidEmail($email)
{
	return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email);
}

 ?>
<!-- Header -->
<!-- Portfolio Grid Section -->

<div class="container innerpage">

  <div class="row contactusblock">
    <h1>CONTACT</h1>
    <div class="col-sm-12 col-md-5">
      <div class="gf_browser_gecko gform_wrapper" id="gform_wrapper_1"><a id="gf_1" class="gform_anchor"></a>
        <form method="post" name="loginuser" id="loginuser" action="">
          <div class="gform_body">
		  <?php if(!empty($errors)){foreach($errors as $error){echo '<span class="error">'.$error.'</span><br />';}} ?>
          
            <ul id="gform_fields_1" class="gform_fields left_label form_sublabel_below description_below">
            	
              <li id="field_1_1" class="gfield gfield_contains_required field_sublabel_below field_description_below">
                <label class="gfield_label" for="input_1_1">Name<span class="gfield_required">*</span></label>
                <div class="ginput_container ginput_container_text">
                  <input name="name" id="name" type="text" value="<?php echo $name; ?>" class="medium required" tabindex="1">
                </div>
              </li>
              <li id="field_1_2" class="gfield gfield_contains_required field_sublabel_below field_description_below">
                <label class="gfield_label" for="input_1_2">Email<span class="gfield_required">*</span></label>
                <div class="ginput_container ginput_container_email">
                  <input name="email" id="email" type="email" value="<?php echo $email; ?>" class="medium required email" tabindex="2">
                </div>
              </li>
              <li id="field_1_4" class="gfield field_sublabel_below field_description_below">
                <label class="gfield_label" for="input_1_4">Website</label>
                <div class="ginput_container ginput_container_website">
                  <input name="website" id="website" type="url" value="<?php echo $website; ?>" class="medium url" tabindex="3">
                </div>
              </li>
              <li id="field_1_5" class="gfield gfield_contains_required field_sublabel_below field_description_below">
                <label class="gfield_label" for="input_1_5">Subject<span class="gfield_required">*</span></label>
                <div class="ginput_container ginput_container_select">
                  <select name="subject" id="subject" class="medium gfield_select required" tabindex="4">
                    <option value="Partnership"<?php if($website=="Partnership"){ echo "selected";} ?>>Partnership</option>
                    <option value="Enterprise"<?php if($website=="Enterprise"){ echo "selected";} ?>>Enterprise</option>
                    <option value="Press"<?php if($website=="Press"){ echo "selected";} ?>>Press</option>
                    <option value="Careers"<?php if($website=="Careers"){ echo "selected";} ?>>Careers</option>
                    <option value="Other"<?php if($website=="Other"){ echo "selected";} ?>>Other</option>
                  </select>
                </div>
              </li>
              <li id="field_1_6" class="gfield gfield_contains_required field_sublabel_below field_description_below">
                <label class="gfield_label" for="input_1_6">Message<span class="gfield_required">*</span></label>
                <div class="ginput_container ginput_container_textarea">
                  <textarea name="message" id="input_1_6" class="textarea medium required" tabindex="5" rows="10" cols="50"><?php echo $message; ?></textarea>
                </div>
              </li>
            </ul>
          </div>
          <div class="gform_footer left_label">
            <input type="submit" class="gform_button button" value="Send message" name="sendmsg" tabindex="6">
          </div>
        </form>
      </div>
    </div>
    <div class="hidden-xm col-md-1">&nbsp;</div>
    <div class="col-sm-12 col-md-6">
      <address>
      <strong>Sigmaways Inc</strong><br>
      39737 Paseo Padre Parkway<br>
      Fremont, CA 94538
      </address>
      <hr>
      <h4>Looking for support?</h4>
      <p> Contact support at <a href="mailto:support@sigmaways.com">support@sigmaways.com</a>.</p>
      <hr>
      <h4>Looking for sales?</h4>
      <p> Contact sales at <a href="mailto:sales@sigmaways.com"> sales@sigmaways.com</a> or call <a href="callto:+855-867-4473">855-867-4473</a> </p>
    </div>
  </div>
</div>
<!-- Footer -->
<?php require_once('footer-withoutlogin.php'); ?>