<?php /* Smarty version 2.6.26, created on 2014-11-02 11:36:04
         compiled from astlog_list_page.html */ ?>
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
<title>系统告警日志</title>
</head>

<script>

//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
	 {
        document.form1.action = '?action=astlog_list&curpage='+index;
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

	function delete_confirm(curpage)
	{
		if (confirm("确定要删除系统告警日志吗?"))  
		{
			
           document.form1.action = '?action=astlog_delte&curpage='+curpage;
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
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">系统告警日志 </span></td>
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
    
    <form name="form1" method="post" action="?action=astlog_list">
        
         <tr>
           <td  height="24" colspan="3"  bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">
             <label for="datetype">开始日期</label>
             <input type="text"  name="begintime" id="begintime"   size="8"  value='<?php echo $this->_tpl_vars['post_data']['begintime']; ?>
' />
-结束日期
<input type="text"  name="endtime"   id="endtime" size="8" value='<?php echo $this->_tpl_vars['post_data']['endtime']; ?>
' />
<input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
<input name="checkbox_downloadfile" type="checkbox" class="STYLE1"   />
<label for="downloadfile">导出</label>
<input name="querybtn2"  type= "button" class="STYLE1"   id="querybtn2"   onclick="return delete_confirm('<?php echo $this->_tpl_vars['curpage']; ?>
')"    value=" 批量清空 " />
           </span></td>
         </tr>
          </form>
         <tr>
          <td width="4%"  height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
          <td width="50%"  height="24" bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作信息</div></td>
          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">日期</div></td>
        </tr>     

      <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
        <tr>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="letf" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['msg']; ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['createtime']; ?>
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
	$(function() {
			
	    /*日期选择*/		
  		$( "#endtime" ).datepicker( $.datepicker.regional[ "zh-CN" ] );
		$( "#begintime" ).datepicker( $.datepicker.regional[ "zh-CN" ] );
	});
		
      
</script>
</body>

</html>