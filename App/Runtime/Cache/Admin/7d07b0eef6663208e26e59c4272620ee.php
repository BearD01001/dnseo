<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>域名SEO后台管理 -- Powered by Marsn9</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Form.css"/>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Form.js"></script>
</head>
<body>
    <div class="main">
        <form class="form" action="<?php echo U(Setting/common);?>">
            <div class="title">系统设置 - 米表基本设置</div>
            <div class="row">
                <label>米表域名：</label>
                <input type="text" name="domain" value="<?php echo ($data["domain"]); ?>" placeholder="请填写域名主体(xxx.com)。"/>
            </div>
            <div class="row">
                <label>米表名称：</label>
                <input type="text" name="name" value="<?php echo ($data["name"]); ?>"/>
            </div>
            <div class="row">
                <label>米表介绍：</label>
                <textarea name="desc"><?php echo ($data["desc"]); ?></textarea>
            </div>
            <div class="row">
                <label>米表版权：</label>
                <input type="text" name="copyright" value="<?php echo ($data["copyright"]); ?>"/>
            </div>
            <div class="row">
                <label>米表备案号：</label>
                <input type="text" name="icp" value="<?php echo ($data["icp"]); ?>"/>
            </div>
            <div class="row">
                <label>Q&nbsp;Q：</label>
                <input type="text" name="qq" value="<?php echo ($data["qq"]); ?>"/>
            </div>
            <div class="row">
                <label>电话：</label>
                <input type="text" name="tel" value="<?php echo ($data["tel"]); ?>"/>
            </div>
            <div class="row">
                <label>E-Mail：</label>
                <input type="text" name="email" value="<?php echo ($data["email"]); ?>"/>
            </div>
            <div class="row">
                <label>声明：</label>
                <input type="text" name="state" value="<?php echo ($data["state"]); ?>"/>
            </div>
            <div class="row">
                <label>统计代码：</label>
                <textarea name="stat_code"><?php echo ($data["stat_code"]); ?></textarea>
            </div>
            <div class="rowBtn">
                <input type="submit" class="ajaxBtn" value="保&nbsp存"/>
            </div>
        </form>
    </div>
</body>
</html>