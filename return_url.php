<?php
/* *
 * 功能：云联惠页面跳转同步通知页面
 * 版本：2.0
 * 修改日期：2016-11-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 */
require '../src/autoload.php';

use YunLianHui\Sign;

$client_private_key = 'MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBAJePqEUBCcLRj7uamEDDLIl55wDDVxIuEV5r4vDETkU15LJIoarYK5fRa15imMSX/9ekMm1yX5G57kUoKLeTrRk+xnuK+mYrcBrJVEmjWOXKTfATVuy/HnLA21zqWvI8Kn5z2q9Dfz31ErBAvCrllWhrZXKXatyd5RcXYB4t+6InAgMBAAECgYBE+vlXDrXmmYKVnDMXpr0qhPUCf+WtPJJjKy9K7c3B6lmAW1ZZb7HHk2UOvElTkOq8ttrMvXWJ2dn8V97QTsJFOPkL10ktCObRtQibkFrI0yjoBh4mBJxupJ1RUVKCmw9mQ6/KNouGfAb4C3MXTWBQ9G2gYEcjne03ffqcBxjnQQJBAOvYivXa/AMx+5g4Hyi0ze9M/C+zWOwbocebFFqS3Lm5rUsegqKPVQU+lS4aL6NhPaZiV0a+YH5gmlN4AMLJDxkCQQCkg0TcNjUH1hQ95TK+j2qTETKnMwH3T7AcVjz4P+5k3X60tz+yOYFDeomp7uRJqB1FfN5ucTKUKgyvJzsZhKM/AkBzlensukkea8WpgX/L3Gi9KhbCbfxbouMzx04/YZCpuVUz5p0RfHunmVdVg+HrCYJEZBfwBOeXqFKaK8r7q7wpAkAFLl0s0kg5RvS8Pkuq1Ll2iEQgH+sf7tKNEeo5p0nKw28KIftPkaAQj/tl7rAh4bmKRrR6pfYB1JExsvqZgyPhAkB49Kkrt4+oSdLY+6kA9bkQKHfRScz3aNmfqRWD4CWpDNiedEMOLr2DfPAIG2nM2lXXXBgwWKYoTUpPQMm0izNA';
$yunlianhuiPublicKey = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCXj6hFAQnC0Y+7mphAwyyJeecAw1cSLhFea+LwxE5FNeSySKGq2CuX0WteYpjEl//XpDJtcl+Rue5FKCi3k60ZPsZ7ivpmK3AayVRJo1jlyk3wE1bsvx5ywNtc6lryPCp+c9qvQ3899RKwQLwq5ZVoa2Vyl2rcneUXF2AeLfuiJwIDAQAB';

writeLog(var_export($_GET,true));

$sign = new Sign($client_private_key);

$result = $sign->rsaCheck($_GET,$yunlianhuiPublicKey);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/
if($result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取云联惠的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

	//云联惠交易号

	$trade_no = htmlspecialchars($_GET['order_id']);
		
	echo "验证成功<br />外部订单号：".$out_trade_no."<br />外部订单号：".$trade_no;

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "验证失败";
}
function writeLog($text) {
    // $text=iconv("GBK", "UTF-8//IGNORE", $text);
    //$text = characet ( $text );
    file_put_contents ( dirname ( __FILE__ ).DIRECTORY_SEPARATOR."./../log.txt", date ( "Y-m-d H:i:s" ) . "  " . $text . "\r\n", FILE_APPEND );
}

?>
<title>云联惠手机网站支付接口</title>
	</head>
    <body>
    </body>
</html>