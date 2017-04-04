<?php /* Smarty version 2.6.26, created on 2014-10-31 00:27:32
         compiled from payoption_edit.html */ ?>
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
	
function  change_acct_id(acct_id)
{
        document.form1.action = '?action=pay_send'; 
	    document.form1.submit(); 
	    return true;		 
	
}

    </script>

<style type="text/css">
<!--
.STYLE23 {color: #FFFFFF}
-->
</style>
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
                <td width="98%" valign="bottom"><span class="STYLE10"> 在线支付接口设置</span></td>
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
    <td><table width="739" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
   <tr>
     <td height="18" colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
   </tr>
   <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div align="center"></div></td>
          </tr>
          <form name="form1" method="post" action="?action=pay_post">
          
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">配置对象</td>
            <td bgcolor="#FFFFFF">                
          <select name="agent_id" class="STYLE1" id="agent_id"  onchange= "change_acct_id(this.value)"  >
                  <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
 
                  </option>
                  <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected="selected" <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
                </select>                </td>
          </tr>

          
          <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">支付宝(alipay)即时到帐商家服务设置 </span></div></td>
            </tr>
          <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div align="center" class="STYLE4">适合代理给上级支付购买话费</div></td>
            </tr>
          <tr>
            <td width="30%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >合作身份者ID</span></td>
            <td width="70%" bgcolor="#FFFFFF">
                 <input name="aliapy_config_partner" id="aliapy_config_partner" type="text"  style="height:18px; width:240px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['aliapy_config_partner']; ?>
'   />            </td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >安全检验码</span></td>
            <td bgcolor="#FFFFFF">
                <input name="aliapy_config_key"  id="aliapy_config_key"  type="text"  style="height:18px; width:240px;"  value='<?php echo $this->_tpl_vars['post_data']['aliapy_config_key']; ?>
'  />          </td>
            </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">签约支付宝账号</td>
            <td bgcolor="#FFFFFF">
              <input name="aliapy_config_seller_email" id="aliapy_config_seller_email" type="text" style="height:18px; width:240px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['aliapy_config_seller_email']; ?>
'   />           </td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">页面跳转同步通知页面路径</td>
            <td bgcolor="#FFFFFF">
              <input name="aliapy_config_return_url" id="aliapy_config_return_url" type="text"  style="height:18px; width:500px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['aliapy_config_return_url']; ?>
'   />            </td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td bgcolor="#FFFFFF"><span class="STYLE4">http://服务器地址:端口/astgo2011/aliapy/return_url.php</span></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">服务器异步通知页面路径</td>
            <td bgcolor="#FFFFFF"><input name="aliapy_config_notify_url" id="aliapy_config_notify_url" type="text" style="height:18px; width:500px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['aliapy_config_notify_url']; ?>
'   /></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td bgcolor="#FFFFFF"><div align="center" >
              <div align="left"><span class="STYLE4">http://服务器地址:端口/astgo2011/aliapy/notify_url.php</span></div>
            </div></td>
          </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center">绿宝(YeePay)设置</div></td>
          </tr>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center" class="STYLE4">适合代理给上级支付、用户帐号通过语音、WAP支付给上级代理商</div></td>
            </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">商户编号</td>
            <td bgcolor="#FFFFFF"><input name="yeepay_config_p1_MerId" id="yeepay_config_p1_MerId" type="text" style="height:18px; width:240px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['yeepay_config_p1_MerId']; ?>
'   /></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">密钥</td>
            <td bgcolor="#FFFFFF"><input name="yeepay_config_merchantKey" id="yeepay_config_merchantKey" type="text" style="height:18px; width:500px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['yeepay_config_merchantKey']; ?>
'   /></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">回调URL</td>
            <td bgcolor="#FFFFFF"><input name="yeepay_config_callback_url" id="yeepay_config_callback_url" type="text" style="height:18px; width:500px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['yeepay_config_callback_url']; ?>
'   /></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td bgcolor="#FFFFFF" class="STYLE4">http://服务器地址:端口/astgo2011/YeePay/callback.php</td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">卡类型</td>
            <td bgcolor="#FFFFFF"><input name="yeepay_config_FrpId" id="yeepay_config_FrpId" type="text" style="height:18px; width:60px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['yeepay_config_FrpId']; ?>
'   />
              <span class="STYLE1">神州行卡:SZX</span></td>
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