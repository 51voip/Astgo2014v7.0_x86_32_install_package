<?php /* Smarty version 2.6.26, created on 2014-10-31 00:19:43
         compiled from card_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'card_edit.html', 185, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>编辑新增储值卡</title>
<script src="./js/jquery-1.6.2.min.js"></script>
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
	function check(discharge_level,balance)
	{
		trim_all_input(); //所有input 去空格

	
	
		if (document.form1.agent_id.value==""  || document.form1.agent_id.value=="-1"  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确储值卡管理者</font></span></div>";
      		document.form1.agent_id.focus();
			return false;
		}		
				
		if (document.form1.cardbegin.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确储值卡开始卡号</font></span></div>";
      		document.form1.cardbegin.focus();
			return false;
		}		
		
		if (document.form1.giftpercent.value=="" || ( isNaN(document.form1.giftpercent.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确赠送比例</font></span></div>";
      		document.form1.giftpercent.focus();
			return false;
		}		
	<?php if ($this->_tpl_vars['to_acct']['discharge_level'] == '1'): ?>	

		if (document.form1.expireddays.value=="" || ( isNaN(document.form1.expireddays.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确有效期天数</font></span></div>";
      		document.form1.expireddays.focus();
			return false;
		}		
	<?php endif; ?>
				
		if (document.form1.limitbalance.value=="" || ( isNaN(document.form1.limitbalance.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的回铃限制金额</font></span></div>";
      		document.form1.limitbalance.focus();
			return false;
		}		

        if (document.form1.cardcount.value=="" || ( isNaN(document.form1.cardcount.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的生成卡数量</font></span></div>";
      		document.form1.cardcount.focus();
			return false;
		}				
	<?php if ($this->_tpl_vars['to_acct']['discharge_level'] == '1'): ?>	
        if (document.form1.balance.value=="" || ( isNaN(document.form1.balance.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的储值卡金额</font></span></div>";
      		document.form1.balance.focus();
			return false;
		}				
				
	<?php endif; ?>
		
        if (document.form1.password_len.value=="" || ( isNaN(document.form1.password_len.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的储值卡密码位数</font></span></div>";
      		document.form1.password_len.focus();
			return false;
		}				
		
		if (document.form1.cardcount.value >10000)
		{
		    alert('不能一次性的批量生成卡超过一万张，分几次来吧。！');
		    return false;			
		}
		
		if (document.form1.balance.value >10000 ||  document.form1.balance.value <=0)
		{
		    alert('请输入正确的储值卡金额,不能大于一万，也不能小于零！');
		    return false;			
		}
		if (document.form1.password_len.value <= 4)
		{
		    alert('请输入正确的储值卡长度，不能小于4！');
		    return false;			
		}	
				
		/* 验证面值用户是否有充足金额*/
		if (discharge_level == '0')
		{
		   var totalbalance = document.form1.balance.value * document.form1.cardcount.value;
		   if (totalbalance > balance){
		      alert('账户余额'+balance +'不够，不能建立金额为:'+totalbalance +'元的储值卡！');
		      return false;
		   }
		   	
		}
		
	
		//|| ( isNaN(document.form1.giftpercent.value) ) )
		
	
	    return true;
		//return true;

	}

	function goback(curpage,agent_id)
	{
	    document.form2.action = '?action=list&curpage='+curpage +'&agent_id=' + agent_id;
		document.form2.submit();
		return true;	
	}
	
