<?php
/*
   Astgo smarty function  smarty: Initialize display
   http://www.astgo.net
   function name begin char : smarty_

*/
require_once("libs/Smarty.class.php");



//Initialize
function smarty_Initialize()
{
   global $smarty;
   $smarty = new Smarty;
   $smarty->template_dir = './templates/cn';
   $smarty->compile_dir  = './'.$smarty->compile_dir;
   $smarty->left_delimiter = '<%';
	 $smarty->right_delimiter= '%>';
	 
	
	 
}

//Output
function smarty_Output($template_file)
{
   global $smarty;
   $smarty->display($template_file);
}


?>