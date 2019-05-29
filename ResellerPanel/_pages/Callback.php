<?php
print_R($_REQUEST);
if ($_POST['ResCode'] == '0') {
	//--پرداخت در بانک باموفقیت بوده
	include_once('../lib/nusoap.php');
	$client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
	$namespace='http://interfaces.core.sw.bps.com/';

	$terminalId				= "630837";					// Terminal ID
	$userName				= "lord";					// Username
	$userPassword			= "51659";					// Password
	$orderId 				= $_POST['SaleOrderId'];		// Order ID
	
	$verifySaleOrderId 		= $_POST['SaleOrderId'];
	$verifySaleReferenceId 	= $_POST['SaleReferenceId'];
			
	$parameters = array(
		'terminalId' => $terminalId,
		'userName' => $userName,
		'userPassword' => $userPassword,
		'orderId' => $orderId,
		'saleOrderId' => $verifySaleOrderId,
		'saleReferenceId' => $verifySaleReferenceId);
	// Call the SOAP method
	$result = $client->call('bpVerifyRequest', $parameters, $namespace);
	if($result == 0) {
		//-- وریفای به درستی انجام شد٬ درخواست واریز وجه
		// Call the SOAP method
		$result = $client->call('bpSettleRequest', $parameters, $namespace);
		if($result == 0) {
			//-- تمام مراحل پرداخت به درستی انجام شد.
			//-- آماده کردن خروجی
			//echo 'The transaction was successful';
			
			$Q = "UPDATE pay_info SET result = 1, date = ".time().", refid = '".$_POST['RefId']."', salerefid = '".$verifySaleReferenceId."' WHERE order_id = " . $orderId ;
	        if ($conn->exec( $Q ))
	            header( "Location: ./index.php?Page=War-Gun-Rep-App&SuccessfulPayment" );
	        
		} else {
			//-- در درخواست واریز وجه مشکل به وجود آمد. درخواست بازگشت وجه داده شود.
			$client->call('bpReversalRequest', $parameters, $namespace);			
			header( "Location: ./index.php?Page=War-Gun-Rep-UnApp&UnsuccessfulPayment" );
		}
	} else {
		//-- وریفای به مشکل خورد٬ نمایش پیغام خطا و بازگشت زدن مبلغ
		$client->call('bpReversalRequest', $parameters, $namespace);
		header( "Location: ./index.php?Page=War-Gun-Rep-UnApp&UnsuccessfulPayment" );
	}
} else {
	//-- پرداخت با خطا همراه بوده
	header( "Location: ./index.php?Page=War-Gun-Rep-UnApp&UnsuccessfulPayment" );
}
?>