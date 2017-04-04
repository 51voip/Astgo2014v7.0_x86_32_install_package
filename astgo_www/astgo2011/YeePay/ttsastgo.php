#!/usr/bin/php -q
<?php
/**
 *  filename : ttsastgo.php
 *  datetime : 2012/5/27
 *  By Astgo.jin
 */
include "global.php";
require_once("phpagi.php");
require_once("./phprpc/phprpc_client.php");
header("Content-type: text/html; charset=utf-8");
#AGI
$agi = new AGI;
#TTS_RPC 
tts_Initialize();


      
  global $rpc_tts; 
  $line    = $argv['1'];
  $param1  = $argv['2'];
  $param2  = $argv['3'];
    
  $ttstext = urlencode($line);
    
  $agi->verbose("line:$line");
  $agi->verbose("param1:$param1");
  $agi->verbose("param2:$param2");
   
  $callerid = $agi->request['agi_callerid'];
  $agi->verbose("--------- begin -----------");
  $agi->verbose("callerid:$callerid");
   
  #$res = $rpc_tts->Hello();
  #$agi->verbose("res:$res");
    
  $filename = md5($line);
  $filenamepath = "/tmp/$filename.wav";
  $vocfilename = "/tmp/$filename";
  if (!file_exists($filenamepath)  )
  {
       $res_data = $rpc_tts->tts_get($ttstext,$filename);
       if ($res_data['res'] == 0)
       {
         $file_stream = $res_data['stream'];
         file_put_contents($filenamepath, $file_stream);
         
         $prompt = $vocfilename;
         $agi->verbose("prompt:$prompt");
         $agi->stream_file($prompt, '#');
   
       }
  }
  else
  {
      $prompt = $vocfilename;
       $agi->verbose("prompt:$prompt");
      $agi->stream_file($prompt, '#');
    	
  }
  $agi->verbose("--------- end -----------");
  $agi->hangup();
 



exit;


   #----------------end

//Initialize
function tts_Initialize()
{
   global $rpc_tts;
   $phprpc_server  = 'http://112.65.182.18:1833/tts/tts_server.php';
   $rpc_tts = new PHPRPC_Client($phprpc_server);
	 $rpc_tts->setCharset('UTF-8');

}

function play_dtmf($agi, $file_name, $dtmf_len, $timeout)
{
   $res_dtmf = $agi->get_data($file_name, $timeout * 1000, $dtmf_len);
   $dtmf = $res_dtmf["result"];
   return $dtmf;
}


?>