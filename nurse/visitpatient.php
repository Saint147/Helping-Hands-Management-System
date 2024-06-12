<?php
session_start();
 error_reporting(0);
include('include/connection.php');
$success=0;
$user = 0;
//$id=intval($_GET['id']);// get value
if($_SERVER['REQUEST_METHOD']=='POST'){
    //include 'include/connection.php';
   $id=intval($_GET['id']);// get value

    $aarrivetime=$_POST['arrivaltime'];
    $departure=$_POST['departuretime'];
    $condtioon=$_POST['woundcondition'];
    $note=$_POST['notes'];
	$Idd=$_POST['visitId'];

   $sql=mysqli_query($con,"UPDATE `tblcarevisit`  SET arrivaltime='$aarrivetime',departuretime='$departure',woundcondition='$condtioon',notes='$note' WHERE visitId='$Idd'");
   if($sql)
    {
       $msg="Patient Visit Details Successfully added";
    }else{
        $msg="Something bad happened please check inpuut and try again";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nurse | Visit</title>
		
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
									<h1 class="mainTitle">Nurse |  Visit Patient</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Nurse</span>
									</li>
									<li class="active">
										<span> Visit</span>
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
													<h5 class="panel-title">Fill in form below to for patient care visit</h5>
												</div>
													<p align="center" style="color:red" > Mandatory fields marked with asteriks (*) </p>
												<div class="panel-body">  <hr />
									<form role="form" action="visitpatient.php?id" method="post">
									<div class="form-group">
										<label for="visit">Patient<span style="color:red" align="inline">*</span></label>		
										<a class="btn btn-transparent btn-xs" tooltip-placement="top" data-toggle="tooltip" title="The below selection list consist of patients for the assigned contract,select patients and add care visit upon visiting !"><i class="fa fa-info"></i></a>

							          <select name="visitId" class="form-control" required="true">
											<option value="">Select Patient</option>
                                            <?php $ret=mysqli_query($con,"select * from `tblcarevisit` join `tblcarecontract` on tblcarevisit.contractId=tblcarecontract.contractId join `tblnurse` on tblcarecontract.nurseId=tblnurse.nurseId join `tblpatients` on tblpatients.patientId=tblcarecontract.patientId where tblnurse.Id='".$_SESSION['id']."' and tblcarevisit.visitdate>=CURRENT_DATE()");
                                                while($row=mysqli_fetch_array($ret))
                                                 {
                                                   ?>
	                                             <option value="<?php echo htmlentities($row['visitId']);?>">
																	<?php echo htmlentities($row['firstName']); echo " ";echo htmlentities($row['surname']); echo" ";echo"-";echo htmlentities($row['visitdate']); ?>
																</option>
																<?php } ?>
																
										</select>								
                                    </div>
										<div class="form-group">
						                 <label for="arrivaltime">Arrival Time <span style="color:red" align="inline">*</span></label>
					                     <input type="time" name="arrivaltime" class="form-control">
									    </div>
                                        <div class="form-group">
						                 <label for="departuretime">Departure Time <span style="color:red" align="inline">*</span></label>
					                     <input type="time" name="departuretime" class="form-control">
									    </div>
                                        <div class="form-group">
						                 <label for="woundcondition">Wound Condition <span style="color:red" align="inline">*</span></label>
					                     <textarea name="woundcondition" class="form-control"></textarea>
									    </div>
                                        <div class="form-group">
						                 <label for="notes">Notes <span style="color:red" align="inline">*</span></label>
					                     <textarea name="notes" class="form-control"></textarea>
									    </div>
                                    
                                    <button type="submit" name="submit" class="btn btn-o btn-primary">Add Visit Details</button>
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
