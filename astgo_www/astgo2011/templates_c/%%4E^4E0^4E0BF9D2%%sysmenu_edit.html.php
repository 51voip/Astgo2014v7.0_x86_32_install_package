<?php /* Smarty version 2.6.26, created on 2014-11-04 16:17:06
         compiled from sysmenu_edit.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    
<title>系统菜单设置</title>
<script>

	//所有input 去空格
	function trim_all_input()
	{
		var inpus = document.getElementsByTagName("INPUT")
        for(var i=0; i<inpus.length; i++)
        {
            if(inpus[i].type=="text")
            {
               inpus[i].value =  inpus[i].value.replace(/\s/g,"");
            }
        }
		
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
                <td width="2%" height="19" valign="bottom"><div align="center"><img src="images/tb.gif" width="14" height="14" /></div></td>
                <td width="98%" valign="bottom"><span class="STYLE10"> 系统菜单设置</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  

  <tr>
    <td><table width="672" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
   <tr>
            <td height="18" colspan="5" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4"><span class="STYLE7"><span class="STYLE1">设置</span> </span></span></div></td>
        </tr>
          <form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
">
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><div align="right"><span class="STYLE1">菜单名称</span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">权限</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left"><span class="STYLE1">显示</span></div></td>
          </tr>
		  
		    <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
		  
          <tr >
            <td width="42%" height="18" align="right" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>">
			<div align="right">
			<span class="STYLE7">
              <input name="menuname<?php echo $this->_tpl_vars['eachone']['id']; ?>
" id="menuname<?php echo $this->_tpl_vars['eachone']['id']; ?>
" type="text" class="STYLE1"  style="height:18px; width:120px;" size="180" value='<?php echo $this->_tpl_vars['eachone']['menuname']; ?>
'>
            </span></div></td>

            <td width="18%" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center">
              <select name="accttype<?php echo $this->_tpl_vars['eachone']['id']; ?>
" class="STYLE1" id="accttype<?php echo $this->_tpl_vars['eachone']['id']; ?>
"  >
                <option  value="1" <?php if ($this->_tpl_vars['eachone']['accttype'] == '1'): ?> selected="selected" <?php endif; ?> > 管理员 </option>
                <option  value="2" <?php if ($this->_tpl_vars['eachone']['accttype'] == '2'): ?> selected="selected" <?php endif; ?> > 代理商 </option>
              </select>
            </div></td>
            <td width="40%" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>">
			 <select name="enable<?php echo $this->_tpl_vars['eachone']['id']; ?>
" class="STYLE1" id="enable<?php echo $this->_tpl_vars['eachone']['id']; ?>
"  >
              <option  value="1" <?php if ($this->_tpl_vars['eachone']['enable'] == '1'): ?> selected="selected" <?php endif; ?> > 是 </option>
              <option  value="0" <?php if ($this->_tpl_vars['eachone']['enable'] == '0'): ?> selected="selected" <?php endif; ?> > 否 </option>
            </select></td>
       
           </tr>
		   
		     <?php endforeach; endif; unset($_from); ?>
          
		  <tr>
            <td height="24" colspan="5" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center">
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"  value=" 确认提交 ">
            </div></td>
            </tr>
        </form>   
 
      </table></td>
  </tr>



</table>

</body>
<script>

		 $("input:text,input:password,textarea").focus(function(){
			 if (this.value == '请输入') this.value = '';
			 $(this).css("background","#a8c7ce");
			 }).blur(function(){
			 
				 $(this).css("background","#FFF");
				 
				
			 }); 
</script>     

</html>