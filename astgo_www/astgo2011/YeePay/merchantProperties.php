<?php

/*
 * @Description 易宝支付非银行卡支付专业版接口范例
 * @V3.0
 * @Author yang.xu
 */
	/* 商户编号p1_MerId,以及密钥merchantKey 需要从易宝支付平台获得*/
	#$p1_MerId	= "10001126856";																											#测试使用
	#$merchantKey	= "69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl";			#测试使用
  $p1_MerId	= "10011439181";
  $merchantKey ="80252349QDp690Q5W26f11p91v8S14m9231e3CJ41M1u747B576d28766876";
	$logName	= "/tmp/YeePay_CARD.log";
	# 非银行卡支付专业版请求地址,无需更改.
	$reqURL_SNDApro		= "https://www.yeepay.com/app-merchant-proxy/command.action";
?>