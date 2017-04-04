<?php /* Smarty version 2.6.26, created on 2014-10-31 00:18:52
         compiled from agent_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'smartTruncate', 'agent_list_page.html', 140, false),array('modifier', 'string_format', 'agent_list_page.html', 143, false),)), $this); ?>
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
<title>代理列表</title>
</head>


<script>


	function delete_confirm()
	{
		if (confirm("确定要删除这个代理商吗?"))  {
			 return true;	
		}
		return false;	
	}

//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage) != parseInt(index) )
	 {
        document.form1.action = '?action=list&curpage='+index+'&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
'; 
	    document.form1.submit(); 
	    return true;
	 }
	 return false;
}

function  change_acct_id(acct_id)
{
        //document.form1.action = '?action=list&curpage='+goto_index; 
		
		//alert(acct_id);
	    document.form1.submit(); 
	    return true;		 
	
}
	
</script>
<div>
<body>
<form name="form1" method="post" action="?action=list&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span class="table_caption">代理商管理 &nbsp;&nbsp; 
                
              
                </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
" >给
                      <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
：建立下级代理 </a>
             </span>
             
             
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">

          <tr>
            <td  height="24" colspan="11"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">代理商：
            
                <select name="agent_id" class="STYLE1" id="agent_id"  <?php if ($this->_tpl_vars['action'] == 'edit_post'): ?>  disabled <?php endif; ?>  onchange= "change_acct_id(this.value)"  >
               
                 <option  value="" > <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>一级代理商<?php else: ?><?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
<?php endif; ?> </option>
                 <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected="selected" <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
                </select>
                状态                             
                <span class="STYLE7">
                <select name="enable" class="STYLE1" id="enable"  >
                  <option  value="-1"   <?php if ($this->_tpl_vars['post_data']['enable'] == '-1'): ?> selected="selected" <?php endif; ?> > 不限 </option>
                  <option  value="1"  <?php if ($this->_tpl_vars['post_data']['enable'] == '1'): ?> selected="selected" <?php endif; ?> > 激活 </option>
                  <option  value="0"  <?php if ($this->_tpl_vars['post_data']['enable'] == '0'): ?> selected="selected" <?php endif; ?> > 冻结 </option>
                </select>
                </span>代理商名称<span class="STYLE7">
                <input name="acctname" id="acctname" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"  value='<?php echo $this->_tpl_vars['post_data']['acctname']; ?>
' />
            </span><span class="STYLE7"> </span>(可模糊查询)
                <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   value=" 查询 " />
            </span></td>
          </tr>
          <tr>
            
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">上级</div></td>
            <td width="8%" height="24"     bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">名称</div></td>
            <td width="8%"  height="24"    bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">话费余额</div></td>
            <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">透支</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">套餐</div></td>  
            <td width="3%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">类型</div></td>
            <td width="14%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">路由(回铃/被叫)</div></td>
            <td width="14%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">费率(回铃/被叫)</div></td>
            <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">下级</div></td>
            <td width="20%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>
          
                       
          </tr>
          
            
          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  
           <tr>
        
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['agent_acctname'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 6, ".") : smarty_modifier_smartTruncate($_tmp, 6, ".")); ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['acctname'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 6, ".") : smarty_modifier_smartTruncate($_tmp, 6, ".")); ?>
</div></td>
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div  id="enable_<?php echo $this->_tpl_vars['eachone']['id']; ?>
" align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['enable'] == '1'): ?>激活<?php if ($this->_tpl_vars['res_acct']['id'] != $this->_tpl_vars['eachone']['id']): ?> [<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','0')" >冻结</a>]<?php endif; ?><?php else: ?> <font color="#FF0000">冻结</font><?php if ($this->_tpl_vars['res_acct']['id'] != $this->_tpl_vars['eachone']['id']): ?>[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','1')">激活</a>] <?php endif; ?><?php endif; ?></div></td>              
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" id="divbalance_<?php echo $this->_tpl_vars['eachone']['id']; ?>
" ><?php if ($this->_tpl_vars['eachone']['balance'] < '50'): ?><font color="#FF0000"><?php else: ?><font color="#000000"><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</font> </div></td>  

			<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['overbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</div></td>  
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['ratepackage_count']; ?>
</div></td>            
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['discharge_level'] == '1'): ?>流量<?php else: ?>面值<?php endif; ?> </div></td> 
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['gatewaygroupname_acall'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 8, ".") : smarty_modifier_smartTruncate($_tmp, 8, ".")); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['gatewaygroupname'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 8, ".") : smarty_modifier_smartTruncate($_tmp, 8, ".")); ?>
</div></td>            
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['rategroupname_acall'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 8, ".") : smarty_modifier_smartTruncate($_tmp, 8, ".")); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['rategroupname'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 8, ".") : smarty_modifier_smartTruncate($_tmp, 8, ".")); ?>
</div></td>   
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php echo $this->_tpl_vars['eachone']['agentcount']; ?>
[</span><a href="?action=list&agent_id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">查看</a>]</div>   </td>   
         
            
                 
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div  align="center" class="STYLE19">
			 <a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">配置</a>
             <?php if ($this->_tpl_vars['res_acct']['id'] != $this->_tpl_vars['eachone']['id']): ?>
			  <a href="?action=gatewaygrouplist_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">路由</a>
			  <a href="?action=rategrouplist_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">费率</a>
			  <a href="#" onClick="call_addbalance('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','<?php echo $this->_tpl_vars['eachone']['acctname']; ?>
')" >充值</a>
             <a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
"  onClick="return delete_confirm()">删除</a><?php endif; ?>
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
','<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['maxpage']; ?>
')" >尾页</a></div></td>
           
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</div>
<div class="demo"  style="display:none">
  <div id="dialog-form" title="给代理充值">
   <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98" ">
     <tr>
       <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
     </tr>
     <tr>
       <td height="18" colspan="2" bgcolor="#FFFFFF"><span class="STYLE1">
         <input name="agents_id" type="hidden" class="STYLE1" id="agents_id" style="height:18px; width:60px;"  value="0" size="10" />
       </span></td>
     </tr>
     <tr>
       <td width="41%" height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">充值账户</span></td>
       <td width="59%" height="18" bgcolor="#FFFFFF"><span class="STYLE1">
         <input name="agents_name" type="text" disabled class="STYLE1" id="agents_name" style="height:18px; width:120px;"  value="0" size="30" maxlength="30"    />
       </span></td>
     </tr>
     <tr>
       <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">话费金额</span></td>
       <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
         <input name="add_balance" type="text" class="STYLE1" id="add_balance" style="height:18px; width:60px;"  value="0" size="10" />
         元</span></td>
     </tr>
     <tr>
       <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">短信金额</span></td>
       <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
         <input name="add_smsbalance" type="text" class="STYLE1" id="add_smsbalance" style="height:18px; width:60px;"  value="0" size="10" />
         元</span></td>
     </tr>	 
     <tr>
       <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">可操作金额</span></td>
       <td height="18" bgcolor="#FFFFFF"><span class="STYLE1">
         <input name="add_paybalance" type="text" class="STYLE1" id="add_paybalance" style="height:18px; width:60px;"  value="0" size="10" />
         元</span></td>
     </tr>	 	 
     <tr>
       <td height="18" colspan="2" align="right" bgcolor="#FFFFFF"><div id="tip_add_balance" align="center"> </div></td>
     </tr>
     <tr>
       <td height="18" colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
   </table>
 </div>
</div>
<script>
function call_enable(id,value)
{
	 $.get("agents.php?action=set_enable",{agents_id:id,agents_enable:value}, function(data){
         var res = eval("(" + data + ")"); 
		 if (res.enable == 1)
		 {
		    $('#enable_'+res.id).html('<font color="#0000">激活</font>[<a href="#" onclick="call_enable('+res.id + ',0)">冻结</a>]');
		
		 }
		  else
		  {		
		     $('#enable_'+res.id).html('<font color="#FF0000">冻结</font>[<a href="#" onclick="call_enable('+res.id + ',1)">激活</a>]');
		
		  }
		 });
	
}

function call_addbalance(id,agents_acctname)
{
	var add_balance = $( "#add_balance" );
	var add_smsbalance = $( "#add_smsbalance" );
	var add_paybalance = $( "#add_paybalance" );
    var agents_name = $( "#agents_name" );
    var agents_id = $( "#agents_id" );
    
    agents_name.val(agents_acctname);
    agents_id.val(id);
    add_balance.val('0');
	add_smsbalance.val('0');
	add_paybalance.val('0');
	
    $('#tip_add_balance').html('');   
    
    
	$( "#dialog-form" ).dialog( "open" );
}



	$(function() {
		
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		var add_balance = $( "#add_balance" ),
		add_smsbalance = $( "#add_smsbalance" ),
		add_paybalance = $( "#add_paybalance" ),
        agents_name = $( "#agents_name" ),
        agents_id = $( "#agents_id" ),
		allFields = $( [] ).add( add_balance ).add( add_smsbalance ).add( add_paybalance ).add( agents_name ).add( agents_id );
								
                                
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 350,
			width: 450,
			modal: true,
			buttons: {
				"充值": function() {
						/*输入数据合法验证*/
                        var agents_id = $( "#agents_id" );
                        var add_balance = $( "#add_balance" );
						var add_smsbalance = $( "#add_smsbalance" );
						var add_paybalance = $( "#add_paybalance" ); 
                        var agents_name = $( "#agents_name" );
                        
                        if ($.trim(add_balance.val()) == '' ||  (isNaN(add_balance.val()))  )
                        {
                             add_balance.val('0');
							 add_smsbalance.val('0');
							 add_paybalance.val('0');
							 add_balance.focus;
							 add_balance.css("background",  "#FF0000");
							 return;                 
                         }  
                         
                        $.get("agents.php?action=set_agents_balance",{agents_id:agents_id.val(),add_balance:add_balance.val(),add_smsbalance:add_smsbalance.val(),add_paybalance:add_paybalance.val()}, function(data){
                           var msg = '';
                           if (data == '1')
                           {
                              msg = '充值失败.账户'+ agents_name.val() +'不是您的下级代理';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }
                           else if (data == '2')
                           {
                              msg = '充值失败.您不是财务admin管理者。';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }
                           else if (data == '3')
                           {
                              msg = '充值失败，自己给你不能充值。';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }           
                           else if (data == '4')
                           {
                              msg = '充值失败，余额不足。';
                              $('#tip_add_balance').html('<font color="#FF0000">'+msg+'<font>');
                           }    						                  
                           else
                           {
                               var res = eval("(" + data + ")"); 
                               
							   $('#divbalance_'+res.id).html(res.balance);
							   $('#divsmsbalance_'+res.id).html(res.smsbalance);
							   $('#divpaybalance_'+res.id).html(res.paybalance);
							   
                               msg = '充值成功.账户'+ agents_name.val() + '现在的余额是:'+res.balance+'元'+ ' 短信余额：'+res.smsbalance+'元' +  ' 可操作金额：'+res.paybalance+'元';
                               $('#tip_add_balance').html('<font color="#66CC33">'+msg+'</font>');
                               //$( "#dialog-form" ).dialog( "close" );
                           }
                           alert(msg);
                         });
          		
				},
				关闭: function() {
					$( this ).dialog( "close" );
                    $('#tip_add_balance').html('');   
                    allFields.val( "" ).removeClass( "ui-state-error" );
				}
			},
			close: function() {
                $('#tip_add_balance').html('');   
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});


         /*点击链接 弹出批量修改窗口 url 必须是 .batch_update_card 结尾*/
          $("[href$='.add_balance']")
            .click(function() {

		  });
			
            
		/*编辑框选择后显示获取焦点，批量修改窗体提示不修改*/
		 $("input:text,input:password,textarea").focus(function(){
			 $(this).css("background","#d3eaef");
			 }).blur(function(){
				 $(this).css("background","#FFF");
			 }); 
	});
    
	

</script>	
</html>