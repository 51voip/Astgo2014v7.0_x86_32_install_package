<?php
require_once("phpagi.php");
require_once("yeepay.config.php");
require_once("YeePayCommon.php");


/**
 *funcion name : szx_voucher
 *    params
 *      param1: $post_data
 *    result:  $res   0:ok ,1:err
 */
function  szx_voucher($res_user,$callerid,$total_fee,$cardNo,$cardPwd)
{
   $res = 1;
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
            //$agi->verbose("out_trade_no:$out_trade_no");

            $pay_config = user_get_pay_confg($res_user['agent_id'], $res_user['admin_id']);
            //$agi->verbose($pay_config);

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
               //$agi->verbose("------------------------------r1_Code:$r1_Code");
               if(trim($r1_Code) == '1')
               {
                  $res = 0;
               }
               else  $res = 4;
            }
            else
                $res = 3;;

         }
         else   $res = 2;


   return $res;

}




?>