<?php
/*
*  public astgo phpagi func
*  filename agi_astgo_inc.php
*  add by jin 2011-11-19
*/
include "global.php";
require_once("phpagi.php");
require_once 'HttpClient.class.php';


require_once("../include/dmdatabase.php");
require_once("../include/card_inc.php");
require_once("../include/user_inc.php");
require_once("../include/pay_inc.php");
require_once("../include/szxpay_inc.php");
require_once("../include/btobtel_inc.php");





/**
 *funcion name : is_MobileNumber
 *    params
 *      param1: Number
 *    result:  $res   0:ok

 ,1:err
 */
function is_MobileNumber($MobileNumber)
{

   if(strlen($MobileNumber) < 10)
   {
      return 1;
   }

   if(substr($MobileNumber, 0, 1) != "0")
   {
      if( ! preg_match("/^1[3|4|5|8][0-9]\d{8}$/", $MobileNumber))
      {
         return 1;
      }
   }
   return 0;

}




/**
 *funcion name : balance_transfer
 *    params
 *      param1: $agi
 *    result:  $res
 */
function balance_transfer($acct, $agi)
{


   global $dmdatabase;
   $res = 1;
   $prompt = "pass_prompt";

   $input_count = 0;
   $break = false;
   do
   {
      $prompt = "pass_prompt";

      $res = get_input_direct_pwd($agi, $prompt);
      if($res['res'] == 1)
      {
         $pin = $res['pwd'];
         #$res_user = user_get_pwd($pwd);

         $res_user = $dmdatabase->get_user_acctname($pin);
         if($res_user)
         {
            # transfer balance
            #$post_data $post_data['acctname']; $post_data['to_acctname']; $post_data['balance'];

            $post_data['acctname'] = $res_user['acctname'];
            $post_data['to_acctname'] = $acct['acctname'];
            $post_data['balance'] = $res_user['balance'];


            $agi->verbose("--------------------acctname:".$post_data['acctname']);
            $agi->verbose("--------------------to_acctname:".$post_data['to_acctname']);
            $agi->verbose("--------------------balance:".$post_data['balance']);



            $res = user_balance_transfer($acct, $post_data);

            $agi->verbose("----------------user_balance_transfer ----res:".$res);

            if($res == 0)
            {
               $prompt = "operation_ok";
               $agi->stream_file($prompt, '#');

               $res_balance = user_get_balance($post_data['to_acctname']);
               $res_balance['balance'];

               play_balance_cny($agi, $res_balance['balance']);


            }
            else
            {
               $prompt = "operation_err";
               $agi->stream_file($prompt, '#');
            }
            $break = true;
            $res = 0;
         }
         else
         {
            $prompt = "operation_err";
            $agi->stream_file($prompt, '#');
            $input_count++;
            if($input_count >= 3)              {$res = 2;$break = true;}
         }

      }
      else //input null
      {
         $input_count++;
         if($input_count >= 3)           {$res = 2;$break = true;}
      }

   }while( ! $break);


   return $res;


}


/**
 *funcion name : btobcallee_select_input
 *    params
 *      param1: $agi
 *    result:  $res dtmfs
 */

function btobcallee_select_input($agi)
{
   $input_count = 0;
   $res = '';
   $break = false;
   do
   {
      $prompt = 'btob_input_add_prompt';
      $dtmf = play_dtmf($agi, $prompt, 15, 45);
      $agi->verbose("btob_input_add_prompt:$dtmf");
      $agi->stream_file('say_input_digits', '#');
      $agi->say_digits($dtmf);
      if(input_confirm($agi, true))
      {
         $res = $dtmf;
         $break = true;
      }
      else
      {
         $input_count++;
         if($input_count >= 3)
            $break = true;
      }

   }while( ! $break);

   return $res;

}


/**
 *funcion name : btobcallee_add
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */

function btobcallee_add($agi)
{
   $res = 1;
   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $accountcode = $agi->request['agi_accountcode'];

   $agi->verbose("--------- btobcallee_add -----------");

   $input_count = 0;
   $reinput = 0;
   $break = false;
   do
   {
      $prompt = 'btobtel_not_bind';
      $dtmf = play_dtmf($agi, $prompt, 1, 15);
      $agi->verbose("btobtel_not_bind:$dtmf");
      if($dtmf == '1')
      {
         $dtmf = btobcallee_select_input($agi);
         $agi->set_variable("CB_BTOB_DEST", $dtmf);
         $break = true;
         $res = 0;
      }
      else
         if($dtmf == '2')
         {
            $agi->set_variable("CB_BTOB_DEST", $dtmf);
            $break = true;
            $res = 2;
         }
         else
         {
            $input_count++;
            if($input_count >= 3)
               $break = true;
         }
   }while( ! $break);

   return $res;



}


/**
 *funcion name : btobcallee_edit
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */

function btobcallee_edit($agi)
{
   $res = 1;
   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $accountcode = $agi->request['agi_accountcode'];



   $variable = $agi->get_variable("CB_ACCOUNTCODE");
   $CB_ACCOUNTCODE = $variable['data'];

   $accountcode = $CB_ACCOUNTCODE;


   $variable = $agi->get_variable("CB_BTOB_DEST");
   $CB_BTOB_DEST = $variable['data'];

   $variable = $agi->get_variable("CB_BTOB_CALLEE");
   $CB_BTOB_CALLEE = $variable['data'];

   $agi->verbose("--------- btobcallee_edit -----------");

   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if($res_user)
   {
      $input_count = 0;
      $break = false;
      do
      {
         $prompt = 'btobtel_input_edit_prompt';
         $dtmf = play_dtmf($agi, $prompt, 15, 45);
         $agi->verbose("btobtel_input_edit_prompt:$dtmf");
         $agi->stream_file('say_input_digits', '#');
         $agi->say_digits($dtmf);
         if(input_confirm($agi, true))
         {

            $post_data['accountcode'] = $accountcode;
            $post_data['calleeid'] = $CB_BTOB_CALLEE;
            $post_data['dest'] = $CB_BTOB_DEST;
            $post_data['new_dest'] = $dtmf;

            $agi->verbose("accountcode:$accountcode");
            $agi->verbose("calleeid:$CB_BTOB_CALLEE");
            $agi->verbose("dest:$CB_BTOB_DEST");
            $agi->verbose("new_dest:$dtmf");

            user_btobtel_edit($res_user, $post_data);//$accountcode, $CB_BTOB_CALLEE,$CB_BTOB_DEST,$dtmf);

            $agi->stream_file('btobtel_edit_ok', '#');

            $break = true;
            $res = 0;
         }
         else
         {
            $input_count++;
            if($input_count >= 3)
            {
               $agi->stream_file('operation_err', '#');
               $break = true;
            }
         }
      }while( ! $break);
   }



}

/**
 *funcion name : language_select
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */


function language_select($agi)
{

   $DEAFULT_LANGUAGE = 'cn';

   $variable = $agi->get_variable("IVR_LANGUAGE");
   $IVR_LANGUAGE = $variable['data'];
   if($IVR_LANGUAGE == 'selectcn')
      $DEAFULT_LANGUAGE = 'cn';
   if($IVR_LANGUAGE == 'selecten')
      $DEAFULT_LANGUAGE = 'en';
   if($IVR_LANGUAGE == 'selectfr')
      $DEAFULT_LANGUAGE = 'fr';


   //if ($language == 'select')
   $res = 1;
   {
      $input_count = 0;
      $break = false;
      do
      {
         $prompt = 'language_select';
         $dtmf = play_dtmf($agi, $prompt, 1, 10);
         $agi->verbose("language_select:$dtmf");
         if(trim($dtmf) == '1')
         {
            $agi->set_variable("CHANNEL(language)", "cn");
            $break = true;
            $res = 0;
         }
         else
            if(trim($dtmf) == '2')
            {
               $agi->set_variable("CHANNEL(language)", "en");
               $break = true;
               $res = 0;
            }
            else
               if(trim($dtmf) == '3')
               {
                  $agi->set_variable("CHANNEL(language)", "fr");
                  $break = true;
                  $res = 0;
               }
               else
               {
                  $input_count++;
                  if($input_count >= 3)
                  {

                     $agi->set_variable("CHANNEL(language)", $DEAFULT_LANGUAGE);
                     $break = true;
                     $res = 2;
                  }
               }
      }while( ! $break);
   }

}


