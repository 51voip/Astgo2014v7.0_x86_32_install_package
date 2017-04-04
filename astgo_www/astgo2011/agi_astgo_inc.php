<?php
/*
*  public astgo phpagi func
*  filename agi_astgo_inc.php
*  add by jin 2011-11-19
*/
include "global.php";
require_once("phpagi.php");
require_once("../include/dmdatabase.php");
require_once("../include/card_inc.php");
require_once("../include/user_inc.php");
require_once("../include/pay_inc.php");
require_once("../include/szxpay_inc.php");



/**
 *funcion name : ivr_filename oem
 *    params
 *      param1: $agi
 *     IVR_FILENAME : fIVRPhone,Flag,faddMoney,YPhone,fMoney,fTime,fPhone4
 *    result:  $res   0:ok ,1:err
 */


function ivr_filename($agi)
{
   $res = 0;
   $variable = $agi->get_variable("IVR_FILENAME");
   $IVR_FILENAME = $variable['data'];
   $data = explode(',', $IVR_FILENAME);
   #fIVRPhone,Flag,faddMoney,YPhone,fMoney,fTime,fPhone4
   $fIVRPhone = trim($data[0]);
   $Flag      = trim($data[1]);
   $faddMoney = trim($data[2]);
   $YPhone    = trim($data[3]);
   $fMoney    = trim($data[4]);
   $fTime     = trim($data[5]);
   $fPhone4   = trim($data[6]);
   /*
   $fIVRPhone = '18603712677';
   $Flag = '6';
   $faddMoney = '13.66';
   $YPhone = '18603712677';
   $fMoney = '200.55';
   $fTime = '2012121212121212';
   $fPhone4 = '2677';
   */

   play_balance(108.109);


   if ($Flag == '1')
   {
      $prompt = "jfw_low_banlace";
      $agi->stream_file($prompt, '#');
   }
   else if ($Flag == '2')   #$fMoney
   {
      #$fMoney
      $prompt = 'jfw_youhave';
      $agi->stream_file($prompt, '#');
      play_balance($agi, $fMoney);
      $prompt = 'jfw_thanks';
      $agi->stream_file($prompt, '#');
   }
   else if ($Flag == '3')
   {
      $prompt = "jfw_config_err";
      $agi->stream_file($prompt, '#');
   }
   else if ($Flag == '4')
   {
      $prompt = "jfw_pay_ok";
      $agi->stream_file($prompt, '#');
      play_balance($agi, $faddMoney);
      $prompt = "jfw_pay_ok_hit1";
      $agi->stream_file($prompt, '#');
      $agi->say_digits($YPhone);
      $prompt = "jfw_pay_ok_hit2";
      $agi->stream_file($prompt, '#');
      play_balance_cny($agi, $fMoney);

   }
   else if ($Flag == '5')
   {
      $prompt = "jfw_pay_err5";
      $agi->stream_file($prompt, '#');
   }
   else if ($Flag == '6')
   {
      $prompt = "jfw_pay_err6";
      $agi->stream_file($prompt, '#');
      play_datetime($agi, $fTime);
      $prompt = "jfw_pay_err6_1";
      $agi->stream_file($prompt, '#');
      if ($fPhone4 == '') $fPhone4 = '0';
      $agi->say_digits($fPhone4);
   }
   else if ($Flag == '7')
   {
      $prompt = "jfw_pay_err7";
      $agi->stream_file($prompt, '#');
   }
   else if ($Flag == '8')
   {
      $prompt = "jfw_pay_err8";
      $agi->stream_file($prompt, '#');
   }
   else if ($Flag == '9')
   {
      $prompt = "jfw_pay_err9";
      $agi->stream_file($prompt, '#');
   }
   else $res = 1;
   return $res;


}


/**
 *funcion name : direct_input
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */


function direct_input($agi)
{


    #language_input
   $res = 1;
   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $agi->verbose("--------- direct_input begin callerid:$callerid -----------");


   #language_input
   $prompt = "pass_prompt";

   $input_count = 0;
   $break = false;
   do
   {
         $prompt = "pass_prompt";

         $res = get_input_direct_pwd($agi,$prompt);
         if($res['res'] == 1)
         {
           $pwd = $res['pwd'];
           $res_user = user_get_pwd($pwd);
           if ($res_user)
           {
              $agi->set_variable("INPUT_ACCTNAME", $res_user['acctname']);
              $break = true;
              $res = 0;
           }
           else
           {
              $prompt = "operation_err";
              $agi->stream_file($prompt, '#');
              $input_count++;
              if($input_count >= 3)  $break = true;
           }

         }
         else  //input null
         {
              $input_count++;
              if($input_count >= 3)  $break = true;
         }

   }while( ! $break);

   $agi->verbose("--------- direct_input end callerid:$callerid -----------");
   return $res;



}


/**
 *funcion name : card_query
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */

