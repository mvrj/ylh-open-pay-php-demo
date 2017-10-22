<?php
/* *
 * 功能：云联惠服务器异步通知页面
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
 * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
 * 如果没有收到该页面返回的 success 信息，云联惠会在24小时内按一定的时间策略重发通知
 */

require '../src/autoload.php';

use YunLianHui\Sign;

$client_private_key = 'MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBAJePqEUBCcLRj7uamEDDLIl55wDDVxIuEV5r4vDETkU15LJIoarYK5fRa15imMSX/9ekMm1yX5G57kUoKLeTrRk+xnuK+mYrcBrJVEmjWOXKTfATVuy/HnLA21zqWvI8Kn5z2q9Dfz31ErBAvCrllWhrZXKXatyd5RcXYB4t+6InAgMBAAECgYBE+vlXDrXmmYKVnDMXpr0qhPUCf+WtPJJjKy9K7c3B6lmAW1ZZb7HHk2UOvElTkOq8ttrMvXWJ2dn8V97QTsJFOPkL10ktCObRtQibkFrI0yjoBh4mBJxupJ1RUVKCmw9mQ6/KNouGfAb4C3MXTWBQ9G2gYEcjne03ffqcBxjnQQJBAOvYivXa/AMx+5g4Hyi0ze9M/C+zWOwbocebFFqS3Lm5rUsegqKPVQU+lS4aL6NhPaZiV0a+YH5gmlN4AMLJDxkCQQCkg0TcNjUH1hQ95TK+j2qTETKnMwH3T7AcVjz4P+5k3X60tz+yOYFDeomp7uRJqB1FfN5ucTKUKgyvJzsZhKM/AkBzlensukkea8WpgX/L3Gi9KhbCbfxbouMzx04/YZCpuVUz5p0RfHunmVdVg+HrCYJEZBfwBOeXqFKaK8r7q7wpAkAFLl0s0kg5RvS8Pkuq1Ll2iEQgH+sf7tKNEeo5p0nKw28KIftPkaAQj/tl7rAh4bmKRrR6pfYB1JExsvqZgyPhAkB49Kkrt4+oSdLY+6kA9bkQKHfRScz3aNmfqRWD4CWpDNiedEMOLr2DfPAIG2nM2lXXXBgwWKYoTUpPQMm0izNA';
$yunlianhuiPublicKey = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCXj6hFAQnC0Y+7mphAwyyJeecAw1cSLhFea+LwxE5FNeSySKGq2CuX0WteYpjEl//XpDJtcl+Rue5FKCi3k60ZPsZ7ivpmK3AayVRJo1jlyk3wE1bsvx5ywNtc6lryPCp+c9qvQ3899RKwQLwq5ZVoa2Vyl2rcneUXF2AeLfuiJwIDAQAB';

writeLog(var_export($_POST,true));

$sign = new Sign($client_private_key);
$result = $sign->rsaCheck($_POST,$yunlianhuiPublicKey);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/
if($result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代

	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
	
    //获取云联惠的通知返回参数，可参考技术文档中服务器异步通知参数列表
	
	//商户订单号

	$out_trade_no = $_POST['out_trade_no'];

	//云联惠交易号

	$trade_no = $_POST['trade_no'];

	//交易状态
	$trade_status = $_POST['trade_status'];


    if($_POST['trade_status'] == 'TRADE_FINISHED') {

		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
			//如果有做过处理，不执行商户的业务程序
				
		//注意：
		//退款日期超过可退款期限后（如三个月可退款），云联惠系统发送该交易状态通知
    }
    else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
			//如果有做过处理，不执行商户的业务程序			
		//注意：
		//付款完成后，云联惠系统发送该交易状态通知
    }
	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        
	echo "success";		//请不要修改或删除
		
}else {
    //验证失败
    echo "fail";	//请不要修改或删除

}

function writeLog($text) {
    // $text=iconv("GBK", "UTF-8//IGNORE", $text);
    //$text = characet ( $text );
    file_put_contents ( dirname ( __FILE__ ).DIRECTORY_SEPARATOR."./../log.txt", date ( "Y-m-d H:i:s" ) . "  " . $text . "\r\n", FILE_APPEND );
}

