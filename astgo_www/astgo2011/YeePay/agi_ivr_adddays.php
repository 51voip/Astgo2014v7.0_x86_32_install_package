#!/usr/bin/php -q
<?php
/**
 *  filename : agi_ivr_filename.php
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
   adddays($agi);
   $agi->verbose("--------------------");
}
?>