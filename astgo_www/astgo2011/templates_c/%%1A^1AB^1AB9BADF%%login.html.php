<?php /* Smarty version 2.6.26, created on 2014-10-31 00:08:33
         compiled from login.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>用户登录-Astgo</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="css/login_6.css" type="text/css" />
<script>
   function btnSubmit_check()
   {
       if ($('#user').val() == '')
	   {
	      alert('请输入用户名称');
		  return false;
	   }
       if ($('#pwd').val() == '')
	   {
	      alert('请输入用户密码');
		  return false;
	   }
       if ($('#chknumber').val() == '')
	   {
	      alert('请输入验证码');
		  return false;
	   }	   
	          
	   return true;
   }
</script>



</head>
<body>
<form id="login" name="login" action="?action=login_do" method="post">
	<div id="login-header" class="win900">
	  <a href="http://<?php echo $this->_tpl_vars['syslogo']['APP_HOMEPAGE']; ?>
" id="logo" style="left:45px;" ><img src='<?php echo $this->_tpl_vars['syslogo']['APP_LOGO1']; ?>
' alt='<?php echo $this->_tpl_vars['syslogo']['APP_NAME']; ?>
' /></a>
	  <div id="cityname" class="loginname" style="left:208px;"><span>管理登录</span></div>
		<div id="logintext" style="right:-10px;"><a href='http://<?php echo $this->_tpl_vars['syslogo']['APP_HOMEPAGE']; ?>
'>返回首页</a>|<a href='http://<?php echo $this->_tpl_vars['syslogo']['APP_HELPPAGE']; ?>
' target="_blank">帮助</a></div>
  </div>
	<div class="cb win900">
		<div id="conleft">
			<div id="login-welcome-bg1"> <img src='<?php echo $this->_tpl_vars['syslogo']['APP_LOGO2']; ?>
'  > </div>
		</div>
		<div id="conright">
			<ul class="login-scrool">
				<li class="hover"  id="scrool1"><em></em>管理登录</li>
				<li  id="scrool2"></li>
			</ul>
			<div class="scrool-bg">
				<div class="loginbox">
					<div id="tipDiv"></div>
					<table>
						<tr id="usernametr">
							<th>账户名</th>
							<td><input class="inp inw c_ccc" type="text" id="user" name="user"  size="20"  /></td>
						</tr>

						<tr id="passwordtr">
							<th>密　码</th>
							<td style=" padding-bottom:5px;">
								<input class="inp inw" id="pwd" type="password" style="margin-bottom:7px;" name="pwd" size="20" onpaste="return true" value=""/>
							</td>
						</tr>
						<tr id="validatetr">
							<th>验证码</th>
							<td style=" padding-bottom:5px;">
								<input class="inp inw3"  id="chknumber" maxlength="5" name="chknumber" size="2"/>
								<img src="Validate.php?'+ Math.random();" alt="" id="safecode" onClick="this.src='Validate.php?'+ Math.random();" /> 点击图片换
							</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td style="padding:0;">
								<span class="butt" style="line-height:34px;">
								<input type="submit" name="btnSubmit" value="登录" class="btns" accesskey="l" id="btnSubmit"  onclick=" return btnSubmit_check()"/>
								</span><span class="reg-a"><a href="/forgetpassword">找回密码</a> </span>
							</td>
						</tr>
					</table>
				</div>

			</div><!--scrool bg-->
			<div class="clear"></div>
		</div>
		<div class="c"></div>
	</div>
	<div id="footer" class="win900" >
		<p>&copy;<?php echo $this->_tpl_vars['syslogo']['APP_HELPPAGE']; ?>
 <a class="fduihua" target="_blank" title="联系我们" href='http://<?php echo $this->_tpl_vars['syslogo']['APP_HELPPAGE']; ?>
'><?php echo $this->_tpl_vars['syslogo']['APP_NAME']; ?>
</a></p>
	</div>
</form>

</div>
</body>
</html>