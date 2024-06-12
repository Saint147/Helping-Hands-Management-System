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
		<title>Nurse | report | Condition</title>
		
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
<h4 > <?php
date_default_timezone_set("Africa/Johannesburg");
echo "Date: " . date("d:m:y h:i:sa");
;
?>
</h4>
<div class="col-sm-8">
<h1 class="mainTitle">Nurses | Report | Patient Conditions</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Nurse</span>
</li>
<li class="active">
<span>Conditions Per Patient</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<?php
$nur=$_POST['patientId'];


?>
<div>
<h5 class="over-title margin-bottom-15"> <span class="text-bold"><?php
$sqlj=" select * from `tblpatients`  where patientId='$nur'";
$results=mysqli_query($con,$sqlj);
if($results){
	$nums=mysqli_num_rows($results);
   if($nums>0){
      echo 'Chronic Conditions For: ' ;}else{
	echo 'please select nurse';
 }}
 while($row=mysqli_fetch_array($results))
{
?>
<span class="text-bold"><?php echo " ";echo $row['firstName'];echo " ";echo $row['surname'];}?></span></span></h5>
</div>
<table class="table table-hover" id="myTable">
<thead>
<tr>
<th class="center">#</th>
<th>Condition</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<?php
//include('connection.php');
$sql="select * from `tblconditions` join `tblpatientcondtion` on tblpatientcondtion.conditionId=tblconditions.conditionId join `tblpatients` on tblpatientcondtion.patientId=tblpatients.patientId   where tblpatients.patientId='$nur'";
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
<td><?php echo $row['name'];?></td>
<td><?php echo $row['description'];?></td>  
<td>

</td>
</tr>

<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
<p align="right" id="total">Total: <?php 
echo $cnt-1;
 ?></p>
<button id="print">Print</button>
</div>
</div>
</div>
</div>
</div>
</div>
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
		<script>
			
			const printBtn=document.getElementById('print');
			printBtn.addEventListener('click',function(){
				print();
			})
			const currentDate = new Date().toDateString();
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php  ?>
