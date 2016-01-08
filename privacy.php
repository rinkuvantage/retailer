<?php require_once('header-withoutlogin.php');
$errors=array();
$company='';
$full_name='';
$phoneno='';
$country='';
$state='';
$username='';
$email='';
if(isset($_POST['username']))
{
	$post['company']=$_POST['company'];
	if(trim($post['company'])=='')
	{
		array_push($errors,'Please enter company name.');
	}
	$post['full_name']=$_POST['full_name'];
	if(trim($post['full_name'])=='')
	{
		array_push($errors,'Please enter contact name.');
	}
	$post['phoneno']=$_POST['phoneno'];
	if(trim($post['phoneno'])=='')
	{
		array_push($errors,'Please enter phone number.');
	}
	$post['country']=$_POST['country'];
	if(trim($post['country'])=='')
	{
		array_push($errors,'Please enter country.');
	}
	$post['state']=$_POST['state'];
	if(trim($post['state'])=='')
	{
		array_push($errors,'Please enter state.');
	}
	$post['user_login']=$_POST['username'];
	if(trim($post['user_login'])=='')
	{
		array_push($errors,'Please enter username.');
	}
	/*$check=$user->Userfield('user_login', $post['user_login']);
	if(!empty($check))
	{
		array_push($errors,'Username already exist, please try another.');
	}*/
	
	if(trim($_POST['pwd'])!=trim($_POST['pwd2']))
	{
		array_push($errors,'Password is not matched with confirm password.');
	}
	$post['user_email']=$_POST['email'];
	if(trim($post['user_email'])=='')
	{
		array_push($errors,'Please enter email address.');
	}
	$check=$user->Userfield('user_email', $post['user_email']);
	if(!empty($check))
	{
		array_push($errors,'Email address already exist, please try another.');
	}
	$post['user_type']='user';
	$post['cdate']=date('Y-m-d H:i:s');
	$post['udate']=$post['cdate'];
	$post['active']=0;
	$post['activationkey']=sha1($post['user_email'].$_salt.$post['udate']);
	$post['user_pass']=sha1($_POST['pwd'].$post['cdate']);
	$token=$user->generatePassword(6,8);
	$post['tokenid']=md5($token.$_salt.$post['user_email']);
	$key=$user->generatePassword(9,5);
	$post['keyid']=md5($key.$_salt.$post['user_email']);
	if(empty($errors))
	{
		$fieldnames='';
		$fieldvalues='';
		$cnt=1;
		foreach($post as $key=>$value)
		{
			if($cnt==1)
			{
				$fieldnames.="`$key`";
				$fieldvalues.="'$value'";
			}
			else
			{
				$fieldnames.=", `$key`";
				$fieldvalues.=", '$value'";
			}
			$cnt++;
		}
		$res=$user->addUser($fieldnames,$fieldvalues);
		if($res>0)
		{
			$activatationlink=$siteurl.'/?activateaccount='.$post['activationkey'].'&email='.$post['user_email'];
			
			$to      = 	$post['user_email'];
			$subject = $sitname.' : Registration';	
			$from = $owner_email;
			$fromname=$sitname;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type: text/html; charset=utf-8" . "\r\nFrom: $fromname <$from>\r\nReply-To: $from";
			
			$message="Dear ".$post['user_login'].",<br /><br />
			Please make a note of your credentials which will be used on your analytics request.<br /><br />
			Token: ".$post['tokenid']."<br />
			Key: ".$post['keyid']."<br /><br />
			Your login detail given below:<br /><br />
			Email: ".$post['user_email']."<br />
			Password: ".$_POST['pwd']."<br /><br />
			To activate your account please click on <a href='".$activatationlink."'>".$activatationlink."</a><br />";
			$message.=$email_signature;
			@mail($to, $subject, $message, $headers);
			
			$_SESSION['message']='You are register successfully, please check your email to confirm your account.';
			@header('Location: '.$siteurl.'/register');
		}
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


    <!-- Portfolio Grid Section -->
	<div class="container innerpage cont_page">
		 <div class="row">
		 <div class="entry">
		 	<h2 class="main_heading">Privacy Policy</h2>
				<p>At Sigmaways, we offer real-time customer analytics for our customers, who incorporate certain code such as JavaScript into their sites or use other identifiers so that when they use our customer relationship tools they can better understand their consumers' activities. It also allows those website managers to identify their visitors within their system. Whenever a visitor to one of our customer's sites submits their email address or information, that company can store this information so that the user will be identified during future visits. The JavaScript and other tools we make available to our customers use  only first party cookies or identifiers � not third party cookies. All of the data collected by that company can then be analyzed using various reports by the customer. The Sigmaways customer may also use the data to trigger events like targeted emails or website content. </p>
<p>As a visitor to the website Sigmawaysways.com, Sigmaways, Inc. ("Sigmaways," "we," "us") values your privacy. In this Privacy Policy ("Policy"), we describe how we collect, use, and disclose information that we obtain about visitors to our website Sigmawaysways.com (the "Site"), users of our mobile applications ("Mobile Apps") and the services available through our Site (collectively, the "Services"). It is important to understand that this privacy policy does not apply to any websites owned or managed by our customers which have incorporated our technology into their site. To the extent that we collect or handle any data on behalf of our customers, we do so at their instruction. We have generally described how this works immediately above.</p>
<p>By visiting the Site, using the Mobile Apps or any of our Services, you agree that your personal information will be handled as described in this Policy. Your use of our Site or Services, and any dispute over privacy, is subject to this Policy and our Terms of Service, available at https://www.Sigmawaysways.com/tos/, including its applicable limitations on damages and the resolution of disputes. The Terms of Service are incorporated by reference into this Policy.</p>
<h2>What Information Do We Collect About You and Why?</h2>
<p>We may collect information about you directly from you and from third parties, as well as automatically through your use of our Site or Services.</p>
<p><strong>Information We Collect Directly From You.</strong> Certain areas and features of our Site and Services may require registration. To register you must provide your first name, last name, company name, email address, and website, and select a password. We also may collect additional optional information from you, including company size and phone number; however, you are not required to provide us with this information. In addition, if you make a purchase, we will also request that you provide your credit or debit card information and your billing address.</p>
<p>We may use this information in aggregated form or we may associate it with your email address and other personal information that we collect about you.</p>
<p><strong>Information that We Collect About You from Social Networking Sites.</strong> You also may log into our Site and Mobile Apps through your social networking accounts. If you do this, we obtain information from these sites as follows:</p>
<ul>
<li><u>LinkedIn.</u> If you log into our Site or Services using your LinkedIn Account, you must enter your LinkedIn email address and password. By logging in through LinkedIn, you are granting us access to your first and last name, email address, company and company size.</li>
</ul>
<p>We store the information that we receive from LinkedIn. with other information that we collect from you or receive about you.</p>
<p>Any third-party social networking site controls the information it collects from you. For information about how they may use and disclose your information, including any information you make public, please consult their respective privacy policies. We have no control over how any third party site uses or discloses the personal information it collects about you.</p>
<p><strong>Information We Collect Automatically.</strong> We may automatically collect the following information about your use of our Site or Services through cookies, and other technologies: your domain name; your browser type and operating system; web pages you view; links you click; your IP address; the length of time you visit our Site and or use our Services; and the referring URL, or the webpage that led you to our Site, and the following: access time, browser type, device ID, IP address, all data submitted by you, page views and referring URL. We also may collect the following information about your use of the Mobile Apps: mobile device ID; location and language information; device name and model; operating system type, name, and version; your activities within the Mobile Apps; and the length of time that you are logged into our Mobile Apps. Please see the section "What About Cookies and Other Tracking Mechanisms?" below for more information about our use of cookies and other tracking mechanisms.</p>
<h2>How We Use Your Information</h2>
<p>We use the information that we gather about you for the following purposes:</p>
<ul>
<li>To provide our Services to you, to communicate with you about your use of our Services, to respond to your inquiries, to fulfill your orders, and for other customer service purposes.</li>
<li>To tailor the content and information that we may send or display to you, to offer location customization, and personalized help and instructions, and to otherwise personalize your experiences while using the Site or our Services. </li>
<li>For marketing and promotional purposes. For example, we may use your information, such as your email address, to send you news and newsletters, special offers, and promotions, or to otherwise contact you about products or information we think may interest you. We also may use the information that we learn about you to assist us in advertising our Services on third party websites.</li>
<li>To better understand how users access and use our Site and Services, both on an aggregated and individualized basis, in order to improve our Site and Services and respond to user desires and preferences, and for other research and analytical purposes.</li>
<li>We collect the data to have a better visibility on our customer base and their behavior. It's used by our sales team to learn about customers' engagement levels, and used in aggregate by our product and marketing team to better understand the navigation path, retention and funnel drop-offs.</li>
</ul>
<h2>How We Share Your Information</h2>
<p>?We may share the information that we collect about you, including personally identifiable information, as follows: </p>
<p><strong>Information We Collect Directly From You.</strong> Certain areas and features of our Site and Services may require registration. To register you must provide your first name, last name, company name, email address, and website, and select a password. We also may collect additional optional information from you, including company size and phone number; however, you are not required to provide us with this information. In addition, if you make a purchase, we will also request that you provide your credit or debit card information and your billing address.</p>
<p>We may use this information in aggregated form or we may associate it with your email address and other personal information that we collect about you.</p>
<p><strong>Information that We Collect About You from Social Networking Sites.</strong> You also may log into our Site and Mobile Apps through your social networking accounts. If you do this, we obtain information from these sites as follows:</p>
<ul>
<li><u>LinkedIn.</u> If you log into our Site or Services using your LinkedIn Account, you must enter your LinkedIn email address and password. By logging in through LinkedIn, you are granting us access to your first and last name, email address, company and company size.</li>
</ul>
<p>We store the information that we receive from LinkedIn. with other information that we collect from you or receive about you.</p>
<p>Any third-party social networking site controls the information it collects from you. For information about how they may use and disclose your information, including any information you make public, please consult their respective privacy policies. We have no control over how any third party site uses or discloses the personal information it collects about you.</p>
<p><strong>Information We Collect Automatically.</strong> We may automatically collect the following information about your use of our Site or Services through cookies, and other technologies: your domain name; your browser type and operating system; web pages you view; links you click; your IP address; the length of time you visit our Site and or use our Services; and the referring URL, or the webpage that led you to our Site, and the following: access time, browser type, device ID, IP address, all data submitted by you, page views and referring URL. We also may collect the following information about your use of the Mobile Apps: mobile device ID; location and language information; device name and model; operating system type, name, and version; your activities within the Mobile Apps; and the length of time that you are logged into our Mobile Apps. Please see the section "What About Cookies and Other Tracking Mechanisms?" below for more information about our use of cookies and other tracking mechanisms.</p>
<h2>How We Use Your Information</h2>
<p>We use the information that we gather about you for the following purposes:</p>
<ul>
<li>To provide our Services to you, to communicate with you about your use of our Services, to respond to your inquiries, to fulfill your orders, and for other customer service purposes.</li>
<li>To tailor the content and information that we may send or display to you, to offer location customization, and personalized help and instructions, and to otherwise personalize your experiences while using the Site or our Services. </li>
<li>For marketing and promotional purposes. For example, we may use your information, such as your email address, to send you news and newsletters, special offers, and promotions, or to otherwise contact you about products or information we think may interest you. We also may use the information that we learn about you to assist us in advertising our Services on third party websites.</li>
<li>To better understand how users access and use our Site and Services, both on an aggregated and individualized basis, in order to improve our Site and Services and respond to user desires and preferences, and for other research and analytical purposes.</li>
<li>We collect the data to have a better visibility on our customer base and their behavior. It's used by our sales team to learn about customers' engagement levels, and used in aggregate by our product and marketing team to better understand the navigation path, retention and funnel drop-offs.</li>
</ul>
<h2>How We Share Your Information</h2>
<p>We may share the information that we collect about you, including personally identifiable information, as follows: </p>
<ul>
<li><strong>Affiliates.</strong> We may disclose the information we collect from you to our affiliates or subsidiaries; however, if we do so, their use and disclosure of your personally identifiable information will be subject to this Policy.</li>
<li><strong>Service Providers.</strong> We may disclose the information we collect from you to third party vendors, service providers, contractors or agents who perform actions or functions on our behalf.</li>
<li><strong>Business Transfers.</strong> If we are acquired by or merged with another company, if substantially all of our assets are transferred to another company, or as part of a bankruptcy proceeding, we may transfer the information we have collected from you to the other company.</li>
<li><strong>In Response to Legal Process.</strong> We also may disclose the information we collect from you in order to comply with the law, a judicial proceeding, court order, or other legal process, such as in response to a court order or a subpoena.</li>
<li><strong>To Protect Us and Others.</strong> We also may disclose the information we collect from you where we believe it is necessary to investigate, prevent, or take action regarding illegal activities, suspected fraud, situations involving potential threats to the safety of any person, violations of our Terms of Service or this Policy, or as evidence in litigation in which Company is involved.</li>
<li><strong>Aggregate and De-Identified Information.</strong> We may share aggregate or de-identified information about users with third parties for marketing, advertising, research or similar purposes.</li>
</ul>
<h2>Our Use of Cookies and Other Tracking Mechanisms</h2>
<p>We use cookies and other tracking mechanisms to track information about your use of our Site or Services, and we provide you with the ability to track users of your websites for data analytics purposes. We may combine this information with other personal information we collect from you. Cookies are alphanumeric identifiers that are stored on your computer through your web browser for record-keeping purposes. Some cookies allow us to make it easier for you to navigate our Site and Services, while others are used to enable a faster log-in process or to allow us to track your activities at our Site and Service. There are two types of cookies: session and persistent cookies. </p>
<ul>
<li><strong>Session Cookies.</strong> Session cookies exist only during an online session. They disappear from your computer when you close your browser. We use session cookies to allow our systems to uniquely identify you during a session or while you are logged into the Site. This allows us to process your online transactions and requests and verify your identity, after you have logged in, as you move through our Site.</li>
<li><strong>Persistent cookies.</strong> Persistent cookies remain on your computer after you have closed your browser or turned off your computer. We use persistent cookies to track aggregate and statistical information about user activity. Persistent cookies are set to expire two years after your last tracked action on Sigmaways.</li>
</ul>
<p><strong>Third Party Cookies.</strong> We may also engage third parties to track and analyze advertising conversions and for re-targeting purposes (i.e., re-advertise to people who visit our website). Such third parties may combine the information that we provide about you with other information that they have collected. This Policy does not cover such third parties' use of the data.</p>
<p><strong>Disabling Cookies.</strong> Most web browsers automatically accept cookies, but if you prefer, you can edit your browser options to block them in the future. The Help portion of the toolbar on most browsers will tell you how to prevent your computer from accepting new cookies, how to have the browser notify you when you receive a new cookie, or how to disable cookies altogether. Visitors to our Site who disable cookies will be able to browse certain areas of the Site, but some features may not function. </p>
<p><strong>Analytics.</strong> We use automated applications, such as our own application (Sigmaways), to track our visitors and evaluate usage of our Site and, to the extent permitted, our Mobile Apps. We also may use other analytic means to evaluate our Services. We use these tools to help us improve our Services, performance and user experiences. We may use and share your personal information with third parties as further described in this Privacy Policy. </p>
<h2>Third-Party Ad Networks</h2>
<p>We may use third parties such as network advertisers to display advertisements on our Sites. Network advertisers are third parties that display advertisements based on your visits to our Site as well as other websites. This enables us and these third parties to target advertisements by displaying ads for products and services in which you might be interested. Third party ad network providers, advertisers, sponsors and/or traffic measurement services may use cookies, JavaScript, web beacons (including clear GIFs), Flash LSOs and other technologies to measure the effectiveness of their ads and to personalize advertising content to you. These third party cookies and other technologies are governed by each third party's specific privacy policy, not this one. We may provide these third-party advertisers with information about your usage of our Site and our services, as well as aggregate or non-personally identifiable information about visitors to our Site and users of our service.</p>
<p>You may opt-out of many third-party ad networks, including those operated by members of the Network Advertising Initiative ("NAI") and the Digital Advertising Alliance ("DAA"). For more information regarding this practice by NAI members and DAA members, and your choices regarding having this information used by these companies, including how to opt-out of third-party ad networks operated by NAI and DAA members, please visit their respective websites:  </p>
<ul>
<li><a href="http://www.networkadvertising.org/optout_nonppii.asp" target="_blank">www.networkadvertising.org/optout_nonppii.asp</a> (NAI)</li>
<li><a href="http://www.networkadvertising.org/optout_nonppii.asp" target="_blank">www.aboutads.info/choices</a> (DAA).</li>
</ul>
<p>Opting out of one or more NAI member or DAA member networks (many of which will be the same) only means that those members no longer will deliver targeted content or ads to you. It does not mean you will no longer receive any targeted content or ads on our Site or other websites. You may continue to receive advertisements, for example, based on the particular website that you are viewing. Also, if your browsers are configured to reject cookies when you visit this opt-out page, or you subsequently erase your cookies, use a different computer or change web browsers, your NAI or DAA opt-out may no longer be effective. Additional information is available on NAI's and DAA's websites accessible by the above links.</p>
<h2>Third-Party Links</h2>
<p>Our Site and Services may contain links to third-party websites. Any access to and use of such linked websites is not governed by this Policy, but instead is governed by the privacy policies of those third party websites. We are not responsible for the information practices of such third party websites.</p>
<h2>Security of My Personal Information</h2>
<p>We have implemented commercially reasonable precautions, including, where appropriate, encryption, SSL, firewalls, and internal restrictions on who may access data to protect the information we collect from loss, misuse, and unauthorized access, disclosure, alteration, and destruction. Please be aware that despite our best efforts, no data security measures can guarantee 100% security.</p>
<p>You should take steps to protect against unauthorized access to your password, phone, and computer by, among other things, signing off after using a shared computer, choosing a robust password that nobody else knows or can easily guess, and keeping your log-in and password private. We are not responsible for any lost, stolen, or compromised passwords or for any activity on your account via unauthorized password activity.</p>
<h2>Access To My Personal Information</h2>
<p>You may modify personal information that you have submitted by logging into your account and updating your profile information. Please note that copies of information that you have updated, modified or deleted may remain viewable in cached and archived pages of the Site or Mobile Apps for a period of time.</p>
<h2>What Choices Do I Have Regarding Use of My Personal Information?</h2>
<p>We may send periodic promotional or informational emails to you. You may opt-out of such communications by following the opt-out instructions contained in the e-mail. Opting out is immediate but in some cases it may take up to 10 business days for us to process opt-out requests. If you opt-out of receiving emails about recommendations or other information we think may interest you, we may still send you e-mails about your account or any Services you have requested or received from us.</p>
<h2>Children Under 13</h2>
<p>Our Services are not designed for children under 13. If we discover that a child under 13 has provided us with personal information, we will delete such information from our systems.</p>
<h2>Contact Us</h2>
<p>If you have questions about the privacy aspects of our Services or would like to make a complaint, please contact us at <a href="mailto:privacy@sigmaways.com" target="_blank">privacy@sigmaways.com</a>.</p>
<h2>Changes to this Policy</h2>
<p>This Policy is current as of the Effective Date set forth above. We may change this Policy from time to time, so please be sure to check back periodically. We will post any changes to this Policy on our Site, at <a href="https://www.sigmaways.com/privacy/" target="_blank">https://www.sigmaways.com/privacy/</a>. If we make any changes to this Policy that materially affect our practices with regard to the personal information we have previously collected from you, we will endeavor to provide you with notice in advance of such change or have you assent to our updated privacy policy.</p>
<p><small>Last updated on June 29, 2015.</small></p>
							</div>

	  </div>
	  </div>
	
<?php require_once('footer-withoutlogin.php'); ?>
