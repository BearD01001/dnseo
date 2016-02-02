<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>域名SEO后台管理 -- Powered by Marsn9</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Admin/Index_frame.css"/>
    <script type="text/javascript">
        window.public = "/Public";
    </script>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Admin/Index_frame.js"></script>
</head>
<body>
    <div class="header">
        <img src="/Public/Img/logo.png">
        <div>
            <span><?php echo $username;?><a id="logout" href="<?php echo U('Login/logout');?>">退出</a></span>
            <span>上次登录时间：<?php echo $logintime;?></span>
            <span>上次登录IP：<?php echo $loginip;?></span>
        </div>
    </div>
    <div class="menu">
        <ul>
            <li><em><span class="icon-cog"></span>系统设置</em>
                <a href="<?php echo U('Setting/common');?>">米表基本设置</a>
                <a href="<?php echo U('Setting/admin');?>">管理员密码</a>
                <a href="<?php echo U('Setting/link');?>">友情链接管理</a>
                <!--<a href="<?php echo U('Setting/mysql');?>">数据库备份/还原</a>-->
            </li>
            <li><em><span class="icon-share-3"></span>SEO设置</em>
                <a href="<?php echo U('Seo/common');?>">基本设置</a>
                <a href="<?php echo U('Seo/home');?>">首页设置</a>
                <a href="<?php echo U('Seo/category');?>">分类页设置</a>
                <a href="<?php echo U('Seo/sellPage');?>">域名出售页设置</a>
            </li>
            <li><em><span class="icon-list_nested"></span>域名管理</em>
                <a href="<?php echo U('Domain/my');?>">我的域名</a>
                <a href="<?php echo U('Domain/category');?>">域名分类管理</a>
                <a href="<?php echo U('Domain/add');?>">添加域名</a>
                <a href="<?php echo U('Domain/bulk');?>">批量添加域名</a>
                <a href="<?php echo U('Domain/import');?>">导入域名</a>
                <a href="<?php echo U('Domain/unadd');?>">链入未添加域名</a>
            </li>
        </ul>
    </div>
    <div class="main">
        <iframe id="frame" name="frame" class="frame" src="<?php echo U('Admin/home');?>"></iframe>
    </div>
</body>
</html>