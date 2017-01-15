<?php

    require_once 'SqlHelper.class.php';
    require_once 'Emp.class.php';
    class EmpService{
    
    function updateEmp ($id,$name,$email,$grade,$salary){
            $sql="update emp set name='$name' , grade=$grade , email='$email' , salary=$salary where id=$id";
            $sqlhelper=new SqlHelper();
            $res=$sqlhelper->execute_dml($sql);
            $sqlhelper->close_connect();
            return $res;
        }
    function checkEmpById($id){
        $sql="select name from emp where id=$id";
        $sqlHelper=new SqlHelper();
        $arr=$sqlHelper->execute_dql2($sql);
        $sqlHelper->close_connect();
        if (!empty($arr)){
            return 1;
        }else {
            return "";
        }
    }
        
    function getEmpById($id){
        $sql="select * from emp where id=$id";
        $sqlHelper=new SqlHelper();
        $arr=$sqlHelper->execute_dql2($sql);
        $sqlHelper->close_connect();
        $emp=new Emp();
        $emp->setId($arr[0]['id']);
        $emp->setName($arr[0]['name']);
        $emp->setGrade($arr[0]['grade']);
        $emp->setEmail($arr[0]['email']);
        $emp->setSalary($arr[0]['salary']);
        return $emp;
    }
        
    function getPageCount($pageSize){
        $sql="select count(id) from emp";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dql($sql);
        
        if ($row=mysql_fetch_row($res)) {
            $pageCount=ceil($row[0]/$pageSize);
        }
        mysql_free_result($res);
        $sqlHelper->close_connect();
        return $pageCount;
    }
    
    function getEmpListByPage($pageNow,$pageSize){
        //limit 0,3 表示从编号0（id号是1）开始选出出3条信息。
        $sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dql2($sql); 
        
        $sqlHelper->close_connect();
        return $res;
    }
    
    function getFenyePage($fenyePage){
        $sqlHelper=new SqlHelper();
        //select * from emp limit 0,3  从编号为0（id号为1）的记录开始取3条记录显示。
        $sql1="select * from emp limit "
        .($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
        
        
        $sql2="select count(id) from emp";
        $sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
        $sqlHelper->close_connect();
    }
    
    function delEmpById($id){
        $sql="delete from emp where id=$id";
        $sqlHelper=new SqlHelper();
         return $sqlHelper->execute_dml($sql);
    }
    
    function addEmp($name,$grade,$email,$salary){
        $sql="insert into emp (name,grade,email,salary) values ('$name',$grade,'$email',$salary)";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    }
?>