function card_query($agi)
{
   #cq_cardortel_input
   $res = 1;
   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $accountcode = $agi->request['agi_accountcode'];
   $agi->verbose("--------- card_query begin -----------");


   $prompt = 'cq_cardortel_select';
   $res_dtmf = play_dtmf($agi,$prompt,1,45);

   if (trim($res_dtmf) == '1')
   {
      $res_array = get_input_cardname($agi) ;
      if($res_array['res'] == 1)
      {
         $cardname = $res_array['cardname'];
         $res_card = card_get_name($cardname);
         if ($res_card)
         {
           if (trim($res_card['vouchered']) == '0' )
           {
              $prompt = 'cq_card_not_userd';
              $agi->stream_file($prompt, '#');
           }
           else
           {
              $voucher_acctname = $res_card['voucher_acctname'];

              $res_user = $dmdatabase->get_user_acctname($voucher_acctname);
              if (!$res_user)
                 $res_user =  $dmdatabase->get_user_bindtel($voucher_acctname);

              if ($res_user)
              {
                 $bindtel = $res_user['tranfer_callee1'];
                 $balance = $res_user['balance'];

                 $prompt = 'cq_card_bindtel';
                 $agi->stream_file($prompt, '#');
                 $agi->say_digits($bindtel);

                 $prompt = 'vm_youhave';
                 $agi->stream_file($prompt, '#');
                 play_balance_cny($agi, $balance);

              }
              else
              {
                $prompt = 'cq_card_vouchered';
                $agi->stream_file($prompt, '#');
              }

           }
         }
         else
         {
            $prompt = 'cq_card_notfind';
            $agi->stream_file($prompt, '#');

         }
      }
      else
      {
        $prompt = 'operation_err';
        $agi->stream_file($prompt, '#');
      }


   }
   else if (trim($res_dtmf) == '2')
   {
     $res_array = get_input_bindtel($agi,$callerid);
     if($res_array['res'] == 1)
     {
        $bindtel = $res_array['bindtel'];
        $res_user = $dmdatabase->get_user_bindtel($bindtel);
        if ($res_user)
        {
             $balance = $res_user['balance'];
             $acctname = $res_user['acctname'];

             $prompt = 'vm_youhave';
             $agi->stream_file($prompt, '#');
             play_balance_cny($agi, $balance);


             $prompt = 'cq_reg_card_name';
             $agi->stream_file($prompt, '#');
             $agi->say_digits($acctname);


        }
        else
        {
            $prompt = 'cq_tel_notfind';
            $agi->stream_file($prompt, '#');
        }

     }
     else
     {
        $prompt = 'operation_err';
        $agi->stream_file($prompt, '#');
     }
   }



   $prompt = 'thankyou-bye';
   $agi->stream_file($prompt, '#');

   $agi->verbose("--------- card_query end -----------");
   exit;

}

/**
 *funcion name : callback_input
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 *    set_variable  CB_CALLEE_ID CB_CALLER_ID
 */

function callback_input($agi)
{
   $res = 1;
   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $accountcode = $agi->request['agi_accountcode'];
   $agi->verbose("--------- callback_input begin -----------");

   $agi->verbose("callerid:$callerid");
   $agi->verbose("accountcode:$accountcode");

   $variable = $agi->get_variable("CB_CALLEE_ID");
   $CB_CALLEE_ID = $variable['data'];

   $variable = $agi->get_variable("CB_CALLER_ID");
   $CB_CALLER_ID = $variable['data'];

   if(trim($CB_CALLEE_ID) == '' || trim($CB_CALLEE_ID) == 'null')
   {
      $input_count = 0;
      $break = false;
      do
      {
         $prompt = 'cbcallbackb_tel_prompt';
         $dtmf = play_dtmf($agi, $prompt, 50, 0);
         $agi->verbose("tel_prompt:$dtmf");
         if(trim($dtmf) != '')
         {
            $agi->set_variable("CB_CALLEE_ID", $dtmf);
            $agi->set_variable("CB_CALLER_ID", $callerid);
            $break = true;
            $res = 0;
         }
         else
         {
            $input_count++;
            if($input_count >= 3)
               $break = true;
         }
      }while( ! $break);

   }

   $agi->verbose('--------- callback_input end------------');
   return $res;

}

/**
 *funcion name : user_play_balance
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */

function user_play_balance($agi)
{
   global $dmdatabase;
   $res = -1;
   $callerid = $agi->request['agi_callerid'];
   $accountcode = $agi->request['agi_accountcode'];
   $agi->verbose("--------- user_play_balance begin -----------");
   $agi->verbose("callerid:$callerid");
   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if( ! $res_user)
   {
      $res_user = $dmdatabase->get_user_acctname($accountcode);
   }
   if($res_user)
   {
      $balance = $res_user['balance'];
      $expireddate = $res_user['expireddate'];
      $balance+=0;
      $break = false;
      $input_count = 0;
      do
      {
         $balance = $res_user['balance'];
         $expireddate = $res_user['expireddate'];
         $balance+=0;


         $input_count++;


         if ($balance<0)
         {
            $filename = 'balanceless';
            $agi->stream_file($filename, "#");
            $balance = abs ($balance);
         }
         else
         {
            $filename = 'vm_youhave';
            $agi->stream_file($filename, '#');
         }
         play_balance_cny($agi, $balance);

         $filename = 'expireddate';
         $agi->stream_file($filename, '#');
         play_date($agi, $expireddate);

         $prompt = 'replay_hit';
         $dtmf = play_dtmf($agi, $prompt, 1, 30);
         if($dtmf != '1')
            $break = true;
         else
         {
            if($input_count >= 3)
               $break = true;
         }

      }while( ! $break);

      $filename = 'thankyou-bye';
      $agi->stream_file($filename, "#");

      $res = 0;
   }
   else
   {
      $filename = "not_find_user";
      $agi->stream_file($filename, "#");

      $filename = "thankyou-bye";
      $agi->stream_file($filename, "#");
      $res = 1;
   }
   $agi->verbose('--------- user_play_balance end------------');

   return $res;
}


