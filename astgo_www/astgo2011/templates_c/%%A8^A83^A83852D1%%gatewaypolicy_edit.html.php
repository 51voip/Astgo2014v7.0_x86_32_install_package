<?php /* Smarty version 2.6.26, created on 2014-10-31 00:14:34
         compiled from gatewaypolicy_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'gatewaypolicy_edit.html', 214, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>无标题文档</title>
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
	function check()
	{
		trim_all_input(); //所有input 去空格
			
		if (document.form1.name.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确呼出路由名称</font></span></div>";
      		document.form1.name.focus();
			return false;
			
		}		
		if (document.form1.prefix.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确拨号前缀</font></span></div>";
      		document.form1.prefix.focus();
			return false;
			
		}			
		
		if (document.form1.rateprice.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确路由成本价格</font></span></div>";
      		document.form1.rateprice.focus();
			return false;
			
		}			
				
		
		if (document.form1.payunitsecond.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确路由成本单位</font></span></div>";
      		document.form1.payunitsecond.focus();
			return false;
			
		}			
				
				
		return true;

	}

	function goback(curpage,gatewaygroupid,old_curpage)
	{
		var gotourl = '?action=list&curpage='+curpage+'&gatewaygroupid='+gatewaygroupid+'&old_curpage='+old_curpage; 
		//alert(gotourl);
	    document.form2.action = gotourl;
		document.form2.submit();
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
                <td width="98%" valign="bottom"><span class="table_caption"> <?php if ($this->_tpl_vars['action'] == 'edit_post'): ?> 修改呼出路由 <?php elseif ($this->_tpl_vars['action'] == 'add_post'): ?> 新增呼出路由<?php else: ?>呼出路由管理<?php endif; ?></span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <form name="form2" method="post" >
  </form>
  
<form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&id=<?php echo $this->_tpl_vars['gatewaypolicy']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&gatewaygroupid=<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
">
  <tr>
    <td><table width="724" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
        <tr>
            <td height="18" colspan="3" bgcolor="#FFFFFF">&nbsp;
            </td>
            </tr>
          <tr>
            <td width="38%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >路由名称</span></td>
            <td width="31%" height="18" bgcolor="#FFFFFF">
    
              <span class="STYLE7">
                <input name="name" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['gatewaypolicy']['name']; ?>
' />
                </span>
            </td>
            <td width="31%" height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE4">是否启用</span></td>
            <td height="18" bgcolor="#FFFFFF"><select name="enable" >
             <option value="1"  <?php if ($this->_tpl_vars['gatewaypolicy']['enable'] == '1'): ?>selected<?php endif; ?> >是</option>
             <option value="0"  <?php if ($this->_tpl_vars['gatewaypolicy']['enable'] == '0'): ?>selected<?php endif; ?> >否 </option>
            </select></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >呼出落地</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <select name="gatewayid" class="STYLE7" id="gatewayid" >
                 <?php $_from = $this->_tpl_vars['gateways']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                    <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['gatewaypolicy']['gatewayid']): ?>selected<?php endif; ?> > <?php echo $this->_tpl_vars['eachone']['trunkname']; ?>
 [<?php echo $this->_tpl_vars['eachone']['tech']; ?>
 - <?php echo $this->_tpl_vars['eachone']['trunkprototype']; ?>
] </option>
                  <?php endforeach; endif; unset($_from); ?>
              </select>
           </td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">拨号前缀</span></td>
            <td height="18" bgcolor="#FFFFFF"><label for="trunkname"><span class="STYLE7">
              <input name="prefix" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['gatewaypolicy']['prefix']; ?>
' />
            </span></label></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">主叫号码</span></td>
            <td height="18" bgcolor="#FFFFFF"><select name="callergroup" class="STYLE7" id="callergroup" >
              <option  value="-1" <?php if ($this->_tpl_vars['gatewaypolicy']['callergroup'] == '-1'): ?>selected<?php endif; ?>> ---不启用--- </option>
                  <?php $_from = $this->_tpl_vars['callergroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
              <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['gatewaypolicy']['callergroup']): ?>selected<?php endif; ?> >
                <?php echo $this->_tpl_vars['eachone']['callergroup_name']; ?>

                </option>
              <?php endforeach; endif; unset($_from); ?>
            </select></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">主叫替换规则</span></td>
            <td height="18" colspan="2" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="caller_prexrule" type="text" class="STYLE1" style="height:18px; width:400px;" size="30"  value='<?php echo $this->_tpl_vars['gatewaypolicy']['caller_prexrule']; ?>
' />
            </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >被叫替换规则</span></td>
            <td height="18" colspan="2" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="callee_prexrule" type="text" class="STYLE1" style="height:18px; width:400px;" size="30"  value='<?php echo $this->_tpl_vars['gatewaypolicy']['callee_prexrule']; ?>
' />
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF"><span class="STYLE4">例如1替换为01 填写1&gt;01 多个用;分割</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >优先级</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <select name="priority" class="STYLE7" id="gatewayid" >
                 <?php $_from = $this->_tpl_vars['prioritys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                 <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['gatewaypolicy']['priority']): ?> selected <?php endif; ?> ><?php echo $this->_tpl_vars['eachone']['value']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
             </td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >最终路由</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
              <input name="routestop" type="checkbox" class="STYLE2" <?php if ($this->_tpl_vars['gatewaypolicy']['routestop'] == '1'): ?>checked <?php endif; ?> />
            </span></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >开启时段</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <select name="hour_begin" class="STYLE7" id="hour_begin" >
                <?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['gatewaypolicy']['hour_begin']): ?>selected<?php endif; ?> >
                  <?php echo $this->_tpl_vars['eachone']['value']; ?>

                  </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
              <span class="STYLE1">点</span>   <span class="STYLE1">到
              <select name="hour_end" class="STYLE7" id="hour_end" >
                <?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['gatewaypolicy']['hour_end']): ?>selected<?php endif; ?> >
                  <?php echo $this->_tpl_vars['eachone']['value']; ?>

                  </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
              点</span></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >路由成本</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="rateprice" type="text" class="STYLE1" style="height:18px; width:60px;" size="30" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['gatewaypolicy']['rateprice'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
' />
                <span class="STYLE1">元/
                <input name="payunitsecond" type="text" class="STYLE1" style="height:18px; width:60px;" size="30" value='<?php echo $this->_tpl_vars['gatewaypolicy']['payunitsecond']; ?>
' />秒</span></span></td>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
  
  
          <tr>
            <td id="userTip" height="18" colspan="3" align="right" bgcolor="#FFFFFF"></td>
            </tr>
          <tr>
            <td height="18" colspan="3" align="center" bgcolor="#FFFFFF">
              
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="button"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
','<?php echo $this->_tpl_vars['old_curpage']; ?>
')" value=" 取消返回 ">
              </td>
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
<p class="STYLE19">&nbsp;</p>
</body>
</html>