<?php /* Smarty version 2.6.26, created on 2014-10-31 00:26:58
         compiled from agent_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'agent_edit.html', 136, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    <script src="./js/calendar/WdatePicker.js"></script>
  <link rel="stylesheet" href="./css/demos.css">
    
    
<title>编辑代理商</title>
<script>
	function trim_all_input()
	{
		var inpus = document.getElementsByTagName("INPUT")
        for(var i=0; i<inpus.length; i++)
        {
            if(inpus[i].type=="text")
            {
               inpus[i].value =  inpus[i].value.replace(/(^/s*)|(/s*$)/g,"");
            }
        }
		
	}
	
	// 提交前检测输入是否合法
	function check(discharge_level,balance)
	{
		trim_all_input(); //所有input 去空格

        if ($('#acctname').val() == '')
		  return false;
        if ($('#password').val() == '')
		  return false;
        if ($('#agent_prefix').val() == '')
		  return false;
		  		 			
	    return true;
		//return true;

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
                <td width="98%" valign="bottom"><span class="STYLE10"> 编辑配置代理商</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
 <form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&id=<?php echo $this->_tpl_vars['encode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
  <tr>
    <td><table width="1052" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
    <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">上基本信息</span><span class="STYLE1">            </span></div></td>
            <td height="18" colspan="4" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">IVR设置</span><span class="STYLE1"> </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">代理名称</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="acctname" id="acctname" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['acctname']; ?>
'  disabled />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">绑定电话数量</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="limitbindtel"  id="limitbindtel" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['limitbindtel']; ?>
' size="30"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?>/>
              <span class="STYLE1"> 是否修改绑定号码
              <select name="user_edit_bindtel" id="user_edit_bindtel"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['user_edit_bindtel'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['user_edit_bindtel'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >密码</span></td>
            <td width="24%" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="password"  id="password"  type="password" class="STYLE1" style="height:18px; width:120px;"  value='<?php echo $this->_tpl_vars['acct']['password']; ?>
' size="80" />
            </span></td>
            <td width="13%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >IVR语言</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF">
                          <span class="STYLE7">
                <select name="language" id="language"  >
				  <option  value="cn" <?php if ($this->_tpl_vars['acct']['language'] == 'select'): ?> selected <?php endif; ?> >   选择语言  </option>
                  <option  value="cn" <?php if ($this->_tpl_vars['acct']['language'] == 'cn'): ?> selected <?php endif; ?> > 中文  </option>
                  <option  value="en" <?php if ($this->_tpl_vars['acct']['language'] == 'en'): ?> selected <?php endif; ?> > 英文  </option>
				  <option  value="fr" <?php if ($this->_tpl_vars['acct']['language'] == 'fr'): ?> selected <?php endif; ?> > 法文  </option>
                </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">储值卡前缀</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="agent_prefix"  id="agent_prefix" type="text" class="STYLE1" style="height:18px; width:120px;"  value='<?php echo $this->_tpl_vars['acct']['agent_prefix']; ?>
' size="30"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?> />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >呼叫等待彩铃</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF">
              <span class="STYLE7">
               <select name="bcall_waitring" id="bcall_waitring"  >
                <option  value="-1"  <?php if ($this->_tpl_vars['acct']['bcall_waitring'] == '-1'): ?> selected <?php endif; ?> > 不启用 </option>
                <option  value="0"   <?php if ($this->_tpl_vars['acct']['bcall_waitring'] == '0'): ?> selected <?php endif; ?>  > 系统默认  </option>
                <?php $_from = $this->_tpl_vars['musiconholdlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['bcall_waitring']): ?> selected <?php endif; ?> >
                  <?php echo $this->_tpl_vars['eachone']['description']; ?>

                 </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
                               
                <select name="bcall_waitring_second" id="bcall_waitring_second"  >
                  <option  value="1" <?php if ($this->_tpl_vars['acct']['bcall_waitring_second'] == '1'): ?> selected <?php endif; ?> > 真实彩铃出现停止   </option>
                  <option  value="0" <?php if ($this->_tpl_vars['acct']['bcall_waitring_second'] == '0'): ?> selected <?php endif; ?> > 一直使用设置彩铃   </option>
                </select>
              </span></td>
          </tr>
          <tr>
            <td width="14%" height="26" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >余额</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="balance"  id="balance" type="text" class="STYLE1" style="height:18px; width:120px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.6f") : smarty_modifier_string_format($_tmp, "%.6f")); ?>
' size="30" disabled="disabled" />
              <span class="STYLE1">元</span></span></td>
            <td height="26" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回铃接通输入被叫</span></td>
            <td height="26" colspan="3" bgcolor="#FFFFFF"><label for="tech"></label>
             <span class="STYLE7">
                <input name="cbinputcount"  id="cbinputcount" type="text" class="STYLE1" style="height:18px; width:40px;"  value='<?php echo $this->_tpl_vars['acct']['cbinputcount']; ?>
' size="30" />
                <span class="STYLE1">次后自动挂机</span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">透支金额</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="overbalance"  id="overbalance" type="text" class="STYLE1" style="height:18px; width:120px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['overbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
' size="30"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>disabled<?php endif; ?> />
              <span class="STYLE1">元</span></span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回铃接通后按*键</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="cbdtmfhangup" id="cbdtmfhangup"  >
                <option  value="0" <?php if ($this->_tpl_vars['acct']['cbdtmfhangup'] == '0'): ?> selected <?php endif; ?> > 不启用该按键 </option>
                <option  value="1" <?php if ($this->_tpl_vars['acct']['cbdtmfhangup'] == '1'): ?> selected <?php endif; ?> > 挂断呼叫 </option>
                <option  value="2" <?php if ($this->_tpl_vars['acct']['cbdtmfhangup'] == '2'): ?> selected <?php endif; ?> > 进入IVR流程 </option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">短信余额</span></td>
            <td bgcolor="#FFFFFF"><input name="smsbalance"  id="smsbalance" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['smsbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
' size="30" disabled="disabled" />
            <span class="STYLE1">元</span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >半直拨接通方式</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF">
              <select name="cbacall_bacll" id="cbacall_bacll"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['cbacall_bacll'] == '1'): ?> selected <?php endif; ?> > 主叫和被叫同时接通 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['cbacall_bacll'] == '0'): ?> selected <?php endif; ?> > 先接通主叫后在呼叫被叫 </option>
              </select>           </td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">可操作金额</td>
            <td bgcolor="#FFFFFF">
			<input name="paybalance"  id="paybalance" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['paybalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
' size="30"  disabled="disabled" />
            <span class="STYLE1">元</span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">回拨被叫接通后计费</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="acall_bill_flag" id="acall_bill_flag"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['acall_bill_flag'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['acall_bill_flag'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>

          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">传真套餐</td>
            <td bgcolor="#FFFFFF"> <select name="fax_ratepage_id" id="fax_ratepage_id"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>disabled<?php endif; ?>>
                <?php $_from = $this->_tpl_vars['faxratepages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['fax_ratepage_id']): ?> selected <?php endif; ?> >
                <?php echo $this->_tpl_vars['eachone']['name']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">回铃接通</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="acallbillcount"  id="acallbillcount" type="text" class="STYLE1" style="height:18px; width:30px;"  value='<?php echo $this->_tpl_vars['acct']['acallbillcount']; ?>
' size="30" />
次不电话扣费
<input name="acallbillbalance"  id="acallbillbalance" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['acallbillbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
' size="30" />
元</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回拨路由组</span></td>
            <td bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="gatewaygroupid_acall" id="gatewaygroupid_acall"   <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>disabled<?php endif; ?> >
                  <?php $_from = $this->_tpl_vars['routegroups_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['gatewaygroupid_acall']): ?> selected <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['gatewaygroupname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
              </select>
              </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >直拨、回拨呼叫报分钟</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="playtimelong" id="playtimelong"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['playtimelong'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['playtimelong'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >被叫路由组</span></td>
            <td bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="gatewaygroupid" id="gatewaygroupid"   <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>disabled<?php endif; ?> >
                  <?php $_from = $this->_tpl_vars['routegroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['gatewaygroupid']): ?> selected <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['gatewaygroupname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
              </select>
              </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >中继预约报余额</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="trunk_playbanlce" id="trunk_playbanlce"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['trunk_playbanlce'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['trunk_playbanlce'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回拨费率组</span></td>
            <td bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="rategroupid_acall" id="rategroupid_acall"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>disabled<?php endif; ?> >
                  <?php $_from = $this->_tpl_vars['rategroups_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['rategroupid_acall']): ?> selected <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
              </select>
              </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回拨回铃报余额</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="callback_playbanlce" id="callback_playbanlce"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['callback_playbanlce'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['callback_playbanlce'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >被叫费率组</span></td>
            <td bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="rategroupid" id="rategroupid"    <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>disabled<?php endif; ?>>
                  <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['rategroupid']): ?> selected <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
              </select>
              </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >通话结束后报余额</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="billend_playbanlce" id="billend_playbanlce"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['billend_playbanlce'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['billend_playbanlce'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td rowspan="8" bgcolor="#FFFFFF"><span class="STYLE7">
              <select style="width:250px" size="5" multiple="multiple" name="ratepackages[]"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>disabled<?php endif; ?>>
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
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">中继预约语音</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="callback_submit_bye" id="callback_submit_bye"  >
                <option  value="-2" <?php if ($this->_tpl_vars['acct']['callback_submit_bye'] == '-2'): ?> selected="selected" <?php endif; ?> > 不播放 </option>
				<option  value="-1" <?php if ($this->_tpl_vars['acct']['callback_submit_bye'] == '-1'): ?> selected="selected" <?php endif; ?> > 系统默认 </option>
                <?php $_from = $this->_tpl_vars['wav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['callback_submit_bye']): ?>selected<?php endif; ?>  >
                <?php echo $this->_tpl_vars['eachone']['description']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">半直拨预约输入号码语音</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="callback_submit_input" id="callback_submit_input"  >
                <option  value="-1" <?php if ($this->_tpl_vars['acct']['callback_submit_input'] == '-1'): ?> selected="selected" <?php endif; ?> > 系统默认 </option>
                <?php $_from = $this->_tpl_vars['wav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['callback_submit_input']): ?>selected<?php endif; ?>  >
                <?php echo $this->_tpl_vars['eachone']['description']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">套餐</span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">回铃输入号码语音</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="playwelecome" id="playwelecome"  >
                <option  value="-1" <?php if ($this->_tpl_vars['acct']['playwelecome'] == '-1'): ?> selected="selected" <?php endif; ?> > 系统默认 </option>
                <?php $_from = $this->_tpl_vars['wav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['playwelecome']): ?>selected<?php endif; ?>  >
                  <?php echo $this->_tpl_vars['eachone']['description']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">直拨输入号码语音</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="derect_submit_input" id="derect_submit_input"  >
                <option  value="-1" <?php if ($this->_tpl_vars['acct']['derect_submit_input'] == '-1'): ?> selected="selected" <?php endif; ?> > 系统默认 </option>
                <?php $_from = $this->_tpl_vars['wav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['derect_submit_input']): ?>selected<?php endif; ?>  >
                <?php echo $this->_tpl_vars['eachone']['description']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">直拨输入号码位数</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="derect_input_len"  id="derect_input_len" type="text" class="STYLE1" style="height:18px; width:80px;"  value='<?php echo $this->_tpl_vars['acct']['derect_input_len']; ?>
' size="30" />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">呼叫被叫等待时长</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="waitring_timelong"  id="waitring_timelong" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['waitring_timelong']; ?>
' size="30" />
秒</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">半直拨预约被叫位数</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7"><span class="STYLE1">
              <input name="abcall_dest_len"  id="abcall_dest_len" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['abcall_dest_len']; ?>
' size="30" />
(0表示不限制)</span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">每次通话最大时长</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="maxcall_timelong"  id="maxcall_timelong" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['maxcall_timelong']; ?>
' size="30" />
            秒 </span></td>
          </tr>

          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1"><span class="STYLE4">CC外呼任务并发</span></span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="curmaxcall"  id="curmaxcall" type="text" class="STYLE1" style="height:18px; width:60px;"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?>  value='<?php echo $this->_tpl_vars['acct']['curmaxcall']; ?>
' size="30" />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">自动禁用</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1"><span class="STYLE7">
              <select name="off_state" id="off_state"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['off_state'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['off_state'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span>开始</span>
              <input type="text" name="off_begintime" id="off_begintime" class="Wdate"  readonly="readonly"  style="height:18px; width:80px;"  onfocus="WdatePicker({skin:'whyGreen',dateFmt:'HH:mm:ss'})" value='<?php echo $this->_tpl_vars['acct']['off_begintime']; ?>
'/>
-<span class="STYLE1">结束</span>
<input type="text"  name="off_endtime" id="off_endtime" class="Wdate"  readonly="readonly"  style="height:18px; width:80px;"  onfocus="WdatePicker({skin:'whyGreen',dateFmt:'HH:mm:ss'})" value='<?php echo $this->_tpl_vars['acct']['off_endtime']; ?>
'/></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">禁呼叫号码池</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="forbidcallee_id" id="forbidcallee_id"   <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?>>
                <option  value="-1" > 不启用 </option>
                <?php $_from = $this->_tpl_vars['callergroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['forbidcallee_id']): ?> selected="selected" <?php endif; ?> >
                <?php echo $this->_tpl_vars['eachone']['callergroup_name']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">被叫手机号加区号</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="addcitycode" class="STYLE1" id="addcitycode"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['addcitycode'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['addcitycode'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">CC建立客服数</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="limit_user_count"  id="limit_user_count" type="text" class="STYLE1" style="height:18px; width:60px;"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?>  value='<?php echo $this->_tpl_vars['acct']['limit_user_count']; ?>
' size="30" />
个</span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">区号</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="citycode" id="citycode" type="text" class="STYLE1" style="height:18px; width:220px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['citycode']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">忙时时段</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="buy_hour_start" class="STYLE1" id="buy_hour_start"  >
                <?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['value']; ?>
" <?php if ($this->_tpl_vars['eachone']['value'] == $this->_tpl_vars['acct']['buy_hour_start']): ?> selected="selected" <?php endif; ?> >
                <?php echo $this->_tpl_vars['eachone']['name']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span>-<span class="STYLE7">
            <select name="buy_hour_end" class="STYLE1" id="buy_hour_end"  >
              <?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
              <option  value="<?php echo $this->_tpl_vars['eachone']['value']; ?>
" <?php if ($this->_tpl_vars['eachone']['value'] == $this->_tpl_vars['acct']['buy_hour_end']): ?> selected="selected" <?php endif; ?> >
              <?php echo $this->_tpl_vars['eachone']['name']; ?>

              </option>
              <?php endforeach; endif; unset($_from); ?>
            </select>
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">(0371,010,020
            代表 郑州,北京,广州地区的手机自动加区号)</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">一号通激活数</span></td>
            <td bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="active_user_count"  id="active_user_count" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['active_user_count']; ?>
' size="30" />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">充值卡充值用户过期余额清空</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">
              <select name="expiredinitbalance" id="expiredinitbalance"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['expiredinitbalance'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['expiredinitbalance'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">充值卡充值累加有效期</span></td>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><span class="STYLE1">
              <select name="user_expiredday_add" id="user_expiredday_add"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['user_expiredday_add'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['user_expiredday_add'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
 
   
          
		  <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">自动注册密匙</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="air_bindmd5"  id="air_bindmd5" type="text" class="STYLE1" style="height:18px; width:240px;"  value='<?php echo $this->_tpl_vars['acct']['air_bindmd5']; ?>
' size="30" />
            </span></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">自动注册费率组</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">回铃费率组
                <select name="air_rategroupid_acall" id="air_rategroupid_acall"  >
                  <?php $_from = $this->_tpl_vars['user_rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['air_rategroupid_acall']): ?> selected="selected" <?php endif; ?> >
                  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
                </select>
被叫费率组
<select name="air_rategroupid" id="air_rategroupid"  >
  <?php $_from = $this->_tpl_vars['user_rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['air_rategroupid']): ?> selected="selected" <?php endif; ?> >
  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

  </option>
  <?php endforeach; endif; unset($_from); ?>
</select>
&nbsp;  &nbsp;注册赠送
<input name="air_gift"  id="air_gift" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['air_gift'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
' size="30" />
元    &nbsp;  &nbsp;注册赠送
<input name="air_gif_per"  id="air_gif_per" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['air_gif_per']; ?>
' size="30" />
分钟 推荐赠送
<input name="recommendbalance"  id="recommendbalance" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['recommendbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
' size="30" />
元 有效期
<input name="air_expireddays"  id="air_expireddays" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['air_expireddays']; ?>
' size="30" />
天</span></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">储值卡面值(有效期)</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="card_balance_day" id="card_balance_day" type="text"  style="height:18px; width:420px;" size="140"  value='<?php echo $this->_tpl_vars['acct']['card_balance_day']; ?>
' />
              <span class="STYLE4">格式:面值+赠送(有效期) 30+0(30);100+0(60)</span></span></td>
          </tr>        
       
	   <?php endif; ?>
	   
        <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1' || $this->_tpl_vars['acct']['sms_level'] == '1'): ?>
          <tr>
            <td height="24" colspan="6" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="24" colspan="6" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4">短信提醒设置</span><span class="STYLE1"> </span></div></td>
          </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span class="STYLE4">充值提醒开关</span></td>
            <td height="19" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="recharge_smshit" id="recharge_smshit"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['recharge_smshit'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['recharge_smshit'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">短信通道网址</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="smsurl" id="smsurl" type="text" class="STYLE1" style="height:18px; width:480px;"   value='<?php echo $this->_tpl_vars['acct']['smsurl']; ?>
' />
            短信编码
            <select name="smscharset" id="smscharset"  >
              <option  value="GB2312" <?php if ($this->_tpl_vars['acct']['smscharset'] == 'GB2312'): ?> selected="selected" <?php endif; ?> > GB2312 </option>
              <option  value="UTF-8"  <?php if ($this->_tpl_vars['acct']['smscharset'] == 'UTF-8'): ?> selected="selected" <?php endif; ?> > UTF-8 </option>
            </select>
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE4">短信内容</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="smsmsg" id="smsmsg" type="text"  style="height:18px; width:620px;" size="140"  value='<?php echo $this->_tpl_vars['acct']['smsmsg']; ?>
' />
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">格式</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">电话字段在前，短信内容字段在后，分别用%s表示<span class="STYLE4"> http://***/send.asp?USERNAME=****&amp;PASSWORD=****&amp;MOBILE=%s&amp;CONTENT=%s</span></span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE21">尊敬的客户：您已成功充值%s元 余额%s元 感谢您的使用！客户热线10010</span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1"><span class="STYLE21">发送测试</span></span><span class="STYLE21">手机号码</span><span class="STYLE1">
                <input name="sendsmstel" id="sendsmstel" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='' />
                <input  type="button"  class="STYLE1"   name="button22" id="button22"   onclick="sendtestsms('<?php echo $this->_tpl_vars['encode_id']; ?>
