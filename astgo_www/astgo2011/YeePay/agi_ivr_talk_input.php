#!/usr/bin/php -q
<?php
/**
 *  filename : agi_ivr_talk_input.php
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
   global $dmdatabase;

   $agi->verbose("--------------------");

   $variable = $agi->get_variable("INPUT_CALLER");
   $callerid =  trim($variable['data']);

   $variable = $agi->get_variable("INPUT_ACCTNAME");
   $acctname =  trim($variable['data']);

   $agi->verbose("--------------------INPUT_ACCTNAME:".$acctname);
   $agi->verbose("--------------------INPUT_CALLER:".$callerid);






      $input_count = 0;
      $res = 1;
      $break = false;
      do
      {
             $prompt = 'talk_ivr_prompt';
             $dtmf = play_dtmf($agi, $prompt, 1,45);
             $agi->verbose("talk_ivr_prompt:$dtmf");

             if ($dtmf == '2')
             {
                $res = 0;
                $break = true;
                addbindtel($agi);
             }
             else if ($dtmf == '3')
             {
                $res = 0;
                $break = true;
                delbindtel($agi);
             }
             else if ($dtmf == '4')
             {
                $res = 0;
                $break = true;
                $res_user = $dmdatabase->get_user_acctname($acctname);
                balance_transfer($res_user,$agi);

             }
             else
             {
                $input_count++;
                if($input_count >= 3)
                {
                   $agi->stream_file('operation_err', '#');

                   $filename = "thankyou-bye";
                   $agi->stream_file($filename, "#");
                   $agi->hangup();

                  $res = 2;
                  $break = true;
                }
             }


      }while( ! $break);

      if ($res == 2)
      {
         $agi->hangup();
         return;
      }


   $agi->verbose("--------------------");
}
?>