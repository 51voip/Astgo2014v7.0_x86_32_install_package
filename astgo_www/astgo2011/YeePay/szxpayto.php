<?php
/**
 *  filename : szxpayto.php    YeePay 神州行充值卡*网页*提交接口
 *  datetime : 2011/10/28
 *  By Astgo.jin
 * params
   $_SESSION['out_trade_no']  #订单id
   $_SESSION['subject']       #订单名称
   $_SESSION['body']          #订单描述
   $_SESSION['total_fee']     #订单总金额
   $_SESSION['strex1']        #充值卡卡号
   $_SESSION['strex2']        #充值卡密码
 */
require_once ("yeepay.config.php");
require_once ("YeePayCommon.php");
require_once("../include/pay_inc.php");


session_start();  #add by jin 采用session 方式，安全的提交到支付宝

//请与贵网站订单系统中的唯一订单号匹配
$out_trade_no = $_SESSION['out_trade_no'];
//订单名称
$subject      = $_SESSION['subject'];
//订单描述
$body         = $_SESSION['body'];
//订单总金额
$total_fee    = $_SESSION['total_fee'];
#充值卡卡号
$cardNo = $_SESSION['strex1'];
#充值卡密码
$cardPwd = $_SESSION['strex2'];

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

if (trim($cardNo) == '' )
{
   echo '充值卡卡号不能为空,请确认您是否登录到Astgo管理平台,本次提交将终止.';
   exit;
}
if (trim($cardPwd) == '' )
{
   echo '充值卡密码不能为空,请确认您是否登录到Astgo管理平台,本次提交将终止.';
   exit;
}


  global $yeepay_config;

  $post_data = array();  #提交数组
  $pay_config = user_get_pay_confg($agent_id,$admin_id);
  if (!$pay_config)
  {
    echo '没有配置绿宝神州行卡在线支付.本次提交将终止.';
    exit;
  }


  $post_data['p2_Order'] = $out_trade_no;
  $post_data['p3_Amt'] = $total_fee;
  $post_data['p4_verifyAmt'] = true;
  $post_data['p5_Pid'] =  $subject;
  $post_data['p6_Pcat'] =  $subject;
  $post_data['p7_Pdesc'] = $body;
  $post_data['p8_Url'] = $pay_config['yeepay_config_callback_url'];
  $post_data['pa_MP'] =  $out_trade_no;
  $post_data['pa7_cardAmt'] = $total_fee;
  $post_data['pa8_cardNo']  = $cardNo ;
  $post_data['pa9_cardPwd'] = $cardPwd;
  $post_data['pd_FrpId'] = $pay_config['yeepay_config_FrpId'];
  $post_data['pz_userId'] = $pay_config['yeepay_config_p1_MerId'];
  $post_data['pz1_userRegTime'] ='';

  $r1_Code = YeePayCommon($post_data,$pay_config);
  if ($r1_Code == 'err1' )
  {
     echo "<br>交易签名无效!";
  }
  else
  {
		if($r1_Code=="1"){
				  echo "<br>提交成功!";
		      echo "<br>商户订单号:".$post_data['p2_Order']."<br>";
		} else if($r1_Code=="2"){
		      echo "<br>提交失败".$r1_Code;
		      echo "<br>支付卡密无效!";
		} else if($r1_Code=="7"){
		      echo "<br>提交失败".$r1_Code;
		      echo "<br>支付卡密无效!";
		} else if($r1_Code=="11"){
		      echo "<br>提交失败".$r1_Code;
		      echo "<br>订单号重复!";
		} else{
		      echo "<br>提交失败".$r1_Code;
		      echo "<br>请检查后重新测试支付";
		}
  }


exit;




#提交函数
function  YeePayCommon($post_data,$pay_config)
{
  #商家设置用户购买商品的支付信息.

  #商户订单号.提交的订单号必须在自身账户交易中唯一.
  $p2_Order      = $post_data['p2_Order'];
  #支付卡面额
  $p3_Amt        = $post_data['p3_Amt'];
  #是否较验订单金额
  $p4_verifyAmt    = $post_data['p4_verifyAmt'];
  #产品名称
  $p5_Pid        = $post_data['p5_Pid'];
  #iconv("UTF-8","GBK//TRANSLIT",$_POST['p5_Pid']);
  #产品类型
  $p6_Pcat      = $post_data['p6_Pcat'];
  #iconv("UTF-8","GBK//TRANSLIT",$_POST['p6_Pcat']);
  #产品描述
  $p7_Pdesc      = $post_data['p7_Pdesc'];
  #iconv("UTF-8","GBK//TRANSLIT",$_POST['p7_Pdesc']);
  #商户接收交易结果通知的地址,易宝支付主动发送支付结果(服务器点对点通讯).通知会通过HTTP协议以GET方式到该地址上.
  $p8_Url        = $post_data['p8_Url'];
  #临时信息
  $pa_MP        = $post_data['pa_MP'];
  #iconv("UTF-8","GB2312//TRANSLIT",$_POST['pa_MP']);
  #卡面额
  $pa7_cardAmt      = ($post_data['pa7_cardAmt']);
  #支付卡序列号.
  $pa8_cardNo      = ($post_data['pa8_cardNo']);
  #支付卡密码.
  $pa9_cardPwd      = ($post_data['pa9_cardPwd']);
  #支付通道编码
  $pd_FrpId      = $post_data['pd_FrpId'];
  #应答机制
  $pr_NeedResponse    = "1";
  #用户唯一标识
  $pz_userId      = $post_data['pz_userId'];
  #用户的注册时间
  $pz1_userRegTime    = $post_data['pz1_userRegTime'];

  #非银行卡支付专业版测试时调用的方法，在测试环境下调试通过后，请调用正式方法annulCard
  #两个方法所需参数一样，所以只需要将方法名改为annulCard即可
  #测试通过，正式上线时请调用该方法

	return annulCard($p2_Order,$p3_Amt,$p4_verifyAmt,$p5_Pid,$p6_Pcat,$p7_Pdesc,$p8_Url,$pa_MP,$pa7_cardAmt,$pa8_cardNo,$pa9_cardPwd,$pd_FrpId,$pz_userId,$pz1_userRegTime,$pay_config);



}
?>