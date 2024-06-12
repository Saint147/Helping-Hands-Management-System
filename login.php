
<?php
session_start();
error_reporting(0);
include('connection.php');
  
                           
if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $username=$_POST['username'];
    $password=$_POST['password'];

//     $sql="insert into `tbluuser` (username,password,userType,status) values('$username','$password','$userType','$status')";
//     $result=mysqli_query($con,$sql);
//  if($result){
//   echo "Registered Successfully";
//  }else{
//    die(mysqli_error($con));
//  }

   $sql="Select * from `tbluuser` where username='$username' and password='$password'";

     $result=mysqli_query($con,$sql);
     if($result){
       $num=mysqli_num_rows($result);
        if($num>0){
			$row = $result->fetch_assoc();
             $role = $row["userType"];
			$_SESSION['login']=$_POST['username'];
            $_SESSION['id']=$row['Id'];
           

			switch ($role) {
				case "patient":
					$_SESSION['id']=$row['Id'];
					header("Location:dashboard.php");
					break;
				case "nurse":
					$_SESSION['id']=$row['Id'];
					header("Location:nurse/dashboard.php");
					break;
				case "admin":
					     $_SESSION['id']=$row['Id'];
					header("Location:admin/dashboard.php");
					break;
					case "officeAdmin":
						$_SESSION['id']=$row['Id'];
                        $_SESSION['errmsg']="Invalid username or password";
						header("Location:office/dashboard.php");
						break;
				default:
                $_SESSION['errmsg']="Invalid username or password";
				header("Location:login.php");
                {
                    $_SESSION['errmsg']="Invalid username or password";

                }
               
                
               
			}
            
        }else{
            $_SESSION['errmsg']="Invalid username or password";
            $msg="Invalid username or password";
            header("Location:login.php");
            $_SESSION['errmsg']="Invalid username or password";}
    
    }else{
        $_SESSION['errmsg']="Invalid username or password";
        header("Location:login.php");;
        $_SESSION['errmsg']="Invalid username or password";

    }
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-Login</title>
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
     <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	</head>
	<header id="menu-jk">
    
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3  col-sm-12" style="color:#000;font-weight:bold; font-size:42px; margin-top: 1% !important;">
                    <a href="index.php"><img src="assets/images/Logo2.jpg" size="45" /></a>
                       <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-10 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#services">Our Services</a></li>
                            <li><a href="#about_us">About Us</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact_us">Contact Us</a></li>
                            <li><a href="register.php">Register</a></li> 
                            <li><a href="login.php">Login</a></li>  
                        </ul>
                    </div>
                    
                </div>

            </div>
        </div>
    </header>
    
	<body>
	<?php 
    if($user)
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>My apologies! </strong>  User already exist.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    ?>
    <legend class="text-center">Sign in to your account</legend>
    <p align="center" style="color:red" > Mandatory fields marked with asteriks (*) </p>
    <p align="center">
		Please enter your name and password to log in.<br />
		<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
	</p>
    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">
        <h5 style="color: red; font-size:18px; ">
								
                     <?php if($msg) { echo htmlentities($msg);}?>
								 </h5>
            <div  class="col-sm-12 cop-ck">
                <form method="post">
                    <div class="row cf-ro">
                        <div  class="col-sm-3"><label>User Name : <span style="color:red" align="inline"> *</span></label></div>
                        <div class="col-sm-8"><input type="text" placeholder="Enter User Name" name="username" class="form-control input-sm" required ></div>
                    </div>
    
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label>Password: <span style="color:red" align="inline"> *</span></label></div>
                        <div class="col-sm-8"><input type="password" name="password" placeholder="Enter Password" class="form-control input-sm" required >	<i class="fa fa-lock"></i><a href="forgot.php">Forgot Password?</a></div>
					
                    </div>
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label></label></div>
                        
                        <div class="col-sm-8">
                         <button class="btn btn-success btn-sm right" type="submit" name="submit" >Login</button>
                        </div>
                </div>
               
            </form>
            <div class="row cf-ro">
               <div  class="col-sm-3"><label></label></div>

								Don't have an account?
								<a class="col-sm-2" href="register.php">
									 <button class="btn btn-success btn-sm" >Register</button>
								</a>
							</div>
            </div>
     
        </div>
    </section>
    
    
   <!-- ################# Footer Starts Here#######################--->


   <footer class="footer">
        <div class="container">
            <div class="row">
       
                <div class="col-md-6 col-sm-12">
                    <h2>Useful Links</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about" href="#about">About us</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="#services">Services</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="products" href="login.php">Login</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="gallery" href="#gallery">Gallery</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="contact" href="#contact">Contact us</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 map-img">
                    <h2>Contact Us</h2>
                    <address class="md-margin-bottom-40">

<?php
$sql=mysqli_query($con,"select * from tblpage where pagetype='contactus' ");
while ($row=mysqli_fetch_array($sql)) {
?>


                        <?php  echo $row['description'];?> <br>
                        Phone: <?php  echo $row['mobileno'];?> <br>
                        Email: <a href="mailto:<?php  echo $row['email'];?>" class=""><?php  echo $row['email'];?></a><br>
                        Opration Time: <?php  echo $row['tradinghours'];?>
                    </address>

        <?php } ?>





                </div>
            </div>
        </div>
        

    </footer>
    <div class="copy">
            <div class="container">
            Helping Hands Management System
                
     
            </div>

        </div>
    
    </body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="assets/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>

<script src="assets/js/script.js"></script>
<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
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


</html>