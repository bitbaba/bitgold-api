<?php
$method=$_REQUEST['method'];

$params=$_REQUEST['params'];

$url = 'http://127.0.0.1:30332/';

$header = "content-type: text/plain";

$json_req = '{"jsonrpc": "1.0", "id":"curltest", "method": "'. $method .'", "params": ['. $params .'] }';

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "rpcuser:~secrue");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_req);
$response = curl_exec($ch);
if(curl_errno($ch)){
    print curl_error($ch);
}
curl_close($ch);

echo $response;
?> 