/**
 *funcion name : balance_submit
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */
 function balance_submit($agi,$callerid)
 {
      $res_array = array();

      $break = false;
      $input_count = 0;
      $ok = 0;
      do
      {
         $prompt = 'input_balance_submit';
         $dtmf = play_dtmf($agi, $prompt, 12, 60);
         $agi->verbose("balance_submit:$dtmf");
         if(trim($dtmf) != '')
         {
            #$agi->stream_file('say_input_digits', '#');
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
               $res_array['balance'] = $dtmf;$ok = 1;
            }
         }

      }while( ! $break);

      if ($ok == 1)
      {

      $break = false;
      $input_count = 0;
      $ok = 0;
      do
      {
         $prompt = 'input_mum_submit';
         $dtmf = play_dtmf($agi, $prompt, 4, 60);
         $agi->verbose("balance_submit:$dtmf");
         if(trim($dtmf) != '')
         {
            #$agi->stream_file('say_input_digits', '#');
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
               $res_array['mum'] = $dtmf;$ok = 1;
            }
         }

      }while( ! $break);

      if ($ok == 1)
      {

         $Phone = $callerid;

         $Content = $res_array['balance'] .'*'.  $res_array['mum'] ;
         $posturl = "http://dx.stsms.cn:1234/WS/WebService.asmx/Exchange?Uid=yuyin&Pwd=123456&Phone=$Phone&Content=$Content";

         $agi->verbose("posturl:$posturl");

         $pageContents = HttpClient::quickGet($posturl);

         $agi->verbose("pageContents:$pageContents");

         $xml= simplexml_load_string($pageContents);

         $agi->verbose('xml->string:'. $xml);

         if (trim($xml) == '1')
         {

            $filename = "balance_submit_ok";
            $agi->stream_file($filename, "#");
         }


      }


      }




 }


/**
 *funcion name : edituserpassword
 *    params
 *      param1: $agi
  *      param2: $callerid
   *      param3: $acctname
 *    result:  $res   0:ok ,1:err
 */


function edituserpassword($agi,$callerid)
{
   $res = 1;
   global $dmdatabase;

   $agi->verbose("--------- edituserpassword begin callerid:$callerid -----------");

   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if($res_user)
   {
      $prompt = "pass_prompt1";
      $res = get_input_newpwd($agi, $prompt);
      if($res['res'] == 1)
      {
         $pin = $res['pwd'];

         $acctname = $res_user['acctname'];
         $newpwd = $pin;
         $res = user_set_pwd($acctname,$newpwd);

         if (trim($res) == '0')
         {

           $prompt = 'editbindtel_ok';
           $agi->stream_file($prompt, '#');
         }


      }

   }
   else
   {
      $filename = "not_find_user";
      $agi->stream_file($filename, "#");

      $filename = "thankyou-bye";
      $agi->stream_file($filename, "#");

      $res = 2;
   }
   return $res;


}


/**
 *funcion name : editcallerid
 *    params
 *      param1: $agi
  *      param2: $callerid
   *      param3: $acctname
 *    result:  $res   0:ok ,1:err
 */

