<?php
/**
 *  filename : call.php
 *  datetime : 2011/11/25
 *  By Astgo.jin
 */
require_once("./astgo2011/include/dmdatabase.php");
require_once("./astgo2011/include/card_inc.php");
require_once("./astgo2011/include/user_inc.php");
require_once("./astgo2011/include/user_inc.php");

global $title;
$title = 'AstgoWAP';



$querycard = trim($_REQUEST['querycard']);
if ($querycard != '')
{
   gprs_querycard($querycard);
   exit;
}

$action = trim($_REQUEST['action']);
if($action == '') //wap call
{

   wap_begin();
   gprs_call();
   wap_end();
   exit;
}
else if($action == 'wap') //http call
{
    wap_begin();
    gprs_call();
    wap_end();
   exit;
}
else
{
   if($action == 'changepwd')
   {
      gprs_changepwd();
       exit;
   }
   else if ($action == 'gsmcall' )
   {
      gsmcall();
      exit;
   }
   else if($action == 'pay')
   {
         gprs_pay();
          exit;
   }
   else if($action == 'transfer')
   {
         transfer();
          exit;
   }
   else if ($action == 'addbindtel')
   {
      addbindtel();
      exit;
   }
   else if ($action == 'delbindtel')
   {
      delbindtel();
      exit;
   }
   else if ($action == 'do_page_bindtel')
   {
      do_page_bindtel();
      exit;
   }

   else  if($action != 'wap_login')
         {

            $res = check_user();
            if(check_user() != 0)
            {
               header('Location: ' . "./wap.php \n\n");
               exit;

            }


         }
      #wap web

            wap_begin();
            switch($action)
            {
               //登录动作
               case "wap_login":
                  wap_login();
                  break;
                  //主界面 显示
               case "wap_main":

                  wap_main();
                  break;

               case "wap_call":
                  wap_call_func();
                  break;

               case "do_page_call":
                  do_page_call();
                  break;

               case "wap_call_submit":
                  wap_call_submit();
                  break;

               case "wap_page_bindtel":
                  wap_page_bindtel();
                  break;

               case "wap_page_bindtel_add_submit":
                  wap_page_bindtel_add_submit();
                  break;



               case "wap_page_bindtel_edit_submit":
                  wap_page_bindtel_edit_submit();  //edit_bindtel
                  break;





               case "wap_getbalance":
                  wap_getbalance();
                  break;

               case "wap_setbalance":
                  wap_setbalance();
                  break;

               case "wap_setbalance_submit":
                  wap_setbalance_submit();
                  break;
               case "func_page_tongxun":
                  func_page_tongxun();
                  break;

               case "func_page_tongxun_edit":
                  func_page_tongxun_edit();
                  break;

               case "do_page_tongxun_edit":
                  do_page_tongxun_edit();
                  break;

               case "do_page_tongxun_delete":
                  do_page_tongxun_delete();
                  break;

               case "func_page_tongxun_add":
                  func_page_tongxun_add();
                  break;

               case "do_page_tongxun_add":
                  do_page_tongxun_add();
                  break;

               case "wap_setspeeddia":
                 wap_setspeeddia();
                 break;

               case "do_speeddia_add":
                 do_speeddia_add();
                 break;

               case "do_speeddia_del":
                 do_speeddia_del();
                 break;

               default:
                  echo "Astgo action:$action not find.<br>";
                  break;

            }
            wap_end();



}


exit;


//inc functions

/**
 * funcion name : getip
 */




function wap_begin()
{
   global $title;
   header("Content-type: text/html; charset='utf-8'");
   echo '<?xml version="1.0" encoding="UTF-8"?>';
   echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">';
   echo '<html xmlns="http://www.w3.org/1999/xhtml">';


   //echo '<link href="css/wapcss.css" rel="stylesheet" type="text/css"/>';

   echo '<head >';
   echo "<title>$title</title>";
   echo '</head>';
   echo '<body>';
   echo '<body style="text-align:center">';
   return;
}

function wap_end()
{
   echo '</body></html>';
   return;
}

function inject_check1($StrFiltrate){
   $badkey = "select| |insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile";
   if(preg_match("/$badkey/i",$StrFiltrate)){
       echo  htmlspecialchars($StrFiltrate);
       return true;
   }
   return false;

}



#检测登录状态
function check_user()
{
   global $dmdatabase;
   $res = -1;
   $acctname = trim($_REQUEST['acctname']);


   if (inject_check1($acctname)) { echo 'Security';  exit;}




   $password = (trim($_REQUEST['password']));//md5 后的
   $res_user = $dmdatabase->get_user_bindtel($acctname);
   if( ! $res_user)
   {
      $res_user = $dmdatabase->get_user_acctname($acctname);
   }
   if($res_user)
   {
      if(md5($res_user['password']) == $password)
         $res = 0;
      else
         $res = 2;
   }
   else
      $res = 1;
   return $res;
}

#登录动作
function wap_login()
{
   global $dmdatabase;

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}


   if($acctname == "" || $password == "") #登录不成功
   {
      echo "用户名或密码输入完整" . $acctname . $password . "<br/>";
      echo '<a href="index.php">返回</a><br/>';

   }
   else
   {

      $res_user = $dmdatabase->get_user_bindtel($acctname);
      if( ! $res_user)
      {
         $res_user = $dmdatabase->get_user_acctname($acctname);
      }
      if($res_user)
      {

         if($res_user['password'] == $password)
         {
            $md5password = md5($password);

            header('Location: ' . "./call.php?action=wap_main&acctname=" . $acctname . "&password=" . $md5password . "\n\n");
            exit;
         }
         else #登录不成功
         {
            echo "登录不成功,密码错误" . "<br/>";
            echo '<a href="wap.php">返回</a><br/>';

         }
      }
      else
      {
         echo "登录不成功,号码:$acctname 没有在系统中绑定." . "<br/>";
         echo '<a href="wap.php">返回</a><br/>';

      }

   }
   return;

}

