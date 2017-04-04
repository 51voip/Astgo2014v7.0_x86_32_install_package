<?php /* Smarty version 2.6.26, created on 2014-11-02 11:44:16
         compiled from syslogo.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
	<script src="./js/jquery-1.6.2.min.js"></script>
  <link rel="stylesheet" href="./css/demos.css">
    
<title>系统LOGO定制修改</title>
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
                <td width="98%" valign="bottom"><span class="STYLE10">系统LOGO定制修改</span></td>
              </tr>
            </table></td>
      
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="904" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
	
      <form name="form1" method="post" action="?action=app_logo_post">
          
            <tr>
              <td width="21%" height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">程序名称</td>
              <td height="18" bgcolor="#FFFFFF" class="STYLE1"><span class="STYLE7">
                <input name="APP_NAME" type="text" class="STYLE1" style="height:18px; width:180px;" size="300"  value="<?php echo $this->_tpl_vars['syslogo']['APP_NAME']; ?>
" />
              </span></td>
              <td height="18" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            </tr>
              <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">联系网站</td>
            <td height="18" bgcolor="#FFFFFF" class="STYLE1"><span class="STYLE7">
              <input name="APP_HOMEPAGE" type="text" class="STYLE1" style="height:18px; width:180px;" size="300"  value="<?php echo $this->_tpl_vars['syslogo']['APP_HOMEPAGE']; ?>
" />
            </span></td>
            <td width="39%" height="18" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>

          <tr>
              <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">帮助网站</td>
              <td height="18" bgcolor="#FFFFFF" class="STYLE1"><span class="STYLE7">
                <input name="APP_HELPPAGE" type="text" class="STYLE1" style="height:18px; width:180px;" size="300"  value="<?php echo $this->_tpl_vars['syslogo']['APP_HELPPAGE']; ?>
" />
              </span></td>
            <td height="18" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
        </tr>

          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1"><input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onclick="return check()" value=" 确认提交 " /></td>
          </tr>
		   </form>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1">150x50</td>
          </tr>
		   <form enctype="multipart/form-data" method="post" name="app_logo_upload1" action="?action=app_logo_upload1" target="_self">
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1"><span class="STYLE7">
              <input name="src" type="file" class="STYLE1" />
              <input  type= "submit"  class="STYLE1"   name="button" id="button2"   value="上传" />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">小LOGO</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1"><img src='<?php echo $this->_tpl_vars['syslogo']['APP_LOGO1']; ?>
' alt="xx" /></td>
          </tr>
		  
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
		   </form>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1">600x380</td>
          </tr>
		   <form enctype="multipart/form-data" method="post" name="app_logo_upload2" action="?action=app_logo_upload2" target="_self">
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1"><span class="STYLE7">
              <input name="src" type="file" class="STYLE1" />
              <input  type= "submit"  class="STYLE1"   name="button2" id="button"   value="上传" />
            </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">大LOGO</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1"><img src='<?php echo $this->_tpl_vars['syslogo']['APP_LOGO2']; ?>
' alt="xx" /></td>
          </tr>
		 
          <tr>
            <td height="20" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="20" colspan="2" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
        </form>
    
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
            <td height="18" colspan="2" bgcolor="#FFFFFF" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" colspan="3" align="right" bgcolor="#FFFFFF" class="STYLE1"><div align="center"></div></td>
        </tr>




     
    </table></td>
  </tr>

  


</table>
</body>
</html>