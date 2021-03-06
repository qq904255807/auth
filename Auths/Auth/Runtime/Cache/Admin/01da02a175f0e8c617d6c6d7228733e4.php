<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=">
<title>登录</title> 
<link rel="stylesheet" href="/Auths/Public/Admin/css/login.css">
<script src="/Auths/Public/Admin/js/jquery-1.9.1.js"></script>
<script src="/Auths/Public/Common/Layer/layer.js"></script>
<script>
$(function(){
	$('#code').keyup(function(){
		var code = $('#code').val();
		if(code.length == 4 && $('#check_code').val() == 0){
			$.get("<?php echo U('Public/check_code');?>", {code:code},function(data){
				if(data == 1){
					$('#check_code').val(1);
					layer.tips('√ 通过验证', '#code',{time: 60000});
				}else{
					$('#check_code').val(0);
					layer.tips('× 验证错误', '#code');
				}
			});
		}
	});
})
</script>
<script>
function check_login(){
	var account = $('#account').val();
	var password = $('#password').val();
	var code = $('#code').val();	//验证码
	var check_code = $('#check_code').val();	//验证码验证结果
	if(account == ''){
		layer.tips('请输入用户名', '#account');
		return false;
	}
	if(password == ''){
		layer.tips('请输入密码', '#password');
		return false;
	}
	if(code == ''){
		layer.tips('请输入验证码', '#code');
		return false;
	}
	if(check_code == 0){    //判断验证码正确，才允许提交
		layer.tips('验证码错误', '#code');
		return false;
	}
	return true;
}
</script>
</head>
<body>

<div class="main">
	<div class="login">
	<form name="loginform" id="loginform" method="post" action="<?php echo U('Public/login');?>" onSubmit="return check_login()">
	  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
	    <tr>
	      <td width="49%" rowspan="3"><p>看不清，点击图片刷新</p>
	      <div id="code_img">
	      <img style="border:1px solid #D4E7F6; cursor:pointer;" title="点我刷新哦！" src="<?php echo U('Public/verify');?>" onclick="javascript:this.src=this.src+'?time='+Math.random()" />
	      </div>
          </td>
	      <td width="12%">用户名：</td>
	      <td width="39%"><input type="text" name="account" id="account" class="infoInput" maxlength="20" value="" style="width:180px; height:30px; margin-top:5px; font-size:16px; padding-left:3px;" placeholder="请输入用户名"/></td>
        </tr>
	    <tr>
	      <td height="36">密&nbsp;&nbsp;&nbsp;码：</td>
	      <td><input type="password" name="password" id="password" value="" style="width:180px; height:30px; margin-top:12px; font-size:16px; padding-left:3px;" placeholder="请输入密码"/></td>
        </tr>
	    <tr>
	      <td>验证码：</td>
	      <td><input type="text" name="code" class="infoInput" id="code" placeholder="验证码在左边哦" maxlength="4" value="" style="width:130px; height:30px; text-transform: uppercase; margin-top:12px; font-size:16px; padding-left:3px;" />
	      <input type="hidden" id="check_code" value="0"></td>
        </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      <td><input type="submit" name="submit" value="登&nbsp;&nbsp;&nbsp;录" style="width:185px; height:38px; cursor:pointer; background:#06F; border:0; color:#FFF; font-size:14px; font-weight:600; border-radius:4px; position:relative; top:15px;" />
          </td>
        </tr>
      </table>     
	  </form>
	</div>
	<div class="End">版权所有 2015 保留所有权利</div>
</div>


</body>
</html>