/**
 *funcion name : user_pay_phonenet
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */

function user_pay_net($agi)
{
   $res = -1;
   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $agi->verbose("---------begin -----------");
   $agi->verbose("ivr callin callerid:$callerid");


   $variable = $agi->get_variable("CB_IVR_CARDNAME_PASSWND");
   $cardpwd_flag = $variable['data'];
   $agi->verbose("CB_IVR_CARDNAME_PASSWND:" . $cardpwd_flag);

   $bindtel = '';
   $cardname = '';
   $cardpwd = '';

   $res_array = get_input_bindtel_net($agi, $callerid);

   if($res_array['res'] == 1)
   {
      $res = 0;
      $bindtel = $callerid;
      $caller1 = $res_array['caller1'];

      if(trim($cardpwd_flag) == '1')
         $res_card = ivr_cardpwd($agi);
      else
         $res_card = ivr_cardname_cardpwd($agi);

      if($res_card['res'] == 1)
      {
         $cardname = $res_card['cardname'];
         $cardpwd = $res_card['cardpwd'];

         $agi->verbose("cardname:$cardname  cardpwd:$cardpwd  bindtel:$bindtel caller1:$caller1");
         //res_voucher['totalbalance']  ['balance'] ['giftbalance']  ['acctname'] ['vouchertype'] 1:voucher 2:newuser
         $res_voucher = card_voucher($acct, $cardname, $cardpwd, $bindtel, $caller1);
         $agi->verbose($res_voucher);

         if($res_voucher['res'] == 0)
         {
            $res_balance = user_get_balance($res_voucher['acctname']);
            $res_balance['balance'];
            $agi->stream_file('voucher_chong_ok', '#');
            play_balance_cny($agi, $res_voucher['totalbalance']);
         }
         else
         {
            if($res_voucher['res'] == 1)
               $prompt = 'voucher_chong_err2';
            elseif($res_voucher['res'] == 2)$prompt = 'voucher_chong_err4';
            elseif($res_voucher['res'] == 3)$prompt = 'voucher_chong_err1';
            elseif($res_voucher['res'] == 4)$prompt = 'voucher_chong_err5';
            elseif($res_voucher['res'] == 5)$prompt = 'voucher_chong_err3';
            else
               $prompt = 'voucher_chong_err6';
            $agi->stream_file($prompt, '#');

         }

      }
   }
   else
      $res = 1;
   $agi->verbose('---------end------------');

   return $res;
}

/**
 *funcion name : user_pay
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */
function user_pay($agi)
{
   $res = -1;
   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $agi->verbose("---------begin -----------");
   $agi->verbose("ivr callin callerid:$callerid");


   $variable = $agi->get_variable("CB_IVR_CARDNAME_PASSWND");
   $cardpwd_flag = $variable['data'];
   $agi->verbose("CB_IVR_CARDNAME_PASSWND:" . $cardpwd_flag);

   $bindtel = '';
   $cardname = '';
   $cardpwd = '';

   $res_array = get_input_bindtel($agi, $callerid);

   if($res_array['res'] == 1)
   {
      $res = 0;
      $bindtel = $res_array['bindtel'];

      if(trim($cardpwd_flag) == '1')
         $res_card = ivr_cardpwd($agi);
      else
         $res_card = ivr_cardname_cardpwd($agi);

      if($res_card['res'] == 1)
      {
         $cardname = $res_card['cardname'];
         $cardpwd = $res_card['cardpwd'];
         $caller1 = '';

         $agi->verbose($cardname . '-' . $cardpwd . '-' . $bindtel);



         //res_voucher['totalbalance']  ['balance'] ['giftbalance']  ['acctname'] ['vouchertype'] 1:voucher 2:newuser
         $res_voucher = card_voucher($acct, $cardname, $cardpwd, $bindtel, $caller1);
         $agi->verbose($res_voucher);

         if($res_voucher['res'] == 0)
         {
            $res_balance = user_get_balance($res_voucher['acctname']);
            $res_balance['balance'];
            $agi->stream_file('voucher_chong_ok', '#');
            play_balance_cny($agi, $res_voucher['totalbalance']);
         }
         else
         {
            if($res_voucher['res'] == 1)
               $prompt = 'voucher_chong_err2';
            elseif($res_voucher['res'] == 2)$prompt = 'voucher_chong_err4';
            elseif($res_voucher['res'] == 3)$prompt = 'voucher_chong_err1';
            elseif($res_voucher['res'] == 4)$prompt = 'voucher_chong_err5';
            elseif($res_voucher['res'] == 5)$prompt = 'voucher_chong_err3';
            else
               $prompt = 'voucher_chong_err6';
            $agi->stream_file($prompt, '#');

         }

      }
   }
   else
      $res = 1;
   $agi->verbose('---------end------------');

   return $res;
}



