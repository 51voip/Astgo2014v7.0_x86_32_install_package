#!/usr/bin/php -q
<?php
/**
 *  filename : agi_ivr_callb.php
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
   $agi->verbose("--------------------");
   callback_input($agi);
   $agi->verbose("--------------------");
}
?>