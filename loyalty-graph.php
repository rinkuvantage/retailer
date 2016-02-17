<?php require_once('includes/head.php');
$page=1;
$nextpage=2;
if(isset($_REQUEST['page']) && $_REQUEST['page']>0)
{
	$page=$_REQUEST['page'];
	$nextpage=$page+1;
}
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
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic&#038;subset=latin,latin-ext"  type="text/css" />

<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
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
<div id="page-wrapper">
  <div class="container-fluid">
   
	<div class="row">
		<div class="col-md-6 col-sm-6" style="margin:0px auto; float:none;">
			<?php 
			if(isset($_SESSION['loyality'])){
			$ch = curl_init($_SESSION['loyality'][$page-1]);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			echo curl_exec($ch);
			curl_close($ch);
			?>
			<div class="col-md-12 col-sm-12">
				
				<div class="col-md-6 col-sm-6">
				<?php if($page>1){ ?>
				<a href="churn.php?page=<?php echo ($page-1); ?>">Previous Graph</a>
				<?php } ?>
				</div>
				
				
				<div class="col-md-6 col-sm-6">
				<?php if(count($_SESSION['loyality'])>=$nextpage){ ?>
				<a href="loyalty-graph.php?page=<?php echo $nextpage; ?>">Next Graph</a>
				<?php } ?>
				</div>
				<div class="col-md-4 col-sm-4">
				<a href="uploadfiles.php">Home</a>
				</div>
			</div>
			<?php } ?>
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

		 
		
<?php //require_once('footer.php'); ?>
