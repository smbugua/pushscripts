<?php
//Pg Connection
  $pg_host = "172.23.178.145"; 
  $pg_user = "monitoring_apps"; 
  $pg_pass = "monitoring_apps"; 
  $pg_port = "7755";
  $pg_db = "mdsa_test";
  echo "before create connection </br>"; 
  $pg_con = pg_connect ("host=$pg_host port=$pg_port dbname=$pg_db user=$pg_user password=$pg_pass"); 
  echo "After connection is created </br>"; 

  $resultset=pg_query($pg_con,"SELECT td2.subscriber_fk FROM public.tbl_decisioning2 td2 WHERE td2.subscriber_fk NOT IN(SELECT subscriberno FROM tbl_xmldata where subscriberno is not null ) LIMIT 2");

  while($row=pg_fetch_array($resultset,null, PGSQL_ASSOC)){

$no=$row['subscriber_fk'];
echo $no."<br>";
$data='<?xml version="1.0" encoding="utf-8"?>
<methodResponse>
<params>
<param>
<value>
<struct>
<member>
<name>accountValue1</name>
<value><string>3</string></value>
</member>
<member>
<name>creditClearanceDate</name>
<value><dateTime.iso8601>20211019T12:00:00+0000</dateTime.iso8601></value>
</member>
<member>
<name>currency1</name>
<value><string>KES</string></value>
</member>
<member>
<name>dedicatedAccountInformation</name>
<value>
<array>
<data>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>1</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>2</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>4</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>5</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>6</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>7</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>9</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>10</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>1000</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>20180328T12:00:00+0000</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>100</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>99991231T00:00:00+1200</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>229</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>20190926T12:00:00+0000</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>230</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>20190529T12:00:00+0000</dateTime.iso8601></value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>dedicatedAccountID</name>
<value><i4>231</i4></value>
</member>
<member>
<name>dedicatedAccountValue1</name>
<value><string>0</string></value>
</member>
<member>
<name>expiryDate</name>
<value><dateTime.iso8601>20190528T12:00:00+0000</dateTime.iso8601></value>
</member>
</struct>
</value>
</data>
</array>
</value>
</member>
<member>
<name>languageIDCurrent</name>
<value><i4>1</i4></value>
</member>
<member>
<name>originTransactionID</name>
<value><string>2704750469498169163</string></value>
</member>
<member>
<name>responseCode</name>
<value><i4>0</i4></value>
</member>
<member>
<name>serviceClassCurrent</name>
<value><i4>2</i4></value>
</member>
<member>
<name>serviceFeeExpiryDate</name>
<value><dateTime.iso8601>20181231T12:00:00+0000</dateTime.iso8601></value>
</member>
<member>
<name>serviceRemovalDate</name>
<value><dateTime.iso8601>20211019T12:00:00+0000</dateTime.iso8601></value>
</member>
<member>
<name>supervisionExpiryDate</name>
<value><dateTime.iso8601>20181231T12:00:00+0000</dateTime.iso8601></value>
</member>
</struct>
</value>
</param>
</params>
</methodResponse>';

        //convert the XML result into a file
        $xml=simplexml_load_string($data);
         $fp = fopen('data.xml', 'w');
fwrite($fp, $data);
fclose($fp);
//post to staging db on local
$host='localhost';
$db='test';
$user='root';
$password='';
$market='KE';//SWAZI OR CAME
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
echo "'success'</script>";
   //echo "<script>location.replace('postgres.php')</script>";

}
 
}

        ?>