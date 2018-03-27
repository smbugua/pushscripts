<?php
//Mysql Connection
$host='localhost';
$db='test';
$user='root';
$password='';
$con=mysqli_connect("$host","$user","$password","$db");
//Pg Connection
  $pg_host = "localhost"; 
  $pg_user = "postgres"; 
  $pg_pass = ""; 
  $pg_port = "5432";
  $pg_db = "test";
  $market='SWAZI'; 
  echo "before create connection </br>"; 
  $pg_con = pg_connect ("host=$pg_host port=$pg_port dbname=$pg_db user=$pg_user password=$pg_pass"); 
  echo "After connection is created </br>"; 

    pg_query($pg_con,"TRUNCATE TABLE public.tbl_xmldata");

  //CLEANNUP
  echo "Cleanup in progress <br>";
  echo "MySQL Data Cleanup .....";
  //TRUNCATE MYSQL
mysqli_query($con,"TRUNCATE TABLE `$market.vals`");

  echo "PSQL Data Cleanup .....";
    pg_query($pg_con,"TRUNCATE TABLE public.tbl_xmldata");
  echo " .Success ! <br>";
    echo "<script>location.replace('index.php')</script>";

?>