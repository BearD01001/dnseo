<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>管理登录</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Admin/Login_index.css"/>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Admin/Login_index.js"></script>
</head>
<body>
<div class="body">
    <div class="login">
        <form action="<?php echo U('loginCheck');?>" method="post">
            <h1>SEO米表 - 管理登录</h1>
		<span class="username">
		<label>用户名</label>
		<input type="text" name="username">
		</span> <span class="pwd">
		<label>密　码</label>
		<input type="password" name="pwd">
		</span> <span class="verify">
		<label>验证码</label>
		<input type="text" name="verify">
		<img id="verify_code" title="点击刷新" src="<?php echo U('verify', '', '');?>"/> </span>
            <input type="submit" class="submit" value="登录">
        </form>
    </div>
</div>
</body>
</html>