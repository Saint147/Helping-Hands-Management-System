<?php
session_start();
error_reporting(0);
include('connection.php');
//include('include/verify.php');
//check_login();
$success=0;
$cond = 0;
if(isset($_POST['submit']))
{
$conditionId=$_POST['conditionId'];
$patientId=$_POST['patientId'];



//$sql=mysqli_query($con,"Update tbluuser set username='$username',email='$email',password='$password',userType='$userType',status='$status' where id='3'");
/* $sql=mysqli_query($con,"insert into `tblpatientcondtion` (conditionId,patientId) values('$conditionId','$patientId')");
if($sql)
{
$msg="Condition Inserted Successfully";
}else{
	$msg="Something bad happened!";
} */

$sql="Select * from `tblpatientcondtion` join `tblpatients` on tblpatientcondtion.patientId=tblpatients.patientId join `tblconditions` on tblconditions.conditionId=tblpatientcondtion.conditionId where tblpatients.Id='".$_SESSION['id']."' and tblpatientcondtion.conditionId='$conditionId' ";

$result=mysqli_query($con,$sql);
if($result){
  $num=mysqli_num_rows($result);
   if($num>0){
	   $msg="Condition already added, duplication not allowed!";
	   $cond= 1;
   }else{
		
		 $sqll="insert into `tblpatientcondtion` (conditionId,patientId) values('$conditionId','$patientId')";
		  $sub=mysqli_query($con,$sqll);
	  if($sub){
	   //echo "Registered Successfully";
	   $success =1;
	  $msg="Condition Added Successfuly";
	   //header("Location:viewcarecontract.php");
	 }else{
	   $msg="Cannot duplicate Conditions";
	   die(mysqli_error($con));
	}
  }
}else{
   $msg ="You have an active contract new contract could be submited once the new contract assigned or closed";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User | Chronic Condtion</title>
		
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


	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Patient | Add Conditions</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient</span>
									</li>
									<li class="active">
										<span>Add Chronic Conditions</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
                <h5 style="color: green; font-size:18px; ">
								  <!-- Code outputing message if Successfully? updated -->
                     <?php if($msg) { echo htmlentities($msg);}?>
								 </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Chronic Details to Your Profile</h5>
												</div>
												<div class="panel-body">  <hr />
									<form role="form" action="patientcondition.php" method="post">
									<div hidden class="form-group">
										<label for="user">
																User
															</label>
							<select  name="patientId" class="form-control" required="true">
															
<?php $ret=mysqli_query($con,"select * from `tblpatients`  join `tbluuser` on tblpatients.Id=tbluuser.Id where tblpatients.Id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($ret))
{
?>
	<option selected  value="<?php echo htmlentities($row['patientId']);?>">
																	<?php echo htmlentities($row['firstName']); echo " ";echo htmlentities($row['surname']);?>
																</option>
																<?php } ?>
																
															</select>								
</div>
										<div class="form-group">
										<label for="condition">
																Condition <span style="color:red" align="inline"> *</span>
															</label>
							<select name="conditionId" class="form-control" required="true">
																<option value="">Select Condition</option>
<?php $ret=mysqli_query($con,"select * from `tblconditions`");
while($row=mysqli_fetch_array($ret))
{
?>
	<option value="<?php echo htmlentities($row['conditionId']);?>">
																	<?php echo htmlentities($row['name']);?>
																</option>
																<?php } ?>
																
															</select>								
</div>
                                        <div>                                  
                                        </div>
                                    <button type="submit" name="submit" class="btn btn-o btn-primary">Add Condition</button>
								</form>
													
							</div>
						</div>
					</div>
											
				</div>
		  </div>
	   <div class="col-lg-12 col-md-12">
			<div class="panel panel-white">
               </div>
			</div>
					</div>
				</div>
					
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
