<?php /* Smarty version 2.6.26, created on 2014-11-02 11:37:11
         compiled from app_config.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'app_config.html', 248, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>手机App配置</title>
<script>
	//所有input 去空格
	function trim_all_input()
	{
		var inpus = document.getElementsByTagName("INPUT")
        for(var i=0; i<inpus.length; i++)
        {
            if(inpus[i].type=="text")
            {
               inpus[i].value =  inpus[i].value.replace(/\s/g,"");
            }
        }
		
	}
	
	// 提交前检测输入是否合法
	function check()
	{
		
			
		return true;

	}
	
	function change_acct_id(agent_id)
	{
	    document.form1.action = '?action=app_config_send&agent_id=' + agent_id;
		document.form1.submit();
	}
    </script>
<style type="text/css">
<!--
.STYLE23 {color: #FF0000}
.STYLE25 {color: #0000FF}
-->
</style>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="2%" height="19" valign="bottom"><div align="center"><img src="images/tb.gif" width="14" height="14" /></div></td>
                <td width="98%" valign="bottom"><span class="table_caption">  手机App配置</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
    
  <tr>
    <td><table width="990" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
	 <form name="form1" method="post" action="?action=app_config_post">
    	<tr>
            <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;            </td>
            </tr>
			
			 
  
          <tr>
            <td width="251" height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">代理商
                
            </span></td>
            <td width="736" align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)"  >
                <option  value="<?php echo $this->_tpl_vars['acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected="selected" <?php endif; ?>>
                  <?php echo $this->_tpl_vars['acct']['acctname']; ?>

                  </option>
                <?php $_from = $this->_tpl_vars['acctchild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected="selected" <?php endif; ?> >
                  <?php echo $this->_tpl_vars['eachone']['acctname']; ?>

                  </option>
                <?php endforeach; endif; unset($_from); ?>
              </select>
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right"><span class="STYLE1">语音充值开户绑定电话</span></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="air_bindtel"  id="air_bindtel" type="text" class="STYLE1" style="height:18px; width:458px;"  value='<?php echo $this->_tpl_vars['acct']['air_bindtel']; ?>
' size="30" />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right"><span class="STYLE1">绑定IP地址</span></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="air_bindip"  id="air_bindip" type="text" class="STYLE1" style="height:18px; width:140px;"  value='<?php echo $this->_tpl_vars['acct']['air_bindip']; ?>
' size="30" />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right"><span class="STYLE1">App客户端注册秘钥</span></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="air_bindmd5"  id="air_bindmd5" type="text" class="STYLE1" style="height:18px; width:240px;"  value='<?php echo $this->_tpl_vars['acct']['air_bindmd5']; ?>
' size="30" />
            </span></div></td>
          </tr>
   
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1 STYLE23">微商城商铺ID</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left" class="STYLE25"><span class="STYLE11">
              <input name="vshopid" type="text" class="STYLE11"  id="vshopid" style="height:18px; width:140px;"  value='<?php echo $this->_tpl_vars['acct']['vshopid']; ?>
' size="20"  readonly="true" />
            </span><span class="table_title STYLE25"><a href="<?php echo $this->_tpl_vars['acct']['vshopid_url']; ?>
" target="_blank">马上去管理您的商铺 GO</a></span> </div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1"><span class="STYLE1 STYLE23">微商城商铺</span>登录密码默认为App客户端注册秘钥</span> </div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right"></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1"><strong>客户端链接设置（可以写文字信息或直接输入网站地址、软件将自动识别打开该网页）</strong></span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right">              <span class="table_caption">最新优惠</span><span class="STYLE1">
                <input name="newffers_caption"  id="newffers_caption" type="text" class="STYLE1" style="height:18px; width:120px;"  value='<?php echo $this->_tpl_vars['acct']['newffers_caption']; ?>
' size="500" />
              </span></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
              <input name="newffers" id="newffers" type="text"  style="height:18px; width:720px;" size="500"  value='<?php echo $this->_tpl_vars['acct']['newffers']; ?>
' />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right">              <span class="STYLE10">使用说明</span><span class="STYLE1">
                <input name="service_caption"  id="service_caption" type="text" class="STYLE1" style="height:18px; width:120px;"  value='<?php echo $this->_tpl_vars['acct']['service_caption']; ?>
' size="500" />
              </span></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
              <input name="service" id="service" type="text"  style="height:18px; width:720px;" size="500"  value='<?php echo $this->_tpl_vars['acct']['service']; ?>
' />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right">              <span class="STYLE10">访问官网</span><span class="STYLE1">
                <input name="air_gotowap_caption"  id="air_gotowap_caption" type="text" class="STYLE1" style="height:18px; width:120px;"  value='<?php echo $this->_tpl_vars['acct']['air_gotowap_caption']; ?>
' size="500" />
              </span></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
              <input name="air_gotowap" id="air_gotowap" type="text"  style="height:18px; width:720px;" size="140"  value='<?php echo $this->_tpl_vars['acct']['air_gotowap']; ?>
' />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right"><span class="STYLE10">关于我们</span><span class="STYLE1">
                <input name="air_help_caption"  id="air_help_caption" type="text" class="STYLE1" style="height:18px; width:120px;"  value='<?php echo $this->_tpl_vars['acct']['air_help_caption']; ?>
' size="500" />
            </span></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
              <input name="air_help" id="air_help" type="text"  style="height:18px; width:720px;" size="500"  value='<?php echo $this->_tpl_vars['acct']['air_help']; ?>
' />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1" id="userTip">分享地址</td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
              <input name="air_homepage" id="air_homepage" type="text"  style="height:18px; width:720px;" size="500"  value='<?php echo $this->_tpl_vars['acct']['air_homepage']; ?>
' />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">显示移动联通充值卡</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
                <select name="enable_telcard" id="enable_telcard"  >
                  <option  value="1"  <?php if ($this->_tpl_vars['acct']['enable_telcard'] == 1): ?> selected="selected" <?php endif; ?>  >显示 </option>
                  <option  value="2"   <?php if ($this->_tpl_vars['acct']['enable_telcard'] == 2): ?> selected="selected" <?php endif; ?>  >不显示 </option>
                </select>
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">显示支付宝充值</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
                <select name="enable_alipay" id="enable_alipay"  >
                  <option  value="1"   <?php if ($this->_tpl_vars['acct']['enable_alipay'] == 1): ?> selected="selected" <?php endif; ?> >显示 </option>
                  <option  value="2"   <?php if ($this->_tpl_vars['acct']['enable_alipay'] == 2): ?> selected="selected" <?php endif; ?> >不显示 </option>
                </select>
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">查询余额显示分钟数</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
                <select name="enable_calltimelong" id="enable_calltimelong"  >
                  <option  value="1"   <?php if ($this->_tpl_vars['acct']['enable_calltimelong'] == 1): ?> selected="selected" <?php endif; ?>  >显示 </option>
                  <option  value="2"   <?php if ($this->_tpl_vars['acct']['enable_calltimelong'] == 2): ?> selected="selected" <?php endif; ?> >不显示 </option>
                </select>
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">查询余额显示有效期</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
                <select name="enable_date" id="enable_date"  >
                  <option  value="1"  <?php if ($this->_tpl_vars['acct']['enable_date'] == 1): ?> selected="selected" <?php endif; ?>   >显示 </option>
                  <option  value="2"  <?php if ($this->_tpl_vars['acct']['enable_date'] == 2): ?> selected="selected" <?php endif; ?>  >不显示 </option>
                </select>
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">显示隐藏本机号码</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
                <select name="enable_hidecaller" id="enable_hidecaller"  >
                  <option  value="1"   <?php if ($this->_tpl_vars['acct']['enable_hidecaller'] == 1): ?> selected="selected" <?php endif; ?>   >开启 </option>
                  <option  value="2"  <?php if ($this->_tpl_vars['acct']['enable_hidecaller'] == 2): ?> selected="selected" <?php endif; ?> > 关闭 </option>
                </select>
            </span></div></td>
          </tr>

          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE4">自动注册</span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">自动注册费率组</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">回铃费率组
                  <select name="air_rategroupid_acall" id="air_rategroupid_acall"  >
                    <?php $_from = $this->_tpl_vars['rategroups_acall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
                    <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['air_rategroupid_acall']): ?> selected="selected" <?php endif; ?> >
                    <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

                    </option>
                    <?php endforeach; endif; unset($_from); ?>
                  </select>
被叫费率组
<select name="air_rategroupid" id="air_rategroupid"  >
  <?php $_from = $this->_tpl_vars['rategroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
  <option  value="<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
" <?php if ($this->_tpl_vars['eachone']['id'] == $this->_tpl_vars['acct']['air_rategroupid']): ?> selected="selected" <?php endif; ?> >
  <?php echo $this->_tpl_vars['eachone']['rategroupname']; ?>

  </option>
  <?php endforeach; endif; unset($_from); ?>
</select>
&nbsp;  &nbsp;</span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">自动注册赠送话费</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="air_gift"  id="air_gift" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['air_gift'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
' size="30" />
元</span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">注册赠送分钟</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="air_gif_per"  id="air_gif_per" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['air_gif_per']; ?>
' size="30" />
            </span><span class="STYLE1">分钟</span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">推荐赠送</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="recommendbalance"  id="recommendbalance" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo ((is_array($_tmp=$this->_tpl_vars['acct']['recommendbalance'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
' size="30" />
            </span><span class="STYLE1">元</span><span class="STYLE1">话费</span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">自动注册有效期天数 </span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="air_expireddays"  id="air_expireddays" type="text" class="STYLE1" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['acct']['air_expireddays']; ?>
' size="30" />
            </span><span class="STYLE1">天</span></div></td>
          </tr>
          <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF" id="userTip"><div align="center">
              <label for="bindexten_type"><span class="STYLE1">自动加前缀:
              <select name="air_bindexten_type" class="STYLE1" id="air_bindexten_type"  >
                <option value="0"   <?php if ($this->_tpl_vars['acct']['air_bindexten_type'] == 0): ?>selected<?php endif; ?> > 不加前缀</option>
                <option value="1"   <?php if ($this->_tpl_vars['acct']['air_bindexten_type'] == 1): ?>selected<?php endif; ?> > SIP回拨都加</option>
                <option value="2"   <?php if ($this->_tpl_vars['acct']['air_bindexten_type'] == 2): ?>selected<?php endif; ?> > 只有SIP加</option>
                <option value="3"   <?php if ($this->_tpl_vars['acct']['air_bindexten_type'] == 3): ?>selected<?php endif; ?> > 只有回拨加</option>
                <option value="4"   <?php if ($this->_tpl_vars['acct']['air_bindexten_type'] == 4): ?>selected<?php endif; ?> > 只有直拨加</option>
              </select>
              </span></label>
              <span class="STYLE1">直拨被叫、半直拨被叫、回拨被叫加</span> <span class="STYLE1">
              <input name="air_bindexten" type="text" class="STYLE1" id="air_bindexten" style="height:18px; width:45px;"  value='<?php echo $this->_tpl_vars['acct']['air_bindexten']; ?>
' size="10" />
SIP加
<input name="air_bindexten_sip" type="text" class="STYLE1" id="air_bindexten_sip" style="height:18px; width:45px;"  value='<?php echo $this->_tpl_vars['acct']['air_bindexten_sip']; ?>
' size="10" />
回拨回铃加
<input name="air_bindexten_cb" type="text" class="STYLE1" id="air_bindexten_cb" style="height:18px; width:45px;"  value='<?php echo $this->_tpl_vars['acct']['air_bindexten_cb']; ?>
' size="10" />
              </span>
              </label>
              </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">拨号键盘字幕</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="subtitles"  id="subtitles" type="text" class="STYLE1" style="height:18px; width:458px;"  value='<?php echo $this->_tpl_vars['acct']['subtitles']; ?>
' size="30" />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">字幕点击链接</span></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE1">
              <input name="subtitles_url"  id="subtitles_url" type="text" class="STYLE1" style="height:18px; width:458px;"  value='<?php echo $this->_tpl_vars['acct']['subtitles_url']; ?>
' size="30" />
            </span></div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right"></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left" class="STYLE21">广告图片</div></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1" >通话点击图片打开网址</td>
            <td align="right" bgcolor="#FFFFFF" >
              <input name="linkurl" type="text" class="STYLE1" id="linkurl"  style="height:18px; width:720px;"  value='<?php echo $this->_tpl_vars['acct']['linkurl']; ?>
' size="200" />            </td>
          </tr>
		  
		          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1" >滚动广告图片1打开网址</td>
            <td align="right" bgcolor="#FFFFFF" >
              <input name="gallery_linkurl1" type="text" class="STYLE1" id="gallery_linkurl1"  style="height:18px; width:720px;"  value='<?php echo $this->_tpl_vars['acct']['gallery_linkurl1']; ?>
' size="200" />            </td>
          </tr>
		  
		          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1" >滚动广告图片2打开网址</td>
            <td align="right" bgcolor="#FFFFFF" >
              <input name="gallery_linkurl2" type="text" class="STYLE1" id="gallery_linkurl2"  style="height:18px; width:720px;"  value='<?php echo $this->_tpl_vars['acct']['gallery_linkurl2']; ?>
' size="200" />            </td>
          </tr>
		          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1" >滚动广告图片3打开网址</td>
            <td align="right" bgcolor="#FFFFFF" >
              <input name="gallery_linkurl3" type="text" class="STYLE1" id="gallery_linkurl3"  style="height:18px; width:720px;"  value='<?php echo $this->_tpl_vars['acct']['gallery_linkurl3']; ?>
' size="200" />            </td>
          </tr>
		  
		          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1" >滚动广告图片4打开网址</td>
            <td align="right" bgcolor="#FFFFFF" >
              <input name="gallery_linkurl4" type="text" class="STYLE1" id="gallery_linkurl4"  style="height:18px; width:720px;"  value='<?php echo $this->_tpl_vars['acct']['gallery_linkurl4']; ?>
' size="200" />            </td>
          </tr>
		  
		          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" class="STYLE1" >滚动广告图片5打开网址</td>
            <td align="right" bgcolor="#FFFFFF" >
              <input name="gallery_linkurl5" type="text" class="STYLE1" id="gallery_linkurl5"  style="height:18px; width:720px;"  value='<?php echo $this->_tpl_vars['acct']['gallery_linkurl5']; ?>
' size="200" />            </td>
          </tr>
          <tr>
            <td height="18" colspan="2" align="right" bgcolor="#FFFFFF" id="userTip"><div align="center">
              <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onclick="return check()" value=" 确认提交 " />
            </div></td>
          </tr>

          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><div align="right"></div></td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="18" colspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
			  </form>
			  
			      <form enctype="multipart/form-data" method="post" name="app_config_upload" action="?action=app_config_upload&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" target="_self">
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">通话广告图片</span></td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
			             <input name="src" type="file" class="STYLE1" />
			             <input  type= "submit"  class="STYLE1"   name="button" id="button2"   value="上传" />
		               </span></div></td>
	             </tr>
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><img src='<?php echo $this->_tpl_vars['acct']['imageurl']; ?>
' alt="通话广告图片" width="300" height="220" /></div></td>
	             </tr>
			       
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
	             </tr>
				  </form>
				  
			  
			       <form enctype="multipart/form-data" method="post" name="gallery_imageurl1_upload" action="?action=gallery_imageurl1_upload&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" target="_self">
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">滚动广告图片1</span></td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
			             <input name="src" type="file" class="STYLE1" />
			             <input  type= "submit"  class="STYLE1"   name="button" id="button2"   value="上传" />
		               </span></div></td>
	             </tr>
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><img src='<?php echo $this->_tpl_vars['acct']['gallery_imageurl1']; ?>
' alt="滚动广告图片1" width="300" height="220" /></div></td>
	             </tr>
			       
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
	             </tr>
				  </form>
				  
			       <form enctype="multipart/form-data" method="post" name="gallery_imageurl2_upload" action="?action=gallery_imageurl2_upload&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" target="_self">
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">滚动广告图片2</span></td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
			             <input name="src" type="file" class="STYLE1" />
			             <input  type= "submit"  class="STYLE1"   name="button" id="button2"   value="上传" />
		               </span></div></td>
	             </tr>
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><img src='<?php echo $this->_tpl_vars['acct']['gallery_imageurl2']; ?>
' alt="滚动广告图片" width="300" height="220" /></div></td>
	             </tr>
			       
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
	             </tr>
				  </form>
				  
				  			       <form enctype="multipart/form-data" method="post" name="gallery_imageurl3_upload" action="?action=gallery_imageurl3_upload&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" target="_self">
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">滚动广告图片3</span></td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
			             <input name="src" type="file" class="STYLE1" />
			             <input  type= "submit"  class="STYLE1"   name="button" id="button2"   value="上传" />
		               </span></div></td>
	             </tr>
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><img src='<?php echo $this->_tpl_vars['acct']['gallery_imageurl3']; ?>
' alt="滚动广告图片3" width="300" height="220" /></div></td>
	             </tr>
			       
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
	             </tr>
				  </form>
				  
				  			       <form enctype="multipart/form-data" method="post" name="gallery_imageurl4_upload" action="?action=gallery_imageurl4_upload&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" target="_self">
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">滚动广告图片4</span></td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
			             <input name="src" type="file" class="STYLE1" />
			             <input  type= "submit"  class="STYLE1"   name="button" id="button2"   value="上传" />
		               </span></div></td>
	             </tr>
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><img src='<?php echo $this->_tpl_vars['acct']['gallery_imageurl4']; ?>
' alt="滚动广告图片4" width="300" height="220" /></div></td>
	             </tr>
			       
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
	             </tr>
				  </form>
				  
				  			       <form enctype="multipart/form-data" method="post" name="gallery_imageurl5_upload" action="?action=gallery_imageurl5_upload&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" target="_self">
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip"><span class="STYLE1">滚动广告图片5</span></td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><span class="STYLE7">
			             <input name="src" type="file" class="STYLE1" />
			             <input  type= "submit"  class="STYLE1"   name="button" id="button2"   value="上传" />
		               </span></div></td>
	             </tr>
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"><img src='<?php echo $this->_tpl_vars['acct']['gallery_imageurl5']; ?>
' alt="滚动广告图片5" width="300" height="220" /></div></td>
	             </tr>
			       
			         <tr>
			           <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
			           <td align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
	             </tr>
				  </form>
				 
			         <tr>
            <td height="18" align="right" bgcolor="#FFFFFF" id="userTip">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF" id="userTip"><div align="left"></div></td>
          </tr>
		  
		   
		  
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>

 
         
		  
		  
		 
        
  

</table>

</body>
</html>