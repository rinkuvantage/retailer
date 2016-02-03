<?php require_once('header.php');
require_once('includes/class/encryptclass.php');
$errors=array();
$errormsg='';
$sumessage='';

if(isset($_POST['upfile']))
{
	if(!empty($_FILES))
	{
		$i=0;
		$totalfile=0;
		$fnames = $_FILES['uploadfiles']['name'];
		
		if(empty($errors))
		{
			if(isset($_FILES['uploadfiles']['name']))
			{
				if($_FILES['uploadfiles']['name']!='')
				{
					if(trim($_POST['filecolumns'])==''){
						array_push($errors,'Column headers is required.');
					}
					if($_FILES['uploadfiles']['size']<=0)
					{
						array_push($errors,'File '.$_FILES['uploadfiles']['name'].' has 0 size');
					}
					else if ($_FILES['uploadfiles']["error"] > 0)
					{
						 array_push($errors,'File '.$_FILES['uploadfiles']['name'].' has error '.$_FILES['uploadfiles']["error"]);
					}
					else if (!in_array($_FILES['uploadfiles']['type'],$filetypes))
					{
						 array_push($errors,'File '.$_FILES['uploadfiles']['name'].' has different extension. Flies of type '.implode(', ',$fileextension).' are allowed to upload.');
					}
					else
					{
						$time=date('Y-m-d H:i:s');
						$filetime=date('Y-m-d H-i-s',strtotime($time));
						if (!is_dir('uploads')) {
							mkdir('uploads');
						}
						if (!is_dir('uploads/'.$uid)) {
							mkdir('uploads/'.$uid);
						}
						if (!is_dir('uploads/'.$uid.'/'.$filetime)) {
							mkdir('uploads/'.$uid.'/'.$filetime);
						}
						if (!is_dir('uploads/'.$uid.'/'.$filetime.'/input')) {
							mkdir('uploads/'.$uid.'/'.$filetime.'/input');
						}
						if (!is_dir('uploads/'.$uid.'/'.$filetime.'/output')) {
							mkdir('uploads/'.$uid.'/'.$filetime.'/output');
						}
						$uploadto='uploads/'.$uid.'/'.$filetime.'/input/';
						if(file_exists($uploadto. $_FILES['uploadfiles']["name"]))
						{
							array_push($errors,'File '.$_FILES['uploadfiles']['name'].' is already exist.');
						}
						
						if(empty($errors))
						{
							$altername=$_FILES['uploadfiles']["name"];
							move_uploaded_file($_FILES['uploadfiles']["tmp_name"],$uploadto. $_FILES['uploadfiles']["name"]);
							
							$post['udate'] = $time;
							$post['keyid']=$skey;
							$post['user_id']=$uid;
							$post['filename']=$altername;
							$post['title']=$_POST['filename'];
							$post['filecolumns']=$_POST['filecolumns'];
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
							$res=$user->addUserFiles($fieldnames,$fieldvalues);
							$totalfile++;
						}
					}
				}
			}
			if($totalfile>0){
				
				$sumessage='File uploaded successfully.';
				
			}
		}
		if($totalfile>0 && empty($errors)){
			if(trim($errormsg)!=''){$errormsg='<br />'.$errormsg;}
			$_SESSION['message']=$sumessage.$errormsg;
			echo"<script type='text/javascript'>window.location='viewfiles.php';</script>";
			exit();
		}
	}
}
?>

