<?php /* Smarty version 2.6.26, created on 2014-10-31 00:13:08
         compiled from out_routegroup_edit.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<script src="./js/jquery-1.6.2.min.js"></script>
<title>无标题文档</title>
<script>
  $(document).bind("contextmenu",function(e){
    return false;
  });
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
	
	// 提交前检测输入是否合法
	function check()
	{
		trim_all_input(); //所有input 去空格
			
		if (document.form1.gatewaygroupname.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的呼出路由组名称</font></span></div>";
      		document.form1.gatewaygroupname.focus();
			return false;
			
		}		
	
		return true;

	}
	
	function goback(curpage)
	{
	    document.form2.action = '?action=list&curpage='+curpage;
		document.form2.submit();
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
                <td width="98%" valign="bottom"><span class="STYLE10">  <?php if ($this->_tpl_vars['action'] == 'edit_post'): ?> 修改呼出路由组 <?php elseif ($this->_tpl_vars['action'] == 'add_post'): ?> 新增呼出路由组<?php else: ?>呼出路由组管理<?php endif; ?></span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <form name="form2" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&id=<?php echo $this->_tpl_vars['out_routegroup']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
   </form> 
  
    <form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&id=<?php echo $this->_tpl_vars['out_routegroup']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
  <tr>
    <td><table width="605" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
       <tr>
            <td height="18" colspan="4" bgcolor="#FFFFFF">&nbsp;
            </td>
            </tr>
          <tr>
            <td width="19%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >呼出路由组名</span></td>
            <td width="23%" height="18" bgcolor="#FFFFFF">
              <label for="gatewaygroupname"></label>
              <span class="STYLE7">
                <input name="gatewaygroupname" type="text" class="STYLE1" style="height:18px; width:150px;" size="30"  value='<?php echo $this->_tpl_vars['out_routegroup']['gatewaygroupname']; ?>
' />
                </span>
            </td>
            <td width="14%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >说明</span></td>
            <td width="44%" height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="remark" type="text" class="STYLE1" style="height:18px; width:225px;" size="30"  value='<?php echo $this->_tpl_vars['out_routegroup']['remark']; ?>
' />
            </span></td>
            </tr>
  
          <tr>
            <td id="userTip" height="18" colspan="4" align="right" bgcolor="#FFFFFF"></td>
          </tr>
          
          <tr>
            <td height="18" colspan="4" align="center" bgcolor="#FFFFFF">
              
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="button"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
')" value=" 取消返回 ">
              </td>
            </tr>
                 
 
    </table></td>
  </tr>
  </form>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       
        <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>

            <td width="35">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p class="STYLE19">&nbsp;</p>
</body>
</html>