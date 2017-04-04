<?php /* Smarty version 2.6.26, created on 2015-02-28 17:12:13
         compiled from callrecord_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'callrecord_list_page.html', 188, false),array('modifier', 'string_format', 'callrecord_list_page.html', 205, false),)), $this); ?>
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
<title>用户帐号通话记录</title>
</head>

<script>

//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!= parseInt(index) )
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
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">用户帐号通话记录 </span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption"></span>
             
             
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
    <form name="form1" method="post" action="?action=list">
   <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    
    
      <tr>
        <td><div align="left"><span class="STYLE6"><span class="STYLE1">代理商
                <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)"  >
				<?php if ($this->_tpl_vars['res_acct']['accttype'] == 1): ?>     
                  <option  value="" > --全部-- </option>
				<?php endif; ?>  
                  <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>>
                    <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>

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
                <label for="datetype2">日期</label>
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
日
<input id="begin_hour" class="STYLE1" size = "1"  title="数字-起始天数" value="<?php echo $this->_tpl_vars['post_data']['begin_hour']; ?>
" name="begin_hour"  />
点
-


<input id="end_day" class="STYLE1" size = "1"  title="数字-截至天数" value="<?php echo $this->_tpl_vars['post_data']['end_day']; ?>
"   name="end_day"  />
日
<input id="end_hour" class="STYLE1" size = "1"  title="数字-起始天数" value="<?php echo $this->_tpl_vars['post_data']['end_hour']; ?>
" name="end_hour"  />
点
<?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
<label for="dstchannel">落地</label>
<input name="dstchannel" type="text" class="STYLE1" id="dstchannel" size="12" maxlength="20" value='<?php echo $this->_tpl_vars['post_data']['dstchannel']; ?>
' />
<?php endif; ?>
<label for="user_acctname">用户帐号</label>
<input name="user_acctname" type="text" class="STYLE1" id="user_acctname" size="12" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['user_acctname']; ?>
' />
<label for="destination_number">被叫号码</label>
<input name="destination_number" type="text" class="STYLE1" id="destination_number" size="12" maxlength="30" value='<?php echo $this->_tpl_vars['post_data']['destination_number']; ?>
' />
<input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
<input name="checkbox_downloadfile" type="checkbox" class="STYLE1"   />
<label for="downloadfile">导出</label>
        </span></span></div></td>
        </tr>
        
    </table></td>
  </tr>
    </form>
     
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     <tr>
                          <td width="2%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title"> 序号</div></td>
                          <td width="8%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 代理商</div></td>
                          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title"> 计费帐号</div></td>
                          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title"> 被叫号码</div></td>
                          <td width="14%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 开始</div></td>
                          <td width="4%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 接通</div></td>
                          <td width="4%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 挂机</div></td>
                          <td width="4%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 时长</div></td>
                          <td width="4%"  height="24"  bgcolor="d3eaef"  class="STYLE6"><div align="center" class="table_title"> 录音</div></td>
                          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title"> 费用(代理/用户)</div></td>
                          <td width="8%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title"> 中继IP</div></td>
                       <?php if ($this->_tpl_vars['res_acct']['accttype'] == 1): ?>   
                          <td width="6%" height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title"> 中继成本</div></td>
                       <?php endif; ?>   

                           
  </tr>     

          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
        <tr>
        
   <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
    <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?> <?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</font>  </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
    <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>  <?php echo $this->_tpl_vars['eachone']['agent_acctname']; ?>
</font> 
                            </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                              <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?> <?php echo $this->_tpl_vars['eachone']['user_acctname']; ?>
</font> 
                            </div></td>
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                             <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>  <?php echo $this->_tpl_vars['eachone']['destination_number']; ?>
</font> 
                            </div></td>
                          
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                             <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['start_stamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %T") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %T")); ?>
</font> </div></td>
                              
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                           <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>    <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['answer_stamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%T") : smarty_modifier_date_format($_tmp, "%T")); ?>
</font> </div></td>
                              
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                           <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>    <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['end_stamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%T") : smarty_modifier_date_format($_tmp, "%T")); ?>
</font> </div></td>       
                              
                      <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                          <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>     <?php echo $this->_tpl_vars['eachone']['billsec']; ?>
</font> </div></td>       

                      <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                          <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>   
						  <?php if ($this->_tpl_vars['eachone']['monitorfilename'] != ''): ?>  
						  <a href="?action=download_post&monitorfilename=<?php echo $this->_tpl_vars['eachone']['monitorfilename']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
">下载</a><?php else: ?>空白<?php endif; ?> </font> </div></td>       
                      
                       <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                             <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['costagent'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['costuser'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</font> </div></td>       
                              
                               <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center"  class="STYLE19">
                            <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>   <?php echo $this->_tpl_vars['eachone']['dstchannel']; ?>
</font> </div></td>       

                    <?php if ($this->_tpl_vars['res_acct']['accttype'] == 1): ?>     
                          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
                           <?php if ($this->_tpl_vars['eachone']['usertype'] == '3'): ?><font color="#0099FF"><?php else: ?><font color="#000000"><?php endif; ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['costgateway'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</font> 
                          </div></td>
                   <?php endif; ?>         
                                  
                               
                     
                           
           </tr>
          
 
        <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="66%"><div align="left"><span class="STYLE21">共
                    <?php echo $this->_tpl_vars['record_count']; ?>

                    条记录 当前第
                    <?php echo $this->_tpl_vars['curpage']; ?>

                    /
                    <?php echo $this->_tpl_vars['maxpage']; ?>

                    页，每页
                    <?php echo $this->_tpl_vars['pagelimtcount']; ?>

                    条记录
                    总时长:<?php echo $this->_tpl_vars['billsec']; ?>
秒, 用户话费:<?php echo ((is_array($_tmp=$this->_tpl_vars['costuser'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
元 
                    , 代理话费:<?php echo ((is_array($_tmp=$this->_tpl_vars['costagent'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
元 
                    <?php if ($this->_tpl_vars['res_acct']['accttype'] == 1): ?> 中继成本:<?php echo ((is_array($_tmp=$this->_tpl_vars['costgateway'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
元<?php endif; ?>
                    
                    </span></div></td>
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