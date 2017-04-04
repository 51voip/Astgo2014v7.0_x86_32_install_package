<?php /* Smarty version 2.6.26, created on 2014-11-15 15:59:49
         compiled from smscdr_list_page.html */ ?>
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
<title>短信详单</title>
</head>

<script>

//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!= parseInt(index) )
	 {
        document.form1.action = '?action=sms_list&curpage='+index+'&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
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
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">短信记录 </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption"></span>
             
             
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
    <form name="form1" method="post" action="?action=sms_list">
   <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    
    
      <tr>
        <td><div align="left"><span class="STYLE1">代理商
                <select name="agent_id" id="agent_id" onchange= "change_acct_id(this.value)"  >
                  <option  value="" > --全部-- </option>
				  <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>
                  <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>>
                    <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>

                  </option>
				  <?php endif; ?>
                  <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected="selected" <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
                </select>
        日期: 
         <input type="text"  name="begintime" id="begintime"   size="7"  value='<?php echo $this->_tpl_vars['post_data']['begintime']; ?>
' readonly />
        - 
         <input type="text"  name="endtime" id="endtime"   size="7"  value='<?php echo $this->_tpl_vars['post_data']['endtime']; ?>
' readonly /></span><span class="STYLE1">
         <input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
         </span></div></td>
        </tr>
        
    </table></td>
  </tr>
    </form>
     
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     <tr>
                          <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title"> 序号</div></td>
                          <td width="6%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 代理商</div></td>
                          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">  接收号码</div></td>
                          <td width="8%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 发送日期</div></td>
                          <td width="4%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 条数</div></td>
                          <td width="40%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 信息</div></td>
 
                           
  </tr>     

          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
        <tr>
        
   <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['check_id']; ?>
 </div></td>
   <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['agent_acctname']; ?>
 </div></td>
   <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['dst']; ?>
 </div></td>
   <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['senddate']; ?>
 </div></td>
   <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['sms_count']; ?>
 </div></td>
   <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['smstext']; ?>
 </div></td>
                                  
                               
                     
                           
           </tr>
          
 
        <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="66%"><div align="left"><span class="STYLE21">共
                    <?php echo $this->_tpl_vars['record_count']; ?>

                    条记录 当前第
                    <?php echo $this->_tpl_vars['curpage']; ?>

                    /
                    <?php echo $this->_tpl_vars['maxpage']; ?>

                    页，每页
                    <?php echo $this->_tpl_vars['pagelimtcount']; ?>

                    条记录
                    </span></div></td>
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