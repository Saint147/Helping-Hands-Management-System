<?php
$HOSTNAME = 'localhost';
$USERNAME ='root';
$PASSWORD = '';
$DATABASE = 'hhms';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

