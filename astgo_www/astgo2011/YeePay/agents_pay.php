#!/usr/bin/php -q
<?php
/**
 *  filename : agents_pay.php
 *  datetime : 2011/11/17
 *  By Astgo.jin
 */
require_once("agi_astgo_inc.php");


#--------------- start

main();

#----------------end

exit;

function main()
{

   $agi = new AGI;
   $agi->verbose("--------------------");
   agents_pay($agi );
   $agi->verbose("--------------------");
}



?>