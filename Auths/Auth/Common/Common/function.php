<?php
/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 10) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}

/**
 * TODO 递归显示数组
 * @param $data 需要递归的数据
 * @param int $id 查找和pid等于id的个数压缩到sub
 * @return \Think\Page
 */
 
function node_merge($data,$id=0){
   
   // $data = $m->field('id,name,title')->where('pid=0')->select();
    foreach ($data as $v){
        if($v['pid']==$id){
            $v['sub']=node_merge($data,$v['id']);
            $arr[]=$v;
        }
        //$data[$k]['sub'] = $m->field('id,name,title')->where('pid='.$v['id'])->select();
    }
    return $arr;
}


function p($array){
    dump($array,true,'<pre>',0);
}