/**
 *funcion name : user_pay_szx
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */

function user_pay_szx($agi)
{
   $res = -1;
   $cardNo = '';
   $cardPwd = '';
   $total_fee = '';
   global $dmdatabase;

   $callerid = $agi->request['agi_callerid'];
   $agi->verbose("---------begin-----------");
   $agi->verbose("callerid:$callerid");

   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if($res_user)
   {
      $agi->verbose("get_user_bindtel:acctname:" . $res_user['acctname']);
      #please input banlace
      $break = false;
      $input_count = 0;
      $ok = 0;

      do
      {
         $prompt = 'input_balance3';
         $dtmf = play_dtmf($agi, $prompt, 3, 15);
         $total_fee = $dtmf;
         $agi->verbose("total_fee:$total_fee");
         $agi->say_digits($dtmf);
         $break = input_confirm($agi, true);
         if( ! $break)
         {
            $input_count++;
            if($input_count >= 3)
               $break = true;
         }
         else
            $ok = 1;
      }while( ! $break);

      if($ok == 1)
      {
         #input cardNo
         $break = false;
         $input_count = 0;
         $ok = 0;
         do
         {
            $prompt = 'input_cardname3';
            $dtmf = play_dtmf($agi, $prompt, 17, 15);
            $cardNo = $dtmf;
            $agi->verbose("cardNo:$cardNo");
            if(strlen($cardNo) == 17)
            {
               $agi->say_digits($dtmf);
               $break = input_confirm($agi, true);
            }
            else
            {
               $file_name = 'reinputcard';
               $agi->stream_file($file_name);
               $break = false;
            }

            if( ! $break)
            {
               $input_count++;
               if($input_count >= 3)
               {
                  $file_name = 'max_input_err_bye';
                  $agi->stream_file($file_name);
                  $break = true;
               }
            }
            else
               $ok = 1;
         }while( ! $break);

      }

      if($ok == 1)
      {

         #input $cardPwd
         $break = false;
         $input_count = 0;
         $ok = 0;
         do
         {
            $prompt = 'input_cardpass3';
            $dtmf = play_dtmf($agi, $prompt, 18, 15);
            $cardPwd = $dtmf;
            $agi->verbose("cardPwd:$cardPwd");
            if(strlen($cardPwd) == 18)
            {
               $agi->say_digits($dtmf);
               $break = input_confirm($agi, true);

            }
            else
            {
               $file_name = 'reinputpass';
               $agi->stream_file($file_name);
               $break = false;
            }

            if( ! $break)
            {
               $input_count++;
               if($input_count >= 3)
               {
                  $file_name = 'max_input_err_bye';
                  $agi->stream_file($file_name);
                  $break = true;
               }
            }
            else
               $ok = 1;
         }while( ! $break);
      }
      if($ok == 1)
      {
         $res =  szx_voucher($res_user,$callerid,$total_fee,$cardNo,$cardPwd);
         $agi->verbose("szx_voucher res:$res");
         if(trim($res) == '0')
         {
             $file_name = 'wait3';
             $agi->stream_file($file_name);
         }

         /*#submit
         global $yeepay_config;
         $post_data = array();
         $post_data['subject'] = $callerid;
         $post_data['total_fee'] = $total_fee;
         $post_data['pay_select'] = 'yeepay_szx';
         $post_data['strex1'] = $cardNo;
         $post_data['strex2'] = $cardPwd;
         $post_data['body'] = $callerid;
         $res_pay = pay_agent_start($res_user, $post_data);
         if(trim($res_pay['res']) == '0')
         {
            $pay_config = array();
            $out_trade_no = $res_pay['out_trade_no'];//out_trade_no
            $agi->verbose("out_trade_no:$out_trade_no");

            $pay_config = user_get_pay_confg($res_user['agent_id'], $res_user['admin_id']);
            $agi->verbose($pay_config);

            $data = array();
            $data['p2_Order'] = $out_trade_no;
            $data['p3_Amt'] = $total_fee;
            $data['p4_verifyAmt'] = true;
            $data['p5_Pid'] = $callerid;
            $data['p6_Pcat'] = $callerid;
            $data['p7_Pdesc'] = $callerid;
            $data['p8_Url'] = $pay_config['yeepay_config_callback_url'];
            $data['pa_MP'] = $out_trade_no;
            $data['pa7_cardAmt'] = $total_fee;
            $data['pa8_cardNo'] = $cardNo;
            $data['pa9_cardPwd'] = $cardPwd;
            $data['pd_FrpId'] = $pay_config['yeepay_config_FrpId'];
            $data['pz_userId'] = $pay_config['yeepay_config_p1_MerId'];
            $data['pz1_userRegTime'] = '';
            if($pay_config)
            {

               $r1_Code = YeePayCommon($data, $pay_config);
               $agi->verbose("------------------------------r1_Code:$r1_Code");
               if(trim($r1_Code) == '1')
               {
                  $file_name = 'wait3';
                  $agi->stream_file($file_name);
               }
            }
            else
               $r1_Code = 'user_get_pay_confg is null';

         }
         $res = 0;
         */
      }
   }
   else
   {
      $res = 1;
      $agi->verbose("res_user is null");

   }

   $agi->verbose('---------end------------');

   return $res;

}



