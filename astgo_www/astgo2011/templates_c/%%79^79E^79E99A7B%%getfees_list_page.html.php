<?php /* Smarty version 2.6.26, created on 2015-03-10 04:02:47
         compiled from getfees_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'getfees_list_page.html', 168, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>推荐送话费日志</title>
</head>

<script>

	function delete_confirm()
	{
		if (confirm("确定要删除这个推荐吗?"))  {
			 return true;	
		}
		return false;	
	}
	
function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
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

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">推荐送话费记录
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
    
<form name="form1" method="post" action="?action=list">

 
         <tr>
           <td height="24" colspan="11"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">代理商
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
推荐结果
<select name="state" class="STYLE1" id="state" >
  <option  value="-1"  > 不限 </option>
  <option  value="0" <?php if ($this->_tpl_vars['post_data']['state'] == '0'): ?> selected <?php endif; ?>  > 发起 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['state'] == '1'): ?> selected <?php endif; ?>  > 成功 </option>
</select>
<label for="user_acctname"><span class="table_title">用户帐号</span></label>
<input name="user_acctname" type="text" class="STYLE1" id="user_acctname" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['user_acctname']; ?>
' /> 
<label for="tel"><span class="table_title">被推荐</span></label>
<input name="tel" type="text" class="STYLE1" id="tel" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['tel']; ?>
' /> 
日期
<select name="datetype" class="STYLE1" id="datetype" >
  <option  value="-1"  > 不限 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['datetype'] == '1'): ?> selected <?php endif; ?>  > 发起日期 </option>
  <option  value="2" <?php if ($this->_tpl_vars['post_data']['datetype'] == '2'): ?> selected <?php endif; ?>  > 成功日期 </option>
</select>
<input type="text"  name="begintime" id="begintime"   size="8"  value='<?php echo $this->_tpl_vars['post_data']['begintime']; ?>
' />
-
<input type="text"  name="endtime"   id="endtime" size="8" value='<?php echo $this->_tpl_vars['post_data']['endtime']; ?>
' />
<input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
<input name="checkbox_downloadfile" type="checkbox" class="STYLE1"   />
<label for="downloadfile">导出</label>
           </span></td>
         </tr>
          </form>
<tr>
 
    <td width="4%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
	 <td width="10%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">区域</div></td>
	  <td width="10%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">部门</div></td>
    <td width="10%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">员工</div></td>
    <td width="10%"  height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">推荐账号</div></td>
    <td width="10%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">被推荐账号</div></td>
    <td width="12%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">推荐时间</div></td>
    <td width="6%"  height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
    <td width="6%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">金额</div></td>
    <td width="12%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">成功时间</div></td>
	<?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
	<td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>
	<?php endif; ?> 
</tr>     

  <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
  <tr>
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['check_id']; ?>
 </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['areacode']; ?>
 </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['position']; ?>
 </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['agent_acctname']; ?>
 </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['acctname']; ?>
 </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['tel']; ?>
 </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['createtime']; ?>
 </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php if ($this->_tpl_vars['eachone']['state'] == '0'): ?>发起<?php elseif ($this->_tpl_vars['eachone']['state'] == '2'): ?>成功<?php else: ?><?php echo $this->_tpl_vars['eachone']['state']; ?>
<?php endif; ?> </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['balance']; ?>
 </div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['paydate']; ?>
 </div></td>
	<?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > 
	<a href="?action=del_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
"  onClick="return delete_confirm()" >删除</a>
	 </div></td>
	<?php endif; ?> 
</tr>
 <?php endforeach; endif; unset($_from); ?>                      
                        
                   
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="66%"><div align="left"><span class="STYLE21">共
              <?php echo $this->_tpl_vars['record_count']; ?>

              条记录，合计金额:<?php echo ((is_array($_tmp=$this->_tpl_vars['total_fee'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元 当前第
              <?php echo $this->_tpl_vars['curpage']; ?>

              /
              <?php echo $this->_tpl_vars['maxpage']; ?>

              页，每页
              <?php echo $this->_tpl_vars['pagelimtcount']; ?>

          条记录</span></div></td>
        <td width="34%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
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
	$(function() {
			
	    /*日期选择*/		
  		$( "#endtime" ).datepicker( $.datepicker.regional[ "zh-CN" ] );
		$( "#begintime" ).datepicker( $.datepicker.regional[ "zh-CN" ] );
	});
		
      
</script>
	
</body>
	
		

</html>