<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>雇员信息列表</title>
<script type="text/javascript">
<!--

	function confirmDele(val){
		window.confirm("是否要删除id="+val+"的用户");
	}
//-->
</script>
</head>
<?php
require_once 'EmpService.class.php';
require_once 'Fenyepage.class.php';
$fenyePage=new FenyePage();
$empService=new EmpService();
//给分页page指定出事参数
$fenyePage->pageNow=1;
$fenyePage->pageSize=6;
$fenyePage->gotoUrl="emplist.php";


if(!empty($_GET['pageNow'])){
    $fenyePage->pageNow=$_GET['pageNow'];
}



//调用这个方法可以把分页page完成
$empService->getFenyePage($fenyePage);


echo"<table width='700px' border='1px'>";
echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>";

for ($i=0;$i<count($fenyePage->res_array);$i++){
    $row=$fenyePage->res_array[$i];
    echo"<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td>".
        "<td><a onclick='confirmDele({$row['id']})' href='empProcess.php?flag=del&id={$row['id']}'>删除用户</a></td><td><a href='updateEmpUI.php?id={$row['id']}'>修改用户</a></td></tr>";
}
echo "<h1>雇员信息列表</h1>";
echo "</table>";

//导航条
echo $fenyePage->navigate;
?>
<form action="emplist">
跳转到:<input type="text" name="pageNow">
<input type="submit" value="GO">
</form>


