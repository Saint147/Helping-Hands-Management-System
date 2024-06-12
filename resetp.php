<?php
session_start();
error_reporting(0);
include('connection.php');
 //include('include/verify.php');
//check_login();
$ss=0;
$msg=0;
if(isset($_POST['submit']))
{

$password=$_POST['password1'];


$sql=mysqli_query($con,"Update tbluuser set password='$password' where Id='".$_SESSION['id']."'");
if($sql)
{
$ss=1;
}else{
    $msg=1;

}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User | Care Contract</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
        
		<script type="text/javascript">
function valid()
{
 if(document.resetp.password1.value!= document.resetp.password2.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.resetp.password2.focus();
return false;
}
return true;
}
</script>

	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
					<?php 
    if($msg>0)
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong></strong>  User already exist.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    if($ss>0)
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Password</strong>  Updated Changed succesfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    ?>		<!-- start: PAGE TITLE -->
						<legend class="text-center">Set New Password</legend>
    <p align="center" style="color:red" > Mandatory fields marked with asteriks (*) </p>
    <p align="center">
		Please fill in the form below to set new password.<br />
	</p>
    
    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">

            <div  class="col-sm-12 cop-ck">
                <form method="post" name="resetp" id="resert"  onSubmit="return valid();">
                    <div class="row cf-ro">
                        <div  class="col-sm-3"><label>Password :<span style="color:red" align="inline"> *</span></label></div>
                        <div class="col-sm-8"><input type="password" name="password1"  id="password1" placeholder="Enter new Password" class="form-control input-sm" required ><span id = "message" style="color:red"> </span> <br><br></div>
                    </div>
					<div class="row cf-ro">
                        <div  class="col-sm-3"><label>Confirm Password :<span style="color:red" align="inline"> *</span></label></div>
                        <div class="col-sm-8"><input type="password" name="password2"  id="password2" placeholder="Confirm new Password" class="form-control input-sm" required ><span id = "message" style="color:red"> </span> <br><br></div>
                    </div>
                     
                     
                
				<div  class="row cf-ro">
                        <div  class="col-sm-3"><label></label></div>
                        <div class="col-sm-8">
                         <button class="btn btn-success btn-sm right" type="submit" name="submit">Reset Password</button>
                        </div>
            </div>
            </form>
			
     
        </div>
    </section>
				</div>
			</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		</div>
		
			
		
			<!-- start: SETTINGS -->
	<?php include('include/seting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