function cbsubmit_filename($bindtel, $filename)
{
   global $dmdatabase;// db connection
   $res = 0;
   // query start
   $dmdatabase->MySQLQuery1->close();
   $dmdatabase->MySQLQuery1->LimitStart = -1;
   $dmdatabase->MySQLQuery1->LimitCount = -1;
   // Tatal RecordCount
   $sqlText = "insert into cbsubmit set bindname ='$bindtel',filename='$filename',calltype=3";

   $dmdatabase->MySQLQuery1->SQL = $sqlText;
   try
   {
      $dmdatabase->MySQLQuery1->open();
   }
   catch(Exception$e)
   {
      $res = "cbsubmit-> Error:" . $e->getMessage();
   }

   $dmdatabase->MySQLQuery1->close();

   return $res;


}



function cbsubmit($bindtel, $calleeid)
{
   global $dmdatabase;// db connection
   $res = 0;
   // query start
   $dmdatabase->MySQLQuery1->close();
   $dmdatabase->MySQLQuery1->LimitStart = -1;
   $dmdatabase->MySQLQuery1->LimitCount = -1;
   // Tatal RecordCount
   $sqlText = "insert into cbsubmit set bindname ='$bindtel',destination_number='$calleeid',calltype=1";

   $dmdatabase->MySQLQuery1->SQL = $sqlText;
   try
   {
      $dmdatabase->MySQLQuery1->open();
   }
   catch(Exception$e)
   {
      $res = "cbsubmit-> Error:" . $e->getMessage();
   }

   $dmdatabase->MySQLQuery1->close();

   return $res;



}


//解除绑定
function del_bindtel($bindtel, $bindtel)
{
   global $dmdatabase;// db connection
   $res = 1;

   $res_user = $dmdatabase->get_user_bindtel($bindtel);
   if( ! $res_user)
   {
      $res_user = $dmdatabase->get_user_acctname($bindtel);
   }
   if($res_user)
   {
      $res = user_del_bindtel($res_user,$bindtel);
   }
   return $res;



}

//修改绑定
function edit_bindtel($acctname, $new_bindtel)
{
   global $dmdatabase;// db connection
   $res = 1;

   $res_user =get_user($acctname);

   if($res_user)
   {
      $post_data['acctname']  = $res_user['acctname'];
      $post_data['bindtel']  = $new_bindtel;
      if ($res_user)
      {
         $res = user_edit_bindtel($res_user,$post_data);
      }
   }
   return $res;



}

//添加绑定
function add_bindtel($bindtel, $new_bindtel)
{
   global $dmdatabase;// db connection
   $res = 1;

   $res_user =get_user($bindtel);

   if($res_user)
   {
      $post_data['acctname']  = $res_user['acctname'];
      $post_data['bindtel']  = $new_bindtel;
      if ($from_user)
      {
         $res = user_add_bindtel($from_user,$post_data);
      }
   }
   return $res;



}


#get acct_user
function get_air_bindmd5($agent_id)
{
   global $dmdatabase;
   $res_array = array();
   	        $dmdatabase->MySQLQuery2->close();
            $dmdatabase->MySQLQuery2->LimitStart = 0;
            $dmdatabase->MySQLQuery2->LimitCount = 1;
            // Tatal RecordCount
            $sqlText = "select  acctname,balance,discharge_level,air_bindmd5 from  acct where id ='$agent_id' AND enable='1'";
            $dmdatabase->MySQLQuery2->SQL = $sqlText;
            try
            {
               $dmdatabase->MySQLQuery2->open();
               if($dmdatabase->MySQLQuery2->RecordCount >= 1)
                 $res_array = $dmdatabase->MySQLQuery2->Fields;
            }
            catch(Exception$e)
            {
               $res_array = array();
            }
            $dmdatabase->MySQLQuery2->close();

    return  $res_array;


}





#get acct_user
function get_user($bindtel)
{
   global $dmdatabase;
   $res_user = $dmdatabase->get_user_bindtel($bindtel);
   if( ! $res_user)
   {
      $res_user = $dmdatabase->get_user_acctname($bindtel);
   }
   if( ! $res_user)
   {
   	        $dmdatabase->MySQLQuery2->close();
            $dmdatabase->MySQLQuery2->LimitStart = -1;
            $dmdatabase->MySQLQuery2->LimitCount = -1;
            // Tatal RecordCount
            $sqlText = "select  value from  pub_config where name ='CB_ANY_CALL_ACCTNAME'";
            $dmdatabase->MySQLQuery2->SQL = $sqlText;
            try
            {
               $dmdatabase->MySQLQuery2->open();
               $res_array = $dmdatabase->MySQLQuery2->Fields;
               $bindtel1 =  $res_array['value'];
               $dmdatabase->MySQLQuery2->close();


            }
            catch(Exception$e)
            {
               $bindtel1 =  '8000';
            }

            $res_user = $dmdatabase->get_user_acctname($bindtel1);
   }
   if($res_user)
   {

      $acctname = $res_user['acctname'];
      $res_agent = $dmdatabase->get_agent_id($res_user['agent_id']);
      $res_user['limitbindtel'] = $res_agent['limitbindtel'];
      $bindtel_count = 0;
      if (trim($res_user['tranfer_callee1']) !="") $bindtel_count ++   ;
      if (trim($res_user['tranfer_callee2']) !="") $bindtel_count ++   ;
      if (trim($res_user['tranfer_callee3']) !="") $bindtel_count ++   ;
      if (trim($res_user['tranfer_callee4']) !="") $bindtel_count ++   ;
      if (trim($res_user['tranfer_callee5']) !="") $bindtel_count ++   ;
      if (trim($res_user['tranfer_callee6']) !="") $bindtel_count ++   ;
      $res_user['bindtel_count'] = $bindtel_count;


   }
   return $res_user;

}
//修改密码
// $post_data['caller'] ['pwd']['newpwd']
function rename_user_pwd($post_data)
{

   $res = 0;
   $caller = trim($post_data['caller']);
   $pwd = trim($post_data['pwd']);
   $newpwd = trim($post_data['newpwd']);

   if($newpwd == '')
      $res = 'ERR3';
   else
   {
      $res_user = get_user($caller);
      if($res_user)
      {
         if($res_user['password'] == $pwd)
         {
            global $dmdatabase;
            $acctname = $res_user['acctname'];

            $dmdatabase->MySQLQuery1->close();
            $dmdatabase->MySQLQuery1->LimitStart = -1;
            $dmdatabase->MySQLQuery1->LimitCount = -1;
            // Tatal RecordCount
            $sqlText = "update acct_user set password='$newpwd' where acctname='$acctname'";

            $dmdatabase->MySQLQuery1->SQL = $sqlText;
            try
            {
               $dmdatabase->MySQLQuery1->open();
               $dmdatabase->MySQLQuery1->close();
               $res = 1;
            }
            catch(Exception$e)
            {
               $res = 'ERR3';
            }

         }
         else
            $res = 'ERR1';
      }
      else
         $res = 'ERR2';
   }

   return $res;

}

