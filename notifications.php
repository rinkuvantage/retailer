<?php require_once('header.php');
$uid=$_SESSION["User_id"];
$tokenid=$user->Userdetail($uid, 'tokenid', true);
$keyid=$user->Userdetail($uid, 'keyid', true);
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12 brdcum">
                       
                        <ol class="breadcrumb">
                          
                            <li class="active">
                              <i class="fa fa-bell"></i> Notification
                            </li>
				<li class="viewdropdown"><b>Viewing :</b>
				<ul>
							<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><img src="img/n.png"/> All Notifications <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li> <a href="edit-notifications.php">Edit Notifications</a> </li>
     
      </ul>
	  
    </li>
	</ul>
	</li>
							
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                 <div class="row">
				 
			<div class="col-sm-12 col-xs-12 col-md-8">
			<table class="notificationtable table table-striped"> <thead> 
			<tr class="nhding"><th>Subject</th> <th>When</th> </tr> 
			</thead> 
			<tbody> 
			<tr><td>Indicates a dangerous or potentially</td> <td>13/06/2014 15.53</td> </tr> 
			<tr><td>Indicates a dangerous or potentially</td> <td>13/06/2014 15.53</td> </tr> 
			<tr><td>Indicates a dangerous or potentially</td> <td>13/06/2014 15.53</td> </tr> 
			<tr><td>Indicates a dangerous or potentially</td> <td>13/06/2014 15.53</td> </tr> 
			<tr><td>Indicates a dangerous or potentially</td> <td>13/06/2014 15.53</td> </tr> 
			<tr><td>Indicates a dangerous or potentially</td> <td>13/06/2014 15.53</td> </tr> 
			
			 </tbody> </table>
			 </div>
				 </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			var h=parseInt(jQuery(window).height())-parseInt(jQuery('.navbar-fixed-top').height())-parseInt(jQuery('footer.text-center').height());
			jQuery('#page-wrapper').css({'min-height':h+'px'});
		});
	</script>

<?php require_once('footer.php'); ?>
