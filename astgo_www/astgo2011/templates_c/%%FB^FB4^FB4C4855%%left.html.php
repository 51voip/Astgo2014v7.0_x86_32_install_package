<?php /* Smarty version 2.6.26, created on 2014-10-31 00:10:08
         compiled from left.html */ ?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.dimensions.js"></script>
<script type="text/javascript" src="js/jquery.accordion.js"></script>
<script language="javascript">
	jQuery().ready(function(){
		jQuery('#navigation').accordion({
			header: '.head',
			navigation1: false, 
			event: 'click',
			fillSpace: false,
			animated: 'bounceslide'
		});
 /*禁止鼠标右键*/				
 $(document).bind("contextmenu",function(e){
    return false;
  });		
	});
</script>
<style type="text/css">
<!--
body {
	margin:0px;
	padding:0px;
	font-size: 12px;
}
#navigation {
	margin:0px;
	padding:0px;
	width:147px;
}
#navigation a.head {
	cursor:pointer;
	background:url(images/main_34.gif) no-repeat scroll;
	display:block;
	font-weight:bold;
	margin:0px;
	padding:5px 0 5px;
	text-align:center;
	font-size:12px;
	text-decoration:none;
}
#navigation ul {
	border-width:0px;
	margin:0px;
	padding:0px;
	text-indent:0px;
}
#navigation li {
	list-style:none; display:inline;
}
#navigation li li a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
}
#navigation li li a:hover {
	border:solid 1px #adb9c2;
}
-->
</style>
</head>
<body>
<div  style="height:100%;">
  
 <ul id="navigation">
   <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?> 
     <li> <a class="head"><?php echo $this->_tpl_vars['eachone']['menuname']; ?>
</a>
      <ul>
       <?php $_from = $this->_tpl_vars['eachone']['menulist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone1']):
?> 	
         <?php if ($this->_tpl_vars['eachone1']['menuurl'] == 'pay.php'): ?> 
          <li> <a href="<?php echo $this->_tpl_vars['eachone1']['menuurl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['eachone1']['menuname']; ?>
</a></li>
         <?php else: ?> 
         <li> <a href="<?php echo $this->_tpl_vars['eachone1']['menuurl']; ?>
" target="rightFrame"><?php echo $this->_tpl_vars['eachone1']['menuname']; ?>
</a></li>
         <?php endif; ?>
       <?php endforeach; endif; unset($_from); ?>      
      </ul>
    </li>
    <?php endforeach; endif; unset($_from); ?>

  </ul>
   
</div>
</body>
</html>