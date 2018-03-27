<?php
/**
 * Simple cURL request script
 *
 * Test if cURL is available, send request, print response
 *
 *   php curl.php
 */
//Pg Connection
  $pg_host = "172.23.178.145"; 
  $pg_user = "monitoring_apps"; 
  $pg_pass = "monitoring_apps"; 
  $pg_port = "7755";
  $pg_db = "mdsa_test";
  echo "before create connection </br>"; 
  $pg_con = pg_connect ("host=$pg_host port=$pg_port dbname=$pg_db user=$pg_user password=$pg_pass"); 
  echo "After connection is created </br>"; 

  $resultset=pg_query($pg_con,"SELECT subscriber_fk FROM public.tbl_decisioning2");

  while($row=pg_fetch_array($resultset,0, PGSQL_NUM)){

if(!function_exists('curl_init')) {
	die('cURL not available!');
}
/*$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://carhirenairobi.com'); // or use https://requestb.in/ for testing purposes
curl_setopt($curl, CURLOPT_FAILONERROR, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);*/

//$output = curl_exec($curl);
$output=$row[0];
echo $output."<br>";
/*if ($output === FALSE) {
	echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
}
else {
	//echo $output;
}*/
}