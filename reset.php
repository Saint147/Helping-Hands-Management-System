<?php
session_start();
error_reporting(0);
include('connection.php');
 //include('include/verify.php');
//check_login();
$ss=0;
$msg=0;
if(isset($_POST['submit']))
{

$password=$_POST['password1'];


$sql=mysqli_query($con,"Update tbluuser set password='$password' where Id='".$_SESSION['id']."'");
if($sql)
{
$ss=1;
}else{
    $msg=1;

}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-reset password</title>
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
     <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <script type="text/javascript">
function valid()
{
 if(document.reset.password1.value!= document.reset.password2.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.reset.password2.focus();
return false;
}
return true;
}
</script>
	</head>
	<body>
	<?php 
    if($msg>0)
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong></strong>  User already exist.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    if($ss>0)
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Password</strong>  Updated Changed succesfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    ?>
   
    <h2 class="text-center">Reset Password</h2> 
    <div class="col-sm-8">
    <a href="index.php"><button @click="index.php" class="btn btn-success btn-sm" >Back To Home Page<i class="fa fa-home"></i></button></a>
                        </div>
    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">

            <div  class="col-sm-12 cop-ck">
                <form method="post" name="reset" onSubmit="return valid();">
                    <div class="row cf-ro">
                        <div  class="col-sm-3"><label>Password :</label></div>
                        <div class="col-sm-8"><input type="password" placeholder="Enter New Password" name="password1" id="password1" class="form-control input-sm" required ></div>
                    </div>
                    <div class="row cf-ro">
                        <div  class="col-sm-3"><label>Confirm Password :</label></div>
                        <div class="col-sm-8"><input type="password" placeholder="Confirm New Password" name="password2" id="password2" class="form-control input-sm" required ></div>
                    </div>
                     <!-- <div  class="row cf-ro">
                        <div  class="col-sm-3"><label>Email</label></div>
                        <div class="col-sm-8"><input type="password" name="password" placeholder="Enter You Email " class="form-control input-sm" required ></div>
					
                    </div> -->
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label></label></div>
                        
                        <div class="col-sm-8">
                         <button class="btn btn-success btn-sm right" type="submit" name="submit" >Reset Password</button>
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