<?php
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
			echo 'The transaction was successful';
		} else {
			//-- در درخواست واریز وجه مشکل به وجود آمد. درخواست بازگشت وجه داده شود.
			$client->call('bpReversalRequest', $parameters, $namespace);			
			echo 'Error : '. $result;
		}
	} else {
		//-- وریفای به مشکل خورد٬ نمایش پیغام خطا و بازگشت زدن مبلغ
		$client->call('bpReversalRequest', $parameters, $namespace);
		echo 'Error : '. $result;
	}
} else {
	//-- پرداخت با خطا همراه بوده
	echo 'Error : '. $_POST['ResCode'];
}
?>


<body>
    <form id="form1" runat="server">
    <table width="100%" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td>
                <table class="MainTable" cellspacing="5" cellpadding="1" align="center">
                    <tr class="HeaderTr">
                        <td colspan="2" align="center" height="25">
                            <span class="HeaderText">CallBack Params</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="LabelTd">
                            <span>RefId</span>
                        </td>
                        <td>
                            <span><?php echo $_POST['RefId']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="LabelTd">
                            <span>ResCode</span>
                        </td>
                        <td>
                            <span><?php echo $_POST['ResCode']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="LabelTd">
                            <span>SaleOrderId</span>
                        </td>
                        <td>
                            <span><?php echo $_POST['SaleOrderId']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="LabelTd">
                            <span>SaleReferenceId</span>
                        </td>
                        <td>
                            <span><?php echo $_POST['SaleReferenceId']; ?></span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
