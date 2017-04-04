#!/usr/bin/php -q
<?php
/**
 *  filename : ivrqueue_member_state.php
 *  datetime : 2011/11/28
 *  By Astgo.jin
 */
include "global.php";
require_once ("phpagi.php");
require_once("agi_astgo_inc.php");
require_once("../include/queue_inc.php");


  global $state;
  $state = $argv['1'];


   #main function  start

   main();

   #----------------end

exit;

function main()
{
   global $state;
   $agi = new AGI;

   $agi->answer();

   $agi->verbose("state:$state");
   $callerid = $agi->request['agi_callerid'];
   $accountcode = trim($agi->request['agi_accountcode']);
   $agi->verbose("---------begin -----------");
   $agi->verbose("callerid:$callerid");
   $agi->verbose("accountcode:$accountcode");

   if ($accountcode != '')
   {
      //play $accountcode
      $agi->say_digits($accountcode);


      $res_queue_member =  queue_member_get($accountcode); //check  queueMember
      if ($res_queue_member)   // check ok : paused = 0 status = 1   play:loginok
      {
         if ($state == 1)
         {
           $agi->verbose("queue_member_login");
           queue_member_login($accountcode);
           $agi-> stream_file('agent-loginok', '#');
         }
         else
         {
           $agi->verbose("queue_member_logoff");
           queue_member_logoff($accountcode);
           $agi-> stream_file('agent-loggedoff', '#');
         }
      }
      else
      {
         $agi->verbose("queue_member_get not_find_user");
         $agi-> stream_file('not_find_user', '#');
      }


   }
   else
   {
      // play err $accountcode
      $agi-> stream_file('not_find_user', '#');
   }

    $agi-> stream_file('thankyou-bye', '#');


   $agi->verbose("---------end -----------");


}




?>