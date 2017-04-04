<?php /* Smarty version 2.6.26, created on 2014-10-31 00:10:36
         compiled from syspwd_edit.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
<title>修改密码</title>

  
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
	    return true;
		//return true;

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
                <td width="98%" valign="bottom"><span class="STYLE10"> 设置密码</span></td>
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
    <td><table width="687" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
             <tr>
            <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;
            </td>
            </tr>
            <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1' && $this->_tpl_vars['res_acct']['feeadmin'] == '1'): ?>
          <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4"><span class="STYLE7"><span class="STYLE1">财务密码设置</span> </span></span></div></td>
          </tr>
          <tr>
            <td width="42%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >当前密码</span></td>
            <td width="58%" bgcolor="#FFFFFF"><label for="host"><span class="STYLE7">
              <input name="feeadmin_pwd" id="feeadmin_pwd" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value=""   />
            </span></label></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >新密码</span></td>
            <td bgcolor="#FFFFFF"><label for="host"><span class="STYLE7">
              <input name="feeadmin_pwd1" id="feeadmin_pwd1" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value=""   />
            </span></label></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">重复新密码</td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="feeadmin_pwd2" id="feeadmin_pwd2" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value=""   />
            </span></td>
          </tr>
         
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center">
              <input type="button"  class="STYLE1"   name="submitbtn2" id="submitbtn2"   onClick="change_feepwd()" value=" 确认修改 ">
            </div></td>
          </tr>
    <?php else: ?>
          <tr>
            <td height="24" colspan="2" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center" class="STYLE4">管理密码设置</div></td>
          </tr>
          <tr>
            <td width="42%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >当前密码</span></td>
            <td width="58%" bgcolor="#FFFFFF"><label for="host"><span class="STYLE7">
              <input name="admin_pwd" id="admin_pwd" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value=""   />
            </span></label></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >新密码</span></td>
            <td bgcolor="#FFFFFF"><label for="admin_pwd1"><span class="STYLE7">
              <input name="admin_pwd1" id="admin_pwd1" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value=""   />
            </span></label></td>
          </tr>
          <tr>
            <td height="24" align="right" bgcolor="#FFFFFF" class="STYLE1">重复新密码</td>
            <td bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="admin_pwd2" id="admin_pwd2" type="text" class="STYLE1" style="height:18px; width:140px;" size="30"  value=""   />
            </span></td>
          </tr>
          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF">
              
              <input type="button"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="change_pwd()" value=" 确认修改 "></td>
          </tr>
          
      <?php endif; ?>       
      </table></td>
  </tr>

  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       
        <td width="67%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
<script>
 <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1' && $this->_tpl_vars['res_acct']['feeadmin'] == '1'): ?>
function change_feepwd()
{
 	 trim_all_input(); 
	 
	 var feeadmin_pwd = $( "#feeadmin_pwd" );
	 var feeadmin_pwd1 = $( "#feeadmin_pwd1" );
     var feeadmin_pwd2 = $( "#feeadmin_pwd2" );
	 if (feeadmin_pwd.val() == '' || feeadmin_pwd1.val() == '' )
	 {
       alert('请输入完整!');
       return;
     }  
     if (feeadmin_pwd1.val() != feeadmin_pwd2.val() )
     {
         alert('新密码第一次输入和第二次输入不一致!');
         return;
     }

     $.get("syslog.php?action=change_feepwd",{old_pwd:feeadmin_pwd.val(),new_pwd:feeadmin_pwd1.val()}, function(data){
		   if (data == 0){
             alert('财务密码修改成功,请重新用新密码登录!');
             window.location.href='login.php?action=logout.do';
            }
           else if (data == 1) alert('权限不够，不能修改财务密码!');
           else if (data == 2) alert('当前密码输入不正确!');
		   else alert('未知错误:'+data);
           
          feeadmin_pwd.val(''); 
          feeadmin_pwd1.val('');
          feeadmin_pwd2.val('');
                  
	  });
          
} 

 <?php else: ?>

function change_pwd()
{
     trim_all_input(); 

 	 var admin_pwd = $( "#admin_pwd" );
	 var admin_pwd1 = $( "#admin_pwd1" );
     var admin_pwd2 = $( "#admin_pwd2" );
    
	 if (admin_pwd.val() == '' || admin_pwd1.val() == '' )
	 {
       alert('请输入完整!');
       return;
     }  
     if (admin_pwd1.val() != admin_pwd2.val() )
     {
         alert('新密码第一次输入和第二次输入不一致!');
         return;
     }


     $.get("syslog.php?action=change_pwd",{old_pwd:admin_pwd.val(),new_pwd:admin_pwd1.val()}, function(data){
		   if (data == 0){
                 alert('密码修改成功,请重新用新密码登录!'); 
                 window.location.href='login.php?action=logout.do';

           }
           else if (data == 1) alert('当前密码输入不正确');
 		   else alert('未知错误:'+data);
           
          admin_pwd.val(''); 
          admin_pwd1.val('');
          admin_pwd2.val('');
           
      });
}


<?php endif; ?>
		 $("input:text,input:password,textarea").focus(function(){
			 if (this.value == '请输入') this.value = '';
			 $(this).css("background","#a8c7ce");
			 }).blur(function(){
			 
				 $(this).css("background","#FFF");
				 
				
			 }); 
</script>     

</html>