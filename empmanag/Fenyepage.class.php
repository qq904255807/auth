<?php
class FenyePage{
    public  $pageSize=6;
    public  $res_array; //显示的数据
    public  $rowCount; //从数据库中获取
    public  $pageNow; //用户指定
    public  $pageCount; //计算得到
    public  $navigate; //分页导航条
    public  $gotoUrl; //连接提交数据的页面
}
?>