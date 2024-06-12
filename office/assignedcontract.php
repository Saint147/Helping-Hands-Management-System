<?php
session_start();
error_reporting(0);
include('includes/connection.php');
//include('include/verify.php');
//check_login();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Office Admin | Assigned | Contracts</title>
		
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
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Office Admin | Contracts</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Office Admin</span>
</li>
<li class="active">
<span>Assigned Contract List</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"> <span class="text-bold">Assigned Contracts List</span></h5>
<?php include('includes/filter1.php');?>
<table class="table table-hover" id="myTable">
<thead>
<tr>
<!-- <th class="center">#</th> -->
<th>Date</th>
<th>Address Line 1</th>
<th>Address Line 2</th>
<th>Suburb</th>
<th>Wound Description</th>
<th>Start Care</th>
<th>End Care</th>
<th>Patient</th>
<th>Nurse</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
//include('connection.php');
$sql="select * from `tblcarecontract` join  `tblnurse` on tblcarecontract.nurseId=tblnurse.nurseId  join `tblsuburbs` on tblcarecontract.suburbId=tblsuburbs.suburbId join `tblpatients` on tblcarecontract.patientId=tblpatients.patientId where statuss='Assigned' ";
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
<!-- <td class="center"><?php echo $cnt;?>.</td> -->
<td class="hidden-xs"><?php echo $row['date'];?></td>
<td><?php echo $row['addressLine1'];?></td>
<td><?php echo $row['addressLine2'];?></td>
<td><?php echo $row['suburb'];?></td>
<td><?php echo $row['woundDescr'];?></td>
<td><?php echo $row['startCareDate'];?></td>
<td><?php echo $row['endCareDate'];?></td>
<td><?php echo $row['firstName'];?></td>
<td><?php echo $row['firstname'];?></td>
<td><?php echo $row['statuss'];?></td>
</td>
<td>

<a href="viewuser.php?viewid=<?php echo $row['Id'];?>"><i class="fa fa-eye"></i></a>
<a href="edituser.php?viewid=<?php echo $row['Id'];?>"><i class="fa fa-pencil"></i></a>
<a href="deleteuser.php?viewid=<?php echo $row['Id'];?>"><i class="fa fa-trash"></i></a>

</td>
</tr>

<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
<p >Total Contracts Assigned: <?php 
echo $cnt-1;
 ?></p>
<?php include('includes/filter.php');?>
</div>
</div>
</div>
</div>
</div>
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
		</script>
		<script>
			
			$(document).ready(function(){
			  $("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
				  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
				$('#myTable').DataTable();
			  $('.dataTables_length').addClass('bs-select');
			  });
			  $('[data-toggle="tooltip"]').tooltip(); 
			});
			getPagination('#myTable');
			function getPagination(table) {
			  var lastPage = 1;
			
			  $('#maxRows')
				.on('change', function(evt) {
				  //$('.paginationprev').html('');						// reset pagination
			
				 lastPage = 1;
				  $('.pagination')
					.find('li')
					.slice(1, -1)
					.remove();
				  var trnum = 0; // reset tr counter
				  var maxRows = parseInt($(this).val()); // get Max Rows from select option
			
				  if (maxRows == 5000) {
					$('.pagination').hide();
				  } else {
					$('.pagination').show();
				  }
			
				  var totalRows = $(table + ' tbody tr').length; // numbers of rows
				  $(table + ' tr:gt(0)').each(function() {
					// each TR in  table and not the header
					trnum++; // Start Counter
					if (trnum > maxRows) {
					  // if tr number gt maxRows
			
					  $(this).hide(); // fade it out
					}
					if (trnum <= maxRows) {
					  $(this).show();
					} // else fade in Important in case if it ..
				  }); //  was fade out to fade it in
				  if (totalRows > maxRows) {
					// if tr total rows gt max rows option
					var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
					//	numbers of pages
					for (var i = 1; i <= pagenum; ) {
					  // for each page append pagination li
					  $('.pagination #prev')
						.before(
						  '<li data-page="' +
							i +
							'">\
											  <span>' +
							i++ +
							'<span class="sr-only">(current)</span></span>\
											</li>'
						)
						.show();
					} // end for i
				  } // end if row count > max rows
				  $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
				  $('.pagination li').on('click', function(evt) {
					// on click each page
					evt.stopImmediatePropagation();
					evt.preventDefault();
					var pageNum = $(this).attr('data-page'); // get it's number
			
					var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option
			
					if (pageNum == 'prev') {
					  if (lastPage == 1) {
						return;
					  }
					  pageNum = --lastPage;
					}
					if (pageNum == 'next') {
					  if (lastPage == $('.pagination li').length - 2) {
						return;
					  }
					  pageNum = ++lastPage;
					}
			
					lastPage = pageNum;
					var trIndex = 0; // reset tr counter
					$('.pagination li').removeClass('active'); // remove active class from all li
					$('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
					// $(this).addClass('active');					// add active class to the clicked
					  limitPagging();
					$(table + ' tr:gt(0)').each(function() {
					  // each tr in table not the header
					  trIndex++; // tr index counter
					  // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
					  if (
						trIndex > maxRows * pageNum ||
						trIndex <= maxRows * pageNum - maxRows
					  ) {
						$(this).hide();
					  } else {
						$(this).show();
					  } //else fade in
					}); // end of for each tr in table
				  }); // end of on click pagination list
				  limitPagging();
				})
				.val(5)
				.change();
			
			  // end of on select change
			
			  // END OF PAGINATION
			}
			
			function limitPagging(){
				// alert($('.pagination li').length)
			
				if($('.pagination li').length > 7 ){
						if( $('.pagination li.active').attr('data-page') <= 3 ){
						$('.pagination li:gt(5)').hide();
						$('.pagination li:lt(5)').show();
						$('.pagination [data-page="next"]').show();
					}if ($('.pagination li.active').attr('data-page') > 3){
						$('.pagination li:gt(0)').hide();
						$('.pagination [data-page="next"]').show();
						for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
							$('.pagination [data-page="'+i+'"]').show();
			
						}
			
					}
				}
			}
			
			$(function() {
			  // Just to append id number for each row
			  $('table tr:eq(0)').prepend('<th> ID </th>');
			
			  var id = 0;
			
			  $('table tr:gt(0)').each(function() {
				id++;
				$(this).prepend('<td>' + id + '</td>');
			  });
			});
			
			</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php  ?>
