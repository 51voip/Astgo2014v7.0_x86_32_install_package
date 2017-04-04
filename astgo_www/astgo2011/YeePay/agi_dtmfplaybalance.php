#!/usr/bin/php -q
<?php
require_once("agi_astgo_inc.php");


   #main function  start

   main();

   #----------------end

exit;

function main()
{
   $agi = new AGI;

   //$agi->answer();
   $agi->verbose("--------------------");

   $callerid = $agi->request['agi_callerid'];
   $accountcode = $agi->request['agi_accountcode'];
   $variable = $agi->get_variable("CB_IVR_BALANCE");
   $balance =  floatval(trim($variable['data']));
   $agi->verbose("--------- callerid:$callerid  balance:$balance-----------");

   play_balance_cny_dtmf($agi,$balance );
   $agi->verbose("--------------------");
}




?>