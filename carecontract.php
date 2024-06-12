
<?php 
session_start();
error_reporting(0);
include ('connection.php');
//error_reporting(0);
//include('include/verify.php');
//check_login();
$success=0;
$user = 0;
//$msg="The form below is for a care contract, once submitted care visit will be scheduled!";
if($_SERVER['REQUEST_METHOD']=='POST'){
   // 
    $date=$_POST['date'];
$addressLine1=$_POST['addressLine1'];
$addressLine2=$_POST['addressLine2'];
$woundDescr=$_POST['woundDescr'];
$startCareDate=$_POST['startCareDate'];
$endCareDate=$_POST['endCareDate'];
$status=$_POST['statuss'];
$patID=$_POST['patientId'];
$suburbId=$_POST['suburbId'];


//$id=mysqli_query($con,"select Id from `tbluuser` where Id='".$_SESSION['id']."'");
 


   $sql="Select * from `tblcarecontract` join `tblpatients` on tblcarecontract.patientId=tblpatients.patientId join `tbluuser` on tbluuser.Id=tblpatients.Id where tblpatients.Id='".$_SESSION['id']."' and tblcarecontract.statuss='New' ";

     $result=mysqli_query($con,$sql);
     if($result){
       $num=mysqli_num_rows($result);
        if($num>0){
            $msg="New contract already exist, another can be submitted once new one has been closed or assigned!";
           $user = 1;
        }else{
			 
			  $sqll="insert into `tblcarecontract`(date,addressLine1,addressLine2,suburbId,woundDescr,startCareDate,endCareDate,patientId,nurseId,statuss) values('$date','$addressLine1','$addressLine2','$suburbId','$woundDescr','$startCareDate','$endCareDate','$patID','6','$status')";
               $sub=mysqli_query($con,$sqll);
           if($sub){
            //echo "Registered Successfully";
            $success =1;
		   $msg="Contract Submitted Successfully";
            //header("Location:viewcarecontract.php");
          }else{
			$msg="contract already exist";
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
									<h1 class="mainTitle">Patient | Care Contract</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient</span>
									</li>
									<li class="active">
										<span>Submit Contract</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
                <h5 style="color: red; font-size:18px; ">
								  <!-- Code outputing message if Failed? updated -->
                     <?php if($msg) { echo htmlentities($msg);}
										 else{
											echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hooray! </strong> Contract Submitted Succesfuly.
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
										 }?>
								 </h5>
								
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Fill in care contract form below and submit</h5>
												</div>
												<p align="center" style="color:red" > Mandatory fields marked with asteriks (*) </p>

												<div class="panel-body">  <hr />
									<form role="form" action="carecontract.php" method="post">
                                        <div class="form-group">
											<label for="date">Date</label>
	                                        <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
										</div>
										<div class="form-group">
						                 <label for="addressLine1">Address Line 1 <span style="color:red" align="inline"> *</span></label>
					                     <input type="text" name="addressLine1" class="form-control" value="">
									    </div>
										<div class="form-group">
						                 <label for="addressLine2">Address Line 2</label>
					                     <input type="text" name="addressLine2" class="form-control" value="">
									    </div>
						
														<div class="form-group">
															<label for="exampleInputEmail1">
																Suburb<span style="color:red" align="inline"> *</span>
															</label>
															<select name="suburbId" class="form-control" required="true">
															
															<?php $ret=mysqli_query($con,"select * from `tblsuburbs`");
															while($row=mysqli_fetch_array($ret))
															{
															?>
																<option  value="<?php echo htmlentities($row['suburbId']);?>">
																																<?php echo htmlentities($row['suburb']); ?>
																															</option>
																															<?php } ?>
																				</select>
 

														</div>
											<div></div>
										<div class="form-group">
						                  <label for="woundDescr">Wound Description<span style="color:red" align="inline"> *</span></label>
					                      <textarea  name="woundDescr" class="form-control"  ></textarea>
										</div>
                                        <div hidden class="form-group">
						  				 <label for="startCareDate">Start Care Date</label>
		                                  <input type="date" name="startCareDate" class="form-control"  value="">
										</div>
                                        <div hidden class="form-group">
						  				 <label for="endCareDate">End Care Date</label>
		                                  <input type="date" name="endCareDate" class="form-control"  Value="">
</div>
                                       <div hidden class="form-group">
									      <label for="statuss">Status</label>
                                        <select hidden name="statuss" class="form-control" required="required" >
                                           <option selected  value="New">New</option>
                                         	
                                       </select>
                        	           </div>
									   <div hidden class="form-group">
										<label for="user">
																Patient Name
															</label>
							<select name="patientId" class="form-control" required="true">
															
<?php $ret=mysqli_query($con,"select * from `tblpatients`  join `tbluuser` on tblpatients.Id=tbluuser.Id where tblpatients.Id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($ret))
{
?>
	<option selected value="<?php echo htmlentities($row['patientId']);?>">
																	<?php echo htmlentities($row['firstName']); echo " ";echo htmlentities($row['surname']);?>
																</option>
																<?php } ?>
																
															</select>								
</div>
                                    <button type="submit" name="submit" class="btn btn-o btn-primary">Submit Contract</button>
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
