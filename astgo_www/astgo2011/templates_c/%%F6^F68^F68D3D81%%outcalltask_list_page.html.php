<?php /* Smarty version 2.6.26, created on 2014-11-15 15:59:48
         compiled from outcalltask_list_page.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'outcalltask_list_page.html', 134, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
<script src="./js/jquery-1.6.2.min.js"></script>
<link rel="stylesheet" href="./css/demos.css">
<title>外呼任务</title>
</head>

<script>

//页码导航 
function post_list(index,curpage,maxpage)
{ 
     if ( parseInt(index) <= parseInt(maxpage) && parseInt(index) > 0  && parseInt(curpage)!=parseInt(index) )
	 {
        document.form1.action = '?action=list&curpage='+index+'&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
'; 
	    document.form1.submit(); 
	    return true;
	 }
	 return false;
}

	function delete_confirm()
	{
		if (confirm("确定要删除这个任务吗?"))  {
			 return true;	
		}
		return false;	
	}
	
function  change_acct_id(acct_id)
{
        //document.form1.action = '?action=list&curpage='+goto_index; 
		
		//alert(acct_id);
	    document.form1.submit(); 
	    return true;		 
	
}
	
</script>
<body>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="97%" valign="bottom"><span class="table_caption">外呼任务管理</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
            <img src="images/add.gif" width="10" height="10" /> <a href="?action=add_send&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
" >添加任务 </a> </span>
             
             </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
 <form name="form1" method="post" action="?action=list">
                           
  <tr>
    <td  height="24" colspan="10"   bgcolor="#FFFFFF" class="STYLE1">
代理商
 <select name="agent_id" class="STYLE1" id="agent_id" onchange= "change_acct_id(this.value)"  >
                <option  value="" > --全部-- </option>
                <option  value="<?php echo $this->_tpl_vars['res_acct']['decode_id']; ?>
"  <?php if ($this->_tpl_vars['res_acct']['decode_id'] == $this->_tpl_vars['agent_id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['res_acct']['acctname']; ?>
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
 任务状态                             
       <span class="STYLE7">
       <select name="enable" class="STYLE1" id="enable"  >
         <option  value="-1"   <?php if ($this->_tpl_vars['post_data']['enable'] == '-1'): ?> selected="selected" <?php endif; ?> > 不限 </option>
         <option  value="1"  <?php if ($this->_tpl_vars['post_data']['enable'] == '1'): ?> selected="selected" <?php endif; ?> > 开启 </option>
         <option  value="0"  <?php if ($this->_tpl_vars['post_data']['enable'] == '0'): ?> selected="selected" <?php endif; ?> > 暂停 </option>
       </select>
       </span>
任务名称<span class="STYLE7">
<input name="task_name" id="task_name" type="text" class="STYLE1" style="height:18px; width:120px;" size="30"    value='<?php echo $this->_tpl_vars['post_data']['task_name']; ?>
' />
</span>(可模糊查询) 
<input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onclick="return check()" value=" 查询 " /></td>
     </tr>
     
    </form>

      
               
    
  <tr>
  
            <td width="2%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">序号</div></td>
            <td width="6%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">代理商</div></td>
            <td width="6%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">任务名称</div></td>
            <td width="10%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">呼出路由组</div></td>
            <td width="4%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">状态</div></td>
             <td width="4%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">呼叫列表</div></td>
            <td width="4%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">并发</div></td>
            <td width="6%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">接通-失败/总数</div></td>
           
            <td width="12%"  height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">启动时间</div></td>
            <td width="6%"   height="24"   bgcolor="d3eaef" class="STYLE6"><div align="center" class="table_title">操作</div></td>


        </tr>
          
          
          <?php $_from = $this->_tpl_vars['table_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyname'] => $this->_tpl_vars['eachone']):
?>  	
          <tr>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['check_id']; ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['acctname']; ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['task_name']; ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['gatewaygroupname']; ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19" id="enable_<?php echo $this->_tpl_vars['eachone']['id']; ?>
" ><?php if ($this->_tpl_vars['eachone']['enable'] == '1'): ?>开启[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','0')" >暂停</a>]<?php else: ?> <font color="#FF0000">暂停</font>[<a href="#" onClick="call_enable('<?php echo $this->_tpl_vars['eachone']['id']; ?>
','1')">开启</a>] <?php endif; ?>
            </div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><a href="?action=submit_list&task_id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&old_curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
&submit_table=<?php echo $this->_tpl_vars['eachone']['submit_table']; ?>
" >查看</a> 
                  </div></td>

          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['cur_maxline']; ?>
/<?php echo $this->_tpl_vars['eachone']['call_maxline']; ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><?php echo $this->_tpl_vars['eachone']['success_count']; ?>
-<?php echo $this->_tpl_vars['eachone']['fail_count']; ?>
/<?php echo $this->_tpl_vars['eachone']['total_count']; ?>
</div></td>
          <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"> <?php if ($this->_tpl_vars['eachone']['begintime'] == '0000-00-00 00:00:00'): ?>即时发送<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['begintime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%y-%m-%d %T") : smarty_modifier_date_format($_tmp, "%y-%m-%d %T")); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['eachone']['endtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%T") : smarty_modifier_date_format($_tmp, "%T")); ?>
<?php endif; ?></div></td>
          
            <td height="20" bgcolor="<?php if (!(1 & $this->_tpl_vars['keyname'])): ?>#FFFFFF<?php else: ?>#F3F3F3<?php endif; ?>"><div align="center" class="STYLE19"><a href="?action=edit_send&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['eachone']['decode_agent_id']; ?>
"  >修改</a>
            <a href="?action=delete_post&id=<?php echo $this->_tpl_vars['eachone']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
"  onClick="return delete_confirm()" >删除</a>
                </div>
            </td>
                            
 
                          
          </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="33%"><div align="left"><span class="STYLE21">共
              <?php echo $this->_tpl_vars['record_count']; ?>

              条记录，当前第
              <?php echo $this->_tpl_vars['curpage']; ?>

              /
              <?php echo $this->_tpl_vars['maxpage']; ?>

              页，每页
              <?php echo $this->_tpl_vars['pagelimtcount']; ?>

          条记录</span></div></td>
        <td width="67%"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onclick="return post_list('1',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
)" >首页</a> </div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onclick="return post_list('<?php echo $this->_tpl_vars['curpage']-1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
)" >上一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onclick="return post_list('<?php echo $this->_tpl_vars['curpage']+1; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
)" >下一页</a></div></td>
            <td width="40"><div align="center"> <a href="#" class="STYLE21" onclick="return post_list('<?php echo $this->_tpl_vars['maxpage']; ?>
',<?php echo $this->_tpl_vars['curpage']; ?>
,<?php echo $this->_tpl_vars['maxpage']; ?>
)" >尾页</a></div></td>
           
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

<script>
   function call_enable(id,enable) {
	 $.get("?action=call_enable",{task_id:id,task_enable:enable}, function(data){
         var res = eval("(" + data + ")"); 
		 if (res.enable == 1)
		 {
		    $('#enable_'+res.id).html('<font color="#0000">开启</font>[<a href="#" onclick="call_enable('+res.id + ',0)">暂停</a>]');
		
		 }
		  else
		  {		
		     $('#enable_'+res.id).html('<font color="#FF0000">暂停</font>[<a href="#" onclick="call_enable('+res.id + ',1)">开启</a>]');
		
		  }
		 });
	
		 
	 
  }


	$(function() {
		 $("input:text,input:password,textarea").focus(function(){
			 $(this).css("background","#CBFE9F");
			 }).blur(function(){
				 $(this).css("background","#FFF");
			 }); 
	});
	</script>
</body>
</html>