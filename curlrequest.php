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

  $resultset=pg_query($pg_con,"SELECT subscriber_fk FROM public.tbl_decisioning2 LIMIT 2");

  while($row=pg_fetch_array($resultset,null, PGSQL_ASSOC)){

$no=$row['subscriber_fk'];
echo $no."<br>";
$input_xml='<?xml version=\'1.0\' encoding=\'UTF-8\'?><methodCall><methodName>GetBalanceAndDate</methodName><params><param><value><struct><member><name>originNodeType</name><value><string>EXT</string></value></member><member><name>originHostName</name><value><string>mdsar</string></value></member><member><name>originTransactionID</name><value><string>2704750469498169163</string></value></member><member><name>originTimeStamp</name><value><dateTime.iso8601>20180322T12:33:17+0300</dateTime.iso8601></value></member><member><name>subscriberNumber</name><value><string>254'.$no.'</string></value></member><member><name>subscriberNumberNAI</name><value><i4>1</i4></value></member></struct></value></param></params></methodCall>';

  $url = "http://172.30.16.42:10010/Air";

        //setting the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
    'Host: 172.30.16.42:10010',
    'Content-Type: text/xml',
    'User-Agent: MDSALS/3.1/2.0',
    'Authorization: Basic S09QQUNSRURPOktPUEFDUkVETw=='
);
	curl_setopt ($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_POST, 1);
// Following line is compulsary to add as it is:
        curl_setopt($ch, CURLOPT_POSTFIELDS,"xmlRequest=".$input_xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        echo curl_errno($ch);
echo curl_error($ch);
        curl_close($ch);

        //convert the XML result into array
        $array_data = json_decode(json_encode(simplexml_load_string($data)), true);

        print_r('<pre>');
        print_r($array_data);
        print_r('</pre>');
  $fp = fopen($no.'data.xml', 'w');

fwrite($fp, $data);
fclose($fp);
}
        ?>