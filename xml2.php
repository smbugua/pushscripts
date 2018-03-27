<?php
$host='localhost';
$db='test';
$user='root';
$password='';
$con=mysqli_connect("$host","$user","$password","$db");
libxml_use_internal_errors(true);
$myXMLData =
; 
$xml = simplexml_load_string($myXMLData);
$xmlDoc = simplexml_load_file($xml);

if ($xml === false) {
    echo "Failed loading XML: ";
    foreach(libxml_get_errors() as $error) {
        echo "<br>", $error->message;
    }
} else {
    print_r($xml)."</br>";

}
?>