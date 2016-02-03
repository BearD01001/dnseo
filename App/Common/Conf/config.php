<?php
return array(
    /*项目配置项*/
	'APP_GROUP_LIST' => 'Home,Admin',
    'MODULE_ALLOW_LIST' => array(
        'Home',
        'Admin',
    ),
	'DEFAULT_GROUP'  => 'Home',
	'SHOW_PAGE_TRACE' => true, // 输出页面Trace信息
    'SHOW_ERROR_MSG' => true, // 显示报错信息
	'TMPL_FILE_DEPR' => '_',
    'URL_MODEL' => 1,  //普通模式 0 ,PATHINFO模式 1 ,REWRITE模式 2 ,兼容模式 3
    'URL_HTML_SUFFIX' => 'html',
    /*载入数据库配置文件*/
//    'LOAD_EXT_CONFIG' => 'mysql'
    'DB_TYPE'   => 'mysql',		// 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'DomainSEO',	// 数据库名
    'DB_USER'   => 'root',		// 用户名
    'DB_PWD'    => 'root',			// 密码
    'DB_PORT'   => 3306,		// 端口
    'DB_PREFIX' => 'm9_',	    // 数据库表前缀
);
?>