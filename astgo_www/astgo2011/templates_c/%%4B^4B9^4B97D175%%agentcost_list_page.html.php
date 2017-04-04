<?php /* Smarty version 2.6.26, created on 2014-11-04 16:10:00
         compiled from agentcost_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'agentcost_list_page.html', 140, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
    <link rel="stylesheet" href="./css/demos.css">
<title>代理流量成本利润报表统计</title>
</head>

<script>
	

        

//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if (parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!= parseInt(index) )
	 {
        document.form1.action = '?action=agentcost_list&curpage='+index+'&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
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
                
                <td width="97%" valign="bottom"><span  align="left" class="table_caption">代理流量成本利润报表统计 </span></td>
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
    
  <form name="form1" method="post" action="?action=agentcost_list">


     <tr>
       <td   height="24" colspan="7"   bgcolor="#FFFFFF" class="STYLE6"><span class="STYLE1">统计对象
           <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)" >
             <?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>
             <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?> >一级代理商</option>
             <?php endif; ?>
             <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
             <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?> >
               <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

              </option>
             <?php endforeach; endif; unset($_from); ?>
           </select>
           <label for="years">日期</label>
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
统计周期：<input id="billsec_count" class="STYLE1" size = "1" value="<?php echo $this->_tpl_vars['post_data']['billsec_count']; ?>
" name="billsec_count"  />秒
<input name="querybtn" type="submit" class="STYLE1"   id="querybtn"  value=" 查询 " />
       </span></td>
       </tr>
            </form>
        
     <tr>
                          <td width="2%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
                          <td width="8%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">下级代理商</div></td>
                          <td width="6%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">计费时长</div></td>
                         <td width="4%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">成本</div></td>
                          <td width="4%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">消费</div></td>
                          <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">利润</div></td>
                          <td width="4%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">呼叫次数</div></td>
                    
                           
  </tr>     

          
          
       <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
        <tr>
        
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['agent_acctname']; ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['billsec']; ?>
</div></td>
           <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['fees'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['profit'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</div></td>       
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['callrecord_count']; ?>
</div></td>               
        
       </tr>
          
 
       <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="75%"><div align="left"><span class="STYLE21">共
                    <?php echo $this->_tpl_vars['record_count']; ?>

                    条记录，总时长:<?php echo $this->_tpl_vars['billsec']; ?>

                    秒   <?php echo $this->_tpl_vars['post_data']['billsec_count']; ?>
秒数:<?php echo $this->_tpl_vars['billsec6']; ?>
个
					
					费用:
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['fees'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元
                    成本:<?php echo ((is_array($_tmp=$this->_tpl_vars['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元  利润:<?php echo ((is_array($_tmp=$this->_tpl_vars['profit'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

                    元
                    </span></div></td>
        <td width="25%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">

        </table></td>
      </tr>
    </table></td>
  </tr>
</table>



</body>

</html>