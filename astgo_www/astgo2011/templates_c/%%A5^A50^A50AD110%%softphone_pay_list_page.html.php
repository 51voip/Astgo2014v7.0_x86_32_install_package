<?php /* Smarty version 2.6.26, created on 2015-03-01 03:05:30
         compiled from softphone_pay_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'softphone_pay_list_page.html', 111, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<script src="./js/jquery-1.6.2.min.js"></script>
<title>运营网站套餐卡管理</title>
</head>

<script>



//页码导航 
function post_list(index,curpage,maxpage,agent_id)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
	 {
        document.form1.action = '?action=user_pay_list&curpage='+index+'&agent_id='+agent_id; 
	    document.form1.submit(); 
	    return true;
	 }
	 return false;
}

function  change_acct_id(acct_id)
{
        //document.form1.action = '?action=list&curpage='+goto_index; 
		
		//alert(acct_id);
	    document.form1.submit(); 
	    return true;		 
	
}	
	
</script>
<body>
  <form name="form1" method="post" action="?action=user_pay_list">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span class="table_caption">运营网站充值记录</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
            </span>
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">

  <tr>
    <td   height="24" colspan="9"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">代理商：
                      <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)" >
                <option  value="" > --全部-- </option>
                     <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                   <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?> >
                     <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                   </option>
                   <?php endforeach; endif; unset($_from); ?>
                 </select>
                      <label for="out_trade_no"><span class="table_title">订单号</span></label>
                      <input name="out_trade_no" type="text" class="STYLE1" id="out_trade_no" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['out_trade_no']; ?>
' />
                      <label for="subject"><span class="table_title">订单名称</span></label>
                      <input name="subject" type="text" class="STYLE1" id="subject" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['subject']; ?>
' />
                      <label for="body"><span class="table_title">描述</span></label>
                      <input name="body" type="text" class="STYLE1" id="body" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['body']; ?>
' />
状态
<select name="state" class="STYLE1" id="state" >
  <option  value="-1"  > 不限 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['state'] == '1'): ?> selected="selected" <?php endif; ?>  > 成功 </option>
  <option  value="0" <?php if ($this->_tpl_vars['post_data']['state'] == '0'): ?> selected="selected" <?php endif; ?>  > 发起 </option>
</select>
    <input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
    </span></td>
  </tr>
  <tr>
            <td width="2%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">代理商</div></td>
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">帐号</div></td>
            <td width="12%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">订单号</div></td>
            <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">订单名称</div></td>
            <td width="20%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">描述</div></td>
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">支付平台</div></td>
            <td width="10%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">购买类型</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
          

          </tr>      

          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
          <tr>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['agent_acctname']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['acctname']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['out_trade_no']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['subject']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['body']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['payway']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php if ($this->_tpl_vars['eachone']['rechargetype'] == '1'): ?>套餐:<?php echo $this->_tpl_vars['eachone']['packagename']; ?>
<?php else: ?>金额: <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元<?php endif; ?>  </div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php if ($this->_tpl_vars['eachone']['state'] == '0'): ?>发起<?php else: ?>成功<?php endif; ?>  </div></td>
   
          </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="33%"><div align="left"><span class="STYLE21">共
              <?php echo $this->_tpl_vars['record_count']; ?>

              条记录，当前第
              <?php echo $this->_tpl_vars['curpage']; ?>

              /
              <?php echo $this->_tpl_vars['maxpage']; ?>

              页，每页
              <?php echo $this->_tpl_vars['pagelimtcount']; ?>

          条记录</span></div></td>
        <td width="67%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('1','<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
','<?php echo $this->_tpl_vars['agent_id']; ?>
')" >首页</a> </div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']-1; ?>
','<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
','<?php echo $this->_tpl_vars['agent_id']; ?>
')" >上一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']+1; ?>
','<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
','<?php echo $this->_tpl_vars['agent_id']; ?>
')" >下一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['maxpage']; ?>
','<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
','<?php echo $this->_tpl_vars['agent_id']; ?>
')" >尾页</a></div></td>
           
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>