<?php

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");
require_once("../include/pay_inc.php");



/**************************请求参数**************************/

//必填参数//

session_start();  #add by jin 采用session 方式，安全的提交到支付宝

//请与贵网站订单系统中的唯一订单号匹配
$out_trade_no = $_SESSION['out_trade_no']; // date('Ymdhis');
//订单名称，显示在支付宝收银台里的“商品名称”里，显示在支付宝的交易管理的“商品名称”的列表里。
$subject      = $_SESSION['subject'];
//订单描述、订单详细、订单备注，显示在支付宝收银台里的“商品描述”里
$body         = $_SESSION['body'];
//订单总金额，显示在支付宝收银台里的“应付总额”里
$total_fee    = $_SESSION['total_fee'];

$agent_id = $_SESSION['agent_id'];

$admin_id = $_SESSION['admin_id'];


if (trim($out_trade_no) == '' )
{
   echo '订单号不能为空,请确认您是否登录到Astgo管理平台,本次提交将终止.';
   exit;

}
if (trim($total_fee) == '' )
{
   echo '订单总金额不能为空,请确认您是否登录到Astgo管理平台,本次提交将终止.';
   exit;

}


  $pay_config = user_get_pay_confg($agent_id,$admin_id);
  if (!$pay_config)
  {
    echo '没有配置支付宝即时在线支付.本次提交将终止.';
    exit;
  }






//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者id，以2088开头的16位纯数字
$alipay_config['partner']= $pay_config['aliapy_config_partner'];

//安全检验码，以数字和字母组成的32位字符
$alipay_config['key']= $pay_config['aliapy_config_key'];

//签约支付宝账号或卖家支付宝帐户
$alipay_config['seller_email']= '751501248@qq.com';//$pay_config['aliapy_config_seller_email'];

//页面跳转同步通知页面路径，要用 http://格式的完整路径，不允许加?id=123这类自定义参数
//return_url的域名不能写成http://localhost/create_direct_pay_by_user_php_utf8/return_url.php ，否则会导致return_url执行无效
$alipay_config['return_url']=  $pay_config['aliapy_config_return_url'];

//服务器异步通知页面路径，要用 http://格式的完整路径，不允许加?id=123这类自定义参数
$alipay_config['notify_url'] = $pay_config['aliapy_config_notify_url'];




//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


        //支付类型
        $payment_type = "1";
        //必填，不能修改
        //服务器异步通知页面路径
        $notify_url = $pay_config['aliapy_config_notify_url']; 
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url = $pay_config['aliapy_config_return_url'];
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        //卖家支付宝帐户
        $seller_email = $pay_config['aliapy_config_seller_email'];
        //必填

        //商户订单号
        $out_trade_no = $out_trade_no;
        //商户网站订单系统中唯一订单号，必填

        //订单名称
        $subject = $subject;
        //必填

        //付款金额
        $total_fee = $total_fee;
        //必填

        //订单描述

        $body = $body    ;
        //商品展示地址
        $show_url ='http://www.xxx.com/myorder.html';
        //需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

        //防钓鱼时间戳
        $anti_phishing_key = "";
        //若要使用请调用类文件submit中的query_timestamp函数

        //客户端的IP地址
        $exter_invoke_ip = "";
        //非局域网的外网IP地址，如：221.0.0.1



$parameter = array(
		"service" => "create_direct_pay_by_user",
		"partner" => trim($alipay_config['partner']),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);

/*
print_r($parameter) ;

 echo '<br>';echo '<br>';echo '<br>';
 

print_r($alipay_config) ;
*/




/*
$parameter = array(
		"service"			=> "create_direct_pay_by_user",
		"payment_type"		=> "1",

		"partner"			=> trim($aliapy_config['partner']),
		"_input_charset"	=> trim(strtolower($aliapy_config['input_charset'])),
        "seller_email"		=> trim($aliapy_config['seller_email']),
        "return_url"		=> trim($aliapy_config['return_url']),
        "notify_url"		=> trim($aliapy_config['notify_url']),

		"out_trade_no"		=> $out_trade_no,
		"subject"			=> $subject,
		"body"				=> $body,
		"total_fee"			=> $total_fee,

		"paymethod"			=> $paymethod,
		"defaultbank"		=> $defaultbank,

		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,

		"show_url"			=> $show_url,
		"extra_common_param"=> $extra_common_param,

		"royalty_type"		=> $royalty_type,
		"royalty_parameters"=> $royalty_parameters
);
*/

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;

?>
