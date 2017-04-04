<?php /* Smarty version 2.6.26, created on 2014-11-02 11:45:14
         compiled from user_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'user_edit.html', 171, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<script src="./js/jquery-1.6.2.min.js"></script>
<script src="./js/calendar/WdatePicker.js"></script>
<title>编辑用户帐号</title>
<script>


		
//所有input 去空格
	function trim_all_input()
	{
		var inpus = document.getElementsByTagName("INPUT")
        for(var i=0; i<inpus.length; i++)
        {
            if(inpus[i].type=="text")
            {
               inpus[i].value =  inpus[i].value.replace(/\s/g,"");
            }
        }
		
	}
	
	// 提交前检测输入是否合法
	function check(id)
	{
		trim_all_input(); //所有input 去空格

		
        if (document.form1.password.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的用户帐号密码</font></span></div>";
      		document.form1.password_len.focus();
			return false;
		}				

        //判断绑定号码是否重复  
        var tranfer_callee1 = '1';
		var tranfer_callee2 = '2';
		var tranfer_callee3 = '3';
		var tranfer_callee4 = '4';
		var tranfer_callee5 = '5';
		var tranfer_callee6 = '6';		
        if (document.form1.tranfer_callee1.value!="" ) tranfer_callee1 = document.form1.tranfer_callee1.value;
        if (document.form1.tranfer_callee2.value!="" ) tranfer_callee2 = document.form1.tranfer_callee2.value;
        if (document.form1.tranfer_callee3.value!="" ) tranfer_callee3 = document.form1.tranfer_callee3.value;
        if (document.form1.tranfer_callee4.value!="" ) tranfer_callee4 = document.form1.tranfer_callee4.value;
        if (document.form1.tranfer_callee5.value!="" ) tranfer_callee5 = document.form1.tranfer_callee5.value;
        if (document.form1.tranfer_callee6.value!="" ) tranfer_callee6 = document.form1.tranfer_callee6.value;
		var arr=[tranfer_callee1,tranfer_callee2,tranfer_callee3,tranfer_callee4,tranfer_callee5,tranfer_callee6];

	   for(i = 0; i < arr.length; i++){
          for(j = i + 1; j < arr.length; j++){
            if(arr[i] == arr[j]){
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>绑定号码不能重复！</font></span></div>";
      		document.form1.tranfer_callee1.focus();
			return false;
            }
         }
	  }
        
		document.form1.action = document.form1.action  +  '&id=' + id;
		//alert(document.form1.action);
		document.form1.submit();
	    return true;
		//return true;

	}

	function goback(curpage,agent_id)
	{
	    document.form2.action = '?action=list&curpage='+curpage +'&agent_id=' + agent_id;
		document.form2.submit();
	}
	
function  change_acct_id(acct_id,curpage)
{
    document.form1.action = '?action=edit_send&curpage='+curpage+'&agent_id='+acct_id; 
	//alert(document.form1.action);
	document.form1.submit(); 
	return true;		 
	
}
    </script>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="2%" height="19" valign="bottom"><div align="center"><img src="images/tb.gif" width="14" height="14" /></div></td>
                <td width="98%" valign="bottom"><span class="table_caption"> 编辑用户帐号</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
   <form name="form2" method="post" >
   </form>
  
 <form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
">
       <tr>
             <td><table width="1028" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
            <td height="18" colspan="4" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4">帐号管理者:<?php echo $this->_tpl_vars['to_acct']['acctname']; ?>
  &nbsp;&nbsp;用户帐号:<?php echo $this->_tpl_vars['user']['acctname']; ?>
</span></div>            </td>
            </tr>
          <tr>
            <td height="18" colspan="4" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><span class="STYLE4">基本设置</span></span></div>              <div align="center"></div></td>
            </tr>
          <tr>
            <td width="13%" height="19" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >用户帐号</span></td>
            <td width="30%" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="acctname" type="text"  disabled class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['acctname']; ?>
' />
              </span></td>
            <td width="12%" bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">呼叫转移类型</span></div></td>
            <td width="45%" height="19" bgcolor="#FFFFFF"><label for="host2">
              <select name="siptranfer" class="STYLE1" id="siptranfer"  >
                <option value="0"   <?php if ($this->_tpl_vars['user']['siptranfer'] == '0'): ?>selected<?php endif; ?> > 呼叫不转移</option>
                <option value="1"   <?php if ($this->_tpl_vars['user']['siptranfer'] == '1'): ?>selected<?php endif; ?> > 忙或不在线转移</option>
                <option value="2"   <?php if ($this->_tpl_vars['user']['siptranfer'] == '2'): ?>selected<?php endif; ?> > 无条件转移</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span class="STYLE1">用户密码</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="password" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['password']; ?>
' />
            </span></td>
            <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">呼叫转移号码</span></div></td>
            <td height="19" bgcolor="#FFFFFF"><label for="host3"><span class="STYLE1">
              <input name="siptranfer_callee" id="siptranfer_callee" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['siptranfer_callee']; ?>
' />
            </span></label></td>
            </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span class="STYLE1">呼入类型</span></td>
            <td bgcolor="#FFFFFF"><select name="callbindteltype" class="STYLE1" id="callbindteltype"  >
              <option value="0"   <?php if ($this->_tpl_vars['user']['callbindteltype'] == 0): ?>selected<?php endif; ?> > IVR总机流程</option>
              <option value="1"   <?php if ($this->_tpl_vars['user']['callbindteltype'] == 1): ?>selected<?php endif; ?> > 呼叫SIP帐号</option>
              <option value="2"   <?php if ($this->_tpl_vars['user']['callbindteltype'] == 2): ?>selected<?php endif; ?> > 回拨一号通预约</option>
              <option value="3"   <?php if ($this->_tpl_vars['user']['callbindteltype'] == 3): ?>selected<?php endif; ?> > 一号通或400业务</option>
            </select></td>
            <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">SIP呼出并发</span></div></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="call_count" id="call_count" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value='<?php echo $this->_tpl_vars['user']['call_count']; ?>
' />
            线</span></td>
          </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span class="STYLE1">用户状态</span></td>
            <td bgcolor="#FFFFFF"><select name="enable" class="STYLE1" id="enable"  >
              <option value="0"   <?php if ($this->_tpl_vars['user']['enable'] == 0): ?>selected<?php endif; ?> > 禁用</option>
              <option value="1"   <?php if ($this->_tpl_vars['user']['enable'] == 1): ?>selected<?php endif; ?> > 正常</option>
            </select></td>
            <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">叫主叫号码</span></div></td>
            <td height="19" bgcolor="#FFFFFF"><label for="callerid"><span class="STYLE1">
              <input name="callerid" id="callerid" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['callerid']; ?>
'   <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?> <?php if ($this->_tpl_vars['res_acct']['callerid_type'] != '1'): ?> disabled="disabled" <?php endif; ?><?php endif; ?>  />
            </span></label></td>
            </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span class="STYLE1">用户金额</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="balance"  id = "balance"  type="text" disabled   class="STYLE1" style="height:18px; width:80px;" size="30"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
' />
              <span class="STYLE1">元</span></span></td>
            <td bgcolor="#FFFFFF"><div align="right" class="STYLE4">API呼叫密钥</div></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE7">
             <?php echo $this->_tpl_vars['user']['apipwd']; ?>

            </span></td>
            </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span class="STYLE1">有效期</span></td>
            <td bgcolor="#FFFFFF"><input name="expireddate"  id="expireddate"  type="text"  style="height:18px; width:100px;" size="30"  onclick="WdatePicker()"  value='<?php echo $this->_tpl_vars['user']['expireddate']; ?>
' /></td>
            <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE4">API授权IP地址</span></div></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="http_ipaddress" id="http_ipaddress" type="text" class="STYLE1" style="height:18px; width:220px;" size="90"  value='<?php echo $this->_tpl_vars['user']['http_ipaddress']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="32" align="right" bgcolor="#FFFFFF"><span class="STYLE1">激活日期</span></td>
            <td bgcolor="#FFFFFF">
               <input type="text" name="activedate" id="activedate"   readonly="readonly"  style="height:18px; width:100px;"  onClick="WdatePicker()"  value='<?php echo $this->_tpl_vars['user']['activedate']; ?>
'/>            </td>
            <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE4">API话单地址</span></div></td>
            <td height="32" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="http_callback_url" type="text" class="STYLE1" id="http_callback_url" style="height:18px; width:380px;" value="<?php echo $this->_tpl_vars['user']['http_callback_url']; ?>

              " />
            </span></td>
          </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span class="STYLE1">回拨费率组</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="rategroupid_acall" id="rategroupid_acall" style="width:250px"     >
                <?php $_from = $this->_tpl_vars['rategroups_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['user']['rategroupid_acall']): ?> selected <?php endif; ?> >
                  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
            <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">回铃限制</span></div></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="limitbalance" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['limitbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
' />
            <span class="STYLE1">元</span></span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">被叫费率组</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="rategroupid" id="rategroupid"  style="width:250px" >
                <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['user']['rategroupid']): ?> selected <?php endif; ?> >
                  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
            <td height="18" bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">直拨转回拨限制</span></div></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="directdial_month" id="directdial_month" type="text" class="STYLE1" style="height:18px; width:60px;"   value='<?php echo $this->_tpl_vars['user']['directdial_month']; ?>
' />
分钟</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">套餐</span></td>
            <td rowspan="4" bgcolor="#FFFFFF"><span class="STYLE7">
              <select style="width:250px" size="5" multiple="multiple" name="ratepackages[]" >
                <option value="-1">---------不使用套餐---------</option>
                <?php $_from = $this->_tpl_vars['ratepackages_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
"
                    <?php $_from = $this->_tpl_vars['ratepackages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone1']):
?>
                     <?php if ($this->_tpl_vars['eachone1']['ratepackage_id'] == $this->_tpl_vars['eachone']['id']): ?>selected<?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>  >
                  <?php echo $this->_tpl_vars['eachone']['packagename']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
            <td height="18" bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">直拨已拨打</span></div></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="directdial_month_minute" id="directdial_month_minute" type="text" class="STYLE1" style="height:18px; width:60px;"   value='<?php echo $this->_tpl_vars['user']['directdial_month_minute']; ?>
' />
分钟</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">呼出赠送</span></div></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="timelonggift" id="timelonggift" type="text" class="STYLE1" style="height:18px; width:60px;"   <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?> disabled="disabled" <?php endif; ?> value='<?php echo $this->_tpl_vars['user']['timelonggift']; ?>
' />
分钟</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">积分</span></div></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="credits"  id="credits" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['credits']; ?>
'  />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">SIP直拨通话录音</span></div></td>
            <td height="18" bgcolor="#FFFFFF">
			<select name="callrecord" class="STYLE1" id="callrecord"  >
              <option value="0"   <?php if ($this->_tpl_vars['user']['callrecord'] == '0'): ?>selected<?php endif; ?> > 关闭</option>
              <option value="1"   <?php if ($this->_tpl_vars['user']['callrecord'] == '1'): ?>selected<?php endif; ?> > 开启</option>
            </select></td>
          </tr>
          <tr>
            <td height="19" colspan="4" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="19" colspan="4" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center" class="STYLE4">一号通、400、回拨、直拨、半直拨等绑定电话</div></td>
            </tr>
          <tr>
            <td height="19" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1">一号通呼转彩铃</td>
            <td height="19" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="left">
             <select size="1" name="tranfer_ring"  style="width:200px" >
              <option value="-1"  >-----不播放-----</option>
                <?php $_from = $this->_tpl_vars['musiconholdlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['user']['tranfer_ring']): ?> selected <?php endif; ?> >
                  <?php echo $this->_tpl_vars['eachone']['description']; ?>

                  </option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            </div></td>
          </tr>
          <tr>
            <td height="19" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1">绑定电话1 <span class="STYLE7">
              <input name="tranfer_callee1" <?php if ($this->_tpl_vars['limitbindtel'] <= 0): ?> disabled="disabled" <?php endif; ?> id="tranfer_callee1" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_callee1']; ?>
'   />
              </span>呼叫等待
              <input name="tranfer_wait1" id="tranfer_wait1" type="text" class="STYLE1" style="height:18px; width:30px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_wait1']; ?>
' />
              秒&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td height="19" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;绑定电话2 <span class="STYLE7">
              <input name="tranfer_callee2" <?php if ($this->_tpl_vars['limitbindtel'] <= 1): ?> disabled="disabled" <?php endif; ?> id="tranfer_callee2" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_callee2']; ?>
' />
              </span>呼叫等待
              <input name="tranfer_wait2" id="tranfer_wait2" type="text" class="STYLE1" style="height:18px; width:30px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_wait2']; ?>
' />
              秒</div></td>
          </tr>
          <tr>
            <td height="19" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1">绑定电话3 <span class="STYLE7">
              <input name="tranfer_callee3"  <?php if ($this->_tpl_vars['limitbindtel'] <= 2): ?> disabled="disabled" <?php endif; ?>  id="tranfer_callee3" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_callee3']; ?>
' />
              </span>呼叫等待
              <input name="tranfer_wait3" id="tranfer_wait3" type="text" class="STYLE1" style="height:18px; width:30px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_wait3']; ?>
' />
              秒&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td height="19" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;绑定电话4 <span class="STYLE7">
              <input name="tranfer_callee4" <?php if ($this->_tpl_vars['limitbindtel'] <= 3): ?> disabled="disabled" <?php endif; ?> id="tranfer_callee4" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_callee4']; ?>
' />
              </span>呼叫等待
              <input name="tranfer_wait4" id="tranfer_wait4" type="text" class="STYLE1" style="height:18px; width:30px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_wait4']; ?>
' />
              秒</div></td>
          </tr>
          <tr>
            <td height="19" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1">绑定电话5 <span class="STYLE7">
              <input name="tranfer_callee5"  <?php if ($this->_tpl_vars['limitbindtel'] <= 4): ?> disabled="disabled" <?php endif; ?> id="tranfer_callee5" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_callee5']; ?>
' />
              </span>呼叫等待
              <input name="tranfer_wait5" id="tranfer_wait5" type="text" class="STYLE1" style="height:18px; width:30px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_wait5']; ?>
' />
              秒&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td height="19" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;绑定电话6 <span class="STYLE7">
              <input name="tranfer_callee6"   <?php if ($this->_tpl_vars['limitbindtel'] <= 5): ?> disabled="disabled" <?php endif; ?>  id="tranfer_callee6" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_callee6']; ?>
' />
              </span>呼叫等待
              <input name="tranfer_wait6" id="tranfer_wait6" type="text" class="STYLE1" style="height:18px; width:30px;" size="30"  value='<?php echo $this->_tpl_vars['user']['tranfer_wait6']; ?>
' />
              秒</div></td>
          </tr>
          
          <tr>
            <td height="19" colspan="4" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><span class="STYLE4">其他设置</span></span></div></td>
          </tr>
          <tr>
            <td height="19" colspan="4" align="right" bgcolor="#FFFFFF"><div align="center">
              <label for="bindexten_type"><span class="STYLE1">
                自动加前缀:
                    <select name="bindexten_type" class="STYLE1" id="bindexten_type"  >
                  <option value="0"   <?php if ($this->_tpl_vars['user']['bindexten_type'] == 0): ?>selected<?php endif; ?> > 不加前缀</option>
                  <option value="1"   <?php if ($this->_tpl_vars['user']['bindexten_type'] == 1): ?>selected<?php endif; ?> > SIP回拨都加</option>
                  <option value="2"   <?php if ($this->_tpl_vars['user']['bindexten_type'] == 2): ?>selected<?php endif; ?> > 只有SIP加</option>
                  <option value="3"   <?php if ($this->_tpl_vars['user']['bindexten_type'] == 3): ?>selected<?php endif; ?> > 只有回拨加</option>
                  <option value="4"   <?php if ($this->_tpl_vars['user']['bindexten_type'] == 4): ?>selected<?php endif; ?> > 只有直拨加</option>
                </select>
              </span></label>
              <span class="STYLE1">直拨被叫、半直拨被叫、回拨被叫加</span> <span class="STYLE1">
              <input name="bindexten" type="text" class="STYLE1" id="bindexten" style="height:18px; width:45px;"  value='<?php echo $this->_tpl_vars['user']['bindexten']; ?>
' size="10" />
SIP加
<input name="bindexten_sip" type="text" class="STYLE1" id="bindexten_sip" style="height:18px; width:45px;"  value='<?php echo $this->_tpl_vars['user']['bindexten_sip']; ?>
' size="10" />
回拨回铃加
<input name="bindexten_cb" type="text" class="STYLE1" id="bindexten_cb" style="height:18px; width:45px;"  value='<?php echo $this->_tpl_vars['user']['bindexten_cb']; ?>
' size="10" />
              </span>
              </label>
              </span></div></td>
            </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span class="STYLE1">单次通话限制</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="talk_timelong" id="talk_timelong" type="text" class="STYLE1" style="height:18px; width:60px;" size="10"  value='<?php echo $this->_tpl_vars['user']['talk_timelong']; ?>
' />
              秒(0表示不限制)</span></td>
            <td height="19" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
  
          <tr>
            <td height="18" colspan="4" align="center" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" colspan="4" align="center" bgcolor="#FFFFFF">
              
              <input type="button"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="check('<?php echo $this->_tpl_vars['id']; ?>
')" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="button"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['agent_id']; ?>
')" value=" 取消返回 ">              </td>
            </tr>
 
    </table></td>
  </tr>
  </form>

</table>
</body>
<script>
		 $("input:text,input:password,textarea").focus(function(){
			 if (this.value == '请输入') this.value = '';
			 $(this).css("background","#a8c7ce");
			 }).blur(function(){
				 $(this).css("background","#FFF");
			 }); 
		
</script>      

</html>