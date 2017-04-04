<?php /* Smarty version 2.6.26, created on 2015-02-28 16:59:43
         compiled from btobtellist_list_page.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=5; IE=7" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
<script src="./js/jquery-1.6.2.min.js"></script>
<script src="./js/external/jquery.bgiframe-2.1.2.js"></script>
<script src="./js/ui/jquery.ui.core.js"></script>
<script src="./js/ui/jquery.ui.widget.js"></script>
<script src="./js/ui/jquery.ui.mouse.js"></script>
<script src="./js/ui/jquery.ui.button.js"></script>
<script src="./js/ui/jquery.ui.draggable.js"></script>
<script src="./js/ui/jquery.ui.position.js"></script>
<script src="./js/ui/jquery.ui.resizable.js"></script>
<script src="./js/ui/jquery.ui.dialog.js"></script>
<script src="./js/ui/jquery.ui.datepicker.js"></script>
<script src="./js/ui/i18n/jquery.ui.datepicker-zh-CN.js"></script>
<link rel="stylesheet" href="./css/demos.css">
<title>亲情号码管理</title>
</head>
<script type='text/javascript'>
	function delete_confirm()
	{
		if (confirm("确定要删除这个亲情号码吗?"))  {
			 return true;	
		}
		return false;	
	}
    //页码导航 
function post_list(index,curpage,maxpage,agent_id)
{ 
     if ( parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
	 {
        document.form1.action = '?action=btobtellist&curpage='+index+'&agent_id='+agent_id; 
	    document.form1.submit(); 
	    return true;
	 }
	 return false;
}


	function goback(old_curpage,agent_id)
	{
		var gotourl = '?action=btobtellist&curpage='+old_curpage+'&agent_id='+agent_id ; 
		//alert(gotourl);
	    document.form1.action = gotourl;
	
		document.form1.submit();
	}	
	
function  change_acct_id(acct_id)
{
        document.form1.action = '?action=btobtellist&agent_id='+acct_id; 
	    document.form1.submit(); 
	    return true;		 
	
}    
 </script>
<div class="main">
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="97%" valign="bottom"><span  align="left" class="table_caption">亲情码列表
                        </span></td>
                    </tr>
                  </table></td>
                 <td><div align="right"><span class="table_caption">
            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_list_send&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" >新增亲情号码 </a>
             </span>
             </div></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
        <form name="form1" method="post" action="?action=btobtellist&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
">
          <tr>
            <td  height="26" colspan="8"   bgcolor="#FFFFFF">
			 <span class="STYLE1"><span class="table_title">亲情号</span>
               <input name="btobcallee" type="text" class="STYLE1" id="btobcallee" size="20" maxlength="30" value="" />
               <input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   value=" 查 询 " />
&nbsp;		    </span></td>
          </tr>
        </form>
		

        <tr>
          <td width="2%"  height="26"   bgcolor="d3eaef"><div align="center" class="table_title">序号</div></td>
          <td width="8%"  height="26"   bgcolor="d3eaef"><div align="center" class="table_title">亲情号</div></td>
		  <td width="8%"  height="26"   bgcolor="d3eaef"><div align="center" class="table_title">中继号码</div></td>
		  <td width="6%"  height="26"   bgcolor="d3eaef"><div align="center" class="table_title">状态</div></td>
		  <td width="20%"  height="26"   bgcolor="d3eaef"><div align="center" class="table_title">说明</div></td>
		  <td width="8%"  height="26"   bgcolor="d3eaef"><div align="center" class="table_title">创建日期</div></td>
          <td width="6%"  height="26"   bgcolor="d3eaef"><div align="center" class="table_title">操作</div></td>
        </tr>
        <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>
        <tr>
          <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="SSTYLE19">
              <?php echo $this->_tpl_vars['eachone']['check_id']; ?>

            </div></td>
          <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
              <?php echo $this->_tpl_vars['eachone']['btobcallee']; ?>

            </div></td>
          <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
              <?php echo $this->_tpl_vars['eachone']['callee']; ?>

            </div></td>			
          <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
              <?php if ($this->_tpl_vars['eachone']['enable'] == '1'): ?>正常<?php else: ?>冻结<?php endif; ?>
            </div></td>
          <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
              <?php echo $this->_tpl_vars['eachone']['remark']; ?>

            </div></td>
          <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19">
              <?php echo $this->_tpl_vars['eachone']['createtime']; ?>

            </div></td>
          <td height="18" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><a href="?action=del_list_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
"  onClick="return delete_confirm()" >删除</a> </div></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
      </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="52%"><div align="left"><span class="STYLE21">共
              <?php echo $this->_tpl_vars['record_count']; ?>

              条记录，当前第
              <?php echo $this->_tpl_vars['curpage']; ?>

              /
              <?php echo $this->_tpl_vars['maxpage']; ?>

              页，每页
              <?php echo $this->_tpl_vars['pagelimtcount']; ?>

          条记录</span></div></td>
          <td width="48%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('1',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['agent_id']; ?>
')"  >首页</a> </div></td>
                <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']-1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['agent_id']; ?>
')" >上一页</a></div></td>
                <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['curpage']+1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['agent_id']; ?>
')" >下一页</a></div></td>
                <td width="40"><div align="center"> <a href="#" class="STYLE21" onClick="return post_list('<?php echo $this->_tpl_vars['maxpage']; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
,'<?php echo $this->_tpl_vars['agent_id']; ?>
')" >尾页</a></div></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</div>
</div>
</html>