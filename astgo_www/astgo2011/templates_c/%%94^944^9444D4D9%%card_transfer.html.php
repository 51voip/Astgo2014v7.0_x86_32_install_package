<?php /* Smarty version 2.6.26, created on 2015-02-28 16:59:57
         compiled from card_transfer.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>代理转账</title>
<script src="./js/jquery-1.6.2.min.js"></script>

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
	
	// 提交前检测输入是否合法
	function check()
	{
		trim_all_input(); //所有input 去空格

		if (document.form1.acctname.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确转出代理</font></span></div>";
      		document.form1.acctname.focus();
			return false;
		}		
		
		if (document.form1.to_acctname.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确转入代理</font></span></div>";
      		document.form1.to_acctname.focus();
			return false;
		}		
	
		if (document.form1.balance.value==""  || ( isNaN(document.form1.balance.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确转账金额</font></span></div>";
      		document.form1.balance.focus();
			return false;
		}	
		
	    return true;
		//return true;

	}

	function goback(curpage,agent_id)
	{
	    document.form1.action = '?action=list&curpage='+curpage +'&agent_id=' + agent_id;
		document.form1.submit();
	}
	


    </script>

<body>
<form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="2%" height="19" valign="bottom"><div align="center"><img src="images/tb.gif" width="14" height="14" /></div></td>
                <td width="98%" valign="bottom"><span class="table_caption">代理转账</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
      
      <td><table width="605" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
 	
          <tr>
            <td height="18" colspan="2" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4">代理转账</span>
            </div></td>
            </tr>
          <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"></span></td>
            </tr>
          <tr>
            <td width="43%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >转出代理</span></td>
            <td width="57%" height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="acctname" id="acctname"   type="text" class="STYLE1" style="height:18px; width:160px;" size="30"   <?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?> disabled="disabled"   value='<?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
' <?php endif; ?>/>
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">转入代理</span></td>
            <td height="19" bgcolor="#FFFFFF"><label for="host"><span class="STYLE7">
              <input name="to_acctname"  id="to_acctname"  type="text" class="STYLE1" style="height:18px; width:160px;" size="30"  value="" />
            </span></label></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">转帐金额</span></td>
            <td height="19" bgcolor="#FFFFFF"><label for="host"></label>
              <span class="STYLE7">
                <input name="balance"  id="balance" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value="" />
                <span class="STYLE1">元</span></span></td>
            </tr>
  
          <tr>
            <td id="userTip" height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div align="center"></div></td>
            </tr>
          <tr>
            <td height="18" colspan="2" align="center" bgcolor="#FFFFFF">
              
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
            
              </td>
            </tr>
    </table></td>
   
  </tr>

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
</form>
</body>
</html>