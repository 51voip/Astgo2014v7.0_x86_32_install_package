<?php /* Smarty version 2.6.26, created on 2014-11-15 15:59:50
         compiled from crmcdr_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'crmcdr_list_page.html', 159, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    <link rel="stylesheet" href="./css/demos.css">
<title>坐席呼叫记录</title>
</head>

<script>

function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!= parseInt(index) )
	 {
        document.form1.action = '?action=crm_list&curpage='+index+'&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
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
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">坐席话单 </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption"></span>
             
             
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
    
  <form name="form1" method="post" action="?action=crm_list">

    
        
     <tr>
       <td   height="24" colspan="11"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">&nbsp;
     代理商：
       <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)"  >
                <option  value="" > --全部-- </option>
                <?php if ($this->_tpl_vars['res_acct']['accttype'] != '1'): ?>
			    <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
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
           日期
           <select name="years" class="STYLE1">
             <option value="2010" <?php if ($this->_tpl_vars['post_data']['years'] == 2010): ?>selected<?php endif; ?>>2010</option>
             <option value="2011" <?php if ($this->_tpl_vars['post_data']['years'] == 2011): ?>selected<?php endif; ?>>2011</option>
             <option value="2012" <?php if ($this->_tpl_vars['post_data']['years'] == 2012): ?>selected<?php endif; ?>>2012</option>
             <option value="2013" <?php if ($this->_tpl_vars['post_data']['years'] == 2013): ?>selected<?php endif; ?>>2013</option>
             <option value="2014" <?php if ($this->_tpl_vars['post_data']['years'] == 2014): ?>selected<?php endif; ?>>2014</option>
             <option value="2015" <?php if ($this->_tpl_vars['post_data']['years'] == 2015): ?>selected<?php endif; ?>>2015</option>
             <option value="2016" <?php if ($this->_tpl_vars['post_data']['years'] == 2016): ?>selected<?php endif; ?>>2016</option>
             <option value="2017" <?php if ($this->_tpl_vars['post_data']['years'] == 2017): ?>selected<?php endif; ?>>2017</option>
             <option value="2018" <?php if ($this->_tpl_vars['post_data']['years'] == 2018): ?>selected<?php endif; ?>>2018</option>
           </select>
年
<select name="month" class="STYLE1">
  <option value="01" <?php if ($this->_tpl_vars['post_data']['month'] == '01'): ?>selected<?php endif; ?>>01</option>
  <option value="02" <?php if ($this->_tpl_vars['post_data']['month'] == '02'): ?>selected<?php endif; ?>>02</option>
  <option value="03" <?php if ($this->_tpl_vars['post_data']['month'] == '03'): ?>selected<?php endif; ?>>03</option>
  <option value="04" <?php if ($this->_tpl_vars['post_data']['month'] == '04'): ?>selected<?php endif; ?>>04</option>
  <option value="05" <?php if ($this->_tpl_vars['post_data']['month'] == '05'): ?>selected<?php endif; ?>>05</option>
  <option value="06" <?php if ($this->_tpl_vars['post_data']['month'] == '06'): ?>selected<?php endif; ?>>06</option>
  <option value="07" <?php if ($this->_tpl_vars['post_data']['month'] == '07'): ?>selected<?php endif; ?>>07</option>
  <option value="08" <?php if ($this->_tpl_vars['post_data']['month'] == '08'): ?>selected<?php endif; ?>>08</option>
  <option value="09" <?php if ($this->_tpl_vars['post_data']['month'] == '09'): ?>selected<?php endif; ?>>09</option>
  <option value="10" <?php if ($this->_tpl_vars['post_data']['month'] == '10'): ?>selected<?php endif; ?>>10</option>
  <option value="11" <?php if ($this->_tpl_vars['post_data']['month'] == '11'): ?>selected<?php endif; ?>>11</option>
  <option value="12" <?php if ($this->_tpl_vars['post_data']['month'] == '12'): ?>selected<?php endif; ?>>12</option>
</select>
月
<input id="begin_day" class="STYLE1" size = "1"  title="数字-起始天数" value="<?php echo $this->_tpl_vars['post_data']['begin_day']; ?>
" name="begin_day"  />
日-
<input id="end_day" class="STYLE1" size = "1"  title="数字-截至天数" value="<?php echo $this->_tpl_vars['post_data']['end_day']; ?>
"   name="end_day"  />
日
用户帐号
<input name="user_acctname" type="text" class="STYLE1" id="user_acctname" size="12" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['user_acctname']; ?>
' />
主叫号码
<input name="src" type="text" class="STYLE1" id="src" size="12" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['src']; ?>
' />
<span class="table_title">按键确认</span>
<select size="1" name="recvoc_confirm" style="width:100px">
  <option value="-1">不限制</option>
  <option value="1"  <?php if ($this->_tpl_vars['post_data']['recvoc_confirm'] == '1'): ?>selected<?php endif; ?> > 是</option>
  <option value="0"  <?php if ($this->_tpl_vars['post_data']['recvoc_confirm'] == '0'): ?>selected<?php endif; ?> > 否</option>
</select>
<input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
<input name="checkbox_downloadfile" type="checkbox" class="STYLE1"   />
导出
       </span></td>
       </tr>
       
        </form>
     <tr>

                          <td width="2%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
                          <td width="8%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">代理商</div></td>
						  <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">队列号码</div></td>
						  <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">坐席帐号</div></td>
                          <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">主叫号码</div></td>
						  <td width="8%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">被叫</div></td>					      
                          <td width="8%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">开始</div></td>
                          <td width="4%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">时长</div></td>
                          <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
                          <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">确认按键</div></td>
						  <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">录音文件</div></td>
                          
                        
                           
  </tr>     

          
          
   <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
    <tr>
        
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['agent_acctname']; ?>
 </div></td>
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['clid']; ?>
</div></td>
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['acctname']; ?>
</div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['src']; ?>
</div></td>
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['dst']; ?>
</div></td>
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['calldate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%y-%m-%d %T") : smarty_modifier_date_format($_tmp, "%y-%m-%d %T")); ?>
</div></td>
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['billsec']; ?>
</div></td>
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['disposition'] == 0): ?>接通<?php elseif ($this->_tpl_vars['eachone']['disposition'] == 1): ?>拒绝<?php elseif ($this->_tpl_vars['eachone']['disposition'] == 2): ?>取消<?php elseif ($this->_tpl_vars['eachone']['disposition'] == 5): ?>未接<?php else: ?>其他:<?php echo $this->_tpl_vars['eachone']['disposition']; ?>
<?php endif; ?></div></td>       
    <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php if ($this->_tpl_vars['eachone']['recvoc_confirm'] == '1'): ?>是<?php else: ?>否<?php endif; ?></div></td>    
	
	<td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
	<a href="?action=download_post&monitorfilename=<?php echo $this->_tpl_vars['eachone']['monitorfilename']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
">下载</a></div></td>   
                              
   </tr>
  <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="46%"><div align="left"><span class="STYLE21">共
                    <?php echo $this->_tpl_vars['record_count']; ?>

                    条记录， 总时长:<?php echo $this->_tpl_vars['billsec']; ?>
秒 当前第
                    <?php echo $this->_tpl_vars['curpage']; ?>

                    /
                    <?php echo $this->_tpl_vars['maxpage']; ?>

                    页，每页
                    <?php echo $this->_tpl_vars['pagelimtcount']; ?>

                    条记录
                    </span></div></td>
        <td width="54%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
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
</body>

</html>