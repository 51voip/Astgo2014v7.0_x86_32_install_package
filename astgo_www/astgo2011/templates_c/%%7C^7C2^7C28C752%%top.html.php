<?php /* Smarty version 2.6.26, created on 2014-10-31 00:10:08
         compiled from top.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>


<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {
	font-size: 12px;
	color: #000000;
}
.STYLE5 {font-size: 12}
.STYLE7 {font-size: 12px; color: #FFFFFF; }
.STYLE7 a{font-size: 12px; color: #FFFFFF; }
a img {
	border:none;
}
-->
</style></head>
<script src="./js/jquery-1.6.2.min.js"></script>
<script>
$(function() {
 /*禁止鼠标右键*/			
  $(document).bind("contextmenu",function(e){
    return false;
  });
});
</script>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="40" background="images/main_10.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="194" height="40" background="images/main_07.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="16%"><span class="STYLE5"></span></td>
            <td width="75%"><div align="center"></div></td>
            <td width="9%">&nbsp;</td>
          </tr>        </table></td>
        <td width="248" background="images/main_11.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="16%"><span class="STYLE5"></span></td>
            <td width="75%"><div align="center"><span class="STYLE7"><?php echo $this->_tpl_vars['ProjectName']; ?>
(<a href="" target="_blank"><?php echo $this->_tpl_vars['ProjectVersion']; ?>
</a>)</span></div></td>
            <td width="9%">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" background="images/main_31.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" height="30"><img src="images/main_28.gif" width="8" height="30" /></td>
        <td width="147" background="images/main_29.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">&nbsp;</td>
            <td width="43%" height="20" valign="bottom" class="STYLE1">管理菜单</td>
            <td width="33%">&nbsp;</td>
          </tr>
        </table></td>
        <td width="39"><img src="images/main_30.gif" width="39" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="20" valign="bottom"><span class="STYLE1">当前用户：<?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
<?php if ($this->_tpl_vars['res_acct']['accttype'] == '1'): ?><?php if ($this->_tpl_vars['res_acct']['feeadmin'] == '1'): ?><font color="#FF0000">[财务admin]</font><?php else: ?>[普通admin]<?php endif; ?><?php endif; ?> &nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['logoff_url']; ?>
" target="_top">退出登录</a>  &nbsp;&nbsp;服务器时间: <?php echo $this->_tpl_vars['curdatetime']; ?>
</span></td>
            <td valign="bottom" class="STYLE1"><div align="right"></div></td>
          </tr>
        </table></td>
        <td width="17"><img src="images/main_32.gif" width="17" height="30" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>