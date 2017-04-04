#!/usr/bin/php -q
<?php
/**
 *  filename : agi_ivr_direct.php
 *  datetime : 2012/7/13
 *  By Astgo.jin
 */
require_once("agi_astgo_inc.php");

   #main function  start

   main();

   #----------------end

exit;

function main()
{

   $agi = new AGI;
   global $dmdatabase;

   $agi->verbose("--------------------");

   $callerid = $agi->request['agi_callerid'];
   $accountcode = $agi->request['agi_accountcode'];

   $res = language_select($agi);
   if ($res == 2)
   {
      $agi->hangup();
      return;
   }

   $res_user =  $dmdatabase->get_user_bindtel($callerid);
   if (!$res_user)
   {
      $res =  direct_input($agi);
      if ($res == 2)
      {
         $agi->hangup();
         return;
      }
      #$agi->set_variable("INPUT_ACCTNAME", $res_user['acctname']);

      $variable = $agi->get_variable("INPUT_ACCTNAME");
      $acctname =  trim($variable['data']);

      $res_user = $dmdatabase->get_user_acctname($acctname);
   }

   if ($res_user)
   {
      $balance = $res_user['balance'];
      play_balance_cny($agi, $balance);
   }

   $agi->verbose("--------------------");
}
?>