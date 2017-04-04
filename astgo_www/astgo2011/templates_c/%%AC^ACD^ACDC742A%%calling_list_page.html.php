<?php /* Smarty version 2.6.26, created on 2014-10-31 00:20:41
         compiled from calling_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'calling_list_page.html', 129, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    <link rel="stylesheet" href="./css/demos.css">
<title>呼叫线路监控</title>
</head>

<script>


//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if ( parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
	 {
        document.form1.action = '?action=call_list&curpage='+index+'&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
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

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">呼叫线路监控
                </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1"></span>
             
             
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
    
 <form name="form1" method="post" action="?action=call_list">

 
         <tr>
           <td  height="26" colspan="13"    bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">代理
             <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)"  >
                <option  value="" > --全部-- </option>
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
                </select>
呼叫状态
<select name="state" class="STYLE1" id="state" >
  <option  value="-1"  > 全部 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['state'] == '1' || $this->_tpl_vars['post_data']['state'] == '2' || $this->_tpl_vars['post_data']['state'] == '3' || $this->_tpl_vars['post_data']['state'] == '4' || $this->_tpl_vars['post_data']['state'] == '5' || $this->_tpl_vars['post_data']['state'] == '6'): ?> selected <?php endif; ?>  > 正在呼叫 </option>
  <option  value="0" <?php if ($this->_tpl_vars['post_data']['state'] == '0'): ?> selected <?php endif; ?>  > 正在通话 </option>
</select>
<label for="acctname"> 用户帐号</label>
<input name="acctname" type="text" class="STYLE1" id="acctname" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['acctname']; ?>
' />
<label for="called"> 被叫号码</label>
<input name="called" type="text" class="STYLE1" id="called" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['called']; ?>
' />
<input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
           </span></td>
         </tr>
          </form>
         <tr>
                          <td width="4%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
                          <td width="6%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">分销ID</div></td>
                          <td width="4%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">帐号</div></td>
                          <td width="10%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">中继名称</div></td>
                          <td width="10%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率组</div></td>
                          <td width="6%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">主叫</div></td>
                          <td width="6%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">被叫</div></td>
                          <td width="8%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">业务</div></td>
                          <td width="4%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
                          <td width="8%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">开始</div></td>
                          <td width="4%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">应答</div></td>
                          <td width="4%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">时长(秒)</div></td>
                          <td width="4%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">选项</div></td>
                    
                          
        </tr>     

          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
        <tr>

              <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
  </div></td>
   
                      <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['agent_name']; ?>
 </div></td>
                      <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['accountcode']; ?>
 </div></td>
                     <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['trunkname']; ?>
 </div></td>
                      <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
 </div></td>
                      <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['caller']; ?>
 </div></td>
                      <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['called']; ?>
 </div></td>
                     <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['calltype'] == 1): ?>预付费<?php elseif ($this->_tpl_vars['eachone']['calltype'] == 2): ?>回拨回铃<?php elseif ($this->_tpl_vars['eachone']['calltype'] == 3): ?>回拨呼叫<?php elseif ($this->_tpl_vars['eachone']['calltype'] == 4): ?>预付费呼出
                      	<?php elseif ($this->_tpl_vars['eachone']['calltype'] == 5): ?>发送传真<?php elseif ($this->_tpl_vars['eachone']['calltype'] == 6): ?>外呼IVR<?php elseif ($this->_tpl_vars['eachone']['calltype'] == 7): ?>外呼队列<?php elseif ($this->_tpl_vars['eachone']['calltype'] == 8): ?>外呼语音<?php else: ?>其他业务><?php endif; ?> </div></td>
                     <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['state'] == '0'): ?><font color="#3366FF">通话</font><?php else: ?>呼叫<?php echo $this->_tpl_vars['eachone']['state']; ?>
<?php endif; ?> </div></td>
                     <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['start_time']; ?>
 </div></td>
                     <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['answer_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%T") : smarty_modifier_date_format($_tmp, "%T")); ?>
 </div></td>
                    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['timelong']; ?>
 </div></td>
                    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><a href="#"  onClick="call_hangup('<?php echo $this->_tpl_vars['eachone']['channel']; ?>
')" >挂断</a></div></td>
                
                       
           
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
' ,'<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
')" >尾页</a></div></td>
           
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script>
function call_hangup(channel) {
	 $.get("syslog.php?action=call_hangup",{res_channel:channel}, function(data){
		 if (data == '1')
		 {
		    alert('挂机任务已经发送成功');
		 }
		 else  alert('挂机任务已经发送失败');
	  });

	}
		
      
</script>
</body>

</html>