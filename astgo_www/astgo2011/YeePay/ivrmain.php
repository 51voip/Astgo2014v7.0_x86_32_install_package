#!/usr/bin/php -q
<?php
/**
 *  filename : ivrpay.php
 *  datetime : 2011/11/17
 *  By Astgo.jin
 */
//require_once("phpagi.php");
require_once("agi_astgo_inc.php");


   #main function  start

   main();

   #----------------end

exit;

function main()
{
   $agi = new AGI;
   $callerid = $agi->request['agi_callerid'];
   $agi->verbose("--------- main begin -----------");
   $agi->verbose("callerid:$callerid");




   $prompt = 'ivr_prompt';
   $res_dtmf = play_dtmf($agi,$prompt,1,45);

   if (trim($res_dtmf) == '1')
   {
     user_pay  ($agi);
     user_pay  ($agi);
     user_pay  ($agi);
   }
   if (trim($res_dtmf) == '2') user_play_balance ($agi);
   if (trim($res_dtmf) == '3')  user_pay_szx ($agi); // editbindtel($agi,$callerid) ;// user_pay_szx ($agi);
   if (trim($res_dtmf) == '4')  edituserpassword($agi,$callerid) ;
   if (trim($res_dtmf) == '5') editcallerid($agi,$callerid) ;

   if (trim($res_dtmf) == '0') user_service($agi);

}


?>
