<?php /* Smarty version 2.6.26, created on 2015-02-28 16:59:58
         compiled from pay_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'pay_list_page.html', 140, false),array('modifier', 'truncate', 'pay_list_page.html', 142, false),)), $this); ?>
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
<title>在线支付日志</title>
</head>

<script>

function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
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
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">在线支付日志
                </span></td>
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
    
<form name="form1" method="post" action="?action=list">

 
         <tr>
           <td height="24" colspan="10"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">代理商
            <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)"  >
                <option  value="" > --全部-- </option>
                <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
 </option>
                  <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected="selected" <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                  </option>
                  <?php endforeach; endif; unset($_from); ?>
                </select>
支付结果
<select name="pay" class="STYLE1" id="vouchered" >
  <option  value="-1"  > 不限 </option>
  <option  value="0" <?php if ($this->_tpl_vars['post_data']['pay'] == '0'): ?> selected <?php endif; ?>  > 发起 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['pay'] == '1'): ?> selected <?php endif; ?>  > 成功 </option>
  <option  value="2" <?php if ($this->_tpl_vars['post_data']['pay'] == '2'): ?> selected <?php endif; ?>  > 失败 </option>
</select>
<label for="subject"><span class="table_title">订单名称</span></label>
<input name="subject" type="text" class="STYLE1" id="subject" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['subject']; ?>
' />
<label for="user_acctname"><span class="table_title">用户帐号</span>
  <input name="user_acctname" type="text" class="STYLE1" id="user_acctname" size="20" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['user_acctname']; ?>
' />
  日期</label>
<select name="datetype" class="STYLE1" id="datetype" >
  <option  value="-1"  > 不限 </option>
  <option  value="1" <?php if ($this->_tpl_vars['post_data']['datetype'] == '1'): ?> selected <?php endif; ?>  > 支付发起日期 </option>
  <option  value="2" <?php if ($this->_tpl_vars['post_data']['datetype'] == '2'): ?> selected <?php endif; ?>  > 支付成功日期 </option>
</select>
<input type="text"  name="begintime" id="begintime"   size="8"  value='<?php echo $this->_tpl_vars['post_data']['begintime']; ?>
' />
-
<input type="text"  name="endtime"   id="endtime" size="8" value='<?php echo $this->_tpl_vars['post_data']['endtime']; ?>
' />
<input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
<input name="checkbox_downloadfile" type="checkbox" class="STYLE1"   />
<label for="downloadfile">导出</label>
           </span></td>
         </tr>
          </form>
         <tr>
 

                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">用户名称</div></td>
                          <td width="10%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">订单号</div></td>
                          <td width="8%"  height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">订单名称</div></td>
                          <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">金额</div></td>
                          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">充值卡序号</div></td>
                          <td width="7%"  height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">充值卡密码</div></td>
                          <td width="4%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">结果</div></td>
                          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">回填时间</div></td>
                          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">提交时间</div></td>
                          <td width="10%" height="24"  bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">结果描述</div></td>

        </tr>     

          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
        <tr>
       
  <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['acctname']; ?>
 </div></td>
                         <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"  title="<?php echo $this->_tpl_vars['eachone']['body']; ?>
"> <?php echo $this->_tpl_vars['eachone']['out_trade_no']; ?>
 </div></td>
                         <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php if ($this->_tpl_vars['eachone']['pay'] == '1'): ?><font color="#0000FF"><?php else: ?><font color="#000000"><?php endif; ?><?php echo $this->_tpl_vars['eachone']['subject']; ?>
</font> </div></td>
                         <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['total_fee'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 </div></td>
                         <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['strex1']; ?>
 </div></td>
                         <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['strex2'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 17, "...", true) : smarty_modifier_truncate($_tmp, 17, "...", true)); ?>
 </div></td>
                         <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php if ($this->_tpl_vars['eachone']['pay'] == '1'): ?><font color="#0000FF">成功</font><?php elseif ($this->_tpl_vars['eachone']['pay'] == '0'): ?>发起<?php elseif ($this->_tpl_vars['eachone']['pay'] == '2'): ?><font color="#FF0000">失败</font><?php else: ?>未知<?php endif; ?> </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['pay_time']; ?>
 </div></td>
                         <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > <?php echo $this->_tpl_vars['eachone']['createtime']; ?>
 </div></td>

                     <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" > 
                         <?php if ($this->_tpl_vars['eachone']['trade_status'] == '0'): ?><font color="#0000FF"> 销卡成功，订单成功</font>
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '1'): ?>销卡成功，订单失败
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '7'): ?>卡号卡密或卡面额不符合规则
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '1002'): ?>本张卡密您提交过于频繁
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '1003'): ?>不支持的卡类型
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '1004'): ?>密码错误或充值卡无效
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '1006'): ?>充值卡无效
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '1007'): ?>卡内余额不足
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '1008'): ?>余额卡过期（有效期1个月）
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '1010'): ?>此卡正在处理中
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '10000'): ?>未知错误
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '2005'): ?>此卡已使用
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '2006'): ?>卡密在系统处理中
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '2007'): ?>该卡为假卡
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '2008'): ?>该卡种正在维护
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '2013'): ?>该卡已被锁定
                         <?php elseif ($this->_tpl_vars['eachone']['trade_status'] == '2014'): ?>系统繁忙，请稍后再试
                         <?php else: ?><?php echo $this->_tpl_vars['eachone']['trade_status']; ?>
<?php endif; ?>
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

              条记录，合计金额:<?php echo ((is_array($_tmp=$this->_tpl_vars['total_fee'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元 当前第
              <?php echo $this->_tpl_vars['curpage']; ?>

              /
              <?php echo $this->_tpl_vars['maxpage']; ?>

              页，每页
              <?php echo $this->_tpl_vars['pagelimtcount']; ?>

          条记录</span></div></td>
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