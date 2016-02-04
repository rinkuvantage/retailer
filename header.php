<?php require_once('includes/head.php');
if(!$login_active)
{
	$_SESSION['message']='Please login first.';
	@header('Location: login.php');
	exit();
}
$uid=$_SESSION["User_id"];
$username=$user->Userdetail($uid, 'fname', true).' '.$user->Userdetail($uid, 'lname', true);
$currentpagesss=explode('?',$currentpage);
if(count($currentpagesss)>1){$currentpage=$currentpagesss[0];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $sitname; ?>- Dashboard</title>
<!-- Bootstrap Core CSS -->
<link href="css/formcss.css" rel="stylesheet" />
<link href="css/dashboardcss.css" rel="stylesheet" />
<link href="css/footerwithlogin.css" rel="stylesheet" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">
<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper" class="admindashboard">
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  <a href="index.php"><img class="" src="img/RA.png"/></a> </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav admin_herder">
    <li> </a> <a class="contact" href="contactus.php"> <span class="glyphicon glyphicon-comment headericonbox"></span> Contact </a> </li>
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
      <ul class="dropdown-menu alert-dropdown">
        <li> <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a> </li>
        <li> <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a> </li>
        <li> <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a> </li>
        <li> <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a> </li>
        <li> <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a> </li>
        <li> <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a> </li>
        <li class="divider"></li>
        <li> <a href="#">View All</a> </li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li> <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a> </li>
        <li class="divider"></li>
        <li> <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
      </ul>
    </li>
  </ul>
  <div class="clr"></div>
  <div class="top-titlebar">
    <div class="container">
		<?php if($currentpage=='dashboard.php'){ ?><h1><i class="fa fa-dashboard"></i> Dashboard</h1><?php } ?>
		<?php if($currentpage=='profile.php'){ ?><h1><i class="fa fa-fw fa-user"></i> Profile<?php } ?>
		<?php if($currentpage=='notifications.php'){ ?><h1><i class="fa fa-bell"></i> Notification</h1><?php } ?>
		<?php if($currentpage=='edit-notifications.php'){ ?><h1><i class="fa fa-bell"></i> Edit Notification</h1><?php } ?>
		<?php if($currentpage=='uploadfiles.php'){ ?><h1><i class="fa fa-upload"></i> Upload Files</h1><?php } ?>
		<?php if($currentpage=='viewfiles.php'){ ?><h1><i class="fa fa-eye"></i> View Files</h1><?php } ?>
		<?php if($currentpage=='support.php'){ ?><h1><i class="fa fa-fw fa-user"></i> Support</h1><?php } ?>
		<?php if($currentpage=='analytics.php'){ ?><h1><img src="img/chart.png"/> Analytics</h1><?php } ?>
		<?php if($currentpage=='manageusers.php'){ ?><h1><i class="fa fa-wrench"></i> Manage Users</h1><?php } ?>
    </div>
  </div>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav dashboardsidebar">
      <li<?php if($currentpage=='dashboard.php'){ ?> class="active"<?php } ?>> <a href="dashboard.php"> Dashboard</a> </li>
      <li<?php if($currentpage=='profile.php'){ ?> class="active"<?php } ?>> <a href="profile.php"> Profile</a> </li>
      <?php /*?><li<?php if($currentpage=='manage-passwords.php'){ ?> class="active"<?php } ?>>
                        <a href="<?php echo $siteurl; ?>/manage-passwords"><i class="fa fa-fw fa-table"></i> Manage Password</a>
                    </li><?php */?>
      <li<?php if($currentpage=='notifications.php' || $currentpage=='edit-notifications.php'){ ?> class="active"<?php } ?>> <a href="notifications.php"> Notification</a> </li>
      <li<?php if($currentpage=='uploadfiles.php'){ ?> class="active"<?php } ?>> <a href="uploadfiles.php"> Upload Files</a> </li>
      <li<?php if($currentpage=='viewfiles.php'){ ?> class="active"<?php } ?>> <a href="viewfiles.php"> View files</a> </li>
	   <li<?php if($currentpage=='support.php'){ ?> class="active"<?php } ?>> <a href="support.php">Support</a> </li>
	  <li<?php if($currentpage=='analytics.php'){ ?> class="active"<?php } ?>> <a href="analytics.php">Analytics</a> </li>
      <?php if($user_type=='admin'){ ?>
      <li<?php if($currentpage=='manageusers.php' || $currentpage=='edit-user.php'){ ?> class="active"<?php } ?>> <a href="manageusers.php">Manage Users</a> </li>
      <?php } ?>
	 
    </ul>
	
  </div>
	
  <!-- /.navbar-collapse -->
</nav>
<?php if(isset($_SESSION['message']) && trim($_SESSION['message'])!=''){ ?>
<div class="success"><?php echo $_SESSION['message']; $_SESSION['message']=''; ?></div>
<?php } ?>
