<?php

if ( isset($_POST['Price']) ) {
include_once('../lib/nusoap.php');

$usid   = $_SESSION['ResID'];
$amount = $_POST['Price'];
$payid = $_POST['OrderId'];

$SqlInsPay = "INSERT INTO pay_info ( user_id , amount , pay_id )
VALUES ( '$usid' , '$amount' , '$payid' )";
$conn->exec($SqlInsPay);
$last_id = $conn->lastInsertId();

$terminalId	 = "630837";					// Terminal ID
$userName	   = "lord";					// Username
$userPassword   = "51659";					// Password
$orderId		= $last_id;		  // Order ID
$amount 		 = $_POST['Price'];			// Price / Rial
$localDate	  = date("Ymd");				// Date
$localTime	  = date("His");				// Time
$additionalData = '';
$callBackUrl	= "http://tehranj.ir/Rifle/ResellerPanel/index.php?Page=Callback";	// Callback URL
$payerId		= 0;

//-- تبديل اطلاعات به آرايه براي ارسال به بانک
$parameters = array(
	'terminalId'		=> $terminalId,
	'userName'		  => $userName,
	'userPassword'	  => $userPassword,
	'orderId'		   => $orderId,
	'amount'			=> $amount,
	'localDate'		 => $localDate,
	'localTime'		 => $localTime,
	'additionalData'	=> $additionalData,
	'callBackUrl'	   => $callBackUrl,
	'payerId'		   => $payerId);

$client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
$namespace='http://interfaces.core.sw.bps.com/';
$result 	= $client->call('bpPayRequest', $parameters, $namespace);
//-- بررسي وجود خطا
if ($client->fault)
{
	//-- نمايش خطا
	echo "There was a problem connecting to Bank";
	exit;
} 
else
{
	$err = $client->getError();
	if ($err)
	{
		//-- نمايش خطا
		echo "Error : ". $err;
		exit;
	} 
	else
	{
		$res 		= explode (',',$result);
		$ResCode 	= $res[0];
		if ($ResCode == "0")
		{
			//-- انتقال به درگاه پرداخت
			echo '<form name="myform" action="https://bpm.shaparak.ir/pgwchannel/startpay.mellat" method="POST">
					<input type="hidden" id="RefId" name="RefId" value="'. $res[1] .'">
				</form>
				<script type="text/javascript">document.myform.submit();</script>';
			exit;
		}
		else
		{
			//-- نمايش خطا
			echo "Error : ". $result;
			exit;
		}
	}
}
}
?>