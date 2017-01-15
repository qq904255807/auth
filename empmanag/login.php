<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<h1>管理员登录系统</h1>
<form action="loginprocess.php" method="post">
<table>
<tr><td>用户id</td><td><input type="text" name="id"  value=""></td></tr>
<tr><td>密&nbsp;码</td><td><input type="password" name="password"></td></tr>
<tr><td colspan="2">是否保存ID<input type="checkbox" name="keep"/></td>

<tr>
<td><input type="submit" value="登陆"></td>
<td><input type="reset" value="重置"></td>
</tr>
</table>
</form>
<?php 
if (!empty($_GET['errno'])){
    $errno=$_GET['errno'];
    if($errno==1){
        echo "<font color='red' size='3'>你的用户名或者密码错误</font>";
    }
}
?>
</html>