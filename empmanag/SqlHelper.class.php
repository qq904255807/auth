<?php

   class SqlHelper{
       
       public  $conn;
       public  $dbname="emp";
       public  $username="root";
       public  $password="root";
       public  $host="localhost";
       //构造函数下划线有两个 或者写成SqlHelper
       public  function __construct(){
           $this->conn=mysql_connect($this->host,$this->username,$this->password);
           if (!$this->conn){
               die("连接失败".mysql_error());
           }
           mysql_select_db($this->dbname,$this->conn);
           
       }
       
       public  function execute_dql($sql){
           
           $res=mysql_query($sql,$this->conn)  or  die(mysql_error());
           
           return $res;
       }
       //把结果集转换为数组，可以直接
       public  function execute_dql2($sql){
           $arr=array();
           $res=mysql_query($sql,$this->conn)  or  die(mysql_error());
           
           //把取回的结果及转换成数组
           while ($row=mysql_fetch_assoc($res)){
               $arr[]=$row;
           }
           mysql_free_result($res);
           return $arr;
       }
       
       public function execute_dql_fenye($sql1,$sql2,$fenyePage){
           $res=mysql_query($sql1,$this->conn) or die(mysql_error());
           $arr=array();
           //把$res转换为数组$arr
           while($row=mysql_fetch_assoc($res)){
               $arr[]=$row;
           }
           mysql_free_result($res);
           
           $res2=mysql_query($sql2,$this->conn) or die(mysql_error());
           if ($row=mysql_fetch_row($res2)){
               $fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
               $fenyePage->rowCount=$row[0];
           }
           mysql_free_result($res2);
      
           $navigate="";
           if ($fenyePage->pageNow>1){
               $prePage=$fenyePage->pageNow-1;
               $navigate="<a href='emplist.php?pageNow=$prePage'>上一页</a> &nbsp;";
           }
           
           if ($fenyePage->pageNow<$fenyePage->pageCount){
               $nextPage=$fenyePage->pageNow+1;
               $navigate.= "<a href='emplist.php?pageNow=$nextPage'>下一页</a> &nbsp;";
           }
           
           $page_whole=10;
           $start=floor(($fenyePage->pageNow-1)/$page_whole)*$page_whole+1;
           $index=$start;
           if ($fenyePage->pageNow>$page_whole){
               $navigate.= "&nbsp;&nbsp;<a href='emplist.php?pageNow=".($start-1)."'>&nbsp;&nbsp;<<&nbsp;&nbsp;</a>&nbsp;&nbsp;";
           }
           //定$start  1-->10 floor((pagenow-1)/10)*10+1=0*10+1   11->20 floor((pagenow-1)/10)*10+1=1*10+1
           for (;$start<$index+$page_whole;$start++){
               $navigate.="<a href='emplist.php?pageNow=$start'>[$start]</a> &nbsp;";
           }
           
           $navigate.= "&nbsp;&nbsp;<a href='emplist.php?pageNow=$start'>&nbsp;&nbsp;>></a>";
           $navigate.= "当前页{$fenyePage->pageNow}/共{$fenyePage->pageCount}页";
       
           
           $fenyePage->res_array=$arr;
           $fenyePage->navigate=$navigate;
       }
       
       
       public  function  execute_dml($sql){
           $b=mysql_query($sql,$this->conn);
           if(!$b){
               return 0;
           }else {
               if (mysql_affected_rows($this->conn)>0){
                   return 1; //表示执行ok
               }else {
                   return 2; //表示没有行受到影响；
               }
           }
       }
       public  function close_connect(){
           if (!empty($this->conn)){
               mysql_close($this->conn);
           }
       }
       
   }
?>