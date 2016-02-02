<?php require_once('header-withoutlogin.php');
if($login_active)
{
	@header('Location: dashboard.php');
	exit();
}
 ?>

<!-- End of head section HTML codes -->

<div class="retailerhomemain" style="margin-top:80px;">
  <!--<div class="top-titlebar">
    <div class="container">
      <h1>Home</h1>
    </div>
  </div>-->
  <div id="amazingslider-wrapper-1" style="display:block;position:relative;width:100%;margin:0px auto 48px;">
    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
      <ul class="amazingslider-slides" style="display:none;">
        <li><img src="images/analytics-shutterstock-139983946.jpg" />
          <button class="as-btn-blue-medium" OnClick=" location.href='register.php' "><span class="glyphicon glyphicon-edit"></span> Get Started Now</button>
        </li>
        <li><img src="images/ban0.jpg" />
          <button class="as-btn-blue-medium" OnClick=" location.href='register.php' "><span class="glyphicon glyphicon-edit"></span> Get Started Now</button>
        </li>
        <li><img src="images/UnderstandingYourAnalytics.jpg" />
          <button class="as-btn-blue-medium" OnClick=" location.href='register.php' "><span class="glyphicon glyphicon-edit"></span> Get Started Now</button>
        </li>
        <li><img src="images/ban4.jpg" />
          <button class="as-btn-blue-medium" OnClick=" location.href='register.php' "><span class="glyphicon glyphicon-edit"></span> Get Started Now</button>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- End of body section HTML codes -->

<section id="portfolio">
  <div class="container">
    <div class="row turndata">
      <h1>Turn data into insights.</h1>
      <p>In a fast-paced retail business, we must reach out to the customers real quick before they pick your competitors. Our retail analytics solutions helps you identify and focus on higher value customers, determine what actions typically precede a lost customer or sale, and better understand what factors influence customer spending. When you improve customer retention, you substantially improve the bottom line.</p>
    </div>
  </div>
  <div class="container offeringblock">
    <h1>Our Offerings</h1>
    
    
    
    
    
    
    
    
    
   
    
    
    
    
    <div class="row">
    
    
     <div class="col-md-4 ">
    <div class=" show-grid">
            <div class="entry-image">
              <div class="work-item"> <img src="img/1.png"/>
                <div class="image-extra">
                  <div class="extra-content">
                    <div class="inner-extra">
                      <h2 class="extra-title">Churn Analytics</h2>
                     </div>
                    <!--/ .inner-extra--> 
                  </div>
                  <!--/ .extra-content--> 
                </div>
                <!--/ .image-extra--> 
              </div>
              <!--/ .work-item--> 
            </div>
            <!--/ .entry-image-->
            
            <div class="offering"> <a href="Churn-analytics.php" class="rdmore">Read More</a> </div>
            </div>
          </div>
    
    
    
    
    <div class="col-md-4 ">
    <div class=" show-grid">
            <div class="entry-image">
              <div class="work-item"> <img src="img/2.png"/>
                <div class="image-extra">
                  <div class="extra-content">
                    <div class="inner-extra">
                      <h2 class="extra-title">Loyalty Status</h2>
                     </div>
                    <!--/ .inner-extra--> 
                  </div>
                  <!--/ .extra-content--> 
                </div>
                <!--/ .image-extra--> 
              </div>
              <!--/ .work-item--> 
            </div>
            <!--/ .entry-image-->
            
            <div class="offering"> <a href="loyalty.php" class="rdmore">Read More</a> </div>
            </div>
          </div>
    
    
      
      
      <div class="col-md-4 col-xs-12 col-sm-4 mainservices">
        <div class="block1box">
          <h1>Ready to go? Call us at<br />
            855-867-4473</h1>
          <div style="text-align:center;">
            <img src="img/3.png"/> 
          </div>
          <div class="readmorebox"> <a class="socialicons" href="https://www.facebook.com/sigmaways" target="_blank"><img src="img/fbook.png"/></a> <a class="socialicons" href="https://twitter.com/sigmaways" target="_blank"><img src="img/twitter.png"/></a> <a class="socialicons" href="https://www.linkedin.com/company/sigmaways" target="_blank"><img src="img/l.png"/></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once('footer-withoutlogin.php'); ?>
