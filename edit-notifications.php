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
							<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> All Notifications <b class="caret"></b></a>
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

                 <div class="row notificationtable1">
				 <div class="notification_note col-md-10">
				 <h1>Notifications Subscription Preferences</h1>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</div>
			<div class="col-sm-12 col-xs-12 col-md-8">
			<table class="notificationtable table table-striped"> <thead> 
			<tr><th>Type Of Notification</th> <th>Type of Subscription</th> </tr> 
			</thead> 
			<tbody> 
			<tr class="typescription"><td>Admin Announcements</td> <td><span class="col-md-4"><input type="checkbox" checked="checked" class="chkbox" /> Web</span><span class="col-md-4"><input type="checkbox" checked="checked" class="chkbox" /> Email</span></td> </tr> 
			<tr class="typescription"><td>Feature  Announcements</td> <td><span class="col-md-4"><input type="checkbox" checked="checked" class="chkbox" /> Web</span><span class="col-md-4"><input type="checkbox" checked="checked" class="chkbox" /> Email</span></td> </tr> 
			<tr class="typescription"><td>System Status</td> <td><span class="col-md-4"><input type="checkbox" checked="checked" class="chkbox" /> Web</span><span class="col-md-4"><input type="checkbox" checked="checked" class="chkbox" /> Email</span></td> </tr> 
			<tr class="typescription"><td>Configuration issues</td> <td><span class="col-md-4"><input type="checkbox" checked="checked" class="chkbox" /> Web</span><span class="col-md-4"><input type="checkbox" checked="checked" class="chkbox" /> Email</span></td> </tr>  

			
			 </tbody> </table>
			 <div class="col-md-12 submitbox">
	<input class="upload_submit btn btn-lg btn-primary btn-block" type="submit" value="Save Change">
    <div class="cancelbox">or <a href="#">Cancel</a></div>
	</div>
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
