<?php
return array(
    /*项目配置项*/
	'APP_GROUP_LIST' => 'Home,Admin',
    'MODULE_ALLOW_LIST' => array(
        'Home',
        'Admin',
    ),
	'DEFAULT_GROUP'  => 'Home',
	'SHOW_PAGE_TRACE' => false, // 输出页面Trace信息
    'SHOW_ERROR_MSG' => true, // 显示报错信息
	'TMPL_FILE_DEPR' => '_',
    'URL_CASE_INSENSITIVE' => true,  //忽略URL大小写，Linux必备
    'URL_MODEL' => 1,  //普通模式 0 ,PATHINFO模式 1 ,REWRITE模式 2 ,兼容模式 3
    'URL_HTML_SUFFIX' => 'html',
    /*载入数据库配置文件*/
    'DB_PREFIX' => 'm9_',	    // 数据库表前缀
//    'LOAD_EXT_CONFIG' => 'mysql'
);