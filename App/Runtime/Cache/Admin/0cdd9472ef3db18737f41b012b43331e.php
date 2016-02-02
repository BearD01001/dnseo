<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>域名SEO后台管理 -- Powered by Marsn9</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Admin/Domain_my.css"/>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Table.js"></script>
    <script type="text/javascript" src="/Public/Js/Admin/Domain_my.js"></script>
</head>
<body>
<div class="body">
    <div class="main">
        <table class="table">
            <caption>域名管理&nbsp;-&nbsp;我的域名</caption>
            <thead>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>域名</td>
                    <td>
                        <select name="category">
                            <option value="<?php echo U('Domain/my');?>">全部分类</option>
                            <?php if(is_array($categories)): foreach($categories as $key=>$i): ?><option value="<?php echo U('Domain/my?method=category&id=' . $i['id']);?>"<?php if($i['id'] == I('get.id')): ?>selected="selected"<?php endif; ?>><?php echo ($i["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                    <td>添加时间</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list)): foreach($list as $key=>$i): ?><tr>
                    <td><input type="checkbox" name="id[]" value="<?php echo ($i["id"]); ?>"/></td>
                    <td><?php echo ($i["domain"]); ?></td>
                    <td><?php echo ($i["category"]); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s', $i["time"])); ?></td>
                    <td><a class="btnBlue" href="<?php echo U('Domain/add?id=' . $i['id']);?>">编辑</a><a class="btnGray delete" href="<?php echo U('Domain/my?method=delete&id=' . $i['id']);?>">删除</a></td>
                </tr><?php endforeach; endif; ?>
                <tr>
                    <td colspan="5">
                        <a class="btnGray deleteBulk fl" href="<?php echo U('Domain/my?method=delete');?>">批量删除</a><!--<a class="btnGray fl" href="#">锁定选中</a><a class="btnGray fl" href="#">批量移动</a>-->
                        <div class="page fr">
                            <?php echo ($page); ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>