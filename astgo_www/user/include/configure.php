<?php
/*
* filename: configure.php
*
*/

##注册信息配置

#代理商名称  #如果是整个平台公共查询接口，該值为空
$astgoConf['air_acctname']          = '';

#代理商空中充值密匙 #如果是整个平台公共查询接口，該值为空 'astgo_pub_air_key_1183188@1183262';
$astgoConf['air_bindmd5']           =  'astgo_pub_air_key_1183188@1183262';

#Astgo2011服务器WEB地址URL和服务端程序
$astgoConf['phprpc_server']  = 'http://127.0.0.1/astgo2011/server.php';



##网站信息配置

$astgoConf['title']       = 'Astgo网络电话';
$astgoConf['logname']     = 'Astgo';


















// print array function
function dump($vars, $label = '', $return = false)
{
   if(ini_get('html_errors'))
   {
      $content = "<pre>\n";
      if($label != '')
      {
         $content .= "<strong>{$label} :</strong>\n";
      }
      $content .= htmlspecialchars(print_r($vars, true));
      $content .= "\n</pre>\n";
   }
   else
   {
      $content = $label . " :\n" . print_r($vars, true);
   }
   if($return)     {return $content;}
   echo $content;
   return null;
}



?>
