<?php
return array(
		/* 数据库设置 */
	'DB_TYPE'           =>  'mysql',     	// 数据库类型
	'DB_HOST'           =>  '127.0.0.1', 	// 服务器地址
	'DB_NAME'           =>  'auth',      // 数据库名
	'DB_USER'           =>  'root',     	// 用户名
	'DB_PWD'            =>  '',     	// 密码
	'DB_PORT'           =>  '3306',     	// 端口
	'DB_PREFIX'         =>  'db_',      	// 数据库表前缀
	
    'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',		//自定义success跳转页面
    'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
);