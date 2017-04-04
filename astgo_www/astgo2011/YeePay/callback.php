<?php

/*
 * @Description 易宝支付非银行卡支付专业版接口范例
 * @V3.0
 * @Author yang.xu
 */
  include "global.php";
	include 'YeePayCommon.php';
  //add by jin
  require_once("../include/pay_inc.php");
  require_once("../include/user_inc.php");




	#	解析返回参数.
	$return = getCallBackValue($r0_Cmd,$r1_Code,$p1_MerId,$p2_Order,$p3_Amt,$p4_FrpId,$p5_CardNo,$p6_confirmAmount,$p7_realAmount,$p8_cardStatus,
$p9_MP,$pb_BalanceAmt,$pc_BalanceAct,$hmac);
	#	判断返回签名是否正确（True/False）

  #astgo添加
  $res_pay  = pay_get($p2_Order);
  $pay_config = user_get_pay_confg($res_pay['agent_id'],$res_pay['admin_id']);
  #astgo -----------


	$bRet = CheckHmac($r0_Cmd,$r1_Code,$p1_MerId,$p2_Order,$p3_Amt,$p4_FrpId,$p5_CardNo,$p6_confirmAmount,$p7_realAmount,$p8_cardStatus,
$p9_MP,$pb_BalanceAmt,$pc_BalanceAct,$hmac,$pay_config);
	#	以上代码和变量不需要修改.

	#	校验码正确.
	if($bRet){
		echo "success";
       // add by jin
      $post_data = array();
      $post_data['out_trade_no'] = $p2_Order;
      $post_data['trade_no'] = $p2_Order;
      $post_data['total_fee'] = $p3_Amt;
      $post_data['trade_status'] = $p8_cardStatus;

		  #在接收到支付结果通知后，判断是否进行过业务逻辑处理，不要重复进行业务逻辑处理
		  if($r1_Code=="1"){
		      echo "<br>支付成功!";
		      echo "<br>商户订单号:".$p2_Order;
		      echo "<br>支付金额:".$p3_Amt;
          $post_data['pay'] = 1;   #支付结果 1: 成功, 0: 发起  2: 失败

		  } else if($r1_Code=="2"){
		      echo "<br>支付失败!";
		      echo "<br>商户订单号:".$p2_Order;
          $post_data['pay'] = 2;   #支付结果 1: 成功, 0: 发起  2: 失败

		  }
      $res =  pay_end($post_data,false);

      $file="/tmp/callback.txt";
      $fp=fopen($file,"w");//得到指针
      fwrite($fp,$p8_cardStatus .'-'. $r1_Code.'-'.$res);//写
      fclose($fp);//关闭

      exit;


		} else{

	$sNewString = getCallbackHmacString($r0_Cmd,$r1_Code,$p1_MerId,$p2_Order,$p3_Amt,
	$p4_FrpId,$p5_CardNo,$p6_confirmAmount,$p7_realAmount,$p8_cardStatus,$p9_MP,$pb_BalanceAmt,$pc_BalanceAct);
			echo "<br>localhost:".$sNewString;
			echo "<br>YeePay:".$hmac;
			echo "<br>交易签名无效!";

      $file="/tmp/callback.txt";
      $fp=fopen($file,"w");//得到指针
      fwrite($fp,'--------'.$p8_cardStatus);//写
      fclose($fp);//关闭

			exit;
	}

?>
<html>
<head>
<title>Return from YeePay Page</title>
</head>
<body>
</body>
</html>