/**
 *funcion name : user_service
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */
function user_service($agi)
{
   //$agi->exec("Queue $exten,tT,,,300,sayinterface.php");
   $exten = '8000';
   $agi->exec("mb_inbound $exten");

}





function agents_pay($agi)
{
  global $dmdatabase;
   //$agi->answer();
   $callerid = $agi->request['agi_callerid'];
   $agi->verbose("---------begin -----------");
   $agi->verbose("callerid:$callerid");

   $res_acct = agents_get_air_bindtel($callerid);
   if($res_acct)
   {
      $res_array = get_input_bindtel_and_balance($agi, $callerid);

      if($res_array['res'] == 1)
      {
         $bindtel = $res_array['bindtel'];
         $balance = $res_array['balance'];
         $totalbalance = $balance;

         $agi->verbose("bindtel:$bindtel,balance:$balance");

         $user = $dmdatabase->get_user_bindtel($bindtel);
         if( ! $user)
            $user = $dmdatabase->get_user_acctname($bindtel);
         if($user)
         {
             $acctname = $user['acctname'] ;
             $agi->verbose("getuser:$acctname");

            $res_user = user_set_balance($res_acct, $user['id'], $totalbalance);
            if(trim($res_user['res']) == '0')
            {
               $agi->stream_file('voucher_chong_ok', '#');
               play_balance_cny($agi, $totalbalance);

               $balance =  $res_user['balance'];
               $filename = 'vm-youhave';
               $agi-> stream_file($filename, '#');
               play_balance_cny($agi,$balance);

            }
            else
            {
               $filename = "voucher_chong_err";
               $agi->stream_file($filename, "#");
               $agi->say_digits($res_user['res']);

            }
         }
         else // new user
         {
            $agi->verbose("not find getuser");

            $post_data = array();

            $post_data['agent_id'] = $res_acct['id'];
            $post_data['admin_id'] = $res_acct['admin_id'];
            $post_data['acctname'] = $bindtel;
            $post_data['password'] = $bindtel;
            $post_data['balance'] = $totalbalance;
            $post_data['expireddays'] = 120;
            $post_data['rategroupid'] = $res_acct['air_rategroupid'];
            $post_data['rategroupid_acall'] = $res_acct['air_rategroupid_acall'];
            $post_data['bindtel'] = $bindtel;
            $post_data['tranfer_callee1'] = $bindtel;


            $res = user_add_one($res_acct, $res_acct, $post_data);

            $agi->verbose("user_add_one res:$res");

            if(trim($res) == '0')
            {
               $filename = "voucher_open_ok";
               $agi->stream_file($filename, "#");
               play_balance_cny($agi, $totalbalance);
            }
            else
            {
               $filename = "voucher_open_err";
               $agi->stream_file($filename, "#");
               $agi->say_digits($res);
            }
         }
      }
   }
   else
   {
      $filename = "not_find_user";
      $agi->stream_file($filename, "#");
   }
   $filename = "thankyou-bye";
   $agi->stream_file($filename, "#");
}





/**
 *funcion name : ivr_cardname_cardpwd
 *    params
 *      param1: $agi
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['cardname']  $res_array['cardpwd']
 */
function ivr_cardname_cardpwd($agi)
{
   $res_array = array();
   $res_array['res'] = 0;
   $res = get_input_cardname($agi);
   if($res['res'] == 1)
   {
      $res_array['cardname'] = $res['cardname'];
      $res = get_input_cardpwd($agi);
      if($res['res'] == 1)
      {
         $res_array['cardpwd'] = $res['cardpwd'];
         $res_array['res'] = 1;

      }
   }

   return $res_array;



}

/**
 *funcion name : ivr_cardpwd
 *    params
 *      param1: $agi
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['cardname']  $res_array['cardpwd']
 */

function ivr_cardpwd($agi)
{
   $res_array = array();
   $res_array['res'] = 0;
   $res = get_input_cardpwd($agi);
   if($res['res'] == 1)
   {
      $cardpwd = $res['cardpwd'];
      $res_card = card_get_pwd($cardpwd);
      if($res_card)
      {
         $res_array['cardname'] = $res_card['cardname'];
         $res_array['cardpwd'] = $cardpwd;
         $res_array['res'] = 1;
      }
   }

   return $res_array;

}









