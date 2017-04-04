#!/usr/bin/php -q
<?php
/**
 *  filename : agi_ivr_set_language.php
 *  datetime : 2012/11/1
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
   language_select($agi);
   $agi->verbose("--------------------");
}
?>