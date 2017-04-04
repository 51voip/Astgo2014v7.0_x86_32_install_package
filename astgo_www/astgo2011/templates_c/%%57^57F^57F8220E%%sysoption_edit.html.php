<?php /* Smarty version 2.6.26, created on 2014-10-31 00:21:51
         compiled from sysoption_edit.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    
<title>系统设置</title>
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
                <td width="98%" valign="bottom"><span class="STYLE10"> 系统设置</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  

  <tr>
    <td><table width="687" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
   <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4"><span class="STYLE7"><span class="STYLE1">基本设置</span> </span></span></div></td>
          </tr>
          <form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
">
          <tr>
            <td width="42%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >管理员邮箱</span></td>
            <td width="58%" bgcolor="#FFFFFF"><label for="host"></label>
              <span class="STYLE7">
                <input name="ADMIN_MAIL" id="ADMIN_MAIL" type="text" class="STYLE1" style="height:18px; width:240px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['ADMIN_MAIL']; ?>
'   />
              </span></td>
            </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">IVR脚本目录</td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="WEB_AGI_PATH" id="WEB_AGI_PATH" type="text" class="STYLE1" style="height:18px; width:240px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['WEB_AGI_PATH']; ?>
'   />
              <span class="STYLE1">ivrmain.php</span></span>
            <div align="center" class="STYLE1"></div></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">自动冻结过期帐号</td>
            <td bgcolor="#FFFFFF"><select name="SYS_AUTO_DISABLE_EXPUSER" class="STYLE1" id="SYS_AUTO_DISABLE_EXPUSER"  >
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['SYS_AUTO_DISABLE_EXPUSER'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['SYS_AUTO_DISABLE_EXPUSER'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
            </select></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">最大通话限制</td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="CB_MAXCALL_TIMELONG" id="CB_MAXCALL_TIMELONG" type="text" class="STYLE1" style="height:18px; width:80px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['CB_MAXCALL_TIMELONG']; ?>
'   />
            </span><span class="STYLE1">秒</span></td>
          </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center" class="STYLE4">回拨、直拨设置</div></td>
            </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">回铃强制主叫号码</td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="CB_ACALL_CALLERID" id="CB_ACALL_CALLERID" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['CB_ACALL_CALLERID']; ?>
'   />
              <span class="STYLE4">(* 使用帐号名称作为主叫号码)</span>            </span></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">自动删除过期帐号的绑定电话</td>
            <td bgcolor="#FFFFFF"><select name="SYS_AUTO_DELBINDTEL_EXPUSER" class="STYLE1" id="SYS_AUTO_DELBINDTEL_EXPUSER"  >
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['SYS_AUTO_DELBINDTEL_EXPUSER'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['SYS_AUTO_DELBINDTEL_EXPUSER'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
            </select></td>
            </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">中继预约自动挂机</td>
            <td bgcolor="#FFFFFF"><select name="CB_COMMIT_HANGUP" class="STYLE1" id="CB_COMMIT_HANGUP"  >
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['CB_COMMIT_HANGUP'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['CB_COMMIT_HANGUP'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
            </select></td>
            </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">未绑定电话也回铃</td>
            <td bgcolor="#FFFFFF"><select name="CB_ANY_CALL" class="STYLE1" id="CB_ANY_CALL"  >
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['CB_ANY_CALL'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['CB_ANY_CALL'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
            </select>
              <span class="STYLE1">系统公用帐号<span class="STYLE7">
                <input name="CB_ANY_CALL_ACCTNAME" id="CB_ANY_CALL_ACCTNAME" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['CB_ANY_CALL_ACCTNAME']; ?>
'   />
              </span></span></td>
            </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">回铃只限本机充值</td>
            <td bgcolor="#FFFFFF"><select name="CB_IVR_OTHER_TEL" class="STYLE1" id="CB_IVR_OTHER_TEL"  >
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['CB_IVR_OTHER_TEL'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['CB_IVR_OTHER_TEL'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
            </select></td>
            </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">直拨主叫未绑定时用户卡号密码拨打</td>
            <td bgcolor="#FFFFFF"><select name="DIRECT_INPUT_ACCTNAME" class="STYLE1" id="DIRECT_INPUT_ACCTNAME"  >
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['DIRECT_INPUT_ACCTNAME'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['DIRECT_INPUT_ACCTNAME'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
            </select></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">充储卡充值开户只用密码认证模式</td>
            <td bgcolor="#FFFFFF"><select name="CB_IVR_CARDNAME_PASSWND" class="STYLE1" id="CB_IVR_CARDNAME_PASSWND"  >
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['CB_IVR_CARDNAME_PASSWND'] == '1'): ?> selected <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['CB_IVR_CARDNAME_PASSWND'] == '0'): ?> selected <?php endif; ?> > 关闭 </option>
            </select></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1"><strong>被叫号码是系统绑定号码时免费</strong></td>
            <td bgcolor="#FFFFFF"><select name="CB_BCALL_BINDTEL_FREE" class="STYLE1" id="CB_BCALL_BINDTEL_FREE"  >

			<option  value="30" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '30'): ?> selected="selected" <?php endif; ?> > 余额超过30元开启 </option>
			<option  value="25" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '25'): ?> selected="selected" <?php endif; ?> > 余额超过25元开启 </option>
			<option  value="20" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '20'): ?> selected="selected" <?php endif; ?> > 余额超过20元开启 </option>
			<option  value="15" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '15'): ?> selected="selected" <?php endif; ?> > 余额超过15元开启 </option>
			<option  value="12" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '12'): ?> selected="selected" <?php endif; ?> > 余额超过12元开启 </option>
			<option  value="10" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '10'): ?> selected="selected" <?php endif; ?> > 余额超过10元开启 </option>
			 <option  value="5" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '5'): ?> selected="selected" <?php endif; ?> > 余额超过5元开启 </option>
			  <option  value="3" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '3'): ?> selected="selected" <?php endif; ?> > 余额超过3元开启 </option>
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '1'): ?> selected="selected" <?php endif; ?> > 余额超过1元开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['CB_BCALL_BINDTEL_FREE'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
            </select></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">回拨二次拨号使用外部IVR</td>
            <td bgcolor="#FFFFFF"><select name="AGI_IVR_FLAG" class="STYLE1" id="AGI_IVR_FLAG"  >
              <option  value="1" <?php if ($this->_tpl_vars['post_data']['AGI_IVR_FLAG'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
              <option  value="0" <?php if ($this->_tpl_vars['post_data']['AGI_IVR_FLAG'] == '0'): ?> selected="selected" <?php endif; ?> > 关闭 </option>
            </select></td>
            </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center"></div></td>
            </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center">
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
            </div></td>
            </tr>
           </form>   
         <form name="form2" method="post" action="?action=bindaddr_post">    
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center"><span class="STYLE4">系统IP地址设置</span></div></td>
            </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center">SIP&nbsp;本地IP地址<span class="STYLE7">
              <input name="SIP_IP" id="SIP_IP" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['SIP_IP']; ?>
'   />
              </span><span class="STYLE1">端口<span class="STYLE7">
                <input name="SIP_PORT" id="SIP_PORT" type="text" class="STYLE1" style="height:18px; width:40px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['SIP_PORT']; ?>
'   />
                RC4密匙
                <input name="RC4KEY" id="RC4KEY" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['RC4KEY']; ?>
'   />
              </span></span></div></td>
            </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center">SIP1本地IP地址<span class="STYLE7">
              <input name="SIP_IP1" id="SIP_IP1" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['SIP_IP1']; ?>
'   />
              </span><span class="STYLE1">端口<span class="STYLE7">
                <input name="SIP_PORT1" id="SIP_PORT1" type="text" class="STYLE1" style="height:18px; width:40px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['SIP_PORT1']; ?>
'   />
                
                RC4密匙
                <input name="RC4KEY1" id="RC4KEY1" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['RC4KEY1']; ?>
'   />
              </span></span></div></td>
            </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center">H323本地IP地址<span class="STYLE7">
              <input name="H323_IP" id="H323_IP" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['H323_IP']; ?>
'   />
              <span class="STYLE1">端口
                <input name="H323_PORT" id="H323_PORT" type="text" class="STYLE1" style="height:18px; width:40px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['H323_PORT']; ?>
'   />
              </span></span><span class="STYLE7">RC4密匙
              <input name="RC4KEY3" id="RC4KEY3" type="text"   disabled="disabled"  class="STYLE1" style="height:18px; width:140px;" size="30"  value="未启用"   />
              </span></div></td>
            </tr>
          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF"><input type="submit"  class="STYLE1"   name="submitbtn2" id="submitbtn2"   onClick="return check()" value="加载配置 "></td>
          </tr>
            </form>
      </table></td>
  </tr>



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