function editcallerid($agi,$callerid)
{

   $res = 1;
   global $dmdatabase;

   $agi->verbose("--------- editcallerid begin callerid:$callerid -----------");

   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if($res_user)
   {
   	   $acct = agents_get ($res_user['agent_id']);
   	   
   	   if ($acct ['callerid_type'] == 1 )
   	   {
   	   	$res_array = get_input_caller($agi);
   	   	if($res_array['res'] == 1)
   	   	{
   	   		$bindtel = $res_array['caller'];
   	   	
   	   		#$post_data['acctname']; $post_data['bindtel'];
   	   		$post_data =array();
   	   		$post_data['acctname'] = $res_user['acctname'];
   	   		$post_data['callerid'] = $bindtel;
   	   		$res = user_edit_callerid($res_user,$post_data);
   	   	
   	   		if (trim($res) == '0')
   	   			$prompt = 'operation_ok';
   	   		$agi->stream_file($prompt, '#');
   	   	
   	   	
   	   	}
   	   	else
   	   	{
   	   		$prompt = 'operation_err';
   	   		$agi->stream_file($prompt, '#');
   	   		$res = 3;
   	   	}
   	   	
   	   	
   	   }
   	   else
   	   {
   	    	$prompt = 'operation_err';
   	    	$agi->stream_file($prompt, '#');
   	   	    $res = 2;   	   
   	   }
   	      	

   }
   else
   {
      $prompt = 'bindtel_err';
      $agi->stream_file($prompt, '#');
      $res = 2;
   }

    return $res;


}

/**
 *funcion name : editbindtel
 *    params
 *      param1: $agi
  *      param2: $callerid
   *      param3: $acctname
 *    result:  $res   0:ok ,1:err
 */


function editbindtel($agi,$callerid)
{
   $res = 1;
   global $dmdatabase;

   $agi->verbose("--------- editbindtel begin callerid:$callerid -----------");

   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if($res_user)
   {
       $res_array = get_input_caller($agi);
       if($res_array['res'] == 1)
       {
            $bindtel = $res_array['caller'];

            #$post_data['acctname']; $post_data['bindtel'];
            $post_data =array();
            $post_data['acctname'] = $res_user['acctname'];
            $post_data['bindtel'] = $bindtel;
            $res = user_edit_bindtel($res_user,$post_data);

            if (trim($res) == '0')
            $prompt = 'editbindtel_ok';
            $agi->stream_file($prompt, '#');


       }
       else
       {
         $prompt = 'bindtel_err';
         $agi->stream_file($prompt, '#');
         $res = 3;
       }

   }
   else
   {
      $prompt = 'bindtel_err';
      $agi->stream_file($prompt, '#');
      $res = 2;
   }

    return $res;

}


/**
 *funcion name : addbindtel
 *    params
 *      param1: $agi
  *      param2: $callerid
   *      param3: $acctname
 *    result:  $res   0:ok ,1:err
 */


function addbindtel($agi)
{
   $res = 1;
   global $dmdatabase;
   //$callerid = $agi->request['agi_callerid'];

   $variable = $agi->get_variable("INPUT_CALLER");
   $callerid =  trim($variable['data']);

   $variable = $agi->get_variable("INPUT_ACCTNAME");
   $acctname =  trim($variable['data']);


   $agi->verbose("--------- addbindtel begin callerid:$callerid -----------");

   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if(!$res_user)
   {
      #del bindtel
      //user_del_bindtel($res_user, $callerid);

      #$post_data['acctname']  $post_data['bindtel']
      $post_data['acctname'] = $acctname;
      $post_data['bindtel'] = $callerid;
      $res = user_add_bindtel($res_user, $post_data);

      if($res == 0)
      {
         $prompt = 'bindtel_ok';
         $agi->stream_file($prompt, '#');
      }
      else
      {
         $prompt = 'bindtel_err';
         $agi->stream_file($prompt, '#');
      }
   }
   else
   {
      $prompt = 'bindtel_err';
      $agi->stream_file($prompt, '#');
   }
   return $res;
}