function callback_book_add($post_data)
{

   global $dmdatabase;
   $res = 1;
   $cur_acctname = $post_data['acctname'];

   $name = $post_data['name'];
   $tel = $post_data['tel'];
   $id = $post_data['id'];

   $res_user = $dmdatabase->get_user_bindtel($cur_acctname);
   if( ! $res_user)
   {
      $res_user = $dmdatabase->get_user_acctname($cur_acctname);
   }
   if($res_user)
   {
      $acctname = $res_user['acctname'];
      // query start
      $dmdatabase->MySQLQuery1->close();
      $dmdatabase->MySQLQuery1->LimitStart = -1;
      $dmdatabase->MySQLQuery1->LimitCount = -1;
      // Tatal RecordCount
      $sqlText = "insert into  callback_book set acctname='$acctname', name='$name',tel='$tel'";

      $dmdatabase->MySQLQuery1->SQL = $sqlText;
      try
      {
         $dmdatabase->MySQLQuery1->open();
         $res = 0;
      }
      catch(Exception$e)
      {
         $res = "callback_book_add-> Error:" . $e->getMessage();
      }
      $dmdatabase->MySQLQuery1->close();

   }
   return $res;



}

function callback_book_delete($post_data)
{

   global $dmdatabase;
   $res = 1;
   $cur_acctname = $post_data['acctname'];

   $name = $post_data['name'];
   $tel = $post_data['tel'];
   $id = $post_data['id'];

   $res_user = $dmdatabase->get_user_bindtel($cur_acctname);
   if( ! $res_user)
   {
      $res_user = $dmdatabase->get_user_acctname($cur_acctname);
   }
   if($res_user)
   {
      $acctname = $res_user['acctname'];
      // query start
      $dmdatabase->MySQLQuery1->close();
      $dmdatabase->MySQLQuery1->LimitStart = -1;
      $dmdatabase->MySQLQuery1->LimitCount = -1;
      // Tatal RecordCount
      $sqlText = "DELETE from callback_book where id ='$id' and  acctname='$acctname'";

      $dmdatabase->MySQLQuery1->SQL = $sqlText;
      try
      {
         $dmdatabase->MySQLQuery1->open();
         $res = 0;
      }
      catch(Exception$e)
      {
         $res = "callback_book_delete-> Error:" . $e->getMessage();
      }
      $dmdatabase->MySQLQuery1->close();

   }



   return $res;

}

function callback_book_edit($post_data)
{
   global $dmdatabase;
   $res = 0;
   $name = $post_data['name'];
   $tel = $post_data['tel'];
   $id = $post_data['id'];

   // query start
   $dmdatabase->MySQLQuery1->close();
   $dmdatabase->MySQLQuery1->LimitStart = -1;
   $dmdatabase->MySQLQuery1->LimitCount = -1;
   // Tatal RecordCount
   $sqlText = "update callback_book set name='$name',tel='$tel'  where id ='$id'";

   $dmdatabase->MySQLQuery1->SQL = $sqlText;
   try
   {
      $dmdatabase->MySQLQuery1->open();
   }
   catch(Exception$e)
   {
      $res = "callback_book_edit-> Error:" . $e->getMessage();
   }
   $dmdatabase->MySQLQuery1->close();
   return $res;



}

function get_callback_book($id)
{
   global $dmdatabase;
   $res_array = array();
   // query start
   $dmdatabase->MySQLQuery1->close();
   $dmdatabase->MySQLQuery1->LimitStart = 0;
   $dmdatabase->MySQLQuery1->LimitCount = 1;
   // Tatal RecordCount
   $sqlText = "SELECT * FROM callback_book WHERE id='$id'";

   $dmdatabase->MySQLQuery1->SQL = $sqlText;
   $dmdatabase->MySQLQuery1->open();
   $res_array = $dmdatabase->MySQLQuery1->Fields;
   $dmdatabase->MySQLQuery1->close();
   return $res_array;

}

function get_callback_books($bindtel)
{
   global $dmdatabase;
   $res_array = array();
   $res = -1;
   $bindtel = trim($_REQUEST['acctname']);

   if (inject_check1($bindtel)) { echo 'Security';  exit;}

   $password = trim($_REQUEST['password']);//md5 后的
   $res_user = $dmdatabase->get_user_bindtel($bindtel);
   if( ! $res_user)
   {
      $res_user = $dmdatabase->get_user_acctname($bindtel);
   }
   if($res_user)
   {
      $acctname = $res_user['acctname'];
      // query start
      $dmdatabase->MySQLQuery1->close();
      $dmdatabase->MySQLQuery1->LimitStart = 0;
      $dmdatabase->MySQLQuery1->LimitCount = 30;
      // Tatal RecordCount
      $sqlText = " SELECT * FROM callback_book WHERE acctname=$acctname";

      $dmdatabase->MySQLQuery1->SQL = $sqlText;
      try
      {
         $dmdatabase->MySQLQuery1->open();
         $RecordCount = $dmdatabase->MySQLQuery1->RecordCount;
         for($i = 0; $i < $RecordCount; $i++)
         {
            $Fields_array = $dmdatabase->MySQLQuery1->Fields;
            array_push($res_array, $Fields_array);
            $dmdatabase->MySQLQuery1->Next();
         }

      }
      catch(Exception$e)
      {
         $res = "cbsubmit-> Error:" . $e->getMessage();
      }

      $dmdatabase->MySQLQuery1->close();

   }
   return $res_array;

}

