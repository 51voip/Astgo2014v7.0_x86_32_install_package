<?php
 $server_ip =  real_server_ip();

$astgoConf['authorize']     = true;
// Disp App title
$astgoConf['projectName']     = 'Astgo';

// App Version
$astgoConf['projectVersion']  = '2014.v7.0';

$astgoConf['pagelimtcount']   =  22;

$astgoConf['Language'] ='cn';


$astgoConf['cn'] = array();
$astgoConf['cn']['AGNETID_NOT_EXISTS'] = '系统中没有改ID的代理商';
$astgoConf['cn']['AGNET_CHILD_EXISTS'] = '代理商有下级代理，请删除下级代理后再删除该代理';
$astgoConf['cn']['AGNET_NOT_DELETE_SELF'] = '代理自己不能删除自己！你如果想删除自己请和管理员联系。';
$astgoConf['cn']['AGNET_NOT_CREATE_LEVEL'] = '您没有权限建立下级用户！。';
$astgoConf['cn']['AGNET_NOT_CREATE_DISCHARGE'] = '您是面值计费模式，不能建立下级代理！。';
$astgoConf['cn']['AGNET_NOT_SYS_OPTION'] = '您没有权限执行系统全局配置！。';
$astgoConf['cn']['AGNET_NOT_RATE_LEVEL'] = '您没有权限管理费率！。';

$astgoConf['cn']['AGNET_SYS_OPTION_OK'] = '系统全局设置完成！。';
$astgoConf['cn']['AGNET_APP_CONFIG_OK'] = 'App配置已经成功！。';

$astgoConf['cn']['USER_NOT_EXISTS'] = '用户帐号不存在！。';
$astgoConf['cn']['USER_NOTEDIT_LEVEL'] = '你没有权限修改编辑改用户帐号！';
$astgoConf['cn']['USER_EXISTS'] = '该帐号已经存在！';


$astgoConf['cn']['CARD_EXISTS'] = '该充值卡已经存在！';
$astgoConf['cn']['CARD_NOT_EXISTS'] = '该充值卡不存在！';
$astgoConf['cn']['CARD_NOTEDIT_LEVEL'] = '你没有权限用该充值卡充值！';
$astgoConf['cn']['ACCT_TRANS_BALANCE_OK'] = '转账成功！,转账金额:';
$astgoConf['cn']['ACCT_TRANS_BALANCE_ERR'] = '转账失败，结果:';



$astgoConf['cn']['PAY_BALANCE_ISNULL'] = '充值金额不能为空';
$astgoConf['cn']['PAY_MAKE_ERR'] = '在线支付生成订单失败！';



$astgoConf['cn']['LOGIN_PASS_ERR'] = '用户名或密码错误！';
$astgoConf['cn']['LOGIN_CODE_ERR'] = '验证码错误！';

$astgoConf['cn']['DB_LOAD_OK'] = '数据已经恢复，请重新登录！';

$astgoConf['cn']['TRUNKBILL_NOT_LEVEL'] = '您没有权限建立话务对接，请和管理员联系！';

$astgoConf['cn']['TRUNKBILL_IP_EXITS'] = '话务对接改IP地址已经存在！';
$astgoConf['cn']['TRUNKBILL_IP_IS_NULL'] = '话务对接改IP地址不能为空！';

$astgoConf['cn']['SPEEDDIAL_NOT_EXISTS'] = '快捷拨号id 不存在！';
$astgoConf['cn']['VOICEFILE_ID_NOT_EXISTS'] = '呼叫中心文件id不存在！';
$astgoConf['cn']['VOICEFILES_FILE_NOT_EXISTS'] = '呼叫中心文件不存在！';

$astgoConf['cn']['QUEUE_ID_NOT_EXISTS'] = '坐席队列id不存在！';
$astgoConf['cn']['QUEUE_NOT_EXISTS'] = '坐席队列不存在！';

$astgoConf['cn']['USER_BTOTEL_EXISTS'] = '改亲情号码已经存在！';

$astgoConf['cn']['GET_FEE_SMS'] = '免费获取话费验证码:';

$astgoConf['cn']['AGENT_CARDPAY_ERR'] = '代理流量卡充值错误:';
$astgoConf['cn']['AGENT_CARDADD_ERR'] = '代理流量卡批量生成错误:';


$astgoConf['cn']['AGENT_CARDPAY_OK'] = '充值成功，本次充值金额:';
$astgoConf['cn']['AGENT_CARDPAY_BALANCE'] = '充值后账户余额:';