function  change_acct_id(acct_id,curpage)
{
    document.form1.action = '?action=add_send&curpage='+curpage+'&agent_id='+acct_id; 
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
                <td width="98%" valign="bottom"><span class="STYLE10"> 批量添加储值卡</span></td>
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
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
  <tr>
    <td><table width="884" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
      <tr>
            <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;            </td>
            </tr>
          <tr>
            <td width="31%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >储值卡管理者 <?php echo $this->_tpl_vars['to_acct']['discharge_level']; ?>
</span></td>
            <td width="69%" height="18" bgcolor="#FFFFFF">
              <label for="trunkname"></label>
              <span class="STYLE7">
                <select name="agent_id" class="STYLE1" id="agent_id" onChange= "change_acct_id(this.value,'<?php echo $this->_tpl_vars['curpage']; ?>
')" >
                  <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                    </option>
                  <?php endforeach; endif; unset($_from); ?>
                  </select>
                </span>
              <span class="STYLE4">计费类型:<?php if ($this->_tpl_vars['to_acct']['discharge_level'] == '1'): ?>流量<?php else: ?>面值<?php endif; ?>  &nbsp;&nbsp;余额:<?php echo ((is_array($_tmp=$this->_tpl_vars['to_acct']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</span>            </td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回拨费率组</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="rategroupid_acall" id="rategroupid_acall"  >
                  <?php $_from = $this->_tpl_vars['rategroups_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['vouchercard']['rategroupid_acall']): ?> selected <?php endif; ?> ><?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
</option>
                  <?php endforeach; endif; unset($_from); ?>
                  </select>
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >被叫费率组</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="rategroupid" id="rategroupid"  >
                  <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['vouchercard']['rategroupid']): ?> selected <?php endif; ?> ><?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
</option>
                  <?php endforeach; endif; unset($_from); ?>
                  </select>
              </span></td>
            </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >套餐</span></td>
            <td height="19" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select size="8"  class="STYLE1"  multiple="multiple" name="ratepackages[]" id="ratepackages">
                <option value="-1">---------不使用套餐---------</option>
                  <?php $_from = $this->_tpl_vars['ratepackages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" >
                    <?php echo $this->_tpl_vars['eachone']['packagename']; ?>

                    </option>
                  <?php endforeach; endif; unset($_from); ?>
                  </select>
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >储值卡开始</span></td>
            <td height="19" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <?php echo $this->_tpl_vars['to_acct']['agent_prefix']; ?>
<input name="cardbegin" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['vouchercard']['lastcardname']; ?>
' />
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >生成数量</span></td>
            <td height="19" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="cardcount" type="text" class="STYLE1" style="height:18px; width:80px;" size="30"  value='<?php echo $this->_tpl_vars['vouchercard']['cardcount']; ?>
' />
              </span></td>
            </tr>
		<?php if ($this->_tpl_vars['to_acct']['discharge_level'] == '1'): ?>
		          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >面值</span></td>
            <td height="19" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="balance" type="text" class="STYLE1" style="height:18px; width:80px;" size="30"  value="<?php echo $this->_tpl_vars['vouchercard']['balance']; ?>
" />
              </span></td>
            </tr>
			
		          <tr>
		            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">类型</span></td>
		            <td height="19" bgcolor="#FFFFFF"><span class="STYLE7">
		              <select name="accttype" id="accttype"  >
                       
					      <option  value="3"  selected="selected" >全能卡   </option>
                          <option  value="1" >开户卡</option>
						  <option  value="2" >充值卡</option>
                    
                      </select>
		            </span></td>
          </tr>
		          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">有效期天数</span></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="expireddays" type="text"  style="height:18px; width:80px;" size="30"  value="<?php echo $this->_tpl_vars['vouchercard']['expireddays']; ?>
" />
            </span></td>
            </tr>
		<?php else: ?>
		
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >面值(有效期)</span></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="card_balance_day" id="card_balance_day"  >
                <?php $_from = $this->_tpl_vars['card_balance_days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['balance']; ?>
,<?php echo $this->_tpl_vars['eachone']['day']; ?>
,<?php echo $this->_tpl_vars['eachone']['addbalance']; ?>
" > <?php echo $this->_tpl_vars['eachone']['balance']; ?>
元(<?php echo $this->_tpl_vars['eachone']['day']; ?>
天) 送<?php echo $this->_tpl_vars['eachone']['addbalance']; ?>
元 </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
          </tr>
         <?php endif; ?>	
		  <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">密码位数</span></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="password_len" type="text" class="STYLE1" style="height:18px; width:80px;" size="30"  value='<?php echo $this->_tpl_vars['vouchercard']['password_len']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">回铃限制</span></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="limitbalance" type="text" class="STYLE1" style="height:18px; width:80px;" size="30"  value='<?php echo $this->_tpl_vars['vouchercard']['limitbalance']; ?>
' />
              <span class="STYLE1">元</span></span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">加前缀</span></td>
            <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">直拨被叫、半直拨被叫、回拨被叫加</span> <span class="STYLE1">
            <input name="bindexten" type="text" class="STYLE1" id="bindexten" style="height:18px; width:45px;"  value='' size="10" />
SIP加
<input name="bindexten_sip" type="text" class="STYLE1" id="bindexten_sip" style="height:18px; width:45px;"  value='' size="10" />
回拨回铃加
<input name="bindexten_cb" type="text" class="STYLE1" id="bindexten_cb" style="height:18px; width:45px;"  value='' size="10" />
            </span>
              </label>
              </span></td>
          </tr>
  
          <tr>
            <td id="userTip" height="18" colspan="2" align="right" bgcolor="#FFFFFF"></td>
            </tr>
          <tr>
            <td height="18" colspan="2" align="center" bgcolor="#FFFFFF">
              
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check('<?php echo $this->_tpl_vars['to_acct']['discharge_level']; ?>
','<?php echo ((is_array($_tmp=$this->_tpl_vars['to_acct']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
')" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="button"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['agent_id']; ?>
')" value=" 取消返回 ">              </td>
            </tr>
 
    </table></td>
  </tr>
  </form>
  
      <form name="form2" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
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
<p class="STYLE19">&nbsp;</p>
</body>
</html>