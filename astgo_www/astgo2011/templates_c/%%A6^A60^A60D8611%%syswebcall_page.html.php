<?php /* Smarty version 2.6.26, created on 2014-10-31 00:11:49
         compiled from syswebcall_page.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    
<title>回拨提交呼叫</title>

  
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
                <td width="98%" valign="bottom"><span class="STYLE10"> 回拨提交呼叫</span></td>
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
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">当前用户</span></td>
            <td width="61%" height="18" bgcolor="#FFFFFF"><span class="STYLE1">
              <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>

            </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >绑定电话</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="bindtel" id="bindtel" type="text"  style="height:18px; width:120px;" size="30"  autocomplete="on"  value='<?php echo $this->_tpl_vars['bindtel']; ?>
' />
                
              </span></td>
            </tr>

          <tr>
            <td width="39%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >被叫电话</span></td>
            <td height="18" bgcolor="#FFFFFF">
               <input name="callee"  id="callee" type="text"  style="height:18px; width:120px;" size="30"  autocomplete="on" value="<?php echo $this->_tpl_vars['callee']; ?>
" size="30" />
            <div id="div_callee"  ></div></td>
            </tr>
  
          <tr>
            <td id="userTip" height="18" colspan="2" align="center" bgcolor="#FFFFFF"> <div id="div_trips" ></div></td>
          </tr>
          <tr>
            <td height="18" colspan="2" align="center" bgcolor="#FFFFFF">
              
              <input type="button"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="webcall()" value=" 发起呼叫 "></td>
            </tr>
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
	
function webcall()
{
	 trim_all_input(); //所有input 去空格
	 
	 var var_bindtel = $( "#bindtel" );
	 var var_callee = $( "#callee" );
	 if (var_bindtel.val() != ''  && var_bindtel.val()!=var_callee.val()  )
	 {
	   $.get("syslog.php?action=webcall_post",{bindtel:var_bindtel.val(),callee:var_callee.val()}, function(data){
		   if (data == 0) alert('提交成功!');
		   else if (data == 1) alert('该号码:'+var_bindtel.val() + ' 没有在系统中绑定');
		   else if (data == 2) alert('该号码:'+var_bindtel.val() + ' 所属帐号上级代理不是当前操作者');
		   else if (data == 3) alert('该号码:'+var_bindtel.val() + ' 提交写数据库错误');
		    else alert('未知错误:'+data);
	  });
	 }
	 else {alert('请填写正确,然后再提交!');}
	 
	

	
}
		 $("input:text,input:password,textarea").focus(function(){
			 if (this.value == '请输入') this.value = '';
			 $(this).css("background","#a8c7ce");
			 }).blur(function(){
			 
				 $(this).css("background","#FFF");
				 
				
			 }); 		
		
			 
			 
</script>      
</body>


</html>