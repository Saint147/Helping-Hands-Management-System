<?php
session_start();
error_reporting(0);
include('includes/connection.php');
$success=0;
$user = 0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    //include 'connection.php';
    $username=$_POST['username'];
    $useremail=$_POST['email'];
    $password=$_POST['password'];
    $userType=$_POST['userType'];
    $status=$_POST['status'];

   $sql="Select * from `tbluuser` where username='$username'";

     $result=mysqli_query($con,$sql);
     if($result){
       $num=mysqli_num_rows($result);
        if($num>0){
           //echo "User already exist";
           $user = 1;
        }else{
              $sql="insert into `tbluuser` (username,email,password,userType,status) values('$username','$useremail','$password','$userType','$status')";
               $result=mysqli_query($con,$sql);
           if($result){
            //echo "Registered Successfully";
            $success =1;
            header("Location:manageuser.php");
          }else{
            die(mysqli_error($con));
         }
       }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Office Admin | Add User</title>
		
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
									<h1 class="mainTitle">Office  Admin | Add User</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Office</span>
									</li>
									<li class="active">
										<span>Add User</span>
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
													<h5 class="panel-title">Fill in form below to add user</h5>
												</div>
												<div class="panel-body">  <hr />
									<form role="form" action="adduser.php" method="post">
										<div class="form-group">
						                 <label for="username">User Name</label>
					                     <input type="text" name="username" class="form-control" >
									    </div>
										<div class="form-group">
						                 <label for="email">Email</label>
					                     <input type="email" name="email" class="form-control">
									    </div>
                                        <div class="form-group">
						                 <label for="password">Password</label>
					                     <input type="password" name="password" class="form-control">
</div>
										
<div class="form-group">
									      <label for="userType">Role</label>
                                        <select name="userType" class="form-control" required="required" >
                                           <option selected disabled value="Inactive"></option>
                                            <option value="patient">Patient</option>
                                            <option value="nurse">Nurse</option>     	
                                       </select>
                        	           </div>
                                       <div class="form-group">
									      <label for="status">Status</label>
                                        <select name="status" class="form-control" required="required" >
                                           <option selected disabled value="Inactive"></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>      	
                                       </select>
                        	           </div>
	                                
                                    <button type="submit" name="submit" class="btn btn-o btn-primary">Add User</button>
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
