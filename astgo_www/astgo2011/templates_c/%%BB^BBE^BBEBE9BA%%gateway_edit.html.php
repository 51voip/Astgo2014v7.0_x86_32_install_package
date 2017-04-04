<?php /* Smarty version 2.6.26, created on 2014-10-31 00:12:42
         compiled from gateway_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'gateway_edit.html', 302, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<script src="./js/jquery-1.6.2.min.js"></script>
 
    
<title>编辑中继</title>
<script>

   // 选择协议类型事件 
	function change_tech(tech)
	{
		  if (tech == 'SIP')
		  {
		  	 document.form1.trunkprototype.selectedIndex = 0;
		  	 document.form1.trunkprototype.disabled = false;
		  }
		  else
		  {  
		  	 //H323 协议只能对接 自动选择对接   0 禁用这个选择
		  	 document.form1.trunkprototype.selectedIndex = 0;
		  	 document.form1.trunkprototype.disabled = true;
		  	 //document.form1.username.value ='';
		  	 //document.form1.secret.value ='';
			 
		  }
		
	}
	
	
	// 选择对接 注册 等方式事件
	function change_trunkprototype(trunkprototype)
	{
		var selectedIndex = document.form1.trunkprototype.selectedIndex;
		if(selectedIndex == 2) 
		{
			 document.form1.host.value="dynamic";
			 document.form1.host.disabled = true;
			 
			 document.form1.port.value="0";
			 document.form1.port.disabled = true;
		}
		else
		{
			 document.form1.host.value="";
			 document.form1.host.disabled = false;
			 
			 document.form1.port.value="5060";
			 document.form1.port.disabled = false;
		}
		
	}
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
	
　  function f_check_IP(ip) 
　　{ 
　　var re=/^(\d+)\.(\d+)\.(\d+)\.(\d+)$/; //匹配IP地址的正则表达式 
　　if(re.test( ip )) 
　　{ 
　　if( RegExp.$1 <256 && RegExp.$2<256 && RegExp.$3<256 && RegExp.$4<256) return true; 
　　} 
　　return false; 
　　} 




	// 提交前检测输入是否合法
	function check()
	{
		trim_all_input(); //所有input 去空格
			
		if (document.form1.trunkname.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的中继名称</font></span></div>";
      		document.form1.trunkname.focus();
			return false;
			
		}		
		
		var trunkprototype = document.form1.trunkprototype.selectedIndex ;
		//对接和注册出去。需要服务器IP 和端口
		if (trunkprototype == 0 || trunkprototype == 1 )
		{
			 if ( f_check_IP(document.form1.host.value) != true )
			 {  
			    document.getElementById("userTip").innerHTML="<div align='center'><span   class='STYLE4'><font color=red>请输入服务器地址</font></span></div>";
      		    document.form1.host.focus();
				return false;

			 }
			 if (document.form1.port.value=="" || ( isNaN(document.form1.port.value) ) )
			 {  
			    document.getElementById("userTip").innerHTML="<div align='center'><span   class='STYLE4'><font color=red>请输入服务器端口</font></span></div>";
      		    document.form1.port.focus();
				return false;
			 }			 
			 
			 if (trunkprototype == 1)
			 {
				 if (document.form1.username.value=="")
			     {  
			        document.getElementById("userTip").innerHTML="<div align='center'><span   class='STYLE4'><font color=red>请输入SIP帐号</font></span></div>";
      		        document.form1.username.focus();
					return false;
			     }
			     if (document.form1.secret.value=="")
			     {  
			        document.getElementById("userTip").innerHTML="<div align='center'><span   class='STYLE4'><font color=red>请输入SIP密码</font></span></div>";
      		         document.form1.secret.focus();
					   return false;
			     }						 
			 }
			 
		}
		else
		{
			     if (document.form1.secret.value=="")
			     {  
			        document.getElementById("userTip").innerHTML="<div align='center'><span   class='STYLE4'><font color=red>请输入SIP密码</font></span></div>";
      		         document.form1.secret.focus();
					 return false;
			     }	
	    }



		
		if (document.form1.allow.value=="")
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入语音编码,格式 g729,g723,gsm,ulaw,alaw</font></span></div>";
      		document.form1.allow.focus();
		   return false;
		}
		
		if (document.form1.balance.value=="" || ( isNaN(document.form1.balance.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的中继余额</font></span></div>";
      		document.form1.balance.focus();
			return false;
		}
				
		if (document.form1.rateprice.value=="" || ( isNaN(document.form1.rateprice.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的单价</font></span></div>";
      		document.form1.rateprice.focus();
			return false;
		}
					
		if (document.form1.payunitsecond.value=="" || ( isNaN(document.form1.payunitsecond.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的计费周期</font></span></div>";
      		document.form1.payunitsecond.focus();
			return false;
		}
	
		return true;

	}

	function goback(curpage)
	{
	    document.form1.action = '?action=list&curpage='+curpage;
		document.form1.submit();
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
                <td width="98%" valign="bottom"><span class="STYLE10">  <?php if ($this->_tpl_vars['action'] == 'edit_post'): ?> 修改中继落地 <?php elseif ($this->_tpl_vars['action'] == 'add_post'): ?> 新增中继落地<?php else: ?>中继落地管理<?php endif; ?></span></td>
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
&id=<?php echo $this->_tpl_vars['gateway']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
  <tr>
    <td><table width="690" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
    <tr>
            <td height="18" colspan="4" bgcolor="#FFFFFF">&nbsp;            </td>
          </tr>
          <tr>
            <td width="18%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >中继名</span></td>
            <td width="32%" height="18" bgcolor="#FFFFFF">
              
              <span class="STYLE7">
                <input name="trunkname" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['gateway']['trunkname']; ?>
' />
              </span>            </td>
            <td width="14%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >语音编码</span></td>
            <td width="36%" height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="allow" type="text" class="STYLE1" style="height:18px; width:225px;" size="30"  value='<?php echo $this->_tpl_vars['gateway']['allow']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">是否启用</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="enable" type="checkbox" class="STYLE2" <?php if ($this->_tpl_vars['gateway']['enable'] == 1): ?>checked   <?php endif; ?> />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7"> <span class="STYLE4">g729,g723,gsm,ulaw,alaw</span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">协议类型</span></td>
            <td height="18" bgcolor="#FFFFFF"><select name="tech" class="STYLE1" id="tech" onchange= "change_tech(this.value)">
              <option value="SIP"   <?php if ($this->_tpl_vars['gateway']['tech'] == 'SIP'): ?>selected<?php endif; ?> >SIP</option>
              <option value="SIP1"   <?php if ($this->_tpl_vars['gateway']['tech'] == 'SIP1'): ?>selected<?php endif; ?> >SIP1</option>
              <option value="H323"  <?php if ($this->_tpl_vars['gateway']['tech'] == 'H323'): ?>selected<?php endif; ?> >H323</option>
              <option value="dahdi"  <?php if ($this->_tpl_vars['gateway']['tech'] == 'dahdi'): ?>selected<?php endif; ?> >本机板卡dahdi</option>
			  <option value="zap"  <?php if ($this->_tpl_vars['gateway']['tech'] == 'zap'): ?>selected<?php endif; ?> >本机板卡zap</option>
			  <option value="ss7"  <?php if ($this->_tpl_vars['gateway']['tech'] == 'ss7'): ?>selected<?php endif; ?> >本机板卡ss7</option>
            </select></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">启用NAT</span></td>
            <td height="18" bgcolor="#FFFFFF"><select name="nat" class="STYLE1" id="nat">
              <option value="no"  <?php if ($this->_tpl_vars['gateway']['nat'] == 'no'): ?>selected<?php endif; ?> >否 </option>
              <option value="yes"  <?php if ($this->_tpl_vars['gateway']['nat'] == 'yes'): ?>selected<?php endif; ?> >是</option>
            </select>
              <span class="STYLE1">              (IP对接一般选择&quot;否&quot;)</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">中转媒体</span></td>
            <td height="18" bgcolor="#FFFFFF"><label for="tech"></label>
           <span class="STYLE1">
              <input name="canreinvite" type="checkbox" class="STYLE1"  <?php if ($this->_tpl_vars['gateway']['canreinvite'] != 'yes'): ?>checked  <?php endif; ?> />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >安全方式</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="insecure" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['gateway']['insecure']; ?>
' />
              <span class="STYLE4">port,invite</span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >连接方式</span></td>
            <td height="18" bgcolor="#FFFFFF"><select name="trunkprototype" class="STYLE1" id="trunkprototype" onchange= "change_trunkprototype(this.value)">
              <option value="ip"   <?php if ($this->_tpl_vars['gateway']['trunkprototype'] == 'ip'): ?>selected<?php endif; ?> >IP对接</option>
              <option value="reg"  <?php if ($this->_tpl_vars['gateway']['trunkprototype'] == 'reg'): ?>selected<?php endif; ?> >注册到外面的服务器</option>
              <option value="iad"  <?php if ($this->_tpl_vars['gateway']['trunkprototype'] == 'iad'): ?>selected<?php endif; ?> >外面的帐号注册进来</option>
            </select></td>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">状态探测</td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="qualify" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['gateway']['qualify']; ?>
' />
              <span class="STYLE4">(yes no 2000)</span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">对方IP地址</span></td>
            <td height="18" bgcolor="#FFFFFF">
            <span class="STYLE7">
              <input name="host" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['gateway']['host']; ?>
' />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" ><span class="STYLE1">DTMF格式</span></span></td>
            <td height="18" bgcolor="#FFFFFF">
              <select name="dtmfmode" class="STYLE1" id="dtmfmode">
                <option value="rfc2833"  <?php if ($this->_tpl_vars['gateway']['dtmfmode'] == 'rfc2833'): ?>selected<?php endif; ?> >RFC2833 </option>
                <option value="info"  <?php if ($this->_tpl_vars['gateway']['dtmfmode'] == 'info'): ?>selected<?php endif; ?> >INFO</option>
				<option value="auto"  <?php if ($this->_tpl_vars['gateway']['dtmfmode'] == 'auto'): ?>selected<?php endif; ?> >自动</option>
              </select>            </td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">对方端口</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="port" type="text" class="STYLE1" style="height:18px; width:50px;" size="10" value='<?php echo $this->_tpl_vars['gateway']['port']; ?>
' />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >余额限制</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="balanceenable" type="checkbox" class="STYLE1" <?php if ($this->_tpl_vars['gateway']['balanceenable'] == '1'): ?>checked <?php endif; ?> />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">认证名称</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="username" type="text" class="STYLE1" style="height:18px; width:125px;" size="30" value='<?php echo $this->_tpl_vars['gateway']['username']; ?>
' />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >中继余额</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="balance" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['gateway']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
' />
              <span class="STYLE1"> 元 </span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">认证密码</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="secret" type="text" class="STYLE1" style="height:18px; width:125px;" size="30" value='<?php echo $this->_tpl_vars['gateway']['secret']; ?>
' />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">并发限制</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="calllimit" type="text" style="height:18px; width:50px;" size="10" value='<?php echo $this->_tpl_vars['gateway']['calllimit']; ?>
' />
              <span class="STYLE1">线 </span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">fromdomain</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="fromdomain" type="text" class="STYLE1" style="height:18px; width:125px;" size="30" value='<?php echo $this->_tpl_vars['gateway']['fromdomain']; ?>
' />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">禁止号码池</span></td>
            <td height="18" bgcolor="#FFFFFF"><select name="forbid_callee" class="STYLE7" id="forbid_callee" >
              <option  value="-1" <?php if ($this->_tpl_vars['gatewaypolicy']['callergroup'] == '-1'): ?>selected<?php endif; ?>> ---不启用--- </option>
                  <?php $_from = $this->_tpl_vars['callergroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
              <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['gateway']['forbid_callee']): ?>selected<?php endif; ?> >
                <?php echo $this->_tpl_vars['eachone']['callergroup_name']; ?>

                </option>
              <?php endforeach; endif; unset($_from); ?>
            </select></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">fromuser</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="fromuser" type="text" class="STYLE1" style="height:18px; width:125px;" size="30" value='<?php echo $this->_tpl_vars['gateway']['fromuser']; ?>
' />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
  
          <tr>
            <td height="18" colspan="4" align="center" bgcolor="#FFFFFF"> <div class="STYLE4" id="div_trips" ></div></td>
          </tr>
          <tr>
            <td height="18" colspan="4" align="center" bgcolor="#FFFFFF">
              
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="button"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
')" value=" 取消返回 ">            </td>
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
		 $("input:text,input:password,textarea").focus(function(){
			 if (this.value == '请输入') this.value = '';
			 $(this).css("background","#a8c7ce");
			 }).blur(function(){
				 $(this).css("background","#FFF");
			 }); 
</script>    

</html>