###############################################################################
// http 报警放音
function gprs_alarm()
{
   global $dmdatabase;
   $res = 0;

   $password = trim($_REQUEST['password']);
   $caller = trim($_REQUEST['caller']);
   //$callee = trim($_REQUEST['callee']);
   $filename   = trim($_REQUEST['filename']);



   if($caller == '')
      $caller = trim($_REQUEST['a']);
   if($callee == '')
      $callee = trim($_REQUEST['b']);
   if($password == '')
      $password = trim($_REQUEST['p']);

   if($caller == '')
      $caller = trim($_REQUEST['callA']);
   if($callee == '')
      $callee = trim($_REQUEST['callB']);

   if($caller == '')
      $caller = trim($_REQUEST['calla']);
   if($callee == '')
      $callee = trim($_REQUEST['callb']);


     if (inject_check1($caller)) { echo 'Security';  exit;}


      if($filename != '')
      {
         $res = cbsubmit_filename($caller, $filename);
         if($res == 0)
            $res = 1;
         else
            $res = 'ERR3';
      }
      else $res = 'ERR1';



   echo $res;

}

//http 查询卡
function gprs_querycard($cardname)
{
   $res  = -1;
   $res_card = card_get_name($cardname);
   if ($res_card)
   {
      $res = $res_card['vouchered'] .':'.$res_card['balance'];
   }
   echo $res;


}

//http   节费手机提交
function gprs_call()
{

   global $dmdatabase;
   $res = 0;

   $password = trim($_REQUEST['password']);
   $caller = trim($_REQUEST['caller']);
   $callee = trim($_REQUEST['callee']);

   if($caller == '')
      $caller = trim($_REQUEST['a']);
   if($callee == '')
      $callee = trim($_REQUEST['b']);
   if($password == '')
      $password = trim($_REQUEST['p']);

   if($caller == '')
      $caller = trim($_REQUEST['callA']);
   if($callee == '')
      $callee = trim($_REQUEST['callB']);

   if($caller == '')
      $caller = trim($_REQUEST['calla']);
   if($callee == '')
      $callee = trim($_REQUEST['callb']);


   if($caller == '')
      $caller = trim($_REQUEST['k']);
   if($callee == '')
      $callee = trim($_REQUEST['m']);


   if($caller == '')
      $caller = trim($_REQUEST['account']);
   if($callee == '')
      $callee = trim($_REQUEST['callee']);


   if($caller == '')
      $caller = trim($_REQUEST['UserID']);
   if($callee == '')
      $callee = trim($_REQUEST['Called']);




   if (inject_check1($caller)) { echo 'Security';  exit;}


   if (trim($caller) != '')
   {
   	   $res_user = get_user($caller);
      if($res_user)
      {
      if($callee != '')
      {
         $res = cbsubmit($caller, $callee);
         if($res == 0)
            $res = 1;
         else
            $res = 'ERR3';
      }
      else //查询余额
      {
         $balance = $res_user['balance'];
         $balance = round($balance, 2);
         $res = $balance . "#". $res_user['expireddate'];
      }
       }
       else
      $res = 'ERR2';
   }

   echo $res;
   exit;
}

function do_page_bindtel()
{

   global $dmdatabase;
   $res = -1;
   $bindtel = trim($_REQUEST['bindtel']);
   $caller = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);
   if ( $password == '') { echo 'password Security';  exit;}




   if ($caller == '')
      $caller = trim($_REQUEST['caller']);

   if (inject_check1($caller)) { echo 'Security';  exit;}
   if (inject_check1($password)) { echo 'Security';  exit;}


   $post_data = array();
   $from_user = get_user($caller);
   if ($from_user)
   {
       $res_array = get_air_bindmd5($from_user['$agent_id']);
       $air_bindmd5 = $res_array['air_bindmd5'];

       if ( trim($from_user['password']) == trim($password)   || (trim($air_bindmd5) == trim($password)))
       {
         user_clear_bindtel($from_user,$from_user['acctname']);
         //user_del_bindtel($from_user,$bindtel);

         $post_data = array();

         $post_data['acctname']  = $from_user['acctname'];
         $post_data['bindtel']  = $bindtel;
         user_add_bindtel($from_user,$post_data);
         $res = 1;
       }
       else $res = -3;


   }
   else $res = -2;
   echo $res;


}

function delbindtel()
{
  //user_add_bindtel
   global $dmdatabase;
   $res = -1;
   $bindtel = trim($_REQUEST['bindtel']);
   $caller = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);
   if ($caller == '')
      $caller = trim($_REQUEST['caller']);

   if (inject_check1($caller)) { echo 'Security';  exit;}
   if ( $password == '') { echo 'password Security';  exit;}
   if (inject_check1($password)) { echo 'Security';  exit;}

   $post_data = array();
   $from_user = get_user($caller);
   if ($from_user)
   {
       $res_array = get_air_bindmd5($from_user['$agent_id']);
       $air_bindmd5 = $res_array['air_bindmd5'];

       if ( trim($from_user['password']) == trim($password)   || (trim($air_bindmd5) == trim($password)))
       {
           $res = user_del_bindtel($from_user,$bindtel);
        }
        else $res = -3;
   }
   else $res = -2;
   echo $res;
}

