<?php /* Smarty version 2.6.26, created on 2015-02-28 16:59:42
         compiled from inboundroute_list_page.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>呼入路由列表</title>
</head>

<script src="./js/jquery-1.6.2.min.js"></script>


<script>


        
//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
	 {
        document.form1.action = '?action=list&curpage='+index; 
	    document.form1.submit(); 
	    return true;
	 }
	 return false;
}

	function delete_confirm()
	{
		if (confirm("确定要删除这个条呼入路由吗?"))  {
			 return true;	
		}
		return false;	
	}
	
</script>
<body>
 <form name="form1" method="post" action="?action=list&id=<?php echo $this->_tpl_vars['gateway']['id']; ?>
">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span class="table_caption">呼入路由管理</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
            <img src="images/add.gif" width="10" height="10" />  <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
" class="table_caption" >新增呼入路由 </a><</span>
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">

          <tr>
            <td width="2%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
            <td width="6%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">名称</div></td>
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">业务类型</div></td>
			<td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">IVR语言</div></td>
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">被叫前缀</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">适用代理</div></td>
            <td width="12%"  height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">主叫替换规则</div></td>  
            <td width="12%"  height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">被叫替换换规则</div></td>  
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">接通</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>
          </tr>
          

          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
          
          <tr>
        
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['routername']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['codetypename']; ?>
</div></td>
           <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['language']; ?>
</div></td>
			<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['prefix']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['only_agent_id'] == '-1'): ?>全部<?php else: ?><?php echo $this->_tpl_vars['eachone']['agent_acctname']; ?>
<?php endif; ?></div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['prexrule']; ?>
</div></td>
             <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['callee_prexrule']; ?>
</div></td>
            
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['answer'] == '1'): ?>是<?php else: ?>否<?php endif; ?></div></td>       

            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> 
            <a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">编辑</a>
            <a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
"  onClick="return delete_confirm()" >删除</a>
            </div></td>
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