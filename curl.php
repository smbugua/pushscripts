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

  while($row=pg_fetch_array($resultset,null, PGSQL_ASSOC)){

$no=$row['subscriber_fk'];
echo $no."<br>";
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "curl -verbose -i -X POST 'http://172.30.16.42:10010/Air' --data '<?xml version='1.0' encoding='UTF-8'?><methodCall><methodName>GetBalanceAndDate</methodName><params><param><value><struct><member><name>originNodeType</name><value><string>EXT</string></value></member><member><name>originHostName</name><value><string>mdsar</string></value></member><member><name>originTransactionID</name><value><string>2704750469498169163</string></value></member><member><name>originTimeStamp</name><value><dateTime.iso8601>20180322T12:33:17+0300</dateTime.iso8601></value></member><member><name>subscriberNumber</name><value><string>254731977834</string></value></member><member><name>subscriberNumberNAI</name><value><i4>1</i4></value></member></struct></value></param></params></methodCall>' -H 'Content-Type: text/xml'  -H 'User-Agent: MDSALS/3.1/2.0' -H 'Authorization: Basic S09QQUNSRURPOktPUEFDUkVETw==' -H 'Host: 172.30.16.42:10010' "); // or use https://requestb.in/ for testing purposes

//curl_setopt($curl, CURLOPT_URL, "http://google.com"); 
curl_setopt($curl, CURLOPT_FAILONERROR, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output=curl_exec($curl);
// close cURL resource, and free up system resources
curl_close($curl);
$fp = fopen($no.'data.xml', 'w');
fwrite($fp, $output);
fclose($fp);

}