function addbindtel()
{

  //user_add_bindtel
   global $dmdatabase;
   $res = -1;

   $bindtel = trim($_REQUEST['bindtel']);
   $caller = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);
   if ($caller == '')
      $caller = trim($_REQUEST['caller']);

   if (inject_check1($caller)) { echo 'Security';  exit;}

   if ( $password == '') { echo 'password Security';  exit;}
  
   $post_data = array();
   $from_user = get_user($caller);
   $post_data['acctname']  = $from_user['acctname'];
   $post_data['bindtel']  = $bindtel;
   if ($from_user)
   {
       $res_array = get_air_bindmd5($from_user['$agent_id']);
       $air_bindmd5 = $res_array['air_bindmd5'];

       if ( trim($from_user['password']) == trim($password)   || (trim($air_bindmd5) == trim($password)))

      {
         user_del_bindtel($from_user,$bindtel);
         $res = user_add_bindtel($from_user,$post_data);
      }
      else $res = -3;
   }
   else $res = -2;
   echo $res;

}
//caller=%s&balance=%s&callee

function transfer()
{
   global $dmdatabase;
   $res = -1;

   $callee = trim($_REQUEST['callee']);
   $caller = trim($_REQUEST['caller']);
   $balance = floatval($_REQUEST['balance']);
   $password = trim($_REQUEST['password']);

    // $post_data['acctname']; $post_data['to_acctname']; $post_data['balance'];
   $post_data = array();

   $post_data['balance'] = $balance;

   if (inject_check1($caller)) { echo 'Security';  exit;}
   if ( $password == '') { echo 'password Security';  exit;}
   
   $from_user = get_user($caller);
   $post_data['acctname']  = $from_user['acctname'];
   if ($from_user)
   {
      $to_user = get_user($callee);
      if ($to_user)
      {

         $res_array = get_air_bindmd5($from_user['$agent_id']);
         $air_bindmd5 = $res_array['air_bindmd5'];

         if ( trim($from_user['password']) == trim($password)   || (trim($air_bindmd5) == trim($password)))
         {
            $post_data['to_acctname']  = $to_user['acctname'];
            if ( $post_data['acctname']  !='' && $post_data['to_acctname'] != '')
            {
               $res = user_balance_transfer($from_user,$post_data);
            }
            else $res = -5;
         }
         else $res = -4;
      }
      else $res = -3;
   }
   else $res = -2;
   echo $res;


}
function gsmcall()
{
   global $dmdatabase;
   $res = 0;

   $password = trim($_REQUEST['password']);


   $caller = trim($_REQUEST['caller']);
   $callee = trim($_REQUEST['callee']);

   if($caller == '')
      $caller = trim($_REQUEST['a']);
   if($callee == '')
      $callee = trim($_REQUEST['b']);
   if($password == '')
      $password = trim($_REQUEST['p']);

   if($caller == '')
      $caller = trim($_REQUEST['callA']);
   if($callee == '')
      $callee = trim($_REQUEST['callB']);

   if($caller == '')
      $caller = trim($_REQUEST['calla']);
   if($callee == '')
      $callee = trim($_REQUEST['callb']);


   if($caller == '')
      $caller = trim($_REQUEST['k']);

   if($callee == '')
      $callee = trim($_REQUEST['m']);

   if (inject_check1($caller)) { echo 'Security';  exit;}

   $res_user = get_user($caller);
   if($res_user)
   {
         $res = cbsubmit($caller, $callee);
         if($res == 0)
            $res = 1;
         else
            $res = 'ERR3';
   }
   else
      $res = 'ERR2';
   echo $res;
}
function gprs_changepwd()
{
   $post_data = array();
   $post_data['caller'] = trim($_REQUEST['caller']);
   $post_data['pwd'] = trim($_REQUEST['pwd']);
   $post_data['newpwd'] = trim($_REQUEST['newpwd']);

   if (inject_check1($post_data['caller'])) { echo 'Security';  exit;}
   if (inject_check1($post_data['pwd'])) { echo 'Security';  exit;}
   if (inject_check1($post_data['newpwd'])) { echo 'Security';  exit;}

   echo rename_user_pwd($post_data);



}

function gprs_pay()
{
   $res = 1;
   $password = trim($_REQUEST['password']);
   $caller = trim($_REQUEST['caller']);
   $cardid = trim($_REQUEST['cardid']);
   $cardpwd = trim($_REQUEST['cardpwd']);

   if (inject_check1($caller)) { echo 'Security';  exit;}
   if (inject_check1($cardid)) { echo 'Security';  exit;}
   if (inject_check1($cardpwd)) { echo 'Security';  exit;}



   if($cardid == "" && $cardpwd == "" && $caller == "")
   {
      $res = 'ERR4';
   }
   else
   {
      $acct = array();
      if ($cardid == '')
      {
         $res_card =  card_get_pwd($cardpwd);
         $cardid = $res_card['cardname'];
      }

      $res_voucher = card_voucher($acct, $cardid, $cardpwd, $caller, '');
      if($res_voucher['res'] == 0)
      {
         //['balance'] ['giftbalance']  ['acctname']
         $balance = $res_voucher['totalbalance'];
         $balance = round($balance, 2);
         //$res = $balance;
      }
      else
      {
         $res = 'ERR' . $res_voucher['res'];
      }
   }

   echo $res;

}




#wap
################################################################################
#wap_call_submit
function wap_call_submit()
{
   $caller = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);//md5
   $dest = trim($_REQUEST['dest']);

   if (inject_check1($caller)) { echo 'Security';  exit;}

   if(trim($dest) != '')
   {
      $res = cbsubmit($caller, $dest);
      if($res == 0)
      {
         echo "呼叫成功<br/>";
         echo '<a href="call.php?action=wap_main&acctname=' . $caller . '&password=' . $password . '">返回</a><br/>';

      }
      else
      {
         echo "呼叫失败<br/>";
         echo '<a href="call.php?action=wap_main&acctname=' . $caller . '&password=' . $password . '">返回</a><br/>';
      }

   }
   else
   {
      echo "请输入完整的呼叫信息:$acctname-$dest<br/>";
      echo '<a href="call.php?action=wap_main&acctname=' . $caller . '&password=' . $password . '">返回</a><br/>';

   }
}


