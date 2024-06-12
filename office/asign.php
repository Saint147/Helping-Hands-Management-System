<?php
session_start();
error_reporting(0);
include('includes/connection.php');
if(strlen($_SESSION['id']==0)) {
 header('location:includes/logout.php');
  } else{
$id=intval($_GET['id']);// get value
if(isset($_POST['submit']))
{
	//$id=intval($_GET['id']);
$startCareDate=$_POST['startCareDate'];
$endCareDate=$_POST['endCareDate'];
$assignnurse=$_POST['nurseId'];
$stat=$_POST['statuss'];
$pat=$_POST['patientId'];

$sql=mysqli_query($con,"UPDATE `tblcarecontract` SET nurseId='$assignnurse',statuss='$stat',startCareDate='$startCareDate',endCareDate='$endCareDate' WHERE patientId='$pat'");
if($sql){
    $_SESSION['msg']="Contract Assigned !!";
}else
$_SESSION['msg']="Failed to assign!!";
//$id=intval($_GET['id']);// get value
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Office|Admin | Assign | Care Contract</title>
		
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
<?php include('includes/sidebar.php');?>
			<div class="app-content">
				
						<?php include('includes/header.php');?>
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Office Admin | Assign Care Contract</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Office Admin</span>
									</li>
									<li class="active">
										<span>Assign nurse to contract</span>
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
													<h5 class="panel-title">Assign Contract</h5>
												</div>
												<p align="center" style="color:red" > Mandatory fields marked with asteriks (*) </p>

												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
													<form role="form" action="asign.php" method="post" >
                                                    <div class="form-group">
															<label for="exampleInputEmail1">
																Contract For<span style="color:red" align="inline"> *
															</label>
															<a href="assigncontract.php?id=<?php echo $row['contractId'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" data-toggle="tooltip" title="The below selection list shows only the name of the patients you selected on the table"><i class="fa fa-info"></i></a>
															<div class="form-group">
							
							<select name="patientId" class="form-control" required="true">
																
<?php $sql=mysqli_query($con,"select * from `tblpatients` join `tblcarecontract` on tblpatients.patientId = tblcarecontract.patientId
    WHERE tblcarecontract.statuss='New'and tblcarecontract.contractId='$id'");
while($row=mysqli_fetch_array($sql))
{
?>
	<option selected value="<?php echo htmlentities($row['patientId']);?>">
																	<?php echo htmlentities($row['firstName']);echo " "; echo $row['surname'];  ?>
																</option>
																<?php } ?>
																
															</select>	
																						
</div>
 
	
													
														<div class="form-group">
															<label for="exampleInputEmail1">
																Assign Nurse To Contract<span style="color:red" align="inline"> *  <a href="assigncontract.php?id=<?php echo $row['contractId'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" data-toggle="tooltip" title=" of nurse, please select a nurse to assign it with the selected patient contract!"><i class="fa fa-info"></i></a>
															</label>
															<div class="form-group">
							
							<select name="nurseId" class="form-control" required="true">
                            <option value="">Select Nurse</option>							
<?php $ret=mysqli_query($con,"select * from `tblnurse`");

while($row=mysqli_fetch_array($ret))
{
?>
	<option value="<?php echo htmlentities($row['nurseId']);?>">
																	<?php echo htmlentities($row['firstname']);?>
																</option>
																<?php } ?>
																
															</select>								
</div>
<div class="form-group">
						  				 <label for="startCareDate">Start Care Date<span style="color:red" align="inline"> *</label>
		                                  <input type="date" name="startCareDate" class="form-control"  value="">
										</div>
                                        <div  class="form-group">
						  				 <label for="endCareDate">End Care Date</label>
		                                  <input type="date" name="endCareDate" class="form-control"  Value=" ">
</div>
                                                        <div hidden class="form-group">
									      <label for="statuss">Status<span style="color:red" align="inline"> *</label>
                                        <select name="statuss" class="form-control" required="required" >
                                           <option  disabled value="<?php $sql=mysqli_query($con,"select * from `tblcarecontract` where contractId='$id' "); $row=mysqli_fetch_array($sql); echo $row['statuss'];?>"><?php echo $row['statuss'];?></option>
                                            <option selected value="Assigned">Assign</option> 
                                                 	
                                       </select>
                        	           </div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Assign
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
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('includes/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('includes/setting.php');?>
			
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
