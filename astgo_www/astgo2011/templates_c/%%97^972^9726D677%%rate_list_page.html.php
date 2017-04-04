<?php /* Smarty version 2.6.26, created on 2014-10-31 00:17:41
         compiled from rate_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'rate_list_page.html', 112, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	
<title>费率列表</title>
</head>
<script src="./js/jquery-1.6.2.min.js"></script>


<script>

	function delete_confirm()
	{
		if (confirm("确定要删除这个费率吗?"))  {
			 return true;	
		}
		return false;	
	}
//页码导航 
function post_list(index,curpage,maxpage,agent_id)
{ 
     if ( parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!= parseInt(index) )
	 {
        document.form1.action = '?action=list&curpage='+index+'&agent_id='+agent_id+'&rategroupid=<?php echo $this->_tpl_vars['rategroupid']; ?>
'; 
	    document.form1.submit(); 
	    return true;
	 }
	 return false;
}	
	
	function goback(old_curpage,agent_id)
	{
		var gotourl = 'rategroup.php?action=list&curpage='+old_curpage+'&agent_id='+agent_id ; 
		//alert(gotourl);
	    document.form1.action = gotourl;
	
		document.form1.submit();
	}	
	function batch_detele()
	{
		if (confirm(" 警告！ 批量删除后将不能恢复，确定要批量删除?"))  {
			       document.form1.action = '?action=multidelete_do&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&rategroupid=<?php echo $this->_tpl_vars['rategroupid']; ?>
'; 
			       document.form1.submit(); 
		    	   return true;	
		}
  	    return false;	
	}			
</script>
<body>
 <form name="form1" method="post" action="?action=list&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
&rategroupid=<?php echo $this->_tpl_vars['rategroupid']; ?>
">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span class="table_caption">费率管理&nbsp;&nbsp;<a href="#"  onclick="goback('<?php echo $this->_tpl_vars['old_curpage']; ?>
','<?php echo $this->_tpl_vars['rategroup_agent_id']; ?>
')" > 返回 </a></span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
            <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
&rategroupid=<?php echo $this->_tpl_vars['rategroupid']; ?>
" >新建或批量导入费率 </a>
			 &nbsp;
			<img src="images/del.gif" width="10" height="10" /> <a href="#" onClick="batch_detele()" >批量删除 </a>
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
             <td  height="24" colspan="11"   bgcolor="#FFFFFF" class="STYLE6"><span class="table_title">费率前缀<span class="STYLE1">
               <input name="prefix" type="text" class="STYLE1" id="prefix" size="15" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['prefix']; ?>
' />
              <input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
              <input name="checkbox_downloadfile" type="checkbox" class="STYLE1" />
              <label for="downloadfile">导出</label>
             </span></span></td>
           </tr>
           <tr>
            <td width="2%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
            <td width="8%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率组</div></td>
            <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率名称</div></td>            
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率前缀</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">单价</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">计费周期</div></td>  
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">免费时长</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">附加费</div></td>
            <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">首时段计费</div></td>
            <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">次时段计费</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>

          </tr>
         
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
         <tr>
         
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['prefixname']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['prefix']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['rateprice'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['payunitsecond']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['notpaysecond']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['surchargenum'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['firsttimelong'] > 0): ?><?php echo $this->_tpl_vars['eachone']['firsttimelong']; ?>
秒内按<?php echo $this->_tpl_vars['eachone']['firstpayunitsecond']; ?>
周期计费<?php else: ?>不启用<?php endif; ?></div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['sencondtimelong'] > 0): ?><?php echo $this->_tpl_vars['eachone']['sencondtimelong']; ?>
秒内按<?php echo $this->_tpl_vars['eachone']['sencondpayunitsecond']; ?>
周期计费<?php else: ?>不启用<?php endif; ?></div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
               <a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
&rategroupid=<?php echo $this->_tpl_vars['rategroupid']; ?>
">编辑</a>
              <a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
&rategroupid=<?php echo $this->_tpl_vars['rategroupid']; ?>
"  onClick="return delete_confirm()" >删除</a></div></td>
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
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['agent_id']; ?>
')"  >首页</a> </div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']-1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['agent_id']; ?>
')" >上一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']+1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['agent_id']; ?>
')" >下一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['maxpage']; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['agent_id']; ?>
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