function do_page_call()
{

   $caller = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);//md5
   $dest = trim($_REQUEST['dest']);

   if (inject_check1($caller)) { echo 'Security';  exit;}

   if(trim($dest) != '')
   {
      $res = cbsubmit($caller, $dest);
      if($res == 0)
      {
         echo "呼叫成功<br/>";
         echo '<a href="call.php?action=wap_main&acctname=' . $caller . '&password=' . $password . '">返回</a><br/>';

      }
      else
      {
         echo "呼叫失败<br/>";
         echo '<a href="call.php?action=wap_main&acctname=' . $caller . '&password=' . $password . '">返回</a><br/>';
      }

   }
   else
   {
      echo "请输入完整的呼叫信息:$acctname-$dest<br/>";
      echo '<a href="call.php?action=wap_main&acctname=' . $caller . '&password=' . $password . '">返回</a><br/>';

   }

}
#发起呼叫界面
function wap_call_func()
{

   $acctname = trim($_REQUEST['acctname']);//主叫号码
   $password = trim($_REQUEST['password']);/*md5密码*/

   if (inject_check1($acctname)) { echo 'Security';  exit;}


   echo '<form action="call.php?action=wap_call_submit&acctname=' . $acctname . '&password=' . $password . '" method="post">';

   echo "您要呼叫的号码:<br/>" . '<input name="dest" emptyok="true" tabindex="1" format="*N" value=""  /> <br/>';
   echo '<input type="submit" value="呼叫"/><br/></p></form>';
   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回主菜单</a><br/>';
   echo '<a href="call.php?action=func_page_tongxun&acctname=' . $acctname . '&password=' . $password . '">返回通讯录&nbsp;</a>';

}

function wap_getbalance()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}

   $res_user = get_user($acctname);
   $balance = $res_user['balance'];
   $bindtel_count = $res_user['bindtel_count'];
   $balance = round($balance, 2);
   $expireddate = $res_user['expireddate'];

   echo '账户余额:' . $balance . ' 元<br/>';
   echo '有效期至:' . $expireddate . ' <br/>';
   echo '绑定电话:' . $bindtel_count . '部 <br/>';
   echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';
   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回主菜单</a><br/>';

}

function wap_setbalance()
{

   $acctname = trim($_REQUEST['acctname']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}

   $password = trim($_REQUEST['password']);

   echo "$title<br/>";
   echo '<br/>';

   echo '<form action="call.php?action=wap_setbalance_submit&acctname=' . $acctname . '&password=' . $password . '" method="post">';
   echo "卡号:<br/>" . '<input name="cardacctname" emptyok="true" tabindex="1" format="*N" value="" /> <br/>';
   echo "密码:<br/>" . '<input name="cardpassword" emptyok="true" tabindex="2" format="*N" value="" /> <br/>';
   echo "手机号:<br/>" . '<input name="acctname" emptyok="true" tabindex="1" format="*N" value="' . $acctname . '" /> <br/>';

   echo '<input type="submit" value="充值"/><br/></p></form>';
    echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';

   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回主菜单</a><br/>';

}

function wap_setbalance_submit()
{

   $acctname = trim($_REQUEST['acctname']);



   $password = trim($_REQUEST['password']);

   $cardid = trim($_REQUEST['cardacctname']);
   $cardpwd = trim($_REQUEST['cardpassword']);


   if (inject_check1($acctname)) { echo 'Security';  exit;}
   if (inject_check1($cardid)) { echo 'Security';  exit;}
   if (inject_check1($cardpwd)) { echo 'Security';  exit;}


   if($cardid == "" || $cardpwd == "")
   {
      echo "充值失败。请输入完整的充值卡和账号" . "<br/>";
      echo '<a href="wap.php">返回</a><br/>';

   }
   else
   {
      $acct = array();
      $res_voucher = card_voucher($acct, $cardid, $cardpwd, $acctname, '');
      if($res_voucher['res'] == 0)
      {
         //['balance'] ['giftbalance']  ['acctname']
         $balance = $res_voucher['balance'];
         $balance = round($balance, 2);

         $giftbalance = $res_voucher['giftbalance'];
         $giftbalance = round($giftbalance, 2);

         $res_user = get_user($acctname);
         $acctbalance = $res_user['balance'];
         $acctbalance = round($acctbalance, 2);

         if($giftbalance > 0)
            $info = "号码:" . $bindtel . "充值成功!,充值金额:" . $balance . "元 赠送金额:" . $giftbalance . "元<br/>" . " 账户余额:$acctbalance<br/>";
         else
            $info = "号码:" . $bindtel . "充值成功!,充值金额:" . $balance . "元<br/>" . " 账户余额:$acctbalance<br/>";
      }
      else
      {
         $info = "号码:" . $bindtel . "充值失败,返回结果:" . $res_voucher['res'] . "<br/>";
      }
   }

   echo $info;
   echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';

   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回主菜单</a><br/>';




}




function wap_page_bindtel()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);


   if (inject_check1($acctname)) { echo 'Security';  exit;}


   $res_user = get_user($acctname);

   $bindtel_count = $res_user['bindtel_count'];//当前邦定号码数量
   $limitbindtel = $res_user['limitbindtel'];//代理最大绑定号码数量
   $bindtel  =  $res_user['tranfer_callee1'];


   echo "$title<br/>";
   echo '<br/>';

   if($bindtel_count < $limitbindtel)
   {
     echo '<form action="call.php?action=wap_page_bindtel_add_submit&acctname=' . $acctname . '&password=' . $password . '" method="post">';
     echo "追加绑定电话:<br/>" . '<input name="bindtel" emptyok="true" tabindex="1" format="*N" value="" /> <br/>';
     echo '<input type="submit" value="追加"/><br/></p></form>';

     echo '<br/>';
   }
   echo '<form action="call.php?action=wap_page_bindtel_edit_submit&acctname=' . $acctname . '&password=' . $password . '" method="post">';
   echo "修改绑定电话:<br/>" . '<input name="bindtel" emptyok="true" tabindex="1" format="*N" value="'.$bindtel .'" /> <br/>';
   echo '<input type="submit" value="修改"/><br/></p></form>';

   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回主菜单</a><br/>';





}

