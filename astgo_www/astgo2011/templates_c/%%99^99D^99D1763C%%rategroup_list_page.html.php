<?php /* Smarty version 2.6.26, created on 2014-10-31 00:17:31
         compiled from rategroup_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'rategroup_list_page.html', 103, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>费率组</title>
</head>
<script src="./js/jquery-1.6.2.min.js"></script>

<script>

//页码导航 
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

	function delete_confirm()
	{
		if (confirm("确定要删除这个费率组吗?"))  {
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
 <form name="form1" method="post" action="?action=list">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span class="table_caption">费率组管理</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" >新增费率组 </a></span>
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">

  <tr>
    <td   height="24" colspan="8"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">费率组所有者：
             <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)" >
                <option  value="" > --全部-- </option>
                <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
 </option>
                 <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                   <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?> >
                     <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                   </option>
                   <?php endforeach; endif; unset($_from); ?>
                 </select>
                 
    
      </span></td>
  </tr>
  <tr>
            <td width="2%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
            <td width="10%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">所有者</div></td>
            <td width="10%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率组名称</div></td>
            <td width="6%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">短信费率</div></td>
            <td width="4%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率数</div></td>            
            <td width="10%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率列表管理</div></td>  
            <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">套餐</div></td>
            <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>

        </tr>
          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
          <tr>
          
 
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['acctname']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['smsrateprice'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['ratecount']; ?>
</div></td>
               
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><a href="rate.php?action=list&rategroupid=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&old_curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
">查看管理</a></div></td>               
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['packagename'] == ''): ?>空 <?php else: ?> <?php echo $this->_tpl_vars['eachone']['packagename']; ?>
<?php endif; ?></div></td>    
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
            <a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
">修改</a>
            <a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
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
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onclick="return post_list('1',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
)" >首页</a> </div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onclick="return post_list('<?php echo $this->_tpl_vars['curpage']-1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
)" >上一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onclick="return post_list('<?php echo $this->_tpl_vars['curpage']+1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
)" >下一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onclick="return post_list('<?php echo $this->_tpl_vars['maxpage']; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
)" >尾页</a></div></td>
           
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>