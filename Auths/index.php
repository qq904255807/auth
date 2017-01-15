<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


// 判断php版本
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// APP_DEBUG开发时用true，部署上线为false
define('APP_DEBUG',True);

//生成后台
//define('BIND_MODULE','./Auth/Admin/'); 

//定义分页个数
define('PAGE_SIZE', 5);
// 定义应用入口文件夹
define('APP_PATH','./Auth/');


// 引入核心文件
require './ThinkPHP/ThinkPHP.php';