function wap_page_bindtel_add_submit()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);
   $bindtel = trim($_REQUEST['bindtel']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}
   if (inject_check1($bindtel)) { echo 'Security';  exit;}


   echo "$title<br/>";
   echo '<br/>';
   echo '<br/>';

   $res = add_bindtel($acctname, $bindtel);
   if($res == 0)
      echo "绑定号码:$bindtel 成功<br/>";
   else
      echo "绑定号码:$bindtel 失败:$res<br/>";

   echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';
   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回主菜单</a><br/>';





}

function wap_page_bindtel_edit_submit()  //edit_bindtel
{
   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);
   $bindtel = trim($_REQUEST['bindtel']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}
   if (inject_check1($bindtel)) { echo 'Security';  exit;}

   echo "$title<br/>";
   echo '<br/>';
   echo '<br/>';

   $res = edit_bindtel($acctname, $bindtel);
   if($res == 0)
      echo "修改绑定号码:$bindtel 成功<br/>";
   else
      echo "修改绑定号码:$bindtel 失败:$res<br/>";

   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回</a><br/>';


}





function wap_main()
{

   $acctname = trim($_REQUEST['acctname']);//主叫号码
   $password = trim($_REQUEST['password']);/*md5密码*/

   if (inject_check1($acctname)) { echo 'Security';  exit;}


   echo "$title<br/>";

   $res_user = get_user($acctname);

   $bindtel_count = $res_user['bindtel_count'];//当前邦定号码数量
   $limitbindtel = $res_user['limitbindtel'];//代理最大绑定号码数量

   $balance = $res_user['balance'];
   $balance = round($balance, 2);
   $expireddate = $res_user['expireddate'];

   echo "$acctname 余额:" . $balance . '元<br/>';
   echo '<br/>';

   echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';
   echo '<br/>';

   echo '<a href="call.php?action=func_page_tongxun&acctname=' . $acctname . '&password=' . $password . '">通讯录</a><br/>';
   echo '<br/>';

   echo '<a href="call.php?action=wap_getbalance&acctname=' . $acctname . '&password=' . $password . '">账户信息</a><br/>';
   echo '<br/>';

   echo '<a href="call.php?action=wap_setbalance&acctname=' . $acctname . '&password=' . $password . '">充值开户</a><br/>';
   echo '<br/>';

   echo '<a href="call.php?action=wap_setspeeddia&acctname=' . $acctname . '&password=' . $password . '">短号码</a><br/>';
   echo '<br/>';

  // echo '<a href="call.php?action=wap_setbtobtel&acctname=' . $acctname . '&password=' . $password . '">亲情号码</a><br/>';
  // echo '<br/>';


   {
     echo '<a href="call.php?action=wap_page_bindtel&acctname=' . $acctname . '&password=' . $password . '">修改绑定电话</a><br/>';
     echo '<br/>';
   }

   echo '<a href="wap.php">退出</a><br/>';

}

function func_page_tongxun()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);


   if (inject_check1($acctname)) { echo 'Security';  exit;}

   echo "$acctname 的通讯录<br/>";
   $res_array = get_callback_books($acctname);//$res_array[recordcount]
   for($i = 0; $i < count($res_array); $i++)
   {
      $name = $res_array[$i]['name'];
      $tel = $res_array[$i]['tel'];
      $id = $res_array[$i]['id'];

      echo $name . "[" . $tel . "]";
      echo '<a href="call.php?action=do_page_call&acctname=' . $acctname . '&dest=' . $tel . '&password=' . $password . '">呼叫</a>&nbsp;';
      echo '<a href="call.php?action=func_page_tongxun_edit&id=' . $id . '&acctname=' . $acctname . '&password=' . $password . '">修改</a>&nbsp;';
      echo '<a href="call.php?action=do_page_tongxun_delete&id=' . $id . '&acctname=' . $acctname . '&password=' . $password . '">删除</a><br/>';

   }
   echo '<a href="call.php?action=func_page_tongxun_add&acctname=' . $acctname . '&password=' . $password . '">添加</a>&nbsp;<br/>';
   echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';
   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回</a><br/>';

}

function func_page_tongxun_edit()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}

   $id = intval(trim($_REQUEST['id']));
   $res_array = get_callback_book($id);

   echo '<form action="call.php?action=do_page_tongxun_edit&id=' . $id . '&acctname=' . $acctname . '&password=' . $password . '" method="post">';
   echo "姓名:<br/>" . '<input name="bookname" emptyok="true" tabindex="1" value="' . $res_array['name'] . '" /> <br/>';
   echo "电话:<br/>" . '<input name="booktel" emptyok="true" tabindex="2" format="*N" value="' . $res_array['tel'] . '" /> <br/>';
   echo '<input type="submit" value="提交"/><br/></p></form>';
   echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';
   echo '&nbsp;<a href="call.php?action=func_page_tongxun&acctname=' . $acctname . '&password=' . $password . '">返回</a>';

}

function do_page_tongxun_edit()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);
   $bookname = trim($_REQUEST['bookname']);
   $booktel = trim($_REQUEST['booktel']);
   $id = intval(trim($_REQUEST['id']));

   if (inject_check1($acctname)) { echo 'Security';  exit;}


   $post_data['id'] = $id;
   $post_data['tel'] = $booktel;
   $post_data['name'] = $bookname;

   $res = callback_book_edit($post_data);

   if($res == 0)
   {
      header('Location: ' . "./call.php?action=func_page_tongxun&acctname=" . $acctname . "&password=" . $password . "\n\n");
   }
   else
   {
      echo "修改通讯录失败$sql<br/>";
      echo '<a href="call.php?action=func_page_tongxun&acctname=' . $acctname . '&password=' . $password . '">返回&nbsp;</a>';
      echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';
      echo '<a href="call.php?action=page_main&acctname=' . $acctname . '&password=' . $password . '">首页</a><br/>';
   }



}

