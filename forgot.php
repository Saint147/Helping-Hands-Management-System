
<?php
session_start();
error_reporting(0);
include('connection.php');
$success=0;
$user = 0;
if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $username=$_POST['username'];
    $mail=$_POST['email'];

//     $sql="insert into `tbluuser` (username,password,userType,status) values('$username','$password','$userType','$status')";
//     $result=mysqli_query($con,$sql);
//  if($result){
//   echo "Registered Successfully";
//  }else{
//    die(mysqli_error($con));
//  }

   $sql="Select * from `tbluuser` where username='$username' and password='$mail'";

     $result=mysqli_query($con,$sql);
     if($result){
       $num=mysqli_num_rows($result);
        if($num>0){
			$row = $result->fetch_assoc();
             $role = $row["userType"];
	
            $_SESSION['id']=$row['Id'];

			switch ($role) {
				case "patient":
					
					header("Location:resetp.php");
					break;
				case "nurse":
					$_SESSION['id']=$row['Id'];
					header("Location:nurse/reset.php");
					break;
				case "admin":
					     $_SESSION['id']=$row['Id'];
					header("Location:admin/reset.php");
					break;
					case "officeAdmin":
						$_SESSION['id']=$row['Id'];
						header("Location:office/reset.php");
						break;
				default:
				$_SESSION['msg']="Incorrect credentials provided";
				header("Location:forgot.php");
			}
			//header("Location:dashboard.php");
           //echo "User already exist";
          
        }else{
			$user = 1;
			$_SESSION['errmsg']="Incorrect credentials provided";
			header("Location:forgot.php");
			
              //$sql="insert into `tbluuser` (username,email,password,userType,status) values('$username','$useremail','$password','$userType','$status')";
               $result=mysqli_query($con,$sql);
           if(!$result){
            //echo "Registered Successfully";
            $success =1;
			$_SESSION['login']=$_POST['username'];
            $_SESSION['id']=$row['Id'];
			$_SESSION['errmsg']="Incorrect credentials provided";
            header("Location:forgot.php");
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
		<title>Password|Reset Request</title>
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
     <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	</head>
	<body>
	<?php 
    if($user)
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>My apologies! </strong>  User already exist.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    ?>
   
    <h2 class="text-center">Password Reset Request Page</h2> 
    <div class="col-sm-8">
    <a href="index.php"><button @click="index.php" class="btn btn-success btn-sm" >Back To Home Page<i class="fa fa-home"></i></button></a>
                        </div>
    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">

            <div  class="col-sm-12 cop-ck">
                <form method="Post" action="forgot.php">
                    <div class="row cf-ro">
                        <div  class="col-sm-3"><label>User Name :</label></div>
                        <div class="col-sm-8"><input type="text" placeholder="Enter User Name" name="username" class="form-control input-sm" required ></div>
                    </div>
    
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label>Email</label></div>
                        <div class="col-sm-8"><input type="email" name="password" placeholder="Enter You Email " class="form-control input-sm" required ></div>
					
                    </div>
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label></label></div>
                        
                        <div class="col-sm-8">
                         <button class="btn btn-success btn-sm right"  name="submit" >Request</button>
                        </div>
                </div>
               
            </form>
           
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



</html>