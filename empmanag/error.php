<?php
header("content-type:text/html;charset=utf-8");
if (!empty($_GET['flag'])){
    $flag=$_GET['flag'];
    
    if ($flag="search"){
        echo"查询不到该用户！";
        echo "<a href='SearchEmp.php'>返回主界面</a>";
    }
}else {
    echo"对不起操作失败！";
    echo "<a href='emplist.php'>返回主界面</a>";
}
 

?>