<?php
session_start();
error_reporting(0);
include('include/connection.php');
 //include('include/verify.php');
//check_login();
if(isset($_POST['submit']))
{
$name=$_POST['firstname'];
$lastname=$_POST['surname'];
$gender=$_POST['gender'];
$ID=$_POST['idnumber'];
$DOB=$_POST['birthdate'];
$contact=$_POST['contactnumber'];

$sql=mysqli_query($con,"Update `tblnurse` set firstname='$name',surname='$lastname',gender='$gender',idnumber='$ID',birthdate='$DOB' , contactnumber='$contact' where Id='".$_SESSION['id']."'");
if($sql)
{
$msg="Your Profile updated Successfully";
}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nurse | profile Details</title>
		
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
									<h1 class="mainTitle">Nurse | View Profile</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Nurse </span>
									</li>
									<li class="active">
										<span>View Profile Details</span>
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
													<h5 class="panel-title">Edit|View Profile</h5>
												</div>
												<div class="panel-body">
									<?php 
                   $sql=mysqli_query($con,"select * from `tblnurse`  where Id='".$_SESSION['id']."'");
                    while($data=mysqli_fetch_array($sql))
                    { 

                    
                    ?>
                    <p><b>First Name: </b><?php echo htmlentities($data['firstname']);?></p>
                      <p><b>Last Name: </b><?php echo htmlentities($data['surname']);?></p>
                      <p><b>Gender: </b><?php echo htmlentities($data['gender']);?></p>
                      <p><b>ID Number: </b><?php echo htmlentities($data['idnumber']);?></p>
                      <p><b>Date Of Birth: </b><?php echo htmlentities($data['birthdate']);?></p>
                      <p><b>Contact Number: </b><?php echo htmlentities($data['contactnumber']);?></p>
 
                        
                      <hr />
									<form role="form" name="edit" method="post">
                    <div class="form-group">
											<label for="firstname">First Name</label>
	                      <input type="text" name="firstname" class="form-control" value="<?php echo htmlentities($data['firstname']);?>" >
												</div>
												<div class="form-group">
						               <label for="surname"> Last Name </label>
					                   <input type="texr" name="surname" class="form-control"   value="<?php echo htmlentities($data['surname']);?>">
													</div>
                                                    <div class="form-group">
									         <label for="gender">Gender</label>
                           <select name="gender" class="form-control" required="required" >
                             <option selected value="<?php echo htmlentities($data['gender']);?>"><?php echo htmlentities($data['gender']);?></option>
                             <option value="Male">Male</option>	
                             <option value="Female">Female</option>	
                           </select>
                                                    </div>
													<div class="form-group">
						               <label for="idnumber">ID Number</label>
					                   <input type="number" name="idnumber" class="form-control"    value="<?php echo htmlentities($data['idnumber']);?>">
					                    
													</div>
                          <div class="form-group">
															<label for="birthdate">D.O.B</label>
		                           <input type="date" name="birthdate" class="form-control"  required="required"  value="<?php echo htmlentities($data['birthdate']);?>" >
													</div>
                                                    <div class="form-group">
															<label for="contactnumber">Contact Number</label>
		                           <input type="number" name="contactnumber" class="form-control"  required="required"  value="<?php echo htmlentities($data['contactnumber']);?>" >
													</div>
	                        
                          
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
													<?php } ?>
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