//$logtype 0 综合管理, 1 用户管理, 2 费率管理, 3 中继管理, 4登录,  5 充值卡管理操作   6 呼叫中心管理操作   7 系统设置等操仿

$astgoConf['LOG_USER_MANAGER']         = 1;
$astgoConf['LOG_RATE_MANAGER']         = 2;
$astgoConf['LOG_GATEWAY_MANAGER']      = 3;
$astgoConf['LOG_LOGIN_MANAGER']        = 4;
$astgoConf['LOG_VOUCHERCARD_MANAGER']  = 5;
$astgoConf['LOG_CALLCENTER_MANAGER']   = 6;
$astgoConf['LOG_SYSOPTION_MANAGER']    = 7;

//多级代理最大限制
$astgoConf['max_agents_count']    = 6;


// MySQL database host
$astgoConf['DbHost']  = 'localhost';

// MySQL database username
$astgoConf['DbUser']  =  'root';

// MySQL database password
$astgoConf['DbPass']  = 'astgo@127.0.0.1';

// MySQL database name
$astgoConf['DbName']  = 'astgodb';


// MySQL database bak tables
$astgoConf['bak_tables']  = 'astgo_urlmenu  accttype partcodes trunkbillpartcodes acct acct_user trunkbill rate rategroup ratepackage acct_ratepackage acct_user_ratepackage acct_user_periodrate callback_bindtel gateway gatewaygroup  gatewaypolicy callerlist callergroup calleelist calleegroup acct_gatewaygroup btobtel inboundcode inboundcodetype  sip_bindexten_buddies queue_member_table queue_table speeddial syslog vouchercard agent_vouchercard vouchercard_ratepackage voucherlog voicefiles paydirect';

$astgoConf['musichold_directory'] = '/var/lib/astgo/musichold';


$astgoConf['cn']['1tong_activedate'] = '帐号已经激活';
$astgoConf['cn']['1tong_agent_id_err'] = '该帐号不属于当前代理商';
$astgoConf['cn']['1tong_active_acct_count'] = '您没有足够的可开账户数量！请和管理员联系。';
$astgoConf['cn']['1tong_oldpwd_err'] = '旧密码不正确！';

$astgoConf['air_bindmd5'] = 'astgo_pub_air_key_1183188@1183262';




$astgoConf['out_title_callee'] = "被叫号码";
$astgoConf['out_title_dtmf']   = "按键结果";
$astgoConf['out_title_contact'] = "联系人";
$astgoConf['out_title_address'] = "联系地址";
$astgoConf['out_title_answer_stamp'] = "接通时间";
$astgoConf['out_title_billsec']      = "时长";
$astgoConf['out_title_timeout']      = "超时";
$astgoConf['out_title_zipcode']   = "邮编";
$astgoConf['called_membername']   = "坐席号码";

$astgoConf['start_stamp']   = "开始时间";
$astgoConf['call_state']   = "呼叫结果";
$astgoConf['fax_state']   = "发送结果";
$astgoConf['costbalance']   = "费用";




$astgoConf['acctname'] = '操作帐号';
$astgoConf['clid'] = '队列号码';
$astgoConf['src'] = '主叫号码';
$astgoConf['dst'] = '被叫号码';
$astgoConf['calldate'] = '呼叫时间';
$astgoConf['billsec'] = '时长';
$astgoConf['disposition'] = '状态';
$astgoConf['recvoc_confirm'] = '按键确认';
$astgoConf['yes'] = '是';
$astgoConf['no'] = '否';
$astgoConf['answer'] = '接通';
$astgoConf['noanswer'] = '未接';

$astgoConf['voucher_acctname']  = '被充值帐号';
$astgoConf['voucher_balance']   = '充值金额';
$astgoConf['voucher_guid']      = '充值卡号';
$astgoConf['createtime']        = '充值时间';
$astgoConf['password']        = '密码';
$astgoConf['contact']        = '联系人';
$astgoConf['address']        = '联系地址';




function real_server_ip(){
	static $serverip = NULL;

	if ($serverip !== NULL){
		return $serverip;
	}

	if (isset($_SERVER)){
		if (isset($_SERVER['SERVER_ADDR'])){
			$serverip = $_SERVER['SERVER_ADDR'];
		}
		else{
			$serverip = '0.0.0.0';
		}
	}
	else{
		$serverip = getenv('SERVER_ADDR');
	}

	return $serverip;
}
?>
