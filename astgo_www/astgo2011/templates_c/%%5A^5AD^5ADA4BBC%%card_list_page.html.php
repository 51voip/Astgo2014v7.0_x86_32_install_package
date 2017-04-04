<?php /* Smarty version 2.6.26, created on 2014-10-31 00:19:29
         compiled from card_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'card_list_page.html', 236, false),array('modifier', 'smartTruncate', 'card_list_page.html', 251, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
	<script src="./js/external/jquery.bgiframe-2.1.2.js"></script>
	<script src="./js/ui/jquery.ui.core.js"></script>
	<script src="./js/ui/jquery.ui.widget.js"></script>
	<script src="./js/ui/jquery.ui.mouse.js"></script>
	<script src="./js/ui/jquery.ui.button.js"></script>
	<script src="./js/ui/jquery.ui.draggable.js"></script>
	<script src="./js/ui/jquery.ui.position.js"></script>
	<script src="./js/ui/jquery.ui.resizable.js"></script>
	<script src="./js/ui/jquery.ui.dialog.js"></script>
    <script src="./js/ui/jquery.ui.datepicker.js"></script>
    <script src="./js/ui/i18n/jquery.ui.datepicker-zh-CN.js"></script>
    <link rel="stylesheet" href="./css/demos.css">
<title>储值卡列表</title>
</head>

<script type="text/javascript">

	function delete_confirm()
	{
		if (confirm("确定要删除这个储值卡吗?"))  {
			 return true;	
		}
		return false;	
	}
	function batch_detele(curpage)
	{
		if (confirm(" 警告！ 批量删除后将不能恢复，确定要批量删除储值卡吗?"))  {
			
			if (confirm(" 再 次  警告 ！ 批量删除后将不能恢复，确定要批量删除储值卡吗?"))  {
				
				if (confirm(" 最后  警告 ！ 批量删除后将不能恢复，确定要批量删除储值卡吗?"))  {
					
			       document.form1.action = '?action=multidelete_do&curpage='+curpage; 
			       document.form1.submit(); 
		    	   return true;	
				}
			}
		}
  	    return false;	
	}

//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!= parseInt(index) )
	 {
        document.form1.action = '?action=list&curpage='+index+'&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
'; 
	    document.form1.submit(); 
	    return true;
	 }
	 return false;
}

function  change_acct_id(acct_id)
{
	    document.form1.submit(); 
	    return true;		 
	
}
	
</script>
<div>
<body>
 <form name="form1" method="post" action="?action=list">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span class="table_caption">储值卡管理 &nbsp;&nbsp; 
                
              
                </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
              <?php if ($this->_tpl_vars['agent_id'] != ''): ?>  
           <?php if ($this->_tpl_vars['res_acct']['update_level'] == '1' || $this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
            <a href="#.batch_update_card" id="batch_update_card" >批量修改 </a> &nbsp;&nbsp;
			 <a href="#.batch_transfer_card" id="batch_transfer_card" >批量转移 </a> &nbsp;&nbsp;
            <img src="images/del.gif" width="10" height="10" /> <a href="#" onClick="batch_detele()" >批量删除 </a>  &nbsp;&nbsp; 
           <?php endif; ?>    
           <?php if ($this->_tpl_vars['res_acct']['newcard_level'] == '1' || $this->_tpl_vars['res_acct']['accttype'] == '1'): ?>

            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" >批量生成 </a>
            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_uploadfile_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" >批量导入 </a>
            <?php endif; ?>    
			   <?php endif; ?>      
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
            <td height="26" colspan="17"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">代理商
                <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)"  >
                <option  value="" > --全部-- </option>
				<?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?> 
                <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
 </option>
				<?php endif; ?>
                  <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected="selected" <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
                </select>
                <select name="enable" class="STYLE1" id="enable" >
                  <option  value="-1"  > 不限 </option>
                  <option  value="1" <?php if ($this->_tpl_vars['post_data']['enable'] == '1'): ?> selected="selected" <?php endif; ?>  > 激活 </option>
                  <option  value="0" <?php if ($this->_tpl_vars['post_data']['enable'] == '0'): ?> selected="selected" <?php endif; ?>  > 禁用 </option>
                </select>
                <select name="vouchered" class="STYLE1" id="vouchered" >
                  <option  value="-1"  > 不限 </option>
                  <option  value="1" <?php if ($this->_tpl_vars['post_data']['vouchered'] == '1'): ?> selected="selected" <?php endif; ?>  > 已充值 </option>
                  <option  value="0" <?php if ($this->_tpl_vars['post_data']['vouchered'] == '0'): ?> selected="selected" <?php endif; ?>  > 未充值 </option>
                </select>
                <label for="accttype"> 类型
                <select name="accttype" class="STYLE1" id="accttype" >
                  <option  value="-1"  > 不限 </option>
                  <option  value="1" <?php if ($this->_tpl_vars['post_data']['accttype'] == '1'): ?> selected="selected" <?php endif; ?>  >开户卡 </option>
                  <option  value="2" <?php if ($this->_tpl_vars['post_data']['accttype'] == '2'): ?> selected="selected" <?php endif; ?>  >充值卡 </option>
				  <option  value="3" <?php if ($this->_tpl_vars['post_data']['accttype'] == '3'): ?> selected="selected" <?php endif; ?>  >全能卡 </option>
                </select>
                卡号</label>
                <input name="cardname_begin" type="text" class="STYLE1" id="cardname_begin" size="8" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['cardname_begin']; ?>
' />
-
<input name="cardname_end" type="text" class="STYLE1" id="cardname_end" size="8" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['cardname_end']; ?>
' />
<label for="balance"> 面值</label>
<input name="balance" type="text" class="STYLE1" id="balance" size="4" maxlength="10" value='<?php echo $this->_tpl_vars['post_data']['balance']; ?>
' />
<label for="password">卡密</label>
<input name="password" type="text" class="STYLE1" id="password" size="6" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['password']; ?>
' />
<label for="voucher_acctname">被充值号码</label>
<input name="voucher_acctname" type="text" class="STYLE1" id="voucher_acctname" size="8" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['voucher_acctname']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="26" colspan="17"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">
              <label for="datetype3">日期</label>
              <select name="datetype" class="STYLE1" id="datetype3" >
                <option  value="-1"  > 不限 </option>
                <option  value="1" <?php if ($this->_tpl_vars['post_data']['datetype'] == '1'): ?> selected="selected" <?php endif; ?>  > 创建如期 </option>
                <option  value="2" <?php if ($this->_tpl_vars['post_data']['datetype'] == '2'): ?> selected="selected" <?php endif; ?>  > 充值日期 </option>
              </select>
              <input type="text"  name="begintime" id="begintime"   size="8"  value='<?php echo $this->_tpl_vars['post_data']['begintime']; ?>
' />
-
<input type="text"  name="endtime"   id="endtime" size="8" value='<?php echo $this->_tpl_vars['post_data']['endtime']; ?>
' />
回拨费率组
<select name="rategroupid_acall" class="STYLE1" id="rategroupid_acall"  >
  <option  value="-1"  > 不限 </option>
  <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['post_data']['decode_rategroupid_acall']): ?> selected="selected" <?php endif; ?> >
  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

  </option>
  <?php endforeach; endif; unset($_from); ?>
</select>
被叫费率组
<select name="rategroupid" class="STYLE1" id="rategroupid"  >
  <option  value="-1"  > 不限 </option>
  <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['post_data']['decode_rategroupid']): ?> selected <?php endif; ?> >
  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

  </option>
  <?php endforeach; endif; unset($_from); ?>
</select>
<input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />

<?php if ($this->_tpl_vars['res_acct']['downloadcard_level'] == '1' || $this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
<input name="checkbox_downloadfile" type="checkbox" class="STYLE1"   />
<label for="downloadfile3">导出</label>

<?php endif; ?>
            </span></td>
          </tr>
          <tr>
                          <td width="2%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">代理商</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">卡号</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">密码</div></td>
                          <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">面值</div></td>
						  <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">类型</div></td>
                          <td width="10%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率组(回拨/被叫)</div></td>
                          <td width="2%"  height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">赠送</div></td>
                          <td width="2%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">方式</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
                          <td width="2%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">有效</div></td>
                           <td width="2%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">充值</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">充值日期</div></td>
                           <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">被充值号码</div></td>
                          <td width="2%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">套餐</div></td>
                          <td width="2%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">充值</div></td>
                          <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">删除</div></td>
          </tr>
          
          
          
            
          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  
           <tr>
                      <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                       <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?> 
                              <?php echo $this->_tpl_vars['eachone']['check_id']; ?>
 </font>
                              
                              
                            </div></td>
                       <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                              <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>  <?php echo $this->_tpl_vars['eachone']['agent_acctname']; ?>
 </font>
                            </div></td>                  
                           <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" title=" 直拨前缀:<?php echo $this->_tpl_vars['eachone']['bindexten']; ?>
  回拨前缀:<?php echo $this->_tpl_vars['eachone']['bindexten_cb']; ?>
 SIP前缀:<?php echo $this->_tpl_vars['eachone']['bindexten_sip']; ?>
  " >
                              <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>  <?php echo $this->_tpl_vars['eachone']['cardname']; ?>
 </font>
                            </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                            <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>    <?php echo $this->_tpl_vars['eachone']['password']; ?>
 </font>
                            </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                            <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>    <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 </font>
                            </div></td>
							
							
					       <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                              <?php if ($this->_tpl_vars['eachone']['accttype'] == '1'): ?>
                              开户
							  <?php elseif ($this->_tpl_vars['eachone']['accttype'] == '2'): ?>
							  充值 
                              <?php else: ?>
                              全能
                              <?php endif; ?>
                            </div></td>
									
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                            <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>    <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['rategroupname_acall'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 6, "..") : smarty_modifier_smartTruncate($_tmp, 6, "..")); ?>

                              /
                              <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['rategroupname'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 6, "..") : smarty_modifier_smartTruncate($_tmp, 6, "..")); ?>
 </font>
                            </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                            <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>   <?php echo $this->_tpl_vars['eachone']['giftpercent']; ?>

                              % </font></div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                           <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>    <?php if ($this->_tpl_vars['eachone']['clearoldbalance'] == '1'): ?>
                              覆盖
                              <?php else: ?>
                              追加
                              <?php endif; ?> </font>
                            </div></td>
<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div  id="enable_<?php echo $this->_tpl_vars['eachone']['id']; ?>
" align="center" class="STYLE19">
 
 <?php if ($this->_tpl_vars['eachone']['enable'] == '1'): ?>激活[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','0')" >冻结</a>]<?php else: ?> <font color="#FF0000">冻结</font>[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','1')">激活</a>] <?php endif; ?>
                              
            </div>            </td>       
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                          <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?> 
                              <?php echo $this->_tpl_vars['eachone']['expireddays']; ?>
</font>
                            </div></td>
                            
                              
                          <td height="20" bgcolor= "<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                          
                          <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?> 
                          
                              <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?>
                              是
                              <?php else: ?>
                              否
                              <?php endif; ?>
                              </font>
                              
                            </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                           <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>    <?php echo $this->_tpl_vars['eachone']['activedate']; ?>
 </font>
                            </div></td>
                           <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                            <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>   <?php echo $this->_tpl_vars['eachone']['voucher_acctname']; ?>
 </font>
                            </div></td>
     <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"  title=" <?php echo $this->_tpl_vars['eachone']['ratepackages']; ?>
 >
                          <?php if ($this->_tpl_vars['eachone']['vouchered'] == '1'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?>
                          <font color="#000000">
                          <?php echo $this->_tpl_vars['eachone']['ratepackage_count']; ?>

                          </font></font>
                          </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['vouchered'] == '0' && $this->_tpl_vars['eachone']['enable'] == '1'): ?><a href="?action=pay_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
"  >充值</a><?php else: ?>充值<?php endif; ?></div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
"  onClick="return delete_confirm()" >删除</a></div></td>
             </tr>

 
        <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="56%"><div align="left"><span class="STYLE21">共
              <?php echo $this->_tpl_vars['record_count']; ?>

              条记录，合计金额: <?php echo ((is_array($_tmp=$this->_tpl_vars['sumbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元 当前第
              <?php echo $this->_tpl_vars['curpage']; ?>

              /
              <?php echo $this->_tpl_vars['maxpage']; ?>

              页，每页
              <?php echo $this->_tpl_vars['pagelimtcount']; ?>

          条记录</span></div></td>
        <td width="44%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('1',<?php echo $this->_tpl_vars['curpage']; ?>
,'<?php echo $this->_tpl_vars['maxpage']; ?>
')"  >首页</a> </div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']-1; ?>
','<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
')" >上一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']+1; ?>
','<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
')" >下一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['maxpage']; ?>
','<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
')" >尾页</a></div></td>
           
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</div>
<div class="demo"  style="display:none">
<div id="dialog-form" title="按查询结果批量修改">
	  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98">
	    <tr>
	      <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
	      </tr>
	    <tr>
	      <td width="30%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >拨号加前缀</span></td>
	      <td width="70%" height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <select  name="update_bindexten_type"   id="update_bindexten_type">
                <option value="-2" selected>------不修改-------</option>
	          <option value="0"  > 不加前缀</option>
	          <option value="1"  > SIP和回拨都加</option>
	          <option value="2"  > 只有SIP加</option>
	          <option value="3"  > 只有回拨加</option>
	          <option value="4"  > 只有直拨加</option>
	          </select>-2 表示不修改
	           </span></td>
	      </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF">
          <span class="STYLE1">直拨、半直拨</span> </td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_bindexten" type="text" class="STYLE1" id="update_bindexten" style="height:18px; width:45px;"  value="不修改" size="10" />
	      </span></td>
        </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">回拨</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_bindexten_cb" type="text" class="STYLE1" id="update_bindexten_cb" style="height:18px; width:45px;"  value="不修改" size="10" />
	      </span></td>
        </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">SIP</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_bindexten_sip" type="text"  id="update_bindexten_sip" style="height:18px; width:45px;"  value="不修改" size="10" />
	      </span></td>
        </tr>
	  	
        <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >卡状态</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <select name="update_enable"  id="update_enable"  >
              <option value="-2" selected>---------不修改---------</option>
	          <option value="0"   > 冻结</option>
	          <option value="1"   > 激活</option>
	          </select>
              </span>
	      </td>
	    </tr>
        
        <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >充值方式</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <select name="update_clearoldbalance"  id="update_clearoldbalance"  >
              <option value="-2" selected>---------不修改---------</option>
	          <option value="0"    > 余额追加</option>
	          <option value="1"    > 余额覆盖</option>
	          </select>
              </span>
	      </td>
	     </tr>
          
          
   	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >卡面值</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_balance"  id="update_balance"  type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        </span></td>
	      </tr>       
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >赠送比例</span></td>
	      <td height="18" bgcolor="#FFFFFF"><label for="update_giftpercent"><span class="STYLE1">
	        <input name="update_giftpercent"  id="update_giftpercent"  type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        </span></label></td>
	      </tr>
	    <tr>
	      <td height="20" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >有效期</span></td>
	      <td height="20" bgcolor="#FFFFFF">
	        <input name="update_expireddays"  id="update_expireddays"  type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        <label for="expireddays"></td>
	      </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回铃限制</span></td>
	      <td height="18" bgcolor="#FFFFFF">
	        <span class="STYLE7">
	          <input name="update_limitbalance"   id="update_limitbalance"  type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	          </span></td>
	      </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回拨费率组</span></td>
	      <td height="18" bgcolor="#FFFFFF">
	        <span class="STYLE1">
	          <select name="update_rategroupid_acall" id="update_rategroupid_acall"  >
                <option value="-2" selected >---------不修改---------</option>
	            <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
	               <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" >   <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
  </option>
	            <?php endforeach; endif; unset($_from); ?>
              </select>
	          </span></td>
	      </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >被叫费率组</span></td>
	      <td height="18" bgcolor="#FFFFFF">
	        <span class="STYLE1">
	          <select  name="update_rategroupid" id="update_rategroupid"    >
                 <option value="-2" selected>---------不修改---------</option>
	            <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
	            <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['vouchercard']['rategroupid']): ?> selected <?php endif; ?> >
	              <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                </option>
	            <?php endforeach; endif; unset($_from); ?>
              </select>
	          </span></td>
	      </tr>
	    <tr>
	      <td height="19" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >套餐</span></td>
	      <td height="19" bgcolor="#FFFFFF">
	        <span class="STYLE1">
	          <select size="8"  class="STYLE1"  multiple="multiple" id="update_ratepackages"  name="update_ratepackages[]" >
                <option value="-2" selected>---------不修改---------</option>
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
	    </table>
 
</div>
</div><!-- End demo -->


<div class="demo1" style="display:none">
<div id="transfer_dialog-form" title="批量转移卡">
	  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98">
	    <tr>
	      <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
	      </tr>
	    <tr>
	      <td width="30%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >转到代理商</span></td>
	      <td width="70%" height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	                       <select name="new_agent_id" class="STYLE1" id="new_agent_id" >
						   
						   		        <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?>  
                <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
 </option>
                <?php endif; ?>   
				

                  <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected="selected" <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
                </select>
	           </span></td>
	      </tr>
	    </table>
 
</div>
</div><!-- End demo -->


<script type="text/javascript">
  function call_enable(id,enable) {
	 //alert(id);
     //agent.call('','call_cardenable','callback_cardenable',id,enable);
	 $.get("card.php?action=cardenable",{card_id:id,card_enable:enable}, function(data){
         var res = eval("(" + data + ")"); 
		 //alert(data);
		 if (res.enable == 1)
		 {
		    $('#enable_'+res.id).html('<font color="#0000">激活</font>[<a href="#" onclick="call_enable('+res.id + ',0)">冻结</a>]');
		
		 }
		  else
		  {		
		     $('#enable_'+res.id).html('<font color="#FF0000">冻结</font>[<a href="#" onclick="call_enable('+res.id + ',1)">激活</a>]');
		
		  }
		 });
	
		 
	 
  }
  
  function batchupdate_submit(post_url)
{
		//if (confirm('确定按当前查询结果"批量修改"用户帐号数据吗?数据修改了不可恢复，请三思而后行.按"确定"开始批量修改，按"取消"放弃本次操作。'))  
		//{
			document.form1.action =   document.form1.action + '&subaction=batchupdate&' + post_url;
			//alert(document.form1.action);			 
			document.form1.submit(); 
			
			document.form1.action = '?action=list';

			return true;	
		//}
  	    //return false;	
}	

function batchtransfer_submit(agent_id)
{
  			document.form1.action =   document.form1.action + '&subaction=batchtransfer&new_agent_id='+agent_id;
						 
			
			document.form1.submit(); 
			
			//document.form1.action = '?action=list';
			return true;
			
}


	
	
	$(function() {
		
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		var update_bindexten_type = $( "#update_bindexten_type" ),
			update_bindexten = $( "#update_bindexten" ),
			update_bindexten_sip = $( "#update_bindexten_sip" ),
			update_bindexten_cb = $( "#update_bindexten_cb" ),
			update_clearoldbalance = $( "#update_clearoldbalance" ),
			update_giftpercent = $( "#update_giftpercent" ),
			update_balance = $( "#update_balance" ),
			update_enable = $( "#update_enable" ),
			update_expireddays = $( "#update_expireddays" ),
			update_limitbalance = $( "#update_limitbalance" ),
			update_rategroupid_acall = $( "#update_rategroupid_acall" ),
			update_rategroupid = $( "#update_rategroupid" ),
			update_ratepackages = $( "#update_ratepackages" ),
			new_agent_id = $( "#new_agent_id" ),
			allFields = $( [] ).add( update_bindexten_type ).add( update_bindexten ).add( update_bindexten_sip ).add( update_bindexten_cb ).add( update_clearoldbalance ).add( update_balance ).add( update_enable ).add( update_giftpercent ).add( update_expireddays ).add( update_limitbalance ).add( update_rategroupid_acall ).add( update_rategroupid ).add( update_ratepackages );


								
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 300,
			width: 450,
			modal: true,
			buttons: {
				"批量修改": function() {
					
						
						/*输入数据合法验证*/
						if(update_bindexten.val() =='不修改') update_bindexten.val('-2');
						if(update_bindexten_sip.val() =='不修改') update_bindexten_sip.val('-2');
						if(update_bindexten_cb.val() =='不修改') update_bindexten_cb.val('-2');
						if(update_clearoldbalance.val() =='不修改') update_clearoldbalance.val('-2');
						if(update_expireddays.val() =='不修改') update_expireddays.val('-2');
						if(update_limitbalance.val() =='不修改') update_limitbalance.val('-2');
						if(update_giftpercent.val() =='不修改') update_giftpercent.val('-2');
						if(update_balance.val() =='不修改') update_balance.val('');
						if(update_enable.val() =='不修改') update_enable.val('-2');
						if (isNaN(update_expireddays.val()))
						{
							 update_expireddays.focus;
							 update_expireddays.css("background",  "#FF0000");
							 return false;
						}
						if (isNaN(update_limitbalance.val()))
						{
							 update_limitbalance.focus;
							 update_limitbalance.css("background","#FF0000");
							 return false;
						}
						if (isNaN(update_giftpercent.val()))
						{
							 update_giftpercent.focus;
							 update_giftpercent.css("background","#FF0000");
							 return false;
						}
						
						
						
							
						var post_url = "update_bindexten_type="+update_bindexten_type.val()+"&update_bindexten="+update_bindexten.val()+"&update_bindexten_sip="+update_bindexten_sip.val()
						+"&update_bindexten_cb="+update_bindexten_cb.val()+"&update_clearoldbalance="+update_clearoldbalance.val()+"&update_balance="+update_balance.val()+"&update_enable="+update_enable.val()+"&update_giftpercent="+update_giftpercent.val()+"&update_expireddays="
						+update_expireddays.val()+"&update_limitbalance="+update_limitbalance.val()+"&update_rategroupid_acall="+update_rategroupid_acall.val()+"&update_rategroupid="+update_rategroupid.val()
						+"&update_ratepackages="+update_ratepackages.val();
			            
				
	 
						batchupdate_submit(post_url);
						
						$( this ).dialog( "close" );
					
				},
				取消: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});



		$( "#transfer_dialog-form" ).dialog({
			autoOpen: false,
			height: 150,
			width: 450,
			modal: true,
			buttons: {
				"批量转移": function() {
	
					batchtransfer_submit( new_agent_id.val() );
					$( this ).dialog( "close" );
					
				},
				取消: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});



           $("[href$='.batch_transfer_card']")
		     .click(function() {
			 	$( "#transfer_dialog-form" ).dialog( "open" );
		  });
		   

         /*点击链接 弹出批量修改窗口 url 必须是 .batch_update_card 结尾*/
          $("[href$='.batch_update_card']")
            .click(function() {
			var update_bindexten_type = $( "#update_bindexten_type" ),
			update_bindexten = $( "#update_bindexten" ),
			update_bindexten_sip = $( "#update_bindexten_sip" ),
			update_bindexten_cb = $( "#update_bindexten_cb" ),
			update_clearoldbalance = $( "#update_clearoldbalance" ),
			update_balance = $( "#update_balance" ),
			update_enable = $( "#update_enable" ),
			update_giftpercent = $( "#update_giftpercent" ),
			update_expireddays = $( "#update_expireddays" ),
			update_limitbalance = $( "#update_limitbalance" ),
			update_rategroupid_acall = $( "#update_rategroupid_acall" ),
			update_rategroupid = $( "#update_rategroupid" ),
			update_ratepackages = $( "#update_ratepackages" );
				
			
				
		    update_bindexten.val('-2');
			update_bindexten_sip.val('-2');
			update_bindexten_cb.val('-2');
			update_clearoldbalance.val('-2');
			update_expireddays.val('');
			update_limitbalance.val('');
			update_balance.val('');
			update_enable.val('-2');
			update_giftpercent.val('');
			update_rategroupid.val('-2');
			update_bindexten_type.val('-2');
			update_rategroupid_acall.val('-2');
										
			$( "#dialog-form" ).dialog( "open" );
		  });
			
		/*编辑框选择后显示获取焦点，批量修改窗体提示不修改*/
		 $("input:text,input:password,textarea").focus(function(){
			 $(this).css("background","#d3eaef");
			 }).blur(function(){
				 $(this).css("background","#FFF");
			 }); 
			
	    /*日期选择*/		
  		$( "#endtime" ).datepicker( $.datepicker.regional[ "zh-CN" ] );
		$( "#begintime" ).datepicker( $.datepicker.regional[ "zh-CN" ] );
 
 

	});
	</script>	
</html>