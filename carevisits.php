<?php
session_start();
error_reporting(0);
include('include/connection.php');
//include('include/verify.php');
//check_login();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient Visits</title>
		
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
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Care Visits|Patient</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient</span>
</li>
<li class="active">
<span>Upcoming visits</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"> <span class="text-bold">Upcoming visits</span></h5>
	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">#</th>
<th>Date</th>
<th>Arrival Time(estimated)</th>
<th>Arrival Time(actual)</th>
<th>Departure Time</th>
<th>Assigned Nurse</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tbody>
<?php
//include('connection.php');
$sql="
SELECT * FROM `tblcarevisit` JOIN `tblcarecontract` ON tblcarecontract.contractId=tblcarevisit.contractId join `tblpatients` on tblpatients.patientId=tblcarecontract.patientId join `tblnurse` on tblcarecontract.nurseId=tblnurse.nurseId   WHERE  tblpatients.Id='".$_SESSION['id']."' and tblcarevisit.visitdate>=CURRENT_DATE()";
$result=mysqli_query($con,$sql);
if($result){
  $num=mysqli_num_rows($result);
   if($num>0){
	echo 'Retrieved Data';
   }
   else{
	echo 'No data to present';
   }
   
}
$cnt=1;
while($row=mysqli_fetch_array($result))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['visitdate'];?></td>
<td><?php echo $row['approxarrival'];?></td>
<td><?php echo $row['arrivaltime'];?></td>
<td><?php echo $row['departuretime'];?></td>
<td><?php echo $row['firstname'];?></td>
</td>
<td>

<a href="viewcarecontract.php?id=<?php echo $row['contractId'];?>" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye" data-toggle="modal" data-target="#exampleModal" ></i></a>

</td>
</tr>


<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
</div>
</div>
</div>
</div>
</div>
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
<?php  ?>