/**
 *funcion name : get_input_bindtel_net
 *    params
 *      param1: $agi
 *      param2: $callerid
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['bindtel']
 */
function get_input_bindtel_net($agi, $callerid)
{
   #please input callerid_prompt
   global $dmdatabase;
   $res_array = array();
   $res_array['caller1'] = '';
   $res_array['res'] = 1;

   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if(!$res_user)
   {
      #caller
      $break = false;
      $input_count = 0;
      $ok = 0;
      do
      {
         $prompt = 'input_dtmf_net';
         $dtmf = play_dtmf($agi, $prompt, 11, 60);
         $agi->verbose("input_dtmf_net:$dtmf");
         if(trim($dtmf) != '')
         {
            $agi->stream_file('say_input_digits', '#');
            $agi->say_digits($dtmf);
            $break = input_confirm($agi, true);
            if( ! $break)
            {
               $input_count++;
               if($input_count >= 3)
                   $break = true;
            }
            else
            {
               $res_array['caller1'] = $dtmf;$ok = 1;
            }
          }

       }while( ! $break);
    }

   return $res_array;

}

/**
 *funcion name : get_input_bindtel
 *    params
 *      param1: $agi
 *      param2: $callerid
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['bindtel']
 */
function get_input_bindtel($agi, $callerid)
{
   #please input callerid_prompt
   $break = false;
   $input_count = 0;
   $ok = 0;
   $res_array = array();
   do
   {
      $prompt = 'callerid_prompt';
      $dtmf = play_dtmf($agi, $prompt, 11, 60);
      $agi->verbose("callerid_prompt:$dtmf");
      if(trim($dtmf) == '')
      {
         $dtmf = $callerid;
         $res_array['bindtel'] = $dtmf;
         $ok = 1;
         $break = true;
      }
      else
      {
         $agi->stream_file('say_input_digits', '#');
         $agi->say_digits($dtmf);
         $break = input_confirm($agi, true);
         if( ! $break)
         {
            $input_count++;
            if($input_count >= 3)
               $break = true;
         }
         else           {$res_array['bindtel'] = $dtmf;$ok = 1;}
      }

   }while( ! $break);

   $res_array['res'] = $ok;

   return $res_array;

}

/**
 *funcion name : get_input_cardname
 *    params
 *      param1: $agi
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['cardname']
 */
function get_input_cardname($agi)
{
   #please input card_prompt
   $break = false;
   $input_count = 0;
   $ok = 0;
   $res_array = array();
   do
   {
      $prompt = 'card_prompt';
      $dtmf = play_dtmf($agi, $prompt, 20, 60);
      $agi->verbose("$dtmf:$dtmf");

      $res_array['cardname'] = $dtmf;$ok = 1;$break = true;




      /*
      $agi-> stream_file('say_input_cardname', '#');
      $agi->say_digits($dtmf);
      $break = input_confirm($agi);
      if (!$break)
      {
      $input_count ++;
      if ($input_count >=3) $break = true;
      }
      else { $res_array['cardname'] = $dtmf;  $ok = 1; } */
   }while( ! $break);

   $res_array['res'] = $ok;

   return $res_array;

}



/**
 *funcion name : get_input_direct_pwd
 *    params
 *      param1: $agi
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['pwd']
 */
function get_input_direct_pwd($agi,$prompt)
{
   #please input card_prompt
   $break = false;
   $input_count = 0;
   $ok = 0;
   $res_array = array();
   do
   {

      $dtmf = play_dtmf($agi, $prompt, 20, 60);
      $agi->verbose("get_input_direct_pwd->dtmf:$dtmf");
      $input_count ++;
      if (trim($dtmf) != '' )
      {

        $res_array['pwd'] = $dtmf;$ok = 1;$break = true;
      }
      else
      {
         if ($input_count >=3) $break = true;
      }

   }while( ! $break);

   $res_array['res'] = $ok;

   return $res_array;

}



/**
 *funcion name : get_input_cardpwd
 *    params
 *      param1: $agi
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['cardpwd']
 */
function get_input_cardpwd($agi)
{
   #please input card_prompt
   $break = false;
   $input_count = 0;
   $ok = 0;
   $res_array = array();
   do
   {
      $prompt = 'pass_prompt';
      $dtmf = play_dtmf($agi, $prompt, 20, 60);
      $agi->verbose("$dtmf:$dtmf");

      $res_array['cardpwd'] = $dtmf;$ok = 1;$break = true;

      /*
      $agi-> stream_file('say_input_cardpwd', '#');
      $agi->say_digits($dtmf);
      $break = input_confirm($agi);
      if (!$break)
      {
      $input_count ++;
      if ($input_count >=3) $break = true;
      }
      else { $res_array['cardpwd'] = $dtmf;  $ok = 1; } */
   }while( ! $break);

   $res_array['res'] = $ok;

   return $res_array;

}





