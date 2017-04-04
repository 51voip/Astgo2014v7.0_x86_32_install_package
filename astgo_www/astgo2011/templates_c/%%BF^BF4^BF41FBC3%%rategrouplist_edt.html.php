<?php /* Smarty version 2.6.26, created on 2014-11-01 14:23:08
         compiled from rategrouplist_edt.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>下级代理费率组权限管理</title>
<script src="./js/jquery-1.6.2.min.js"></script>
<script language="javascript" type="text/javascript"> 


 var tempstr=  "<?php $_from = $this->_tpl_vars['add_rategrouplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>|<?php echo $this->_tpl_vars['eachone']['rategroup_id']; ?>
<?php endforeach; endif; unset($_from); ?>|"
 var tempstra=  "<?php $_from = $this->_tpl_vars['add_rategrouplist_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>|<?php echo $this->_tpl_vars['eachone']['rategroup_id']; ?>
<?php endforeach; endif; unset($_from); ?>|"
			   		   

	function check()
	{
	

				 
      for(var i=0;i<document.formsq.add_rategrouplist.length;i++)
	  {
         document.formsq.add_rategrouplist.options[i].selected=true;
	  }

      for(var i=0;i<document.formsq.add_rategrouplist_acall.length;i++)
	  {
         document.formsq.add_rategrouplist_acall.options[i].selected=true;
	  }


	   return true;


	}
	
	function goback(curpage)
	{
	    document.formsq.action = '?action=list&curpage='+curpage;
		document.formsq.submit();
	}
	
	

function move(formObj){
	var pam=arguments;
	var dels=0;
	var toObj='';	
	if(pam.length==2){
		dels=1;
		toObj=pam[1];
	}	
if(formObj.selectedIndex != -1){
	var formObj_val=formObj.options[formObj.selectedIndex].value;
	var formObj_text=formObj.options[formObj.selectedIndex].text;
	var formObj_valstr=formObj_val+'|'
	if(dels==1){		
		if (tempstr.indexOf('|'+formObj_valstr)<0){
        toObj.add(new Option(formObj_text,formObj_val));
		tempstr+=formObj_val+'|';
	    }
	}
	if(dels==0){
formObj.remove(formObj.selectedIndex); 
tempstr = tempstr.replace(formObj_valstr,"");
	}
var index = formObj.selectedIndex; 
dels=0;
}
}


function movea(formObj){
	var pam=arguments;
	var dels=0;
	var toObj='';	
	if(pam.length==2){
		dels=1;
		toObj=pam[1];
	}	
if(formObj.selectedIndex != -1){
	var formObj_val=formObj.options[formObj.selectedIndex].value;
	var formObj_text=formObj.options[formObj.selectedIndex].text;
	var formObj_valstr=formObj_val+'|'
	if(dels==1){		
		if (tempstra.indexOf('|'+formObj_valstr)<0){
        toObj.add(new Option(formObj_text,formObj_val));
		tempstra+=formObj_val+'|';
	    }
	}
	if(dels==0){
formObj.remove(formObj.selectedIndex); 
tempstra = tempstra.replace(formObj_valstr,"");
	}
var index = formObj.selectedIndex; 
dels=0;
}
}

</script>

<body>
<form name="formsq" method="post" action="?action=rategrouplist_post&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&id=<?php echo $this->_tpl_vars['encode_id']; ?>
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
                <td width="98%" valign="bottom"><span class="table_caption"> 下级代理费率组权限管理</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
      
      <td><table width="675" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
 
          <tr>
            <td height="18" colspan="3" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4">回铃费率组权限列表</span></div></td>
          </tr>
          
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF"><span class="STYLE1">已经授权的回铃费率组</span></td>
          </tr>
          <tr>
            <td width="42%" height="19" align="right" bgcolor="#FFFFFF">
			<select  multiple name="rategrouplist_acall" size='12'  style="width:300px" ondblclick="movea(this,this.form.add_rategrouplist_acall)">
			
			  <?php $_from = $this->_tpl_vars['rategrouplist_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
               <option value="<?php echo $this->_tpl_vars['eachone']['rategroup_id']; ?>
">   <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
 </option>
			   <?php endforeach; endif; unset($_from); ?>
            </select></td>
            <td width="5%" bgcolor="#FFFFFF">
			<input type="button" name="moveRigth" value="&gt;&gt;" onclick="movea(this.form.rategrouplist_acall,this.form.add_rategrouplist_acall)"/>
            <input type="button" name="moveLeft" value="&lt;&lt;" onclick="movea(this.form.add_rategrouplist_acall)"/></td>
            <td width="53%" bgcolor="#FFFFFF">
			<select multiple id="add_rategrouplist_acall" name="add_rategrouplist_acall[]" size='12' style="width:300px" ondblclick="movea(this)">
			   <?php $_from = $this->_tpl_vars['add_rategrouplist_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
               <option value="<?php echo $this->_tpl_vars['eachone']['rategroup_id']; ?>
">   <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
 </option>
			   <?php endforeach; endif; unset($_from); ?>			
            </select>			</td>
          </tr>		 
          <tr>
            <td height="19" colspan="3" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="19" colspan="3" align="right" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4">被叫费率组权限列表</span></div></td>
          </tr>
          				   
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF"><span class="STYLE1">已经授权的被叫费率组</span></td>
          </tr>
          <tr>
            <td height="19" align="right" bgcolor="#FFFFFF">
			<select multiple name="rategrouplist" size='12'  style="width:300px" ondblclick="move(this,this.form.add_rategrouplist)">
			  <?php $_from = $this->_tpl_vars['rategrouplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
               <option value="<?php echo $this->_tpl_vars['eachone']['rategroup_id']; ?>
">   <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
 </option>
			   <?php endforeach; endif; unset($_from); ?>
            </select></td>
            <td bgcolor="#FFFFFF">
			<input type="button" name="moveRigth2" value="&gt;&gt;" onclick="move(this.form.rategrouplist,this.form.add_rategrouplist)"/>
            <input type="button" name="moveLeft2" value="&lt;&lt;" onclick="move(this.form.add_rategrouplist)"/></td>
            <td bgcolor="#FFFFFF">
			<select multiple id="add_rategrouplist" name="add_rategrouplist[]" size='12' style="width:300px" ondblclick="move(this)">
	          <?php $_from = $this->_tpl_vars['add_rategrouplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
               <option value="<?php echo $this->_tpl_vars['eachone']['rategroup_id']; ?>
">   <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>
 </option>
			   <?php endforeach; endif; unset($_from); ?>	
            </select></td>
          </tr>

  
          <tr>
            <td id="userTip" height="18" colspan="3" align="right" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td height="18" colspan="3" align="center" bgcolor="#FFFFFF">
              
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="button"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
')" value=" 取消返回 ">              </td>
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