#!/usr/bin/php -q
<?php
/**
 *  filename : ivrpay.php
 *  datetime : 2011/11/17
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
   //$agi->answer();
   user_play_balance($agi);
}
?>