<?php
/*
@Author Mbugua
This script will do the following
------Check data dumped into mysql from xml file
------Connec to the data on mysql and post the data to ppostgres on the   required environment
------Backup the table on mysql to a deprecated state
*/
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
  //get data from mysql 
  $result=mysqli_query($con,"SELECT name ,value FROM `$market.vals` where name = 'accountValue1'  order by id asc ");
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    //query to fetch the subscriberfk
    $sub_query=mysqli_query($con,"SELECT value FROM `$market.vals` where name='subscriberNumber'");
    $number_result=mysqli_fetch_array($sub_query,MYSQLI_ASSOC);
    $no=$number_result['value'];
    //cast values
    $name=$row['name'];
    $value=$row['value'];
    pg_query($pg_con,"INSERT into public.tbl_xmldata(subscriberfk,name,value,datestamp)values($no,'$name','$value',now())");

  }
  //CLEANNUP
  echo "Cleanup in progress <br>";
  echo "MySQL Data Cleanup .....";
  //TRUNCATE MYSQL
  //mysqli_query($con,"TRUNCATE TABLE `$market.vals`");
    echo "<script>location.replace('index.php')</script>";
  echo " .Success ! <br>";

?>