/**
 *funcion name : delbindtel
 *    params
 *      param1: $agi
 *    result:  $res   0:ok ,1:err
 */


function delbindtel($agi)
{
   $res = 1;
   global $dmdatabase;
   $callerid = $agi->request['agi_callerid'];
   $agi->verbose("--------- delbindtel begin callerid:$callerid -----------");

   /*
   $variable = $agi->get_variable("INPUT_CALLER");
   $callerid =  trim($variable['data']);

   $variable = $agi->get_variable("INPUT_ACCTNAME");
   $acctname =  trim($variable['data']);
   */


   $res_user = $dmdatabase->get_user_bindtel($callerid);
   if($res_user)
   {
      $res = user_del_bindtel($res_user, $callerid);
      if($res == 0)
      {
         $prompt = 'delbindtel_ok';
         $agi->stream_file($prompt, '#');

      }
      else
      {
         $prompt = 'delbindtel_err';
         $agi->stream_file($prompt, '#');
      }

   }
   else
   {
      $prompt = 'cq_tel_notfind';
      $agi->stream_file($prompt, '#');
   }
   return $res;

}

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
   global $dmdatabase;

   $agi->set_variable("CHANNEL(language)", "cn");
   
   $callerid = $agi->request['agi_callerid'];
   

   $variable = $agi->get_variable("IVR_FILENAME");
   $IVR_VAR = $variable['data'];
   $data = explode(',', $IVR_VAR);

   $fIVRPhone = trim($data[0]);
   $Flag = trim($data[1]);
   $digital = trim($data[2]);

   if ($Flag == '1')
   {
      $prompt = "reg_outcall_pay_password";
   }
   else
   {
      $prompt = "forget_outcall_pay_password";
   }




   	 $agi->stream_file($prompt, '#');
   	 $agi->say_digits($digital);
   	 
   	 $prompt = "pwd_outcall_is";
   	 $agi->stream_file($prompt, '#');
   	 $agi->say_digits($digital);
   	 
   	 $agi->stream_file($prompt, '#');
   	 $agi->say_digits($digital);
   	 
   	 $agi->stream_file($prompt, '#');
   	 $agi->say_digits($digital);
   	 
   	 $filename = "thankyou-bye";
   	 $agi->stream_file($filename, "#");
   	 
 






}

