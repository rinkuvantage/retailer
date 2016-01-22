<footer class="text-center">
  <div class="footer-above footer_box">
    <div class="container">
      <div class="row">
        <div class="footer-col col-xs-3 col-sm-3 col-md-3 ftrblock">
          <p class="social-buttons"> <a href="https://twitter.com/sigmaways"><img src="img/tw.png"/></a> <a href="https://www.facebook.com/sigmaways"><img src="img/fb.png"/></a> <a href="https://www.linkedin.com/company/203731"><img src="img/linkedin.png"/></a> </p>
          <address>
          <strong>Sigmaways Inc</strong><br>
          39737 Paseo Padre Parkway<br>
          Fremont, CA 94538
          </address>
        </div>
        <div class="footer-col col-xs-3 col-sm-3 col-md-3 ftrblock">
          <h4>Solutions</h4>
          <ul class="footer-list">
            <li><a href="#">Churn Analytics</a></li>
            <li><a href="#">Loyalty Analytics </a></li>
          </ul>
        </div>
        <div class="footer-col col-xs-3 col-sm-3 col-md-3 ftrblock">
          <h4>CONTACT</h4>
          <ul class="footer-list">
            <li>
              <button type="button" class="btn btn-info btn-lg anchortext forgotpwdlink supportbox" data-toggle="modal" data-target="#myModal1">Request Demo</button>
            </li>
            <li>
              <button type="button" class="btn btn-info btn-lg anchortext forgotpwdlink supportbox" data-toggle="modal" data-target="#myModal2">Support</button>
            </li>
            <li><a href="contactus.php">Contact</a></li>
          </ul>
        </div>
        <div class="footer-col col-xs-3 col-sm-3 col-md-3 ftrblock lastfblock">
          <h4>COMPANY</h4>
          <ul class="footer-list">
            <li><a href="http://sigmaways.com/">About</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="termsofservices.php">Terms of Service</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-top page-scroll visible-xs visible-sm"> <a class="btn btn-primary scrolltotop" href="javascript:;"> <i class="fa fa-chevron-up"></i> </a> </div>
</footer>
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->

<div id="myModal1" class="modal fade requestdemo" role="dialog">
  <div class="modal-dialog">
    <!-- Modal requestdome content-->
    <div class="modal-content">
      <div class="modal-hero">
        <p>Get in touch with us to schedule a private demo. We're here to understand your needs, show you our solutions, and answer any questions.</p>
      </div>
	  <form id="demo-form" method="post"  novalidate="novalidate">
	  <input type="hidden" name="redirect" value="<?php echo $currentpage; ?>" />
      <div class="modal-body">
        
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="first_name">First Name*</label>
                    <input type="text" name="first_name" id="first_name" size="40" class="form-control input-small required" placeholder="John">
                  </div>
                  <div class="col-xs-6">
                    <label for="first_name">Last Name*</label>
                    <input type="text" name="last_name" id="last_name" size="40" class="form-control input-small required" aria-required="true" placeholder="Doe">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email*</label>
                <input type="text" name="email" size="40" aria-required="true" placeholder="johndoe@mybusiness.com" class="form-control required email">
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" size="40" aria-required="true" placeholder="mybusiness.com" class="form-control url">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" size="40" class="form-control company-name" aria-required="true" autocomplete="off" placeholder="My Business">
              </div>
              <div class="form-group">
                <label for="title">Title*</label>
                <input type="text" name="title" size="40" placeholder="CMO, Sales, Business Developer..." class="form-control  required">
              </div>
              <div class="form-group">
                <label for="phone">Phone*</label>
                <input type="text" name="phoneno" id="phoneno" maxlength="13" aria-required="true" placeholder="415-800-3787" class="form-control  required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="comments">Comments*</label>
            <textarea name="comments" data-optional="true" placeholder="Anything else you would like to mention" class="form-control  required" style="height: 100px;"></textarea>
          </div>
        
      </div>
      <div class="modal-footer"><input class="btn btn-info" type="submit" name="requestdemo" id="requestdemo" value="Request Demo" /> </div>
	  </form>
    </div>
  </div>