')" value=" 发 送 " />
                        </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="24" colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">推荐赠送提醒</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="recommend_smsmsg_flag" id="recommend_smsmsg_flag"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['recommend_smsmsg_flag'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['recommend_smsmsg_flag'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE4">短信内容</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="recommend_smsmsg" id="recommend_smsmsg" type="text"  style="height:18px; width:620px;" size="140"  value='<?php echo $this->_tpl_vars['acct']['recommend_smsmsg']; ?>
' />
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE21">尊敬的客户：您推荐的用户成功充值！您将得到%s元话费的奖励！</span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">亲情号短信提醒</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="btob_smsmsg_flag" id="btob_smsmsg_flag"  >
                <option  value="1" <?php if ($this->_tpl_vars['acct']['btob_smsmsg_flag'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
                <option  value="0" <?php if ($this->_tpl_vars['acct']['btob_smsmsg_flag'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE4">短信内容</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="btob_smsmsg" id="btob_smsmsg" type="text"  style="height:18px; width:620px;" size="140"  value='<?php echo $this->_tpl_vars['acct']['btob_smsmsg']; ?>
' />
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE21">亲爱的用户,已为您加入亲情拔号,您的亲情号码是:%s,您可以直接拔打该号码来联系您的朋友:%s</span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">被叫广告提醒</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="bcall_smsmsg_flag" id="bcall_smsmsg_flag"  >
			     
                
                
				<option  value="1" <?php if ($this->_tpl_vars['acct']['bcall_smsmsg_flag'] == '1'): ?> selected="selected" <?php endif; ?> > 系统未绑定号码 </option>
				<option  value="2" <?php if ($this->_tpl_vars['acct']['bcall_smsmsg_flag'] == '2'): ?> selected="selected" <?php endif; ?> > 所有号码 </option>
				<option  value="0" <?php if ($this->_tpl_vars['acct']['bcall_smsmsg_flag'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
              </select>
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE4">短信内容</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="bcall_smsmsg" id="bcall_smsmsg" type="text"  style="height:18px; width:620px;" size="140"  value='<?php echo $this->_tpl_vars['acct']['bcall_smsmsg']; ?>
' />
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="24" colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          
		  
		  		<?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
                
                <tr >
                  <td height="24" colspan="6" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4">个人信息</span></div></td>
                </tr>
                <tr >
                  <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">所属区域</span></td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><div align="left"><span class="STYLE7">
                    <input name="areacode" id="areacode" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['areacode']; ?>
' />
                  </span></div></td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">职位</span></td>
                  <td width="12%" height="24" align="right" bgcolor="#FFFFFF"><div align="left"><span class="STYLE7">
                    <input name="businesslicense" id="businesslicense" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['businesslicense']; ?>
' />
                  </span></div></td>
                  <td width="8%" height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">联系电话</span></td>
                  <td width="29%" height="24" align="right" bgcolor="#FFFFFF"><div align="left"><span class="STYLE7">
                    <input name="tel" id="tel" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['tel']; ?>
' />
                  </span></div></td>
                </tr>
                <tr >
                  <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">所属部门</span></td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><div align="left"><span class="STYLE7">
                    <input name="position" id="position" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['position']; ?>
' />
                  </span></div></td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">姓名</span></td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><div align="left"><span class="STYLE7">
                    <input name="chinesename" id="chinesename" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['chinesename']; ?>
' />
                  </span></div></td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">电子邮件</span></td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><div align="left"><span class="STYLE7">
                    <input name="email" id="email" type="text" class="STYLE1" style="height:18px; width:220px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['email']; ?>
' />
                  </span></div></td>
                </tr>
                <tr >
                  <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">银行卡号</span></td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><div align="left"><span class="STYLE7">
                    <input name="idcard" id="idcard" type="text" class="STYLE1" style="height:18px; width:220px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['idcard']; ?>
' />
                  </span></div></td>
                  <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><div align="left"></div></td>
                  <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="24" align="right" bgcolor="#FFFFFF"><div align="left"></div></td>
                </tr>
                <tr >
                  <td height="24" colspan="6" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
          <tr >
            <td height="24" colspan="6" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4">接口呼叫</span></div></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF">API接口呼叫</td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><select name="httpgateway_flag" id="httpgateway_flag"  >
              <option  value="1" <?php if ($this->_tpl_vars['acct']['httpgateway_flag'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['acct']['httpgateway_flag'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
            </select></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">接口</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="httpcall_url" id="httpcall_url" type="text"  style="height:18px; width:620px;"   value='<?php echo $this->_tpl_vars['acct']['httpcall_url']; ?>
' />
            </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">http://ip:port/call.php?主叫=</span><span class="STYLE4">[caller]</span><span class="STYLE1">&amp;被叫=</span><span class="STYLE4">[callee]</span><span class="STYLE1">&amp;时长=</span><span class="STYLE4">[plantime]</span><span class="STYLE1">&amp;name=账号&amp;pwd=密码 备注:<span class="STYLE4">[caller]</span> 主叫参数 <span class="STYLE4">[callee]</span>被叫参数 <span class="STYLE4">[plantime]</span>通话时长</span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE4">启动并发</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="httpcall_max_line"  id="httpcall_max_line" type="text" class="STYLE1" style="height:18px; width:60px;"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?>  value='<?php echo $this->_tpl_vars['acct']['httpcall_max_line']; ?>
' size="50" />
            线</span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE4">拨号前缀</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="httpcall_prefix"  id="httpcall_prefix" type="text" class="STYLE1" style="height:18px; width:240px;"  value='<?php echo $this->_tpl_vars['acct']['httpcall_prefix']; ?>
' />
            多个前缀可以用 小逗号分开 比如: 0,1,138 </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE4">替换规则</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="httpcall_prefix_replace"  id="httpcall_prefix_replace" type="text" class="STYLE1" style="height:18px; width:440px;"  value='<?php echo $this->_tpl_vars['acct']['httpcall_prefix_replace']; ?>
' />
            多个前缀可以用 小分号分开 比如: 61&gt;1;81&gt;1 </span></td>
          </tr>
          <tr >
            <td height="24" align="right" bgcolor="#FFFFFF"><span class="STYLE1">IP地址</span></td>
            <td height="24" colspan="5" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="httpcall_ip"  id="httpcall_ip" type="text" class="STYLE1" style="height:18px; width:240px;"  value='<?php echo $this->_tpl_vars['acct']['httpcall_ip']; ?>
' size="30" />
              计费单位
              <input name="httpcall_payunitsecond"  id="httpcall_payunitsecond" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['httpcall_payunitsecond']; ?>
' size="30" />
            秒 单价
            <input name="httpcall_price"  id="httpcall_price" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['httpcall_price']; ?>
' size="30" />
            元（仅用于统计)</span></td>
          </tr>
 	 <?php endif; ?>  
        <?php endif; ?></table>
      <table width="1052" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"><tr></tr></table>
          <table width="1052" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"><tr></tr>
         
          <tr>
            <td height="18" colspan="6" align="right" bgcolor="#FFFFFF" class="ui-accordion-header-active"><div align="center"><span class="STYLE1">权限设置</span></div></td>
          </tr>
          <tr>
            <td height="18" colspan="6" align="right" bgcolor="#FFFFFF" class="ui-accordion-header-active"><div align="center">
              <input name="callerid_type" type="checkbox" class="STYLE1" id="callerid_type"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?> disabled <?php endif; ?> <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['callerid_type'] != '1'): ?> disabled<?php endif; ?><?php endif; ?>   <?php if ($this->_tpl_vars['acct']['callerid_type'] == '1'): ?> checked<?php endif; ?>>
              <label for="callerid_type" class="STYLE1">改主叫号码</label>
              <input name="newuser_level" type="checkbox" class="STYLE1" id="newuser_level"    <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled<?php endif; ?><?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['newuser_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['newuser_level'] == '1'): ?> checked <?php endif; ?> >
              <label for="newuser_level" class="STYLE1">创建用户</label>
              <input name="newcard_level" type="checkbox" class="STYLE1" id="newcard_level"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?> <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['newcard_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['newcard_level'] == '1'): ?> checked <?php endif; ?> >
              <label for="newcard_level" class="STYLE1">创建储值卡</label>
              <input name="update_level" type="checkbox" class="STYLE1" id="update_level"   <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?><?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['update_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['update_level'] == '1'): ?> checked <?php endif; ?>  >
              <label for="update_level" class="STYLE1">批量修改</label>

              <input name="voicefile_level" type="checkbox" class="STYLE1" id="voicefile_level"   <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?><?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['voicefile_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['voicefile_level'] == '1'): ?> checked <?php endif; ?>  >
              <label for="voicefile_level" class="STYLE1">文件自动审核</label>
              
                   <input name="sms_level" type="checkbox" class="STYLE1" id="sms_level"   <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?><?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['sms_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['sms_level'] == '1'): ?> checked <?php endif; ?>  >
              <label for="sms_level" class="STYLE1">短信通道</label>
			  
			                    <input name="listuser_level" type="checkbox" class="STYLE1" id="listuser_level"   <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?><?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['listuser_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['listuser_level'] == '1'): ?> checked <?php endif; ?>  >
              <label for="listuser_level" class="STYLE1">面值查看用户</label> 
            </div></td>
          </tr>
        
          <tr>
            <td height="18" colspan="6" align="right" bgcolor="#FFFFFF" class="ui-accordion-header-active"><div align="center">
              <input name="agents_have" type="checkbox" class="STYLE1" id="agents_have"    <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?> <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['agents_have'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['agents_have'] == '1'): ?> checked <?php endif; ?> >
              <label for="agents_have" class="STYLE1">建下级代理</label>
              <input name="downloaduser_level" type="checkbox" class="STYLE1" id="downloaduser_level"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?><?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['downloaduser_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['downloaduser_level'] == '1'): ?> checked <?php endif; ?> >
              <label for="downloaduser_level" class="STYLE1">导出用户</label>
              <input name="downloadcard_level" type="checkbox" class="STYLE1" id="downloadcard_level"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled<?php endif; ?><?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['downloadcard_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['downloadcard_level'] == '1'): ?> checked <?php endif; ?> >
              <label for="downloadcard_level" class="STYLE1">导出储值卡</label>
              <input name="rate_level" type="checkbox" class="STYLE1" id="rate_level"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?> <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['rate_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['rate_level'] == '1'): ?> checked <?php endif; ?>  >
              <label for="rate_level" class="STYLE1">用户费率</label>
              <input name="callinglist_level" type="checkbox" class="STYLE1" id="callinglist_level"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?>   <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['callinglist_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['callinglist_level'] == '1'): ?> checked <?php endif; ?> />
              <span class="STYLE1">监控线路呼叫</span> 
              

  <input name="vocrecord_level" type="checkbox" class="STYLE1" id="vocrecord_level"  <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?>   <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['vocrecord_level'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['vocrecord_level'] == '1'): ?> checked <?php endif; ?> />
              <span class="STYLE1">坐席录音</span> 
			  
  <input name="user_set_balance" type="checkbox" class="STYLE1" id="user_set_balance"   <?php if ($this->_tpl_vars['res_acct']['id'] == $this->_tpl_vars['acct']['id']): ?>  disabled <?php endif; ?> <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?><?php if ($this->_tpl_vars['res_acct']['user_set_balance'] != '1'): ?> disabled<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['acct']['user_set_balance'] == '1'): ?> checked <?php endif; ?> />
              <label for="user_set_balance" class="STYLE1">允许现金充值</label>
</div></td>
          </tr>
<?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>     
          <tr>
            <td height="18" colspan="6" align="right" bgcolor="#FFFFFF" class="ui-accordion-header-active"><div align="center"><span class="STYLE1">通话赠送设置</span></div>              
            <div align="center"></div></td>
          </tr>
          <tr>
            <td height="25" colspan="6" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">易宝支付赠送百分比<span class="STYLE7">
              <input name="yeepay_gifper"  id="yeepay_gifper" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['yeepay_gifper']; ?>
' size="30"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?>/>
            </span>%</span></div></td
          >
          </tr>
          <tr>
            <td height="25" colspan="6" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">1：通话</span><span class="STYLE1">
              <input name="gift_timelevel1"  id="gift_timelevel1" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['gift_timelevel1']; ?>
' size="30" />
              </span><span class="STYLE1">秒后加 </span><span class="STYLE1">
                <input name="gift_timelong1"  id="gift_timelong1" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['gift_timelong1']; ?>
' size="30" />
              </span><span class="STYLE1">秒</span> <span class="STYLE1">2：通话</span><span class="STYLE1">
              <input name="gift_timelevel2"  id="gift_timelevel2" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['gift_timelevel2']; ?>
' size="30" />
              </span><span class="STYLE1">秒后加 </span><span class="STYLE1">
              <input name="gift_timelong2"  id="gift_timelong2" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['gift_timelong2']; ?>
' size="30" />
              </span><span class="STYLE1">秒</span> <span class="STYLE1">3：通话</span><span class="STYLE1">
              <input name="gift_timelevel3"  id="gift_timelevel3" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['gift_timelevel3']; ?>
' size="30" />
              </span><span class="STYLE1">秒后加 </span><span class="STYLE1">
              <input name="gift_timelong3"  id="gift_timelong3" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['gift_timelong3']; ?>
' size="30" />
              </span><span class="STYLE1">秒</span></div></td
          ></tr>
          <tr>
            <td height="25" colspan="6" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">话单分钟单位</span><span class="STYLE7">
            <input name="minute_len"  id="minute_len" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['minute_len']; ?>
' size="30"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?> />
            <span class="STYLE1">秒</span></span> <span class="STYLE1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;修正时间</span><span class="STYLE7">
            <input name="timepercent"  id="timepercent" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['timepercent']; ?>
' size="30"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?>/>
            </span><span class="STYLE1">%</span> <span class="STYLE1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;昨天话单修正</span><span class="STYLE7">
            <input name="updatecdr_per"  id="updatecdr_per" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['updatecdr_per']; ?>
' size="30"  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>disabled<?php endif; ?>/>
            </span><span class="STYLE1">%</span></div></td>
          </tr>
  <?php endif; ?>
          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF">
              
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="backbutton"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
')" value=" 取消返回 "> </td>
          </tr>
     
    </table></td>
  </tr>
  </form>

  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       
        <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>

            <td width="35">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
<script>

	function goback(curpage)
	{
	    document.form1.action = '?action=list&curpage='+curpage;
		document.form1.submit();
	}
	
	function sendtestsms(varid)
	{
	
	   if ($('#sendsmstel').val() != '')
	   {
		   var vartel = $('#sendsmstel').val();
		
		    alert ('开始给电话' + vartel +'发送测试短信');
			  $.get("agents.php?action=send_sms",{sendsmstel :vartel,id:varid}, function(data){ 
						  if (data == '0')  alert ('提交发送测试短信成功');
						  else alert (data);
		  });	   
		}
	   else
	   {
	      alert ('请输入您发送测试的电话号码');
	   }


	   

						
	}
				
		 $("input:text,input:password,textarea").focus(function(){
			 if (this.value == '请输入') this.value = '';
			 $(this).css("background","#a8c7ce");
			 }).blur(function(){
				 if (this.id == 'agent_prefix'  )
				 {
					 var info = ''; 
					 var agent_prefix = $.trim(this.value) ;
					 if (agent_prefix == '')
					 { 
					      info ='<font color="#FF0000">'+'请输入完整储值卡前缀</font>';
						  $('#div_trips').html(info);
						  $(this).focus;
						  $(this).css("background","#CBFE9F");
					 }
					 else
					 {
					 }
				 }

				 $(this).css("background","#FFF");
				 
				
			 }); 
</script>    

</html>