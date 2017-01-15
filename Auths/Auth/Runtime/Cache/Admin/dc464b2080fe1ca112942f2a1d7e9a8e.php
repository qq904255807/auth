<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=">
<title>后台管理系统</title>
<link rel="stylesheet" href="/Auths/Public/Admin/css/css.css">
<script src="/Auths/Public/Admin/js/jquery-1.9.1.js"></script>
<script src="/Auths/Public/Common/Layer/layer.js"></script>
<script>
//删除用户
function del(id){
	$("#del"+id+" td").css('background','#CBDFF2');
	parent.layer.confirm('真的要删除吗？', {
		btn: ['确认','取消'], //按钮
		shade: 0.5 //显示遮罩
	}, function(){
		$.post("<?php echo U('User/user_del');?>", { "id": id},function(data){
			if(data == 1){
				parent.layer.msg('删除成功', { icon: 1, time: 1000 }, function(){
						$("#del"+id).remove();
					});
			}else{
				parent.layer.msg('删除失败', {icon: 2, time: 2000 }); 
			}
		}, "json");
	},function(){
		$("#del"+id+" td").css('border-top','0');
		$("#del"+id+" td").css('border-bottom','1px solid #EFEFEF');
	});
}
</script>
</head>
<body>

<div class="nav">
	<div class="nav_title">
    	<h4><img class="nav_img" src="/Auths/Public/Admin/img/tab.gif" /><span class="nav_a">客户管理</span></h4>
    </div>
</div>

<form action="/Auths/index.php/Admin/user/user_list?menu_title=%E7%94%A8%E6%88%B7%E7%AE%A1%E7%90%86%20-%20%E7%94%A8%E6%88%B7%E5%88%97%E8%A1%A8" method="post">
<div class="search" style="height:50px; line-height:50px; padding-left:30px; margin-top:3px;">
手机号：<input type="text" name="mobile" value="<?php echo ($where["field_val"]); ?>" maxlength="16" class="input" style="height:28px;" />&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
    <button type="submit" name="submit" class="button">查 询</button>
</div>
</form>

<div class="list">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
      <thead>
	    <tr>
	      <td width="18%"><div align="center">ID</div></td>
	      <td width="19%"><div align="center">手机号</div></td>
	      <td width="19%"><div align="center">会费总额</div></td>
	      <td width="20%"><div align="center">创建时间</div></td>
	      <td width="24%"><div align="center">操作</div></td>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr id="del<?php echo ($vo["id"]); ?>">
	      <td height="50"><div align="center"><?php echo ($vo["id"]); ?></div></td>
	      <td><div align="center"><?php echo ($vo["mobile"]); ?></div></td>
	      <td><div align="center"><?php echo ($vo["huifei_sum"]); ?></div></td>
	      <td><div align="center"><?php echo ($vo["create_time"]); ?></div></td>
	      <td><div align="center"><?php if($vo['id'] != 1): ?><a class="a_button" href="javascript:;" onclick="del(<?php echo ($vo[id]); ?>)">删除</a><?php endif; ?>
          </div></td>
        </tr><?php endforeach; endif; ?>
        </tbody>
  </table>
</div>

<!-- 分页 -->
<div class="page">
<?php echo ($page); ?>
</div>


</body>
</html>