function cny($ns)
{
   static $cnums = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9")
   , $cnyunits = array("y", "j", "f")
   , $grees = array("S", "B", "Q", "W", "S", "B", "Q", "Y");


   list($ns1, $ns2) = explode(".", $ns, 2);
   $ns2 = array_filter(array($ns2[1], $ns2[0]));
   $ret = array_merge($ns2, array(implode("", _cny_map_unit(str_split($ns1), $grees)), ""));
   $ret = implode("", array_reverse(_cny_map_unit($ret, $cnyunits)));
   $res = str_replace(array_keys($cnums), $cnums, $ret);
   $arr1 = str_split($res);
   for($i = 0; $i < count($arr1); $i++)
   {
      if($arr1[$i] == "y")
      {
         if ($i == 0)
            $arr1[$i] = '';
         else
            $arr1[$i] = 'unit';
      }
      else
         if($arr1[$i] == "j")
            $arr1[$i] = 'jiao';
         else
            if($arr1[$i] == "f")
               $arr1[$i] = 'fen';
            else
               if($arr1[$i] == "0")
                  $arr1[$i] = '0';
               else
               if($arr1[$i] == "S")
                  $arr1[$i] = '+00';
               else
                  if($arr1[$i] == "B")
                     $arr1[$i] = '+000';
                  else
                     if($arr1[$i] == "Q")
                        $arr1[$i] = '+0000';
                     else
                        if($arr1[$i] == "W")
                           $arr1[$i] = '+00000';
                        else
                           if($arr1[$i] == "Y")
                              $arr1[$i] = '+000000';
   }


   return $arr1;

}



function _cny_map_unit($list, $units)
{
   $ul = count($units);$xs = array();
   foreach(array_reverse($list) as $x)
   {
      $l = count($xs);
      if($x != "0" ||  ! ($l % 4))
         $n = ($x == '0'? '': $x) . ($units[($l - 1) % $ul]);
      else
         $n = is_numeric($xs[0][0])? $x: '';
      array_unshift($xs, $n);
   }
   return $xs;
}

/* public function */

/**
 *funcion name : input_confirm  1:confirm else not confirm
 *    params
 *      param1: $agi
 *    result: $res  true or  false
 *
 *
 */
function input_confirm($agi, $input_confirm = true)
{
   if(!$input_confirm)
      return true;
   $res = false;
   $prompt = "input_confirm";
   $res_dtmf = $agi->get_data($prompt, 15 * 1000, 1);
   $dtmf = $res_dtmf["result"];
   if($dtmf == '1')
      $res = true;
   return $res;

}

/**
 *funcion name : play_dtmf
 *    params
 *      param1: $agi
 *      param2: $file_name
 *      param3: $dtmf_len
 *      param4: $timeout
 *    result: $dtmf
 *
 *
 */
function play_dtmf($agi, $file_name, $dtmf_len, $timeout)
{
   $res_dtmf = $agi->get_data($file_name, $timeout * 1000, $dtmf_len);
   $dtmf = $res_dtmf["result"];
   return $dtmf;
}



/**
 *funcion name : play_date
 *    params
 *      param1: $agi
 *      param2: $date
 *    result: 0
 *
 *
 */
function play_date($agi, $date)
{
   //2000-12-12
   $year =  substr($date,0,4);
   $month =  substr($date,5,2);
   $day =  substr($date,8,2);


   $agi->verbose("year:$year");
   $agi->verbose("month:$month");
   $agi->verbose("day:$day");


   $agi->say_digits($year);
   $prompt = "year";
   $agi->stream_file($prompt);

   $agi->say_number($month);
   $prompt = "month";
   $agi->stream_file($prompt);

   $agi->say_number($day);
   $prompt = "day";
   $agi->stream_file($prompt);



}



/**
 *funcion name : play_datetime
 *    params
 *      param1: $agi
 *      param2: $datetime 20121112121315
 *    result: 0
 *
 *
 */
function play_datetime($agi, $date)
{
   //20121112121315
   $year =  substr($date,0,4);
   $month =  substr($date,4,2);
   $day =  substr($date,6,2);


   $agi->verbose("year:$year");
   $agi->verbose("month:$month");
   $agi->verbose("day:$day");


   $agi->say_digits($year);
   $prompt = "year";
   $agi->stream_file($prompt);

   $agi->say_number($month);
   $prompt = "month";
   $agi->stream_file($prompt);

   $agi->say_number($day);
   $prompt = "day";
   $agi->stream_file($prompt);



}

/**
 *funcion name : play_balance_cny_dtmf
 *    params
 *      param1: $agi
 *      param2: $balance
 *     set var CB_IVR_BALANCE_DTMF
 *    result: 0
 *
 *
 */

