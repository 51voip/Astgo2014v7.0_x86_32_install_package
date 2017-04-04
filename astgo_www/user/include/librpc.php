<?php


require_once("phprpc/phprpc_client.php");
require_once("configure.php");

//Initialize
function client_Initialize()
{
   global $rpc_client;
   global $astgoConf;

    $rpc_client = new PHPRPC_Client($astgoConf['phprpc_server']);
	 $rpc_client->setCharset('UTF-8');

}



?>