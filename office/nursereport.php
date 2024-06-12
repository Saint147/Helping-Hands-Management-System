<?php
session_start();
error_reporting(0);
include('includes/connection.php');
//include('include/verify.php');
//check_login();
date_default_timezone_set("Africa/Johannesburg");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Office Admin | report | Nurses</title>
		
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
	<style>
	
		#total{
			text-align: right;
			font: bold;
			font-size: 1rem;
		}
		#container{
			font-size:1rem;
			background-color: gainsboro;
		}
		@media print{

			#container, #container * {
				display:inline block;
			}
		}
		</style>
	<body>
		<div id="app">		
<?php include('includes/sidebar.php');?>
<div class="app-content">
<?php include('includes/header.php');?>

<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
	<h4 d> <?php
date_default_timezone_set("Africa/Johannesburg");
echo "Date: " . date("d:m:y h:i:sa");
;
?>
</h4>
<div class="col-sm-8">
<h1 class="mainTitle">Office Admin | Report  </h1>
</div>
<ol class="breadcrumb">
<li>
<span>Nurses</span>
</li>
<li class="active">
<span>Preffered Suburbs</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<?php
$nur=$_POST['nurseId'];


?>
<div>
<h5 class="over-title margin-bottom-15"> <span class="text-bold"><?php
$sqlj=" select * from `tblnurse`  where nurseId='$nur'";
$results=mysqli_query($con,$sqlj);
if($results){
	$nums=mysqli_num_rows($results);
   if($nums>0){
      echo 'Preffered Suburbs For: ' ;}else{
	echo 'please select nurse';
 }}
 while($row=mysqli_fetch_array($results))
{
?>
<span class="text-bold"><?php echo " ";echo $row['firstname'];echo " ";echo $row['surname'];}?></span></span></h5>
</div>
<table class="table table-hover" id="myTable">
<thead>
<tr>
<th class="center">#</th>
<th>Suburb</th>
<th>City</th>
<th>Postal Code</th>
</tr>
</thead>
<tbody>
<?php
//include('connection.php');
$sql="select * from `tblsuburbs` join `tblprefferedsuburb` on tblsuburbs.suburbId=tblprefferedsuburb.suburbId join `tblnurse` on tblprefferedsuburb.nurseId=tblnurse.nurseId  join `tblcities` on tblcities.cityId=tblsuburbs.cityId where tblnurse.nurseId='$nur' group by firstname,suburb";
$result=mysqli_query($con,$sql);
if($result){
  $num=mysqli_num_rows($result);
   if($num>0){
	echo 'Retrieved data';
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
<td><?php echo $row['suburb'];?></td>
<td><?php echo $row['cityname'];?></td>
<td><?php echo $row['postalcode'];?></td>

<td>
</td> 
</tr>

<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
<div id="total">Total: <?php 
echo $cnt-1;
 ?></div>
<button id="print">Print</button>
</div>
</div>
</div>
</div>
		<!-- end: FOOTER -->
</div>
</div>
<!-- start: FOOTER -->
<?php include('includes/footer.php');?>
	
</div>
	
</div>
		
		
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
