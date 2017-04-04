<?php /* Smarty version 2.6.26, created on 2014-10-31 00:10:09
         compiled from agent_info.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'agent_info.html', 52, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
  <link rel="stylesheet" href="./css/demos.css">
    
<title>账户信息</title>
</head>

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
                <td width="98%" valign="bottom"><span class="STYLE10"> 账户信息</span></td>
              </tr>
            </table></td>
      
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="904" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
	
<?php if ($this->_tpl_vars['res_acct']['accttype'] == '2'): ?>  	
   
          
            <tr>
              <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
              <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1"><div align="center"><span class="STYLE21">账户信息</span></div></td>
              <td height="18" colspan="4" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            </tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">账户名称</td>
            <td width="28%" bgcolor="#FFFFFF" class="STYLE1">
              <span class="STYLE1">
              
                <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>

              </span></td>
            <td width="12%" height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">账户余额</td>
            <td width="39%" height="18" colspan="4" bgcolor="#FFFFFF" class="STYLE1">
              <span class="STYLE1">
              <?php echo ((is_array($_tmp=$this->_tpl_vars['res_acct']['balance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

              元</span></td>
          </tr>

          <tr>
              <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">已经消费</td>
              <td bgcolor="#FFFFFF" class="STYLE1"><?php echo ((is_array($_tmp=$this->_tpl_vars['res_acct']['costbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 
元</td>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">透支</td>
              <td height="18" colspan="4" bgcolor="#FFFFFF" class="STYLE1"><?php echo ((is_array($_tmp=$this->_tpl_vars['res_acct']['prebalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
元</td>
        </tr>

          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1"><div align="center">
              <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>

消费信息(<span class="STYLE4">不含话务对接和群呼</span>)</div></td>
            <td height="18" colspan="4" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">本月</td>
            <td bgcolor="#FFFFFF" class="STYLE1">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['fees'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
&nbsp;-&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 = &nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['profit'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

元</td>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">24小时</td>
            <td height="18" colspan="4" bgcolor="#FFFFFF" class="STYLE1">
		<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['24fees'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
&nbsp;-&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['24cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 = &nbsp; <?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['24profit'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

			
			
元</td>
          </tr>
          <tr>
            <td height="20" align="right" bgcolor="#FFFFFF" class="STYLE1">今天</td>
            <td bgcolor="#FFFFFF" class="STYLE1">
	<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['curdayfees'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
&nbsp;-&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['curdaycost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 = &nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['curdayprofit'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

			
元</td>
            <td height="20" align="right" bgcolor="#FFFFFF" class="STYLE1">昨天</td>
            <td height="20" colspan="4" bgcolor="#FFFFFF" class="STYLE1">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['yesterdayfees'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
&nbsp;-&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['yesterdaycost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
=&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cost_data']['yesterdayprofit'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

			
元</td>
          </tr>

    
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1"> <div align="center">路由和费率组</div></td>
            <td height="18" colspan="4" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td width="21%" height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">被叫路由组</td>
            <td bgcolor="#FFFFFF" class="STYLE1">
              
                <?php echo $this->_tpl_vars['post_data']['gatewaygroupname']; ?>
            </td>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">回拨路由组</td>
            <td height="18" colspan="4" bgcolor="#FFFFFF" class="STYLE1">
            <?php echo $this->_tpl_vars['post_data']['gatewaygroupname_acall']; ?>
            </td>
        </tr>
       
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">被叫费率组</td>
            <td bgcolor="#FFFFFF" class="STYLE1">
            
                <?php echo $this->_tpl_vars['post_data']['rategroupname']; ?>
            </td>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">回拨费率组</td>
            <td height="18" colspan="4" bgcolor="#FFFFFF" class="STYLE1">
            <?php echo $this->_tpl_vars['post_data']['rategroupname_acall']; ?>
            </td>
        </tr>


<?php endif; ?>

<?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?>  


          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF" class="STYLE21" id="userTip2">系统信息(<span class="STYLE1"><span class="STYLE1">仅供参考</span></span>)</td>
          </tr>
          <tr>
            <td id="userTip" height="18" colspan="6" align="center" bgcolor="#FFFFFF"> <div class="STYLE19" id="div_trips" >根目录磁盘空间:
              <?php echo $this->_tpl_vars['post_data']['disk_used_space']; ?>

              已使用,
              总共:
                <?php echo $this->_tpl_vars['post_data']['disk_total_space']; ?>

            </div></td>
        </tr>
          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF"><span class="STYLE1">系统内存:
                <?php echo $this->_tpl_vars['post_data']['mem_used_space']; ?>

已使用,
              总共:
<?php echo $this->_tpl_vars['post_data']['mem_total_space']; ?>
            
            </span></td>
          </tr>
          
          
          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF"><span class="STYLE21">CPU使用</span></td>
          </tr>
          
          
        <?php $_from = $this->_tpl_vars['cpu_used_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF"><span class="STYLE1">
              <?php echo $this->_tpl_vars['eachone']['name']; ?>

              :<?php echo $this->_tpl_vars['eachone']['info']; ?>

            </span></td>
          </tr>
       <?php endforeach; endif; unset($_from); ?>
     
          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF"><span class="STYLE21">网络使用</span></td>
          </tr>
        <?php $_from = $this->_tpl_vars['net_used_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
          <tr>
            <td height="18" colspan="6" align="center" bgcolor="#FFFFFF"><span class="STYLE1">
              <?php echo $this->_tpl_vars['eachone']['name']; ?>

收发数据包:
              :
<?php echo $this->_tpl_vars['eachone']['info']; ?>

            </span></td>
          </tr>
       <?php endforeach; endif; unset($_from); ?>            
    </table></td>
  </tr>
 <?php endif; ?>   
  


</table>
</body>
</html>