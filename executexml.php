<?php
ini_set('display_errors', 1);
$host='localhost';
$db='test';
$user='root';
$password='';
$market='SWAZI';//SWAZI OR CAME
$con=mysqli_connect("$host","$user","$password","$db");
mysqli_query($con,"DROP TABLE IF EXISTS `$market.vals`;");
mysqli_query($con,"CREATE TABLE `$market.vals`(id int(11) NOT NULL,name varchar(200) NOT NULL,value varchar(200) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
mysqli_query($con,"ALTER TABLE `$market.vals`ADD PRIMARY KEY (id);");
mysqli_query($con,"ALTER TABLE `$market.vals` MODIFY id int(11) NOT NULL AUTO_INCREMENT;");
libxml_use_internal_errors(true);
if (!mysqlI_query($con,"LOAD XML LOCAL INFILE 'data.xml' INTO TABLE `$market.vals` ROWS IDENTIFIED BY '<member>'")) {

    echo "<script>location.replace('index.php')</script>";
echo "<script>alert('Failed Import !')</script>";
}elseif (mysqlI_query($con,"LOAD XML LOCAL INFILE 'data.xml' INTO TABLE `$market.vals` ROWS IDENTIFIED BY '<member>'")) {
echo "<script>alert('success')</script>";
    echo "<script>location.replace('index.php')</script>";

}

?>
