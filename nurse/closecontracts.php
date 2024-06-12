<?php
session_start();
error_reporting(0);
include('include/connection.php');
if(strlen($_SESSION['id']==0)) {
 header('location:include/logout.php');
  } else{
$id=$_POST['contractId'];// get value
if(isset($_POST['submit']))
{

$stat=$_POST['statuss'];
$sql=mysqli_query($con,"update  `tblcarecontract` set statuss='$stat' where contractId='$id'");
if($sql){
    $_SESSION['msg']="Contract Closed !!";
}
$id=intval($_GET['contractId']);// get value
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Nurse | Close | Care Contract</title>
		
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
									<h1 class="mainTitle">Nurse | Close Care Contract</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Nurse</span>
									</li>
									<li class="active">
										<span>Close Contract</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-6 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Close Contract</h5>
												</div>
												<p align="center" style="color:red" > Mandatory fields marked with asteriks (*) </p>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
													<form role="form" name="closecontract" method="post" >
                                                    <div class="form-group">
															<label for="exampleInputEmail1">
																Close Contract For <span style="color:red" align="inline">*</span>
															</label>
 
                                                            <select name="contractId" class="form-control" required="true">
																<option value="">Select Contract for</option>
<?php $ret=mysqli_query($con,"SELECT * FROM `tblcarecontract` JOIN `tblnurse` ON tblcarecontract.nurseId=tblnurse.nurseId  JOIN `tbluuser` ON tbluuser.Id=tblnurse.Id join `tblpatients` on tblcarecontract.patientId=tblpatients.patientId join `tblsuburbs` on tblsuburbs.suburbId=tblcarecontract.suburbId WHERE  tblnurse.Id='".$_SESSION['id']."' AND statuss='Assigned'");
while($row=mysqli_fetch_array($ret))
{
?>
	<option value="<?php echo htmlentities($row['contractId']);?>">
																	<?php echo htmlentities($row['firstName']);?>
																</option>
																<?php } ?>
																
															</select>	
														</div>
														
                                                        <div class="form-group">
									      <label for="status">Status <span style="color:red" align="inline">*</span></label>
                                        <select name="statuss" class="form-control" required="required" >
                                            <option value="Closed">Close</option> 
                                                 	
                                       </select>
                        	           </div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary"  onClick="return confirm('Are you sure you want to close contract?')">
															Close Contract
														</button>
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
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
					<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
				</div>
			</div>
			
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
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
			$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});		    
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>
