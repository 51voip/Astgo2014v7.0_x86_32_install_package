#!/usr/bin/php -q
<?php
/**
 *  filename : agi_ivr_btob_add.php
 *  datetime : 2012/11/16
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
   btobcallee_add($agi);
   $agi->verbose("--------------------");
}
?>