</div>
<div id="myModal2" class="modal fade requestdemo" role="dialog">
  <div class="modal-dialog">
    <!-- Modal requestdome content-->
    <div class="modal-content">
      <div class="modal-hero">
        <p>Our average response time is 9 hours.</p>
        <p><a href="#" target="_blank">Active customers automatically get priority support</a>.</p>
      </div>
	  <form id="support-form" method="post" action="">
	
      <div class="modal-body">
        
          <div class="form-group">
            <label>Name*</label>
            <div class="controls">
              <input name="name" type="text"  placeholder="Your name" class="form-control required">
            </div>
          </div>
          <div class="form-group">
            <label>Email*</label>
            <div class="controls">
              <input name="email" type="text"  placeholder="Your email address" class="form-control required email">
            </div>
          </div>
          <div class="form-group">
            <label>Website</label>
            <div class="controls">
              <input name="website" type="text"  placeholder="Your website (if relevant)" class="form-control url" data-optional="true">
            </div>
          </div>
          <div class="form-group">
            <label>Message*</label>
            <div class="controls">
              <textarea name="message" placeholder="Your message..." style="height: 210px" class="form-control required"></textarea>
            </div>
          </div>
        
      </div>
      <div class="modal-footer"><input class="btn btn-info" type="submit" id="requestsupport" name="requestsupport" value="Submit Request" /></div>
	  </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('a.scrolltotop').click(function(){
		jQuery('html, body').animate({
			scrollTop:0
		}, 2000);
	});
	jQuery.validator.addMethod("onlytext",function(value,element)
	{
		return this.optional(element) || /^[a-zA-Z ]+$/i.test(value); 
	},"Please enter only letter.");
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
			},
			message: {
				textnumberdash: true
			}
		}
	});
	jQuery('#demo-form').validate({
		rules: {
			phoneno: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 13
			},
			first_name: {
				noSpace: true,
				onlytext: true
			},
			last_name: {
				noSpace: true,
				onlytext: true
			},
			title: {
				textnumber: true
			},
			comments: {
				textnumberdash: true
			}
		},
		messages: {
			phoneno: {
				required: "Please enter phone number",
				number: "Please enter valid phone number",
				minlength: "Your phone number must be at least 10 number"
			}
		}
	});
	
	jQuery("#demo-form").submit(function(){	
		if(jQuery("#demo-form input, #demo-form textarea").hasClass('error'))
		{
			return false;
		}	
		jQuery.ajax({
		url: './sendemail.php?requestdemo=true',
		type: 'post',
		data: jQuery('#demo-form input[type=\'text\'], #demo-form textarea'),
		dataType: 'json',
		beforeSend: function() {
			jQuery('#requestdemo').attr('disabled', true);			
		},	
		complete: function() {
			jQuery('#requestdemo').attr('disabled', false); 			
		},			
		success: function(json) {		
			jQuery('label.error, #message').remove();
									
					 if (json['error']) {				
							
						if (json['error']['name']) {												
							jQuery('#demo-form input[name=\'first_name\']').after('<label for="name" generated="true" class="error">' + json['error']['name'] + '</label>');
						}
						
						if (json['error']['lastname']) {												
							jQuery('#demo-form input[name=\'last_name\']').after('<label for="name" generated="true" class="error">' + json['error']['lastname'] + '</label>');
						}
						
						
						if (json['error']['title']) {												
							jQuery('#demo-form input[name=\'title\']').after('<label for="name" generated="true" class="error">' + json['error']['title'] + '</label>');
						}
						
						
						if (json['error']['phoneno']) {												
							jQuery('#demo-form input[name=\'phoneno\']').after('<label for="name" generated="true" class="error">' + json['error']['phoneno'] + '</label>');
						}
						
						if (json['error']['email']) {												
							jQuery('#demo-form input[name=\'email\']').after('<label for="name" generated="true" class="error">' + json['error']['email'] + '</label>');
						}
						
						
						
						
					if (json['error']['message']) {
											
						jQuery('#demo-form textarea[name=\'comments\']').after('<label for="name" generated="true" class="error">' + json['error']['message'] + '</label>');
					}
														
																																											
					}else if (json['success']) {	
						window.location='<?php echo $currentpage; ?>';														
					}
							
		   }	
		});
		return false;
	});
	
	jQuery("#support-form").submit(function(){		
		if(jQuery("#support-form input, #support-form textarea").hasClass('error'))
		{
			return false;
		}
		jQuery.ajax({
		url: './sendemail.php?form=requestsendmail',
		type: 'post',
		data: jQuery('#support-form input[type=\'text\'], #support-form textarea'),
		dataType: 'json',
		beforeSend: function() {
			jQuery('#requestsupport').attr('disabled', true);			
		},	
		complete: function() {
			jQuery('#requestsupport').attr('disabled', false); 			
		},			
		success: function(json) {		
			jQuery('.error, #message').remove();
									
					 if (json['error']) {				
							
						if (json['error']['name']) {
												
							jQuery('#support-form input[name=\'name\']').after('<label for="name" generated="true" class="error">' + json['error']['name'] + '</label>');
						}
						
						if (json['error']['email']) {
												
							jQuery('#support-form input[name=\'email\']').after('<label for="name" generated="true" class="error">' + json['error']['email'] + '</label>');
						}
						
					if (json['error']['message']) {
											
						jQuery('#support-form textarea[name=\'message\']').after('<label for="name" generated="true" class="error">' + json['error']['message'] + '</label>');
					}
														
																																											
					}else if (json['success']) {						
						window.location='<?php echo $currentpage; ?>';														
					}
							
		   }	
		});
		return false;
	});
	
});
</script>
<?php if($currentpage=='dashboard.php'){ ?>
<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
<?php } ?>
</body>
</html>