function do_page_tongxun_delete()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}

   $id = intval(trim($_REQUEST['id']));
   $bookname = trim($_REQUEST['bookname']);
   $booktel = trim($_REQUEST['booktel']);

   $post_data = array();
   $post_data['id'] = $id;
   $post_data['acctname'] = $acctname;
   $post_data['name'] = $bookname;
   $post_data['tel'] = $booktel;
   callback_book_delete($post_data);
   header('Location: ' . "./call.php?action=func_page_tongxun&acctname=" . $acctname . "&password=" . $password . "\n\n");

}

function func_page_tongxun_add()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}

   $id = intval(trim($_REQUEST['id']));

   echo '<form action="call.php?action=do_page_tongxun_add&acctname=' . $acctname . '&password=' . $password . '&id=' . $id . '" method="post">';
   echo "姓名:<br/>" . '<input name="bookname" emptyok="true" tabindex="1"  value="" /> <br/>';
   echo "电话:<br/>" . '<input name="booktel" emptyok="true" tabindex="2" format="*N" value="" /> <br/>';
   echo '<input type="submit" value="提交"/><br/></p></form>';
   echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';
   echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回</a><br/>';

}
function do_page_tongxun_add()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}

   $id = intval(trim($_REQUEST['id']));
   $bookname = trim($_REQUEST['bookname']);
   $booktel = trim($_REQUEST['booktel']);

   $post_data = array();
   $post_data['id'] = $id;
   $post_data['acctname'] = $acctname;
   $post_data['name'] = $bookname;
   $post_data['tel'] = $booktel;
   $res = callback_book_add($post_data);
   if($res == 0)
      header('Location: ' . "./call.php?action=func_page_tongxun&acctname=" . $acctname . "&password=" . $password . "\n\n");
   else
   {
      echo "添加通讯录失败<br/>";
      echo '<a href="call.php?action=func_page_tongxun&acctname=' . $acctname . '&password=' . $password . '">返回&nbsp;</a>';
      echo '<a href="call.php?action=wap_call&acctname=' . $acctname . '&password=' . $password . '">拨打电话</a><br/>';
      echo '<a href="call.php?action=page_main&acctname=' . $acctname . '&password=' . $password . '">首页</a><br/>';
   }

}




function wap_setspeeddia()
{
   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}

   $res_user = get_user($acctname);
   if ($res_user)
   {

      echo '<form action="call.php?action=do_speeddia_add&acctname=' . $acctname . '&password=' . $password . '" method="post">';
      echo "电话号码:<br/>" . '<input name="destination_number" emptyok="true" tabindex="1"  value="" /> <br/>';
      echo "对应短号:<br/>" . '<input name="dest" emptyok="true" tabindex="2" format="*N" value="" /> <br/>';
      echo '<input type="submit" value="添加"/><br/></p></form>';
      echo '<a href="call.php?action=wap_main&acctname=' . $acctname . '&password=' . $password . '">返回</a><br/>';


      $cur_page = 1;
      $order = 'id';
      $limitcount = 20;
      $outfile = '';
      $post_data = array();
      $accountcode = $res_user['acctname'];

      $post_data['agent_id'] = $res_user['agent_id'];



      $res_array = user_speeddial_QueryList($accountcode, $cur_page,$order, $limitcount,$post_data,$outfile);
      $speeddials = $res_array['array'];
      for($i = 0; $i < count($speeddials); $i++)
      {
          $id  =  $speeddials[$i]['id'];
          $tel  = $speeddials[$i]['destination_number'];
          $dest = $speeddials[$i]['dest'];

          echo "$tel -> $dest  ";
          echo '<a href="call.php?action=do_speeddia_del&id=' . $id . '&acctname=' . $acctname . '&password=' . $password . '">删除</a><br/>';

      }
   }
   else
      {
         echo "登录不成功,号码:$acctname 没有在系统中绑定." . "<br/>";
         echo '<a href="wap.php">返回</a><br/>';

      }

   //function user_speeddial_QueryList($acctname, $cur_page, $order, $limitcount, $post_data, $outfile)

}

function do_speeddia_add()
{
   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);


   $destination_number = trim($_REQUEST['destination_number']);
   $dest = trim($_REQUEST['dest']);



   if (inject_check1($acctname)) { echo 'Security';  exit;}
   if (inject_check1($destination_number)) { echo 'Security';  exit;}
   if (inject_check1($dest)) { echo 'Security';  exit;}

   if (strlen($dest) <0 || strlen($dest)>4 ){   echo '短号码为1到4位数 <br/> <a href="wap.php">返回</a><br/>';  exit;}
   if (strlen($destination_number) < 8 ){   echo '被叫号码大于7位数 <br/> <a href="wap.php">返回</a><br/>';  exit;}


   $res_user = get_user($acctname);
   if ($res_user)
   {
       $post_data['accountcode'] = trim($res_user['acctname']);
       $post_data['destination_number'] = $destination_number;
       $post_data['dest'] = $dest;
       $post_data['agent_id'] = ($res_user['agent_id']);

       $res = user_speeddial_add($res_user, $post_data);

       header('Location: ' . "./call.php?action=wap_setspeeddia&acctname=" . $acctname . "&password=" . $password . "\n\n");

   }
   else
      {
         echo "登录不成功,号码:$acctname 没有在系统中绑定." . "<br/>";
         echo '<a href="wap.php">返回</a><br/>';

      }
}


function do_speeddia_del()
{

   $acctname = trim($_REQUEST['acctname']);
   $password = trim($_REQUEST['password']);

   if (inject_check1($acctname)) { echo 'Security';  exit;}

   $id = intval(trim($_REQUEST['id']));

   $res_user = get_user($acctname);
   if ($res_user)
   {
       $res_speeddial = user_speeddial_get($id);
       user_speeddial_delete($_SESSION['res_acct'], $res_speeddial);

      header('Location: ' . "./call.php?action=wap_setspeeddia&acctname=" . $acctname . "&password=" . $password . "\n\n");
   }
   else
      {
         echo "登录不成功,号码:$acctname 没有在系统中绑定." . "<br/>";
         echo '<a href="wap.php">返回</a><br/>';

      }
}

?>