<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    
	<?php 
	if($sumessage!=''){echo'<span>'.$sumessage.'</span><br />';}
	if(!empty($errors)){foreach($errors as $error){echo'<span class="error">'.$error.'</span><br />';}} ?>
    <!-- /.row -->
    <!-- Main jumbotron for a primary marketing message or call to action -->
	<form name="upfiles" id="upfiles" action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="upfile">
	<div class="uploading_files">
    <div class="upload_box col-md-7"> <span class="btn btn-default btn-file"><i class="fa fa-folder-open"></i> Choose Files
      <input type="file" class="upfile firstfile" name="uploadfiles"onchange="ValidateFileInput(this);"/>
      </span>
      <input type="text" class="form-control filename" readonly="" name="filename" value=""> *
    </div>
	</div>
	<div class="uploadfile_textarebox col-md-12">
	<div class="col-md-7 col-sm-6 leftuploadcnt">
	<h1>Column Headers  *</h1>
	<textarea class="col-md-11 col-sm-11 required" name="filecolumns"></textarea>
	<div class="col-md-12  showeeror"></div>
	<div class="col-md-12 col-sm-12 submitbox">
	<input class="upload_submit btn btn-lg btn-primary btn-block" type="submit" value="Submit">
    <div class="cancelbox">or <a href="javascript:;" onclick="upfiles.reset()">Cancel</a></div>
	</div>
	</div>
	<div class="col-md-4 col-sm-4 rightuploadcnt">
	
   <h2><b>What are Column Headers?</b></h2>

     <p>column headers are the 
    coloumn names of the file that
    you are uploaded that is 
    seperated by pipe Delimiter.<br />
	Example: file1.csv-ID|NAME|PHONE</p>


	</div>
	</div>
  <!--  <a class="add_more" href="javascript:;">Add More Files</a>-->
    
	</form>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="js/jquery.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	
	jQuery('.add_more').live('click', function(){
		jQuery('.uploading_files').append('<div class="upload_box"> <span class="btn btn-default btn-file"><i class="fa fa-folder-open"></i> Choose Files<input type="file" name="uploadfiles[]" class="upfile" onchange="ValidateFileInput(this);" /></span><input type="text" class="form-control filename" readonly="true" name="filename[]" value=""><a href="javascript:;" class="deletefiles">X</a></div>');
	});
	jQuery('.deletefiles').live('click', function(){
		jQuery(this).parent('.upload_box').remove();
	});
	jQuery('.upfile').live('change',function(){
		var file = this.files[0];  
   		var ff = file.name;
		//var ff=jQuery(this).val();
		jQuery(this).parents('.upload_box').find('.filename').val(ff);
	});
	jQuery('#upfiles').submit(function(){
		var firstfile=jQuery('.firstfile').val();
		var error=1;
		if(jQuery.trim(firstfile)=='')
		{
			jQuery('input[name="filename"]').addClass('error');
			jQuery('.uploading_files span.error').remove();
			jQuery('.uploading_files').prepend('<span class="error">File is required</span>');
			error= parseInt(error)+1;
		}
		var filecolumns=jQuery('textarea[name="filecolumns"]').val();
		if(jQuery.trim(filecolumns)=='')
		{
			jQuery('textarea[name="filecolumns"]').addClass('error');
			jQuery('.showeeror span.error').remove();
			jQuery('.showeeror').html('<span class="error">Column headers is required</span>');
			error= parseInt(error)+1;
		}
		if(parseInt(error)>1){return false;}
		var i=1;
		jQuery('#upfiles input[type="text"]').each(function(){
			if(jQuery(this).val()!=''){i=parseInt(i)+1;}
		});
		if(i==1){return false;}
	});
});
</script>

<script type="text/javascript">
var validFileExtensions = [".txt", ".rtf", ".csv", ".xlsx", ".tar", ".gz", ".zip", ".tar.gz", ".dat"];    
function ValidateFileInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < validFileExtensions.length; j++) {
                var sCurExtension = validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
		jQuery(document).ready(function(){
			var h=parseInt(jQuery(window).height())-parseInt(jQuery('.navbar-fixed-top').height())-parseInt(jQuery('footer.text-center').height());
			jQuery('#page-wrapper').css({'min-height':h+'px'});
		});
	</script>
<script type="text/javascript" src="js/jquery.appear.js"></script>

<?php require_once('footer.php'); ?>