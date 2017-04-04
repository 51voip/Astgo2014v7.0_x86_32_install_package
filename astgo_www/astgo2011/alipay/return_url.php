<?php
/* * 
 * 功能：支付宝页面跳转同步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */
include "global.php";
require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");

//add by jin
require_once("../include/pay_inc.php");
require_once("../include/user_inc.php");


	  $out_trade_no	= $_GET['out_trade_no'];	//获取订单号
    $res_pay  = pay_get($out_trade_no);
    $pay_config = user_get_pay_confg($res_pay['agent_id'],$res_pay['admin_id']);
     
  $pay_config = user_get_pay_confg($res_pay['agent_id'],$res_pay['admin_id']);
//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者id，以2088开头的16位纯数字
$alipay_config['partner']= $pay_config['aliapy_config_partner'];

//安全检验码，以数字和字母组成的32位字符
$alipay_config['key']= $pay_config['aliapy_config_key'];

//签约支付宝账号或卖家支付宝帐户
$alipay_config['seller_email']= $pay_config['aliapy_config_seller_email'];

//页面跳转同步通知页面路径，要用 http://格式的完整路径，不允许加?id=123这类自定义参数
//return_url的域名不能写成http://localhost/create_direct_pay_by_user_php_utf8/return_url.php ，否则会导致return_url执行无效
$alipay_config['return_url']=  $pay_config['aliapy_config_return_url'];

//服务器异步通知页面路径，要用 http://格式的完整路径，不允许加?id=123这类自定义参数
$alipay_config['notify_url'] = $pay_config['aliapy_config_notify_url'];

//print_r( $alipay_config );

?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号
	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号
	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];
	
	

    $out_trade_no	= $_GET['out_trade_no'];	//获取订单号
    $trade_no		= $_GET['trade_no'];		//获取支付宝交易号
    $total_fee		= $_GET['total_fee'];		//获取总价格
    $trade_status = $_GET['trade_status'];

    echo "-------------------------------<br/>";
	  echo "验证成功<br/>";
	  echo " Astgo订单号:".$out_trade_no ."<br/>";
	  echo "支付宝订单号:".$trade_no ."<br/>";
	  echo "    支付金额:".$total_fee ."<br/>";
	  echo "-------------------------------<br/>";

       // add by jin
      $post_data = array();
      $post_data['out_trade_no'] = $out_trade_no;
      $post_data['trade_no'] = $trade_no;
      $post_data['total_fee'] = $total_fee;
      $post_data['trade_status'] = $trade_status;
      



    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
      $post_data['pay'] = 1;   #支付结果 1: 成功, 0: 发起  2: 失败
      $res =  pay_end($post_data,false);
      echo "    Astgo支付结果:".$res ."<br/>";
			
    }
    else {
      
      
      $post_data['pay'] = 2;   #支付结果 1: 成功, 0: 发起  2: 失败
      $res =  pay_agent_end($post_data);
      echo "    Astgo支付结果:".$res ."<br/>";
      echo "trade_status=".$_GET['trade_status'];
      
      echo "trade_status=".$_GET['trade_status'];
      
    }
		
	echo "验证成功<br />";

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "验证失败";
}
?>
        <title>支付宝即时到账交易接口</title>
	</head>
    <body>
    </body>
</html>