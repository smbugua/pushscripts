<?php
ini_set('display_errors', 1);
$host='localhost';
$db='drawgift';
$user='root';
$password='';
$con=mysqli_connect("$host","$user","$password","$db");
mysqli_query($con,"UPDATE entries SET raffleno = REPLACE(raffleno, 'GALLERIA-VALS', 'GALLERIA-EASTER') WHERE raffleno LIKE '%GALLERIA-VALS%';");


?>
