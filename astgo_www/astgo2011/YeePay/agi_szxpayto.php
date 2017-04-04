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
   $agi->verbose("--------------------");
   //$agi->answer();
   user_pay_szx($agi);
   $agi->verbose("--------------------");
}


exit;



?>