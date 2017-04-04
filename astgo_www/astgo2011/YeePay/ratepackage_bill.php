<?php
/**
 *  filename : ratepackage_bill.php
 *  datetime : 2012/1/5
 *  By Astgo.jin
 */
 include "global.php";
 include "../include/user_inc.php";

 main();



exit;

function main()
{

   error_reporting(E_ALL ^ E_NOTICE);
   echo "ratepackage_bill Start.......\n";
   acct_user_ratepackage_bill (0);
   acct_user_ratepackage_bill (1);
   acct_user_ratepackage_bill (2);
   acct_user_ratepackage_bill (3);


   acct_ratepackage_bill(0);
   acct_ratepackage_bill(1);
   acct_ratepackage_bill(2);
   acct_ratepackage_bill(3);

   //consumerpackage_expireddays_reduce();

   //user_curday_cdr_update();


   echo "ratepackage_bill End.......\n";

}



?>