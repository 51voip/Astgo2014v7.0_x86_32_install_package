<?php /* Smarty version 2.6.26, created on 2014-10-31 00:12:40
         compiled from gateway_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'smartTruncate', 'gateway_list_page.html', 103, false),array('modifier', 'string_format', 'gateway_list_page.html', 108, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    <link rel="stylesheet" href="./css/demos.css">
    
<title>中继列表</title>
</head>

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
		if (confirm("确定要删除这个条中继落地吗?"))  {
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
 <form name="form1" method="post" action="?action=list&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span class="table_caption">中继(落地)管理 - (IP/H323对接-SIP注册-O口网关)</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
" >新增中继落地</a></span>
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
    

  <tr>
  
             
            <td width="2%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
            <td width="10%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">名称</div></td>
            <td width="4%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">线路状态</div></td>  
            <td width="4%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">设备名称</div></td>
            <td width="4%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">设备密码</div></td>            
            <td width="2%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
             <td width="5%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">并发</div></td>  
            <td width="3%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">协议</div></td>
            <td width="3%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">类型</div></td>
            <td width="8%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">IP地址</div></td>
             <td width="3%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">走媒体</div></td>  
             <td width="3%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">DTMF</div></td>    
            <td width="8%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">编码</div></td>  
            <td width="5%"   height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>
                   
         

        </tr>
          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
          <tr>
          
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['peerstate'] == 1): ?><font color="#0000FF"><?php echo $this->_tpl_vars['eachone']['trunkname']; ?>
</font><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['trunkname'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 10, "..") : smarty_modifier_smartTruncate($_tmp, 10, "..")); ?>
<?php endif; ?></div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['peerstate'] == 1): ?><font color="#0000FF"><?php echo $this->_tpl_vars['eachone']['peerstatetext']; ?>
</font><?php else: ?><?php echo $this->_tpl_vars['eachone']['peerstatetext']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['eachone']['peerstatetext'] == ''): ?>正常<?php endif; ?> </div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['peerstate'] == 1): ?><font color="#0000FF"><?php echo $this->_tpl_vars['eachone']['peername']; ?>
</font><?php else: ?> <?php echo $this->_tpl_vars['eachone']['peername']; ?>
<?php endif; ?></div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['secret'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 6, "..") : smarty_modifier_smartTruncate($_tmp, 6, "..")); ?>
</div></td>            
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['enable'] == 1): ?>开启<?php else: ?>禁用<?php endif; ?><?php echo $this->_tpl_vars['eachone']['enable']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['curcallcount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%03d") : smarty_modifier_string_format($_tmp, "%03d")); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['calllimit'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%03d") : smarty_modifier_string_format($_tmp, "%03d")); ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['tech']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['trunkprototype'] == 'reg'): ?>注册<?php elseif ($this->_tpl_vars['eachone']['trunkprototype'] == 'ip'): ?>对接<?php elseif ($this->_tpl_vars['eachone']['trunkprototype'] == 'iad'): ?>网关<?php else: ?>----<?php endif; ?>  </div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['trunkprototype'] == 'iad'): ?><?php echo $this->_tpl_vars['eachone']['peeripaddr']; ?>
:<?php echo $this->_tpl_vars['eachone']['peerport']; ?>
<?php else: ?><?php echo $this->_tpl_vars['eachone']['host']; ?>
:<?php echo $this->_tpl_vars['eachone']['port']; ?>
<?php endif; ?></div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['canreinvite'] == 'yes'): ?>否<?php else: ?>是<?php endif; ?>  </div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['dtmfmode']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['allow']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">编辑</a>&nbsp; <a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
"  onClick="return delete_confirm()" >删除</a></div></td>


                 
          </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="57%"><div align="left"><span class="STYLE21">共
              <?php echo $this->_tpl_vars['record_count']; ?>

              条记录，并发总计 <?php echo $this->_tpl_vars['curcallcount']; ?>
线 当前第
              <?php echo $this->_tpl_vars['curpage']; ?>

              /
              <?php echo $this->_tpl_vars['maxpage']; ?>

              页，每页
              <?php echo $this->_tpl_vars['pagelimtcount']; ?>

          条记录</span></div></td>
        <td width="43%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
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