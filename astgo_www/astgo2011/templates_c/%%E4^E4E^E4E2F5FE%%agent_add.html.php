<?php /* Smarty version 2.6.26, created on 2014-10-31 00:18:54
         compiled from agent_add.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
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
    
    
<title>新增代理商</title>
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
	function check(discharge_level,balance)
	{
		trim_all_input(); //所有input 去空格

        if ($('#acctname').val() == '')
		  return false;
        if ($('#password').val() == '')
		  return false;
        if ($('#agent_prefix').val() == '')
		  return false;
		  		 			
	    return true;
		//return true;

	}

	function goback(curpage)
	{
	    document.form1.action = '?action=list&curpage='+curpage;
		document.form1.submit();
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
                <td width="98%" valign="bottom"><span class="STYLE10"> 添加代理商</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
  <form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
  <tr>
    <td><table width="687" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
       <tr>
            <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;            </td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">上级 <?php echo $this->_tpl_vars['res_acct']['accttype']; ?>
</span></td>
            <td width="61%" height="18" bgcolor="#FFFFFF"><span class="STYLE1">
              <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>

            </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >代理名称</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="acctname" id="acctname" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['acctname']; ?>
' />
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >代理密码</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="password"  id="password"  type="password" class="STYLE1" style="height:18px; width:120px;"  value="<?php echo $this->_tpl_vars['acct']['password']; ?>
" size="30" />
              </span></td>
            </tr>
          
          <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>  
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >计费模式</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="discharge_level" id="discharge_level"  >
                  <option  value="1"> 流量模式  </option>
                  <option  value="0"> 面值模式  </option>
                </select>
              </span></td>
            </tr>
          <?php endif; ?> 
           
          <tr>
            <td width="39%" height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >储值卡前缀</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <label for="agent_prefix"><span class="STYLE4">
                <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?> <?php echo $this->_tpl_vars['res_acct']['agent_prefix']; ?>
<?php endif; ?><input name="agent_prefix"  id="agent_prefix" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['agent_prefix']; ?>
' size="30" />
              </span></label></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回拨路由组</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="gatewaygroupid_acall" id="gatewaygroupid_acall"  >
                  <?php $_from = $this->_tpl_vars['routegroups_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
"  >
                    <?php echo $this->_tpl_vars['eachone']['gatewaygroupname']; ?>

                    </option>
                  <?php endforeach; endif; unset($_from); ?>
                  </select>
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >被叫路由组</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="gatewaygroupid" id="gatewaygroupid"  >
                  <?php $_from = $this->_tpl_vars['routegroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
"  >
                    <?php echo $this->_tpl_vars['eachone']['gatewaygroupname']; ?>

                    </option>
                  <?php endforeach; endif; unset($_from); ?>
                  </select>
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >回拨费率组</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <select name="rategroupid_acall" id="rategroupid_acall"  >
                  <?php $_from = $this->_tpl_vars['rategroups_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" >
                    <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                    </option>
                  <?php endforeach; endif; unset($_from); ?>
                  </select>
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">被叫费率组</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="rategroupid" id="rategroupid"  >
                <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
"  >
                <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
          </tr>
		<?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>  
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">所属区域</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="areacode" id="areacode" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['areacode']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">所属部门</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="position" id="position" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['position']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">职位</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="businesslicense" id="businesslicense" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['businesslicense']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">姓名</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="chinesename" id="chinesename" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['chinesename']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">联系电话</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="tel" id="tel" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['tel']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">电子邮件</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="email" id="email" type="text" class="STYLE1" style="height:18px; width:220px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['email']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">银行卡号</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <input name="idcard" id="idcard" type="text" class="STYLE1" style="height:18px; width:220px;" size="30"  value='<?php echo $this->_tpl_vars['acct']['idcard']; ?>
' />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">传真套餐</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE7">
              <select name="fax_ratepage_id" id="fax_ratepage_id"  >
                <?php $_from = $this->_tpl_vars['faxratepages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
"  >
                <?php echo $this->_tpl_vars['eachone']['name']; ?>

                </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></td>
            </tr>
        <?php endif; ?>
          <tr>
            <td id="userTip" height="18" colspan="2" align="center" bgcolor="#FFFFFF"> <div class="STYLE4" id="div_trips" ></div></td>
          </tr>
          <tr>
            <td height="18" colspan="2" align="center" bgcolor="#FFFFFF">
              
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="button"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
')" value=" 取消返回 ">              </td>
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
<script>
		 $("input:text,input:password,textarea").focus(function(){
			 if (this.value == '请输入') this.value = '';
			 $(this).css("background","#a8c7ce");
			 }).blur(function(){
				 if (this.id == 'acctname'  )
				 {
					 var info = ''; 
					 var agents_acctname = $.trim(this.value) ;
					 if (agents_acctname == '')
					 { 
					      info ='<font color="#FF0000">请输入完整的代理商名称</font>';
						  $('#div_trips').html(info);
						  $(this).focus;
						  $(this).css("background","#CBFE9F");
					 }
					 else
					 {
					    $.get("agents.php?action=check_acctname_exists",{agents_acctname :this.value}, function(data){  
					    if (data == 1)
						{
					       info =  '<font color="#FF0000">'+ $('#acctname').val() + '已经存在!' + '</font>';
						   $('#acctname').val("");	
						   $('#acctname').focus;
						   $('#div_trips').html(info);
						}
						else   
					       info = '';	
						   $('#div_trips').html(info);
					    });
					 }
				 }
				 
				 if (this.id == 'agent_prefix'  )
				 {
					 var info = ''; 
					 var agent_prefix = $.trim(this.value) ;
					 if (agent_prefix == '' )
					 { 
					      info ='<font color="#FF0000">'+'请输入完整储值卡前缀</font>';
						  $('#div_trips').html(info);
						  $(this).focus;
						  $(this).css("background","#CBFE9F");
					 }
					 else  if (agent_prefix == '0' )
					 {
						  $('#agent_prefix').val(""); 
					      info ='<font color="#FF0000">'+'储值卡前缀不能为0</font>';
						  $('#div_trips').html(info);
						  $(this).focus;
						  $(this).css("background","#CBFE9F");
					 }
					 else
					 {
						 
						 
						 var var_agent_prefix = '<?php echo $this->_tpl_vars['res_acct']['agent_prefix']; ?>
'+this.value;
						 
					
					    $.get("agents.php?action=check_agent_prefix_exists",{agent_prefix :var_agent_prefix}, function(data){  
					    if (data == 1){
						    info =   '<font color="#FF0000">'+ $('#agent_prefix').val() + '储值卡前缀已经存在!' + '</font>';	
							$('#agent_prefix').val("");	
							$('#agent_prefix').focus;
					        $('#div_trips').html(info); 
					    
						}else   
					       info = '';	
						   $('#div_trips').html(info);
					    });
					 }
				 }
				 				 
				 
				 
				 $(this).css("background","#FFF");
				 
				
			 }); 
</script>      

</html>