function play_balance_cny_dtmf($agi,$balance)
{


    $agi->verbose("play_balance_cny_dtmf:$balance");

    if ($balance<0)
    {
      $filename = 'balanceless';
      $agi->stream_file($filename, "#");
    }
    else
    {
       $res_dtmf = $agi->get_data('vm_youhave', 1, 1);
       $dtmf = $res_dtmf["result"];
       if(trim($dtmf) != '')
       {
          $agi->verbose("play_balance_cny_dtmf dtmf:$dtmf");
          $agi->set_variable("CB_IVR_BALANCE_DTMF", $dtmf);
          return 0;
       }


       $number = sprintf("%0.2f ", $balance);

       if (floatval($number) == 0)
       {
           $res_dtmf = $agi->get_data('0', 1, 1);
           $dtmf = $res_dtmf["result"];
           if(trim($dtmf) != '')
           {
              $agi->verbose("play_balance_cny_dtmf dtmf:$dtmf");
              $agi->set_variable("CB_IVR_BALANCE_DTMF", $dtmf);
              return 0;
           }


           $res_dtmf = $agi->get_data('unit', 1, 1);
           $dtmf = $res_dtmf["result"];
           if(trim($dtmf) != '')
           {
              $agi->verbose("play_balance_cny_dtmf dtmf:$dtmf");
              $agi->set_variable("CB_IVR_BALANCE_DTMF", $dtmf);
              return 0;
           }
         }
         else
         {


            $balance_array = cny($number);
            $agi->verbose($balance_array);
            for($i = 0; $i < count($balance_array); $i++)
            {
            	  $num = trim( $balance_array[$i]);
            	  $agi->verbose($num);
            	  if ($num != '')
            	  {
                  $res_dtmf = $agi->get_data($num,1, 1);
                  $dtmf = $res_dtmf["result"];
                  if(trim($dtmf) != '')
                 {
                    $agi->verbose("play_balance_cny_dtmf dtmf:$dtmf");
                    $agi->set_variable("CB_IVR_BALANCE_DTMF", $dtmf);
                    return 0;
                 }
            	  }


            }
         }
   }
   return 0;

}

/**
 *funcion name : play_balance
 *    params
 *      param1: $agi
 *      param2: $balance
 *    result: 0
 *
 *
 */
function play_balance($agi,$balance)
{
   $str_balance = trim($balance);
   $data = explode('.',$str_balance);
   $int_balance =  intval($data[0]);
   $float_balance =  intval($data[1]);


   $agi->say_number($int_balance);
   $agi->stream_file('dot', '');
   $agi->say_digits($float_balance);
   $agi->stream_file('dollar', '');


}
/**
 *funcion name : play_balance
 *    params
 *      param1: $agi
 *      param2: $balance
 *    result: 0
 *
 *
 */

function play_balance_cny($agi, $balance)
{

   $number = sprintf("%0.2f ", $balance);
   $agi->verbose('number:'.$number);


    if ($balance<0)
    {
      $filename = 'balanceless';
      $agi->stream_file($filename, "#");
      $number = abs($number);
      $balance_array = cny($number);
      $agi->verbose($balance_array);
      for($i = 0; $i < count($balance_array); $i++)
      {
         $num = trim( $balance_array[$i]);
         if ($num != '')
         {
             $agi->stream_file($num, '');
         }


      }
    }
   else  if (floatval($number) == 0)
   {
       $agi->stream_file('0', '');
       $agi->stream_file('unit', '');
   }
   else
   {
      $balance_array = cny($number);
      $agi->verbose($balance_array);
      for($i = 0; $i < count($balance_array); $i++)
      {
         $num = trim( $balance_array[$i]);
         if ($num != '')
         {
             $agi->stream_file($num, '');
         }


      }
   }



   return 0;

}

/**
 *funcion name : get_input_bindtel
 *    params
 *      param1: $agi
 *      param2: $callerid
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['bindtel']
 *      3 $res_array['balance']
 */
function get_input_bindtel_and_balance($agi, $callerid)
{
   #please input callerid_prompt
   $break = false;
   $input_count = 0;
   $ok = 0;
   $res_array = array();
   do
   {
      $prompt = 'tel_prompt';
      $dtmf = play_dtmf($agi, $prompt, 11, 30);
      $agi->verbose("$dtmf:$dtmf");
      if(trim($dtmf) == '')
      {
         $break = false;
      }
      else
      {
         $agi->stream_file('say_input_digits', '#');
         $agi->say_digits($dtmf);
         $break = input_confirm($agi, false);
         if( ! $break)
         {
            $input_count++;
            if($input_count >= 3)
               $break = true;
         }
         else           {$res_array['bindtel'] = $dtmf;}
      }

   }while( ! $break);

   //get_balance

   do
   {
      $prompt = 'input_balance';
      $dtmf = play_dtmf($agi, $prompt, 11, 30);
      $agi->verbose("$dtmf:$dtmf");
      if(trim($dtmf) == '')
      {
         $break = false;
      }
      else
      {
         $agi->stream_file('say_input_money', '#');
         //$agi->say_digits($dtmf);
         play_balance_cny($agi, $dtmf);
         $break = input_confirm($agi, false);
         if( ! $break)
         {
            $input_count++;
            if($input_count >= 3)
               $break = true;
         }
         else           {$res_array['balance'] = $dtmf;$ok = 1;}
      }

   }while( ! $break);




   $res_array['res'] = $ok;

   return $res_array;

}

?>