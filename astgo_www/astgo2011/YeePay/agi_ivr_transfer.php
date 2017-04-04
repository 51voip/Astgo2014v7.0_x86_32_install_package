#!/usr/bin/php -q
<?php
/**
 *  filename : agi_ivr_transfer.php
 *  datetime : 2013/6/20
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
   $agi->verbose("--------------------");

   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $agi->verbose("--------- agi_ivr_transfer begin callerid:$callerid -----------");


   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if ($res_user)
   {
      balance_transfer($res_user,$agi);
   }
   else
   {
      $filename = "not_find_user";
      $agi->stream_file($filename, "#");

      $filename = "thankyou-bye";
      $agi->stream_file($filename, "#");

   }

   $agi->verbose("--------------------");
}
?>