/*
function ivr_filename($agi)
{
   $res = 0;
   $variable = $agi->get_variable("IVR_FILENAME");
   $IVR_FILENAME = $variable['data'];
   $data = explode(',', $IVR_FILENAME);
   #fIVRPhone,Flag,faddMoney,YPhone,fMoney,fTime,fPhone4
   $fIVRPhone = trim($data[0]);
   $Flag = trim($data[1]);
   $faddMoney = trim($data[2]);
   $YPhone = trim($data[3]);
   $fMoney = trim($data[4]);
   $fTime = trim($data[5]);
   $fPhone4 = trim($data[6]);


   if($Flag == '1')
   {
      $prompt = "jfw_low_banlace";
      $agi->stream_file($prompt, '#');
   }
   else
      if($Flag == '2') #$fMoney
      {
         #$fMoney
         $prompt = 'jfw_youhave';
         $agi->stream_file($prompt, '#');
         play_balance($agi, $fMoney);
         $prompt = 'jfw_thanks';
         $agi->stream_file($prompt, '#');
      }
      else
         if($Flag == '3')
         {
            $prompt = "jfw_config_err";
            $agi->stream_file($prompt, '#');
         }
         else
            if($Flag == '4')
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
            else
               if($Flag == '5')
               {
                  $prompt = "jfw_pay_err5";
                  $agi->stream_file($prompt, '#');
               }
               else
                  if($Flag == '6')
                  {
                     $prompt = "jfw_pay_err6";
                     $agi->stream_file($prompt, '#');
                     play_datetime($agi, $fTime);
                     $prompt = "jfw_pay_err6_1";
                     $agi->stream_file($prompt, '#');
                     if($fPhone4 == '')
                        $fPhone4 = '0';
                     $agi->say_digits($fPhone4);
                  }
                  else
                     if($Flag == '7')
                     {
                        $prompt = "jfw_pay_err7";
                        $agi->stream_file($prompt, '#');
                     }
                     else
                        if($Flag == '8')
                        {
                           $prompt = "jfw_pay_err8";
                           $agi->stream_file($prompt, '#');
                        }
                        else
                           if($Flag == '9')
                           {
                              $prompt = "jfw_pay_err9";
                              $agi->stream_file($prompt, '#');
                           }
                           else
                              $res = 1;
   return $res;


}
*/



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

      $res = get_input_direct_pwd($agi, $prompt);
      if($res['res'] == 1)
      {
         $pin = $res['pwd'];
         #$res_user = user_get_pwd($pwd);

         $res_user = $dmdatabase->get_user_acctname($pin);
         if($res_user)
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
            if($input_count >= 3)              {$res = 2;$break = true;}
         }

      }
      else //input null
      {
         $input_count++;
         if($input_count >= 3)           {$res = 2;$break = true;}
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
   $res_dtmf = play_dtmf($agi, $prompt, 1, 45);

   if(trim($res_dtmf) == '1')
   {
      $res_array = get_input_cardname($agi);
      if($res_array['res'] == 1)
      {
         $cardname = $res_array['cardname'];
         $res_card = card_get_name($cardname);
         if($res_card)
         {
            if(trim($res_card['vouchered']) == '0')
            {
               $prompt = 'cq_card_not_userd';
               $agi->stream_file($prompt, '#');
            }
            else
            {
               $voucher_acctname = $res_card['voucher_acctname'];

               $res_user = $dmdatabase->get_user_acctname($voucher_acctname);
               if( ! $res_user)
                  $res_user = $dmdatabase->get_user_bindtel($voucher_acctname);

               if($res_user)
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
   else
      if(trim($res_dtmf) == '2')
      {
         $res_array = get_input_bindtel($agi, $callerid);
         if($res_array['res'] == 1)
         {
            $bindtel = $res_array['bindtel'];
            $res_user = $dmdatabase->get_user_bindtel($bindtel);
            if($res_user)
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
      $balance += 0;
      $break = false;
      $input_count = 0;
      do
      {
         $balance = $res_user['balance'];
         $expireddate = $res_user['expireddate'];
         $balance += 0;
         $input_count++;


         if($balance < 0)
         {
            $filename = 'balanceless';
            $agi->stream_file($filename, "#");
            $balance = ($balance);
         }
         else
         {
         	$agi->verbose("--------- play_balance_cny_dtmf:$balance  -----------");
         	play_balance_cny_dtmf($agi, $balance);
         	
         	$agi->verbose("--------- play_balance_cny_dtmf:$balance -----------");
         }
         
        // play_balance_cny_dtmf()
        

         /*
         $filename = 'expireddate';
         $agi->stream_file($filename, '#');
         play_date($agi, $expireddate);
        */  
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
         $caller1 = $bindtel;

         $agi->verbose('cardname:' . $cardname . ' cardpwd:' . $cardpwd . ' bindtel:' . $bindtel);



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
         $agi->verbose('$cardname:' . $cardname . ' cardpwd:' . $cardpwd . ' bindtel:' . $bindtel . ' res:' . $res_voucher['res']);


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
         $res = szx_voucher($res_user, $callerid, $total_fee, $cardNo, $cardPwd);
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
            $acctname = $user['acctname'];
            $agi->verbose("getuser:$acctname");

            $res_user = user_set_balance($res_acct, $user['id'], $totalbalance);
            if(trim($res_user['res']) == '0')
            {
               $agi->stream_file('voucher_chong_ok', '#');
               play_balance_cny($agi, $totalbalance);

               $balance = $res_user['balance'];
               $filename = 'vm-youhave';
               $agi->stream_file($filename, '#');
               play_balance_cny($agi, $balance);

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
   $break = false;
   $input_count = 0;
   do
   {
      if( ! $break)
      {
         $res = get_input_cardpwd($agi);
         $cardpwd = $res['cardpwd'];

         $agi->verbose('cardpwd:' . $cardpwd);

         $res_card = card_get_pwd($cardpwd);
         if($res_card)
         {
            $res_array['cardname'] = $res_card['cardname'];
            $res_array['cardpwd'] = $cardpwd;
            $res_array['res'] = 1;
            $break = true;
         }
         else
         {
            $input_count++;
         }
         if($input_count >= 3)
            $break = true;
      }
   }while( ! $break);

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
   if( ! $res_user)
   {
      #caller
      $break = false;
      $input_count = 0;
      $ok = 0;
      do
      {
         $prompt = 'input_dtmf_net';
         $dtmf = play_dtmf($agi, $prompt, 12, 60);
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
 *funcion name : get_input_newpwd
 *    params
 *      param1: $agi
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['cardpwd']
 */
function get_input_newpwd($agi,$prompt)
{
   #please input card_prompt
   $break = false;
   $input_count = 0;
   $ok = 0;
   $res_array = array();
   do
   {
      $prompt = 'pass_prompt1';
      $dtmf = play_dtmf($agi, $prompt, 20, 60);
      $agi->verbose("$dtmf:$dtmf");

      $res_array['pwd'] = $dtmf;$ok = 1;$break = true;


      $agi->stream_file('say_input_cardpwd', '#');
      $agi->say_digits($dtmf);
      $break = input_confirm($agi);
      if (!$break)
      {
      $input_count ++;
      if ($input_count >=3) $break = true;
      }
      else { $res_array['pwd'] = $dtmf;  $ok = 1; }
   }while( ! $break);

   $res_array['res'] = $ok;

   return $res_array;

}



/**
 *funcion name : get_input_caller
 *    params
 *      param1: $agi
 *    result: $res_array
 *      1 $res_array['res']      1:ok else error
 *      2 $res_array['caller']
 */
function get_input_caller($agi)
{
   #please input caller
   $break = false;
   $input_count = 0;
   $ok = 0;
   $res_array = array();
   do
   {
      $prompt = 'callerid_prompt1';
      $dtmf = play_dtmf($agi, $prompt, 12, 60);
      $agi->verbose("callerid_prompt:$dtmf");
      if(trim($dtmf) == '')
      {
          $input_count++;
          if($input_count >= 3)
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
         else
         {$res_array['caller'] = $dtmf;$ok = 1;}
      }

   }while( ! $break);

   $res_array['res'] = $ok;

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
      $dtmf = play_dtmf($agi, $prompt, 12, 60);
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
function get_input_direct_pwd($agi, $prompt)
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
      $input_count++;
      if(trim($dtmf) != '')
      {
         $res_array['pwd'] = $dtmf;$ok = 1;$break = true;
      }
      else
      {
         if($input_count >= 3)
            $break = true;
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
   if( ! $input_confirm)
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
   $year = substr($date, 0, 4);
   $month = substr($date, 5, 2);
   $day = substr($date, 8, 2);


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
   $year = substr($date, 0, 4);
   $month = substr($date, 4, 2);
   $day = substr($date, 6, 2);


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

function play_balance_cny_dtmf($agi, $balance)
{


   //$agi->verbose("play_balance_cny_dtmf:$balance");


   $variable = $agi->get_variable("CHANNEL(language)");
   $language = $variable['data'];
   $agi->verbose("language:$language");

      $agi->set_variable("CHANNEL(language)", "cn");


      list($units, $cents) = preg_split('/[.]/', sprintf('%01.2f', $balance));

      $agi->verbose("units:$units");
      $agi->verbose("cents:$cents");
      
      $dot = 'letters/dot';
      $dollar = 'letters/dollar';


      $res_dtmf = $agi->get_data('vm_youhave', 1, 1);
      $dtmf = $res_dtmf["result"];
      if(trim($dtmf) != '')
      {
         //  $agi->verbose("CB_IVR_BALANCE_DTMF:$dtmf");
         $agi->set_variable("CB_IVR_BALANCE_DTMF", $dtmf);
         return 0;
      }
      
      $agi->say_number($units);
      $agi->stream_file($dot, '#');
      $agi->say_digits($cents);
      $agi->stream_file($dollar, '#');
      






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
function play_balance($agi, $balance)
{

   $language = $agi->get_variable("CHANNEL(language)");
   $agi->verbose("language:$language");


   $dot = 'letters/dot';
   $dollar = 'letters/dollar';
   
   if($balance < 0)
   {
      $str_balance = abs($balance);
      $filename = 'balanceless';
      $agi->stream_file($filename, "#");
   }
   


   $str_balance =  sprintf('%01.2f', $balance);
   $data = explode('.', $str_balance);
   $int_balance = intval($data[0]);
   $float_balance = trim($data[1]);
   if($float_balance == '')
      $float_balance = 0;


   $agi->say_number($int_balance);
   $agi->stream_file($dot, '#');
   $agi->say_digits($float_balance);
   $agi->stream_file($dollar, '#');
   
   

}




/**
 *funcion name : play_balance_en
 *    params
 *      param1: $agi
 *      param2: $balance
 *      param3: $lang
 *    result: 0
 *
 *
 */

function play_balance_en($agi, $balance, $lang)
{
   list($units, $cents) = preg_split('/[.]/', sprintf('%01.2f', $balance));

   $units_audio = 'yuan';
   $unit_audio = 'yuan';
   $agi->verbose("units:$units");
   $agi->verbose("cents:$cents");

   if($units == 0 && $cents == 0)
   {
      $agi->say_number(0);
      $agi->stream_file($unit_audio, '#');
   }
   else
   {
      if($units > 1)
      {
         $agi->say_number($units);
         $agi->stream_file($unit_audio, '#');

      }

      if($units > 0 && $cents > 0)
      {
         $agi->stream_file('vm-and', '#');
      }
      if($cents > 0)
      {
         $agi->say_digits($cents);
      }
   }


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
   //$agi->verbose('number:'.$number);
   $variable = $agi->get_variable("CHANNEL(language)");
   $language = $variable['data'];
   $agi->verbose("language:$language");
    play_balance_en($agi, $number, $language);
     return;

   if($language != 'cn')
   {
      //$number = 120.65;
      play_balance_en($agi, $number, $language);
      return;
   }

   if($balance < 0)
   {
      $filename = 'balanceless';
      $agi->stream_file($filename, "#");

    
   }
   

   list($units, $cents) = preg_split('/[.]/', sprintf('%01.2f', $balance));
   
   $agi->verbose("units:$units");
   $agi->verbose("cents:$cents");
   
   $dot = 'letters/dot';
   $dollar = 'letters/dollar';
   
   
   $res_dtmf = $agi->get_data('vm_youhave', 1, 1);
   $dtmf = $res_dtmf["result"];
   if(trim($dtmf) != '')
   {
   	//  $agi->verbose("CB_IVR_BALANCE_DTMF:$dtmf");
   	$agi->set_variable("CB_IVR_BALANCE_DTMF", $dtmf);
   	return 0;
   }
   
   $agi->say_number($units);
   $agi->stream_file($dot, '#');
   $agi->say_digits($cents);
   $agi->stream_file($dollar, '#');
   
   


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