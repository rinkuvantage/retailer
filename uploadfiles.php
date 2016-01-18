<?php require_once('header.php');
require_once('includes/class/encryptclass.php');
$errors=array();
$errormsg='';
if(isset($_POST['upfile']))
{
	if(!empty($_FILES))
	{
		$i=0;
		$totalfile=0;
		$fnames = $_FILES['uploadfiles']['name'];

		if(count(array_unique($fnames))<count($fnames))
		{
			array_push($errors,'You are uploading more than one file with same name & same type.');
		}
		else
		{			
					
			foreach($_FILES['uploadfiles']['name'] as $i=>$vale)
			{
				$exts=explode('.',$_FILES['uploadfiles']['name'][$i]);
				$totalstrlen=(strlen($_FILES['uploadfiles']['name'][$i])-strlen($exts[count($exts)-1]))-1;
				$alias2=substr($_FILES['uploadfiles']['name'][$i],0,$totalstrlen).'-'.$uid;
				
				//$order   = array("&","$","%","!","~","'","`","_","(",")","{","}","[","]",":",";","<",">",",",".","/","|","=","+","*","#"," ","  ","   ","°");
				//$replace = '';
				//$alias=strtolower(str_replace($order, $replace, $_POST['filename'][$i].'-'.$alias2));
				$alias=$alias2;
				
				if(isset($_FILES['uploadfiles']['name'][$i]))
				{
					if($_FILES['uploadfiles']['name'][$i]!='')
					{
						if($_FILES['uploadfiles']['size'][$i]<=0)
						{
							array_push($errors,'File '.$_FILES['uploadfiles']['name'][$i].' has 0 size');
						}
						else if ($_FILES['uploadfiles']["error"][$i] > 0)
						{
							 array_push($errors,'File '.$_FILES['uploadfiles']['name'][$i].' has error '.$_FILES['uploadfiles']["error"][$i]);
						}
						else if (!in_array($_FILES['uploadfiles']['type'][$i],$filetypes))
						{
							 array_push($errors,'File '.$_FILES['uploadfiles']['name'][$i].' has different extsion. Flies of type '.implode(', ',$fileextension).' are allowed to upload.');
						}
					}
				}
			}
		}
	
		if(empty($errors))
		{
			foreach($_FILES['uploadfiles']['name'] as $i=>$vale)
			{
				$exts=explode('.',$_FILES['uploadfiles']['name'][$i]);
				$totalstrlen=(strlen($_FILES['uploadfiles']['name'][$i])-strlen($exts[count($exts)-1]))-1;
				$alias2=substr($_FILES['uploadfiles']['name'][$i],0,$totalstrlen).'-'.$uid;
				
				//$order   = array("&","$","%","!","~","'","`","_","(",")","{","}","[","]",":",";","<",">",",",".","/","|","=","+","*","#"," ","  ","   ","°");
				//$replace = '';
				//$alias=strtolower(str_replace($order, $replace, $_POST['filename'][$i].'-'.$alias2));
				$alias=$alias2;
				
				if(isset($_FILES['uploadfiles']['name'][$i]))
				{
					if($_FILES['uploadfiles']['name'][$i]!='')
					{
						
						if (!is_dir('input')) {
							mkdir('input');
						}
						if (!is_dir('input/'.$uid)) {
							mkdir('input/'.$uid);
						}
						if (!is_dir('output')) {
							mkdir('output');
						}
						if (!is_dir('output/'.$uid)) {
							mkdir('output/'.$uid);
						}
						
						$exts=explode('.',$_FILES['uploadfiles']["name"][$i]);
						$exten='.'.$exts[count($exts)-1];
						$altername=$alias.$exten;
						move_uploaded_file($_FILES['uploadfiles']["tmp_name"][$i],"input/".$uid."/" . $_FILES['uploadfiles']["name"][$i]);
						rename("input/".$uid."/".$_FILES['uploadfiles']["name"][$i], "input/".$uid."/".$altername);
						$mainfile="input/".$uid."/".$altername;
						$str = file_get_contents($mainfile);
						$converter = new Encryption;
						$encoded = $converter->encode($str, $skey);
						$fp = fopen($mainfile, 'wb');
						fwrite($fp, $encoded);
						fclose($fp);
						$post['udate'] = date('Y-m-d H:i:s');
						$post['keyid']=$skey;
						$post['user_id']=$uid;
						$post['filename']=$altername;
						$post['title']=$_POST['filename'][$i];
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
			if($totalfile>1){
				$sumessage=$totalfile.' files uploaded successfully.';
			}
				else{$sumessage=$totalfile.' file uploaded successfully.';
			}
		}
		
		if(!empty($errors)){foreach($errors as $error){$errormsg.='<span class="error">'.$error.'</span><br />';}}
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
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Upload Files </h1>
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="dashboard.php">Dashboard</a> </li>
          <li class="active"> <i class="fa fa-upload"></i> Upload Files </li>
        </ol>
      </div>
    </div>
	<?php if(trim($errormsg)!=''){echo $errormsg;} ?>
    <!-- /.row -->
    <!-- Main jumbotron for a primary marketing message or call to action -->
	<form name="upfiles" id="upfiles" action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="upfile">
	<div class="uploading_files">
    <div class="upload_box"> <span class="btn btn-default btn-file"><i class="fa fa-folder-open"></i> Choose Files
      <input type="file" class="upfile" name="uploadfiles[]"onchange="ValidateFileInput(this);"/>
      </span>
      <input type="text" class="form-control filename" readonly="" name="filename[]" value="">
    </div>
	</div>
    <a class="add_more" href="javascript:;">Add More Files</a>
    <p class="up_subp">
      <input class="upload_submit btn btn-lg btn-primary btn-block" type="submit" value="Submit">
    </p>
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
		jQuery('.uploading_files').append('<div class="upload_box"> <span class="btn btn-default btn-file"><i class="fa fa-folder-open"></i> Choose Files<input type="file" name="uploadfiles[]" class="upfile" onchange="ValidateFileInput(this);" /></span><input type="text" class="form-control filename" readonly="true" name="filename[]" value=""></div>');
	});
	jQuery('.upfile').live('change',function(){
		var file = this.files[0];  
   		var ff = file.name;
		//var ff=jQuery(this).val();
		jQuery(this).parents('.upload_box').find('.filename').val(ff);
	});
	jQuery('#upfiles').submit(function(){
		var i=1;
		jQuery('#upfiles input[type="text"]').each(function(){
			if(jQuery(this).val()!=''){i=parseInt(i)+1;}
		});
		if(i==1){return false;}
	});
});
</script>

<script type="text/javascript">
var validFileExtensions = [".txt", ".rtf", ".csv", ".xlsx", ".tar", ".gz", ".zip"];    
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
				$(".upload_submit").attr('disabled', "disabled");
                return false;
            }else{				
					$(".upload_submit").attr('disabled', false);					
			}
        }
    }
    return true;
}
</script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.appear.js"></script>

<?php require_once('footer.php'); ?>