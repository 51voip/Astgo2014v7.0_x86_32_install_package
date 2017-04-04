<?php /* Smarty version 2.6.26, created on 2014-10-31 00:26:18
         compiled from user_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'smartTruncate', 'user_list_page.html', 288, false),array('modifier', 'string_format', 'user_list_page.html', 289, false),array('modifier', 'date_format', 'user_list_page.html', 298, false),)), $this); ?>
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
<title>用户帐号列表</title>
</head>

<script type="text/javascript">
  function update_sip_buddies()
	{
			if (confirm("确定要同步SIP帐号和当前所有用户帐号匹配吗?"))  { 
			    $.get("user.php?action=load_sip_buddies_post",{id:0}, function(data){
				
		         if (parseInt(data) == 0) 
				     alert('同步SIP帐号成功!');
				 else 
				    alert('同步SIP帐号失败:'+data);
			      });	
		
		   }
		
	}
	
	function batch_detele(curpage)
	{
		if (confirm(" 告警！ 批量删除后将不能恢复，确定要按查询条件批量删除用户帐号吗?"))  {
			
			if (confirm(" 再次告警！ 批量删除后将不能恢复，确定要按查询条件批量删除用户帐号吗?"))  {
				
				if (confirm(" 最后告警！ 批量删除后将不能恢复，确定要按查询条件批量删除用户帐号吗?"))  {
			        document.form1.action = '?action=multidel_do&curpage='+curpage; 
		 	        document.form1.submit(); 
			        return true;	
				}
			}
		}
  	    return false;	
	}
  
	
	function delete_confirm()
	{
		if (confirm("确定要删除这个帐号吗?"))  {
			 return true;	
		}
		return false;	
	}
	
	// 全选
    function checkAll() 
    { 
       var code_Values = document.getElementsByTagName("input"); 
       for(i = 0;i < code_Values.length;i++){ 
          if(code_Values[i].type == "checkbox" &&  code_Values[i].name != 'checkbox_downloadfile' ) 
          { 
             code_Values[i].checked = true; 
          } 
       } 
    } 

     //全不选
    function uncheckAll() 
    { 
       var code_Values = document.getElementsByTagName("input"); 
       for(i = 0;i < code_Values.length;i++){ 
          if(code_Values[i].type == "checkbox" &&  code_Values[i].name != 'checkbox_downloadfile' ) 
          { 
             code_Values[i].checked = false; 
          } 
       } 
    } 


   function  check_change()
   {
	  var c=document.form1.checkbox_op;
      if (c.checked)
      {
		checkAll();
      }
      else
      {
		uncheckAll() ;
	  }

   }

//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if ( parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
	 {
        document.form1.action = '?action=list&curpage='+index; 
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
                
                <td width="97%" valign="bottom"><span class="table_caption">用户帐号管理 &nbsp;&nbsp; 
                
              
                </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
                <?php if ($this->_tpl_vars['agent_id'] != ''): ?>  
          <?php if ($this->_tpl_vars['res_acct']['update_level'] == '1' || $this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
            
            <a href="#"  onClick="call_transferuser()" >转移帐号 </a> &nbsp;&nbsp; 
            <a href="#"  onClick="update_sip_buddies()" >同步SIP帐号 </a> &nbsp;&nbsp; 
          <?php endif; ?>  
          
     
          <?php if ($this->_tpl_vars['res_acct']['update_level'] == '1' || $this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
            
           <img src="images/edit.gif" width="10" height="10" />  <a href="#.batch_update_card" id="batch_update_card" >批量修改 </a>  &nbsp;&nbsp; 
           <img src="images/del.gif" width="10" height="10" /> <a href="#" onClick="batch_detele()" >批量删除 </a>  &nbsp;&nbsp; 
             <?php endif; ?>      
            
           
        
         <?php if ($this->_tpl_vars['res_acct']['newuser_level'] == '1' || $this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" >添加帐号 </a>
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
             <td height="26" colspan="14"    bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">代理
                 <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)" >
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
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?> >
                     <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                   </option>
                   <?php endforeach; endif; unset($_from); ?>
                 </select>
              <label for="acctname_begin"> 帐号</label>
<input name="acctname_begin" type="text" class="STYLE1" id="acctname_begin" size="6" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['acctname_begin']; ?>
' />
-
<input name="acctname_end" type="text" class="STYLE1" id="acctname_end" size="6" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['acctname_end']; ?>
' />
状态
<select name="enable" class="STYLE1" id="enable" >
  <option  value="-1"  > 不限 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['enable'] == '1'): ?> selected <?php endif; ?>  > 激活 </option>
  <option  value="0" <?php if ($this->_tpl_vars['post_data']['enable'] == '0'): ?> selected <?php endif; ?>  > 冻结 </option>
</select>
绑定
<select name="bounded" class="STYLE1" id="bounded" >
  <option  value="-1"  > 不限 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['bounded'] == '1'): ?> selected <?php endif; ?>  > 已绑定 </option>
  <option  value="0" <?php if ($this->_tpl_vars['post_data']['bounded'] == '0'): ?> selected <?php endif; ?>  > 未绑定 </option>
</select>
<select name="balancetype" class="STYLE1" id="balancetype" >
  <option  value="-1"  > 不限余额 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['balancetype'] == '1'): ?> selected <?php endif; ?>  > 余额大于 </option>
  <option  value="2" <?php if ($this->_tpl_vars['post_data']['balancetype'] == '2'): ?> selected <?php endif; ?>  > 余额等于 </option>
  <option  value="3" <?php if ($this->_tpl_vars['post_data']['balancetype'] == '3'): ?> selected <?php endif; ?>  > 余额小于 </option>
</select>
<input name="balance" type="text" class="STYLE1" id="balance" size="3" maxlength="10" value="<?php echo $this->_tpl_vars['post_data']['balance']; ?>
" />

  <select name="limitbalancetype" class="STYLE1" id="limitbalancetype" >
    <option  value="-1"  > 不限回铃限制 </option>
    <option  value="1" <?php if ($this->_tpl_vars['post_data']['limitbalancetype'] == '1'): ?> selected <?php endif; ?>  > 回铃限制大于 </option>
    <option  value="2" <?php if ($this->_tpl_vars['post_data']['limitbalancetype'] == '2'): ?> selected <?php endif; ?>  > 回铃限制等于 </option>
    <option  value="3" <?php if ($this->_tpl_vars['post_data']['limitbalancetype'] == '3'): ?> selected <?php endif; ?>  > 回铃限制小于 </option>
  </select>
  <input name="limitbalance" type="text" class="STYLE1" id="limitbalance" size="6" maxlength="10" value='<?php echo $this->_tpl_vars['post_data']['limitbalance']; ?>
' />元 &nbsp;&nbsp; 
  绑定电话
<input name="bindtel" type="text" class="STYLE1" id="bindtel" size="15" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['bindtel']; ?>
' />
             </span></td>
           </tr>
           <tr>
             <td height="26" colspan="14"    bgcolor="#FFFFFF" class="STYLE6"><label for="datetype"><span class="STYLE1">日期</span></label>
               <span class="STYLE1">
               <select name="datetype" class="STYLE1" id="datetype" >
                 <option  value="-1"  > 不限 </option>
                 <option  value="1" <?php if ($this->_tpl_vars['post_data']['datetype'] == '1'): ?> selected <?php endif; ?>  > 创建日期 </option>
                 <option  value="2" <?php if ($this->_tpl_vars['post_data']['datetype'] == '2'): ?> selected <?php endif; ?>  > 激活日期 </option>
				 <option  value="3" <?php if ($this->_tpl_vars['post_data']['datetype'] == '3'): ?> selected <?php endif; ?>  > 有效日期 </option>
               </select>
               <input type="text"  name="begintime" id="begintime"   size="7"  value='<?php echo $this->_tpl_vars['post_data']['begintime']; ?>
' />
               -
<input type="text"  name="endtime"   id="endtime" size="7" value='<?php echo $this->_tpl_vars['post_data']['endtime']; ?>
' />
回拨费率
<select name="rategroupid_acall" class="STYLE1" id="rategroupid_acall"  >
  <option  value="-1"  > 不限 </option>
  <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['post_data']['decode_rategroupid_acall']): ?> selected <?php endif; ?> >
  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

  </option>
  <?php endforeach; endif; unset($_from); ?>
</select>
被叫费率
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

 <?php if ($this->_tpl_vars['res_acct']['downloaduser_level'] == '1' || $this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
<input name="checkbox_downloadfile" type="checkbox" class="STYLE1"   />
导出
<?php endif; ?>
               </span>
             </td>
           </tr>
           <tr class="STYLE4">
           
                          <td width="3%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">代理商</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">帐号</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">密码</div></td>
                          <td width="4%"  height="24" bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">余额</div></td>
						  <td width="4%"  height="24" bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">回限</div></td>
                          <td width="6%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
                          <td width="8%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">绑定电话</div></td>
                          <td width="6%"  height="24" bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">有效期</div></td>
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">激活日期</div></td>
                          <td width="10%"  height="24" bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率组(主叫/被叫)</div></td>
                          <td width="14%"  height="24" bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>
                          <td width="4%"  height="24" bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">消费卡</div></td>
						  <td width="3%"  height="24" bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">套餐</div></td>
                          
                        </tr>
                        <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
<tr>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                            <?php echo $this->_tpl_vars['eachone']['check_id']; ?>
 </div></td>
 <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['agent_acctname'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 6, "..") : smarty_modifier_smartTruncate($_tmp, 6, "..")); ?>
 </div></td>                    
 <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"  title=" 密码: <?php echo $this->_tpl_vars['eachone']['password']; ?>
 回铃限制:<?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['limitbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元  直拨前缀:<?php echo $this->_tpl_vars['eachone']['bindexten']; ?>
  回拨前缀:<?php echo $this->_tpl_vars['eachone']['bindexten_cb']; ?>
 SIP前缀:<?php echo $this->_tpl_vars['eachone']['bindexten_sip']; ?>
 主叫号码:<?php echo $this->_tpl_vars['eachone']['callerid']; ?>
"><?php echo $this->_tpl_vars['eachone']['acctname']; ?>
 </div></td>
 <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['password']; ?>
 </div></td>
 <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div id="divbalance_<?php echo $this->_tpl_vars['eachone']['id']; ?>
" align="center" class="STYLE19"> <?php if ($this->_tpl_vars['eachone']['balance'] < 20): ?><font color="#ff0000"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</font><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<?php endif; ?> </div></td>

  <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['limitbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 </div></td>

 <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div  id="enable_<?php echo $this->_tpl_vars['eachone']['id']; ?>
" align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['enable'] == '1'): ?>激活[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','0')" >冻结</a>]<?php else: ?> <font color="#FF0000">冻结</font>[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','1')">激活</a>] <?php endif; ?></div></td>  
 <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE1" title="<?php echo $this->_tpl_vars['eachone']['tranfer_callee1']; ?>
-<?php echo $this->_tpl_vars['eachone']['tranfer_callee2']; ?>
-<?php echo $this->_tpl_vars['eachone']['tranfer_callee3']; ?>
-<?php echo $this->_tpl_vars['eachone']['tranfer_callee4']; ?>
-<?php echo $this->_tpl_vars['eachone']['tranfer_callee5']; ?>
-<?php echo $this->_tpl_vars['eachone']['tranfer_callee6']; ?>
"><?php echo $this->_tpl_vars['eachone']['bindtel_first']; ?>
(<?php echo $this->_tpl_vars['eachone']['bindtel_count']; ?>
)</div></td>
 <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                              <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['expireddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>

                            </div></td>
                    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                              <?php echo $this->_tpl_vars['eachone']['activedate']; ?>

                            </div></td>                           
                            
                    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                              <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['rategroupname_acall'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 5, ".") : smarty_modifier_smartTruncate($_tmp, 5, ".")); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['rategroupname'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 5, ".") : smarty_modifier_smartTruncate($_tmp, 5, ".")); ?>

                            </div></td>
                            
                         
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                          <a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
"  >配置</a>
                          <a href="speeddial.php?action=list&accountcode=<?php echo $this->_tpl_vars['eachone']['acctname']; ?>
&old_curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
">快捷</a>
                          <a href="btobtel.php?action=list&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&old_curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
">亲情号</a>
                          <a href="#" onClick="call_addbalance('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','<?php echo $this->_tpl_vars['eachone']['acctname']; ?>
')">充值</a>
                       <?php if ($this->_tpl_vars['res_acct']['update_level'] == '1' || $this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
                          <a href="?action=del_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
"  onClick="return delete_confirm()">删除</a>
                        <?php endif; ?>
		
		   </div></td>
           
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><a href="?action=acct_user_consumerpackage_list&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&old_curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
">查看</a>(<?php echo $this->_tpl_vars['eachone']['consumerpackage_count']; ?>
) </div></td>                            
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['ratepackage_count']; ?>
 </div></td>              
			
                                     
             </tr>

 
        <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="63%"><div align="left"><span class="STYLE21">共
                    <?php echo $this->_tpl_vars['record_count']; ?>

                    条记录，积淀金额:<?php echo ((is_array($_tmp=$this->_tpl_vars['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元 当前第
                    <?php echo $this->_tpl_vars['curpage']; ?>

                    /
                    <?php echo $this->_tpl_vars['maxpage']; ?>

                    页，每页
                    <?php echo $this->_tpl_vars['pagelimtcount']; ?>

            条记录</span></div></td>
        <td width="37%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
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
<div class="demo">
<div id="dialog-form" title="按“查询结果”批量修改" style="display:none">
	  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98">
	    <tr>
	      <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >状态</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1"> 
	        <select name="update_enable" class="STYLE1" id="update_enable"  >
	          <option value="-2" selected>----不修改-----</option>
	          <option value="0"  >关闭</option>
	          <option value="1"  >开启</option>
            </select> </span>
	       </td>
        </tr>
        
 	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >被叫类型</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1"> 
            <select name="update_callbindteltype" class="STYLE1" id="update_callbindteltype"  >
              <option value="-2" selected>不修改</option>
	          <option value="0"  > IVR总机流程</option>
              <option value="1"  > 呼叫SIP帐号</option>
              <option value="2"  > 回拨一号通预约</option>
              <option value="3"  > 一号通或400业务</option>
               </select>
              </span>
	       </td>
        </tr>
               
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >余额</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1"> 
	        <select name="update_balancetype" class="STYLE1" id="update_balancetype"  >
	          <option value="-2" selected>不修改</option>
	          <option value="0"   >累加</option>
	          <option value="1"   >替换</option>
            </select>
   	        <input name="update_balance"  id="update_balance"  type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        元</span></td>
        </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回铃限制</span></td>
	      <td height="18" bgcolor="#FFFFFF">
	       <span class="STYLE1"> 
	          <input name="update_limitbalance"   id="update_limitbalance"  type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="不修改" />
           元</span> </td>
        </tr>
	    <tr>
	      <td height="20" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >有效期</span></td>
	      <td height="20" bgcolor="#FFFFFF"><span class="STYLE1"> 
	        <input name="update_expireddate"  id="update_expireddate"  type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value="" />
	       </span></td>
        </tr>
 	    <tr>
	      <td height="20" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >激活</span></td>
	      <td height="20" bgcolor="#FFFFFF"><span class="STYLE1"> 
	     	<select name="update_activedate" class="STYLE1" id="update_activedate"  >
	          <option value="-2" selected>不修改</option>
	          <option value="0"   >重置</option>
	          <option value="1"   >激活</option>
            </select>       </span></td>
        </tr>       
        
	    <tr>
	      <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">单次通话时长</span></div></td>
	      <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_talk_timelong" id="update_talk_timelong" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        秒</span></td>
        </tr>

	    <tr>
	      <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">直拨限制分钟</span></div></td>
	      <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_directdial_month" id="update_directdial_month" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        分钟</span></td>
        </tr>
      
	    <tr>
	      <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">直拨已用分钟</span></div></td>
	      <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_directdial_month_minute" id="update_directdial_month_minute" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        分钟</span></td>
        </tr>
         	    <tr>
	      <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">赠送</span></div></td>
	      <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_timelonggift" id="update_timelonggift" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        分钟</span></td>
        </tr>        
        
  	    <tr>
	      <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">主叫号码</span></div></td>
	      <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_callerid" id="update_callerid" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        </span></td>
        </tr>     
                

                            
	    <tr>
	      <td bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">SIP呼出并发</span></div></td>
	      <td height="19" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_call_count" id="update_call_count" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
	        线</span></td>
        </tr>
	    <tr>
	      <td width="30%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >拨号加前缀</span></td>
	      <td width="70%" height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <select  name="update_bindexten_type" class="STYLE1"  id="update_bindexten_type">
                <option value="-2" selected>----不修改-----</option>
	          <option value="0"  > 不加前缀</option>
	          <option value="1"  > SIP和回拨都加</option>
	          <option value="2"  > 只有SIP加</option>
	          <option value="3"  > 只有回拨加</option>
	          <option value="4"  > 只有直拨加</option>
	          </select>
	      </span>
              </span></td>
	      </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF">
          <span class="STYLE1">直拨、半直拨</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_bindexten" type="text" class="STYLE1" id="update_bindexten" style="height:18px; width:45px;"  value="-2" size="10" />
	      </span></td>
        </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">回拨</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_bindexten_cb" type="text" class="STYLE1" id="update_bindexten_cb" style="height:18px; width:45px;"  value="-2" size="10" />
	      </span></td>
        </tr>
	    <tr>
	      <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">SIP</span></td>
	      <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
	        <input name="update_bindexten_sip" type="text" class="STYLE1" id="update_bindexten_sip" style="height:18px; width:45px;"  value="-2" size="10" />
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
" >  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
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
 <div class="demo" >
  <div id="addbalance-form" title="给用户帐号充值" style="display:none">
   <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98">
     <tr>
       <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
     </tr>
     <tr>
       <td height="18" colspan="2" bgcolor="#FFFFFF"><span class="STYLE1">
         <input name="user_id" type="hidden" class="STYLE1" id="user_id" style="height:18px; width:60px;"  value="0" size="10" />
       </span></td>
     </tr>
     <tr>
       <td width="41%" height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">充值账户</span></td>
       <td width="59%" height="18" bgcolor="#FFFFFF"><span class="STYLE1">
         <input name="user_acctname" type="text" disabled class="STYLE1" id="user_acctname" style="height:18px; width:120px;"  value="0" size="30" maxlength="30"    />
       </span></td>
     </tr>
     <tr>
       <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">充值金额</span></td>
       <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
         <input name="add_balance" type="text" class="STYLE1" id="add_balance" style="height:18px; width:60px;"  value="0" size="10" />
         元</span></td>
     </tr>
    
     
     <tr>
       <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div id="tip_add_balance" align="center"> </div></td>
     </tr>
     <tr>
       <td height="18" colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
   </table>
 </div>
</div>

 <div class="demo" >
  <div id="transferuser-form" title="按查询结果帐号转移" style="display:none">
   <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98">
     <tr>
       <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
     </tr>
     <tr>
       <td width="41%" height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">转移到</span></td>
       <td width="59%" height="18" bgcolor="#FFFFFF"><span class="STYLE1">
                   
           <select name="to_agent_id"  id="to_agent_id" >
		   
		        <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?>  
                <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
 </option>
                <?php endif; ?>   
				
                  <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" >  <?php echo $this->_tpl_vars['eachone']['acctname']; ?>
 </option>
                   <?php endforeach; endif; unset($_from); ?>
               </select>
           </span></td>
     </tr>
  <tr>
       <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">清空绑定电话</span></td>
       <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
       	<select name="transferuser_clearbindtel" id="transferuser_clearbindtel"  >
	          <option value="0"   >否</option>
	          <option value="1"   >是</option>
            </select>    
         </span></td>
     </tr>    
   <tr>
       <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">状态变为未激活</span></td>
       <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
       	<select name="transferuser_activedate"  id="transferuser_activedate"  >
	          <option value="0"   >否</option>
	          <option value="1"   >是</option>
            </select>    
         </span></td>
     </tr>      
 
          <tr>
       <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div id="tip_add_balance" align="center"> </div></td>
     </tr>
     <tr>
       <td height="18" colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
   </table>
 </div>
</div>
<script type="text/javascript">


  function call_enable(id,enable) {
	 //alert(id);
     //agent.call('','call_cardenable','callback_cardenable',id,enable);
	 $.get("user.php?action=userenable",{user_id:id,user_enable:enable}, function(data){
         var res = eval("(" + data + ")"); 
		  if (res.enable == 1)
		  {
		    $('#enable_'+res.id).html('<font color="#0000">激活</font>[<a href="#" onclick="call_enable('+res.id + ',0)">冻结</a>]');
		
		  }
		  else if (res.enable == 0)
		  {		
		     $('#enable_'+res.id).html('<font color="#FF0000">冻结</font>[<a href="#" onclick="call_enable('+res.id + ',1)">激活</a>]');
		
		  }
		  else 
		  { 
		       if (data == 0) alert('该用户不存在');
			   else if (data == 1) alert('你的权限不够。不能修改该用户的状态');
			   else alert('更新状态出错了！'+data);
			   
			  
			   
		  }
		  
		 });
	
		 
	 
  }
  
function call_addbalance(id,acctname)
{
	var add_balance = $( "#add_balance" );
    var user_acctname = $( "#user_acctname" );
    var user_id = $( "#user_id" );
    

    
    user_acctname.val(acctname);
    user_id.val(id);
    add_balance.val('');
    $('#tip_add_balance').html('');   
    
       
	$( "#addbalance-form" ).dialog( "open" );
}

function call_transferuser()
{
	$( "#transferuser-form" ).dialog( "open" );
}

function transferuser_submit(post_url)
{
			document.form1.action =   document.form1.action + '&subaction=transferuser&' + post_url;
			//alert(document.form1.action);			 
			document.form1.submit(); 
			 document.form1.action =  '?action=list';
			return true;	
}
function batchupdate_submit(post_url)
{
		if (confirm('确定按当前查询结果"批量修改"用户帐号数据吗?数据修改了不可恢复，请三思而后行.按"确定"开始批量修改，按"取消"放弃本次操作。'))  
		{
			if (confirm('再次确定按当前查询结果"批量修改"用户帐号数据吗?数据修改了不可恢复，请三思而后行.按"确定"开始批量修改，按"取消"放弃本次操作。'))  
			{
				if (confirm('最后确定按当前查询结果"批量修改"用户帐号数据吗?数据修改了不可恢复，请三思而后行.按"确定"开始批量修改，按"取消"放弃本次操作。')) 
				{
			       document.form1.action =   document.form1.action + '&subaction=batchedit&' + post_url;
		  	       //alert(document.form1.action);			 
			       document.form1.submit(); 
				   
				   document.form1.action =  '?action=list';
		 	       return true;
				}
		    }
		}
  	    return false;	
}	
	
	$(function() {
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		var update_bindexten_type = $( "#update_bindexten_type" ),
			update_bindexten = $( "#update_bindexten" ),
			update_bindexten_sip = $( "#update_bindexten_sip" ),
			update_bindexten_cb = $( "#update_bindexten_cb" ),
			update_balancetype = $( "#update_balancetype" ),
			update_balance = $( "#update_balance" ),
			update_expireddate = $( "#update_expireddate" ),
            update_limitbalance = $( "#update_limitbalance" ),
			update_call_count = $( "#update_call_count" ),
            update_enable = $( "#update_enable" ),
            update_talk_timelong = $( "#update_talk_timelong" ),
			update_directdial_month_minute = $( "#update_directdial_month_minute" ),
			update_directdial_month = $( "#update_directdial_month" ),
			update_callbindteltype = $( "#update_callbindteltype" ),
			update_activedate = $( "#update_activedate" ),
			update_intimelonggift = $( "#update_intimelonggift" ),
			update_timelonggift = $( "#update_timelonggift" ),
			update_callerid = $( "#update_callerid" ),
			update_active_user_count = $( "#update_active_user_count" ),
			update_rategroupid_acall = $( "#update_rategroupid_acall" ),
			update_rategroupid = $( "#update_rategroupid" ),
			update_ratepackages = $( "#update_ratepackages" ),
            add_balance = $( "#add_balance" ),  //充值窗口数据
            user_acctname = $( "#user_acctname" ),
            user_id = $( "#user_id" ),
			to_agent_id = $( "#to_agent_id" ),
			transferuser_balance = $( "#transferuser_balance" ),
			transferuser_clearbindtel = $( "#transferuser_clearbindtel" ),
			transferuser_activedate = $( "#transferuser_activedate" ),		
			transferuser_intimelonggift	 = $( "#transferuser_intimelonggift" ),		
			transferuser_timelonggift	 = $( "#transferuser_timelonggift" ),		
			allFields = $( [] ).add( update_bindexten_type ).add( update_bindexten ).add( update_bindexten_sip ).add( update_bindexten_cb ).add( update_balancetype ).add( update_balance ).add( update_expireddate ).add( update_limitbalance ).add( update_call_count ).add( update_enable ).add( update_talk_timelong ).add( update_directdial_month_minute ).add( update_directdial_month ).add( update_callbindteltype ).add( update_activedate ).add( update_intimelonggift ).add( update_timelonggift ).add( update_callerid ).add( update_active_user_count ).add( update_rategroupid_acall ).add( update_rategroupid ).add( update_ratepackages ).add( add_balance ).add( user_acctname ).add( user_id ) ;
							
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
						if(update_balance.val() =='不修改') update_balance.val('-2');
						if(update_expireddate.val() =='不修改') update_expireddate.val('-2');
						if(update_limitbalance.val() =='不修改') update_limitbalance.val('-2');
						if(update_call_count.val() =='不修改') update_call_count.val('-2');
                        if(update_talk_timelong.val() =='不修改') update_talk_timelong.val('-2');
						if(update_directdial_month_minute.val() =='不修改') update_talk_timelong.val('-2');
						if(update_directdial_month.val() =='不修改') update_talk_timelong.val('-2');
						
						
         
                        
							
						var post_url = "update_bindexten_type="+update_bindexten_type.val()+"&update_bindexten="+update_bindexten.val()+"&update_bindexten_sip="+update_bindexten_sip.val()
						+"&update_bindexten_cb="+update_bindexten_cb.val()+"&update_balancetype="+update_balancetype.val()+"&update_balance="+update_balance.val()+"&update_expireddate="
						+update_expireddate.val()+"&update_limitbalance="+update_limitbalance.val()+"&update_rategroupid_acall="+update_rategroupid_acall.val()+"&update_rategroupid="+update_rategroupid.val()
						+"&update_ratepackages="+update_ratepackages.val()+"&update_call_count="+update_call_count.val()+"&update_enable="+update_enable.val()+"&update_talk_timelong="+update_talk_timelong.val()
						+"&update_callbindteltype="+update_callbindteltype.val()
						+"&update_activedate="+update_activedate.val()
						+"&update_intimelonggift="+update_intimelonggift.val()
						+"&update_timelonggift="+update_timelonggift.val()
						+"&update_directdial_month_minute="+update_directdial_month_minute.val()
						+"&update_directdial_month="+update_directdial_month.val()
						+"&update_callerid="+update_callerid.val()
						+"&update_active_user_count="+update_active_user_count.val();
			            					 
											 
											 
					   
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
		
    /*转移帐号窗口 start*/
		$( "#transferuser-form" ).dialog({
			autoOpen: false,
			height: 350,
			width: 450,
			modal: true,
			buttons: {
				"转移": function() {
					 
				    var post_url = 'to_agent_id='+to_agent_id.val()+
					               '&transferuser_balance='+transferuser_balance.val()+
					               '&transferuser_clearbindtel='+transferuser_clearbindtel.val()+
								   '&transferuser_activedate='+ transferuser_activedate.val()+
								   '&transferuser_timelonggift='+transferuser_timelonggift.val()+
								   '&transferuser_intimelonggift='+transferuser_intimelonggift.val()  ; 
								   
					transferuser_submit(post_url);
   					$( this ).dialog( "close" );
						
				},
				关闭: function() {
					$( this ).dialog( "close" );
                    allFields.val( "" ).removeClass( "ui-state-error" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});		
        
    /*充值窗口 start*/
		$( "#addbalance-form" ).dialog({
			autoOpen: false,
			height: 350,
			width: 450,
			modal: true,
			buttons: {
				"充值": function() {
					
						/*输入数据合法验证*/
                        var user_id = $( "#user_id" );
                        var add_balance = $( "#add_balance" );
                        var user_acctname = $( "#user_acctname" );
                        
                        if ($.trim(add_balance.val()) == '' ||  (isNaN(add_balance.val()))  )
                        {
                             add_balance.val('');
							 add_balance.focus;
							 add_balance.css("background",  "#FF0000");
							 alert('充值金额不能为空。');
							 return;                 
                         }  
						                          
                        $.get("user.php?action=set_user_balance",{user_id:user_id.val(),add_balance:add_balance.val()}, function(data){
							
                          var msg = '';
                           if (data == 1)
                           {
                              msg = '充值失败.账户'+ user_acctname.val() +'不是您的下级用户';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }
                           else if (data == 2)
                           {
                              msg = '充值失败.您不是财务admin管理者。';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }
                           else if (data == 3)
                           {
                              msg = '充值失败，自己给你不能充值。';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }      
                           else if (data == 4)
                           {
                              msg = '充值失败，面值代理余额不足。';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }   			
                           else if (data == 5)
                           {
                              msg = '充值失败，您没有权限进行现金充值。';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }  						   			                       
                           else						   
                           {
							   
                               var res = eval("(" + data + ")"); 
                               $('#divbalance_'+res.id).html(res.balance);
                               msg = '充值成功.账户'+ user_acctname.val() + '现在的余额是:'+res.balance+'元';
                               $('#tip_add_balance').html('<font color="#66CC33">'+msg+'</font>');
                               
                           }
						 
                           alert(msg);
                           $( "#addbalance-form" ).dialog( "close" );
                         });
          		
				},
				关闭: function() {
					$( this ).dialog( "close" );
                    $('#tip_add_balance').html('');   
                    allFields.val( "" ).removeClass( "ui-state-error" );
				}
			},
			close: function() {
                $('#tip_add_balance').html('');   
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
           /*充值窗口 end */  
         
         

   
                  

         /*点击链接 弹出批量修改窗口 url 必须是 .batch_update_card 结尾*/
          $("[href$='.batch_update_card']")
            .click(function() {
			var update_bindexten_type = $( "#update_bindexten_type" ),
			update_bindexten = $( "#update_bindexten" ),
			update_bindexten_sip = $( "#update_bindexten_sip" ),
			update_bindexten_cb = $( "#update_bindexten_cb" ),
			update_balancetype = $( "#update_balancetype" ),
			update_balance = $( "#update_balance" ),
			update_expireddate = $( "#update_expireddate" ),
            update_limitbalance = $( "#update_limitbalance" ),
			update_call_count = $( "#update_call_count" ),
            update_enable = $( "#update_enable" ),
			update_callbindteltype = $( "#update_callbindteltype" ),
			update_activedate = $( "#update_activedate" ),
			update_intimelonggift = $( "#update_intimelonggift" ),
			update_timelonggift = $( "#update_timelonggift" ),
			update_callerid = $( "#update_callerid" ),
			update_active_user_count = $( "#update_active_user_count" ),
            update_talk_timelong = $( "#update_talk_timelong" ),
			update_rategroupid_acall = $( "#update_rategroupid_acall" ),
			update_rategroupid = $( "#update_rategroupid" ),
			update_ratepackages = $( "#update_ratepackages" );
				
			
				
            update_bindexten_type.val('-2');    
		    update_bindexten.val('-2');
			update_bindexten_sip.val('-2');
			update_bindexten_cb.val('-2');
            update_balancetype.val('-2');
			update_balance.val('');
			update_expireddate.val('');
			update_limitbalance.val('');		
            update_call_count.val('');				
            update_enable.val('-2');
            update_talk_timelong.val('');	
			update_rategroupid_acall.val('-2');
            update_rategroupid.val('-2');
            update_ratepackages.val('-2');
			update_callbindteltype.val('-2');
			update_activedate.val('-2');
			update_intimelonggift.val('');
			update_timelonggift.val('');
			update_callerid.val('');
			update_active_user_count.val('');
										
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
        $( "#update_expireddate" ).datepicker( $.datepicker.regional[ "zh-CN" ] );

	});
	
	</script>
</html>