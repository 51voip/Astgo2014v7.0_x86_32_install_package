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
   $agi->verbose("--------------------");
   direct_input($agi);
   $agi->verbose("--------------------");
}
?>