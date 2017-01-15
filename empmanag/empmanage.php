<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<?php

require_once 'common.php';
//防止用户直接登录管理界面。
//checkUserValidate();
echo "欢迎".$_GET['name']."登陆成功";
echo "<br/><a href='login.php'>返回重新登录</a>";
//获取上次登录时间
//getLastTime();
?>
<h1>主界面</h1>
<a href="emplist.php">管理用户</a><br/>
<a href="addEmp.php">添加用户</a><br/>
<a href="SearchEmp.php">查询用户</a><br/>
<a href="#">退出系统</a><br/>
</html>