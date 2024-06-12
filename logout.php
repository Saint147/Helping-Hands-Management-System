<?php
session_start();
error_reporting(0);
include('connection.php');
$_SESSION['login']=="";


session_unset();
$_SESSION['errmsg']="You have successfully logout";
$msg="You have successfully logout";
//session_destroy();
//$_SESSION['errmsg']="You have successfully logout";
//msg="You have successfully logout";

?>
<script language="javascript">
document.location="./login.php";
</script>
