<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>

<?php

require_once 'EmpService.class.php';
$id=$_GET['id'];

$empService=new EmpService();
//$arr=$empService->getEmpById($id);
$emp=$empService->getEmpById($id);

?>

<h1>修改用户页面</h1>
<form action="empProcess.php" method="post">
<table>
<tr><td>id</td><td><input readonly="readonly" name="id" value="<?php echo $emp->getId(); ?>" /></td></tr>
<tr><td>名字</td><td><input type="text" name="name" value="<?php echo $emp->getName(); ?>" /></td></tr>
<tr><td>级别</td><td><input type="text" name="grade" value="<?php echo $emp->getGrade(); ?>" /></td></tr>
<tr><td>电邮</td><td><input type="text" name="email" value="<?php echo $emp->getEmail(); ?>" /></td></tr>
<tr><td>薪水</td><td><input type="text" name="salary" value="<?php echo $emp->getSalary(); ?> "/></td></tr>
<tr><td><input type="hidden" name="flag" value="updateemp" /></td></tr>
<tr>
<td><input type="submit" value="修改用户"/></td>
<td><input type="reset" value="重新填写"/></td>
</tr>
</table>
</form>
</html>