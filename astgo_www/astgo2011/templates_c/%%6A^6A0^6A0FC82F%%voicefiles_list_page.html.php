<?php /* Smarty version 2.6.26, created on 2014-11-15 15:59:33
         compiled from voicefiles_list_page.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    <link rel="stylesheet" href="./css/demos.css">
<title>文件管理</title>
</head>

<script>

	

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

	function delete_confirm()
	{
		if (confirm("确定要删除这个文件吗?"))  {
			 return true;	
		}
		return false;	
	}


	function goback(old_curpage,agent_id)
	{
		var gotourl = 'user.php?action=list&curpage='+old_curpage+'&agent_id='+agent_id ; 
		//alert(gotourl);
	    document.form1.action = gotourl;
	
		document.form1.submit();
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
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">文件管理 </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption"> <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" >添加文件 </a></span>
             
             
             
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
           <td  height="24" colspan="9"    bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">
            
代理商
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
             </span></td>
         </tr>
          </form>
         <tr>
                            

            <td width="2%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
            <td width="6%" height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">代理商</div></td>
            <td width="4%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">文件类型</div></td>
            <td width="8%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">文件名称</div></td>
            <td width="6%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">大小</div></td>
            <td width="4%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">审核结果</div></td>
            <td width="4%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">下载</div></td>
            <td width="6%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">上传时间</div></td>
            <td width="6%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>                        
 
        </tr>     

          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
        <tr>
       
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19"><?php echo $this->_tpl_vars['eachone']['acctname']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19"><?php if ($this->_tpl_vars['eachone']['extname'] == 'php'): ?>脚本文件<?php elseif ($this->_tpl_vars['eachone']['extname'] == 'tif'): ?>传真文件<?php elseif ($this->_tpl_vars['eachone']['extname'] == 'wav'): ?>语音文件<?php else: ?>未知文件<?php endif; ?>(<?php echo $this->_tpl_vars['eachone']['extname']; ?>
)</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19"><?php echo $this->_tpl_vars['eachone']['description']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19"><?php echo $this->_tpl_vars['eachone']['filesize']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" id="enable_<?php echo $this->_tpl_vars['eachone']['id']; ?>
" >
            <?php if ($this->_tpl_vars['eachone']['enable'] == '1'): ?>通过 <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','0')" >禁用</a>]<?php endif; ?><?php else: ?> <font color="#FF0000">待审</font> <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','1')">通过</a>]<?php endif; ?> <?php endif; ?>
            </div></td>
              <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19"><a href="?action=download_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
"> 点击下载</a></div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19"><?php echo $this->_tpl_vars['eachone']['createtime']; ?>
</div></td>
          
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
            <a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" >修改</a>
            <a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
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

   function call_enable(id,enable) {
	   
	   
	 $.get("?action=call_enable",{voicefiles_id:id,voicefiles_enable:enable}, function(data){
		 

         var res = eval("(" + data + ")"); 
		 
		 
		 if (res.enable == 1)
		 {
		    $('#enable_'+res.id).html('<font color="#0000">通过</font>[<a href="#" onclick="call_enable('+res.id + ',0)">待审</a>]');
		
		 }
		  else
		  {		
		     $('#enable_'+res.id).html('<font color="#FF0000">待审</font>[<a href="#" onclick="call_enable('+res.id + ',1)">通过</a>]');
		
		  }
		 });
	 
  }
</script>
</body>

</html>