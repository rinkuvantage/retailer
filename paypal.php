<?php

$title='Test';
$price=10;
$vat=0;
$subprice=10;

$cctype='Visa';
$cc_number='4929351672811558';
$cc_code='000';
$cc_month='12';
$cc_year='2019';
$exp=$cc_month.$cc_year;

$fname='test';
$lname='lname';
$email='rinku.vantage@gmail.com';



$currency='USD';
		
$data = array();
$data['USER'] 					= 'vantag_1298611446_biz_api1.gmail.com';
$data['PWD'] 					= '1298611473';
$data['SIGNATURE']				= 'A5HlwsoFpv0ojUVtaGgViD.DWQSyAEOsNSGaF6JR4phQU6vSwRTug86J';		

$data['VERSION']				= "52.0";
$data['METHOD']					= "DoDirectPayment";
$data['PAYMENTACTION']			= "Sale";
$data['IPADDRESS']				= $_SERVER["REMOTE_ADDR"];
$data['RETURNFMFDETAILS']		= "1"; // optional - return fraud management filter data

$data['CURRENCYCODE'] = $currency;

$data['FIRSTNAME']	= $fname;

$data['LASTNAME']	=$lname;

$data['EMAIL']	= $email;





$data['CREDITCARDTYPE'] = $cctype;
$data['ACCT']			= $cc_number;
$data['EXPDATE']		= $cc_month.$cc_year;
$data['CVV2']			= $cc_code;

$data['AMT']			= number_format($price,2);

$transaction = "";
foreach($data as $key => $value) {
	if (is_array($value)) {
		foreach($value as $item) {
			if (strlen($transaction) > 0) $transaction .= "&";
			$transaction .= "$key=".urlencode($item);
		}
	} else {
		if (strlen($transaction) > 0) $transaction .= "&";
		$transaction .= "$key=".urlencode($value);
	}
}
//exit($transaction);
$response = send($transaction);
echo('<pre>'.print_r($response, true).'</pre><pre>'.print_r($data, true).'</pre>');


function send ($transaction) {
	$connection = curl_init();
	
	curl_setopt($connection,CURLOPT_URL,"https://api-3t.sandbox.paypal.com/nvp"); // Sandbox testing
	//curl_setopt($connection,CURLOPT_URL,"https://api-3t.paypal.com/nvp"); // Live
	$useragent = 'Musicality';
	curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($connection, CURLOPT_NOPROGRESS, 1); 
	curl_setopt($connection, CURLOPT_VERBOSE, 1); 
	curl_setopt($connection, CURLOPT_FOLLOWLOCATION,0); 
	curl_setopt($connection, CURLOPT_POST, 1); 
	curl_setopt($connection, CURLOPT_POSTFIELDS, $transaction); 
	curl_setopt($connection, CURLOPT_TIMEOUT, 30); 
	curl_setopt($connection, CURLOPT_USERAGENT, $useragent); 
	curl_setopt($connection, CURLOPT_REFERER, "https://".$_SERVER['SERVER_NAME']); 
	curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
	$buffer = curl_exec($connection);
	curl_close($connection);
	//echo $buffer;
	$Response = response($buffer);
	print_r($Response);
	return $Response;
}
function response ($buffer) {
	$_ = new stdClass();
	$r = array();
	$pairs = split("&",$buffer);
	foreach($pairs as $pair) {
		list($key,$value) = split("=",$pair);
		
		if (preg_match("/(\w*?)(\d+)/",$key,$matches)) {
			if (!isset($r[$matches[1]])) $r[$matches[1]] = array();
			$r[$matches[1]][$matches[2]] = urldecode($value);
		} else $r[$key] = urldecode($value);
	}
	$_->ack = $r['ACK'];
	$_->errorcodes = $r['L_ERRORCODE'];
	$_->shorterror = $r['L_SHORTMESSAGE'];
	$_->longerror = $r['L_LONGMESSAGE'];
	$_->severity = $r['L_SEVERITYCODE'];
	$_->timestamp = $r['TIMESTAMP'];
	$_->correlationid = $r['CORRELATIONID'];
	$_->version = $r['VERSION'];
	$_->build = $r['BUILD'];
	
	$_->transactionid = $r['TRANSACTIONID'];
	$_->amt = $r['AMT'];
	$_->avscode = $r['AVSCODE'];
	$_->cvv2match = $r['CVV2MATCH'];

	return $_;
}


?>