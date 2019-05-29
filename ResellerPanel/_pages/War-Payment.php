<?php

if ( isset($_POST['Price']) ) {
include_once('../lib/nusoap.php');

$usid   = $_SESSION['ResID'];
$amount = $_POST['Price'];
$payid = $_POST['OrderId'];

	$check = $conn->prepare("SELECT id FROM pay_info WHERE pay_id = ?");
	$check->execute( array( $payid ) );
	
	if ( $check->rowCount( ) == 0 )
	{
		$SqlInsPay = "INSERT INTO pay_info ( user_id , amount , pay_id )
		VALUES ( '$usid' , '$amount' , '$payid' )";
		$conn->exec($SqlInsPay);
		
		$last_id = $conn->lastInsertId().time();
	}
	else
	{
		$f = $check->fetch();
		$last_id = $f['id'].time();
	}
	
	$SqlInsPay = "UPDATE pay_info SET order_id = " . $last_id . " WHERE user_id = " . $usid . " AND pay_id = " . $payid;
	$conn->exec($SqlInsPay);
		
$terminalId	 = "630837";					// Terminal ID
$userName	   = "lord";					// Username
$userPassword   = "51659";					// Password
$orderId		= $last_id;		  // Order ID
$amount 		 = $_POST['Price'];			// Price / Rial
$localDate	  = date("Ymd");				// Date
$localTime	  = date("His");				// Time
$additionalData = '';
$callBackUrl	= "http://warranty.rifle.ir/ResellerPanel/index.php?Page=Callback";	// Callback URL
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
		echo "Error : ". showErr($err);
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
			echo "Error : ". showErr($result);
			exit;
		}
	}
}
}

function showErr($ecode){
        switch ($ecode)
        {
            case 0:
                $tmess="تراکنش با موفقیت انجام شد";
                break;
            case 11:
                $tmess="شماره کارت معتبر نیست";
                break;
            case 12:
                $tmess= "موجودی کافی نیست";
                break;
            case 13:
                $tmess= "رمز دوم شما صحیح نیست";
                break;
            case 14:
                $tmess= "دفعات مجاز ورود رمز بیش از حد است";
                break;
            case 15:
                $tmess= "کارت معتبر نیست";
                break;
            case 16:
                $tmess= "دفعات برداشت وجه بیش از حد مجاز است";
                break;
            case 17:
                $tmess= "کاربر از انجام تراکنش منصرف شده است";
                break;
            case 18:
                $tmess= "تاریخ انقضای کارت گذشته است";
                break;
            case 19:
                $tmess= "مبلغ برداشت وجه بیش از حد مجاز است";
                break;
            case 111:
                $tmess= "صادر کننده کارت نامعتبر است";
                break;
            case 112:
                $tmess= "خطای سوییچ صادر کننده کارت";
                break;
            case 113:
                $tmess= "پاسخی از صادر کننده کارت دریافت نشد";
                break;
            case 114:
                $tmess= "دارنده کارت مجاز به انجام این تراکنش نمی باشد";
                break;
            case 21:
                $tmess= "پذیرنده معتبر نیست";
                break;
            case 23:
                $tmess= "خطای امنیتی رخ داده است";
                break;
            case 24:
                $tmess= "اطلاعات کاربری پذیرنده معتبر نیست";
                break;
            case 25:
                $tmess= "مبلغ نامعتبر است";
                break;
            case 31:
                $tmess= "پاسخ نامعتبر است";
                break;
            case 32:
                $tmess= "فرمت اطلاعات وارد شده صحیح نیست";
                break;
            case 33:
                $tmess="حساب نامعتبر است";
                break;
            case 34:
                $tmess= "خطای سیستمی";
                break;
            case 35:
                $tmess= "تاریخ نامعتبر است";
                break;
            case 41:
                $tmess= "شماره درخواست تکراری است";
                break;
            case 42:
                $tmess= "تراکنش Sale یافت نشد";
                break;
            case 43:
                $tmess= "قبلا درخواست Verify داده شده است";
                break;
            case 44:
                $tmess= "درخواست Verify یافت نشد";
                break;
            case 45:
                $tmess= "تراکنش Settle شده است";
                break;
            case 46:
                $tmess= "تراکنش Settle نشده است";
                break;
            case 47:
                $tmess= "تراکنش Settle یافت نشد";
                break;
            case 48:
                $tmess= "تراکنش Reverse شده است";
                break;
            case 49:
                $tmess= "تراکنش Refund یافت نشد";
                break;
            case 412:
                $tmess= "شناسه قبض نادرست است";
                break;
            case 413:
                $tmess= "شناسه پرداخت نادرست است";
                break;
            case 414:
                $tmess= "سازمان صادر کننده قبض معتبر نیست";
                break;
            case 415:
                $tmess= "زمان جلسه کاری به پایان رسیده است";
                break;
            case 416:
                $tmess= "خطا در ثبت اطلاعات";
                break;
            case 417:
                $tmess= "شناسه پرداخت کننده نامعتبر است";
                break;
            case 418:
                $tmess= "اشکال در تعریف اطلاعات مشتری";
                break;
            case 419:
                $tmess= "تعداد دفعات ورود اطلاعات بیش از حد مجاز است";
                break;
            case 421:
                $tmess= "IP معتبر نیست";
                break;
            case 51:
                $tmess= "تراکنش تکراری است";
                break;
            case 54:
                $tmess= "تراکنش مرجع موجود نیست";
                break;
            case 55:
                $tmess= "تراکنش نامعتبر است";
                break;
            case 61:
                $tmess= "خطا در واریز";
                break;
        }
        echo $tmess;
    }

?>