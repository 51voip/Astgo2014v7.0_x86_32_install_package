<?php /* Smarty version 2.6.26, created on 2014-10-31 00:14:32
         compiled from gatewaypolicy_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'smartTruncate', 'gatewaypolicy_list_page.html', 138, false),array('modifier', 'string_format', 'gatewaypolicy_list_page.html', 143, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>呼出路由列表</title>
</head>
<script src="./js/jquery-1.6.2.min.js"></script>


<script>

//页码导航 
function post_list(index,curpage,maxpage,gatewaygroupid)
{ 
     if ( parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
	 {
        document.form1.action = '?action=list&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&curpage='+index+'&gatewaygroupid='+gatewaygroupid; 
	    document.form1.submit(); 
	    return true;
	 }
	 return false;
}


	function goback(old_curpage)
	{
		var gotourl = 'out_routegroup.php?action=list&curpage='+old_curpage ; 
		//alert(gotourl);
	    document.form1.action = gotourl;
	
		document.form1.submit();
	}
	function delete_confirm()
	{
		if (confirm("确定要删除这个条呼出路由吗?"))  {
			 return true;	
		}
		return false;	
	}
	function batch_detele()
	{
		if (confirm(" 警告！ 批量删除后将不能恢复，确定要批量删除?"))  {
			
			       document.form1.action = '?action=multidelete_do&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&gatewaygroupid=<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
'; 
			       document.form1.submit(); 
		    	   return true;	
			
		}
  	    return false;	
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
                
                <td width="97%" valign="bottom"><span class="table_caption">呼出路由管理&nbsp;&nbsp;
                <a href="#"  onclick="goback('<?php echo $this->_tpl_vars['old_curpage']; ?>
')" > 返回 </a>
                </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&gatewaygroupid=<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
">新增呼出路由 </a>
            &nbsp;
			 <img src="images/del.gif" width="10" height="10" /> <a href="#" onClick="batch_detele()" >批量删除 </a>
			&nbsp;</span>
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
	
	<form enctype="multipart/form-data" method="post" name="uploadfile_post" action="?action=uploadfile_post&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&gatewaygroupid=<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" target="_self">
   
    <tr>
      <td  height="24" colspan="12"    bgcolor="#FFFFFF" class="STYLE6"><span class="table_title">批量导入<span class="STYLE1">
        <input name="src" type="file" class="STYLE1" />
          <input name="querybtn2" type="submit" class="STYLE1"   id="querybtn2"  value=" 上传导入 " />
        </span></span></td>
   </tr>
 </form>
	
	<form name="form1" method="post" action="?action=list&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&gatewaygroupid=<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
">
    <tr>
      <td  height="24" colspan="12"    bgcolor="#FFFFFF" class="STYLE6"><span class="table_title">拨号前缀<span class="STYLE1">
      <input name="prefix" type="text" class="STYLE1" id="prefix" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['prefix']; ?>
' />
      <input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
      <input name="checkbox_downloadfile" type="checkbox" class="STYLE1" />
      <label for="downloadfile">导出</label>
     
      </span></span></td>
    </tr>
	</form>
	

 <tr>

            <td width="2%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
            <td width="6%" height="24"     bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">名称</div></td>
            <td width="4%" height="24"     bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
            <td width="6%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">呼出落地(中继)</div></td>
            <td width="6%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">拨号前缀</div></td>
            <td width="16%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">被叫替换规则</div></td>
            <td width="3%" height="24"     bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">优先级</div></td>
            <td width="2%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">终止</div></td>
            <td width="10%" height="24"     bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">主叫号码池</div></td>
            <td width="4%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">开启时段</div></td>  
            <td width="6%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">路由成本</div></td>          
            <td width="8%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>
        </tr>     

          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
                  <tr>
        
        
   
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['name']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['enable'] == '1'): ?>开启<?php else: ?>禁用<?php endif; ?> </div></td>

            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['trunkname']; ?>
 </div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['prefix']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" title="<?php echo $this->_tpl_vars['eachone']['callee_prexrule']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['callee_prexrule'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 20, "..") : smarty_modifier_smartTruncate($_tmp, 20, "..")); ?>
 </div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['priority']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['routestop'] == '1'): ?><font color="#FF0000">是</font><?php else: ?>否<?php endif; ?></div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['callergroup_name']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['hour_begin']; ?>
点-<?php echo $this->_tpl_vars['eachone']['hour_end']; ?>
点</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['rateprice'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
元/<?php echo $this->_tpl_vars['eachone']['payunitsecond']; ?>
秒</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center">
            	<a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&gatewaygroupid=<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
" class="STYLE19">编辑</a>
               	<a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&gatewaygroupid=<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
"  onClick="return delete_confirm()" class="STYLE19" >删除</a></div></td>
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
,'<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
')"  >首页</a> </div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']-1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
')" >上一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']+1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
')" >下一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['maxpage']; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['gatewaygroupid']; ?>
')" >尾页</a></div></td>
           
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>


</body>
</html>