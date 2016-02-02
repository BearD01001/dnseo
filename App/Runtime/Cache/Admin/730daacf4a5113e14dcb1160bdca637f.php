<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>域名SEO后台管理 -- Powered by Marsn9</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Admin/Domain_category.css"/>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Table.js"></script>
</head>
<body>
    <div class="main">
        <table class="table">
            <caption>域名管理 - 域名分类管理<a class="btnOrange" href="<?php echo U('Domain/categoryAdd');?>">添加</a></caption>
            <thead>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>分类名称</td>
                    <td>关键词</td>
                    <td>分类介绍</td>
                    <td>添加时间</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$i): ?><tr>
                    <td><input type="checkbox" name="category_id[]" value="<?php echo ($i["id"]); ?>"/></td>
                    <td><?php echo ($i["intend"]); echo ($i["name"]); ?></td>
                    <td><?php echo ($i["keyword"]); ?></td>
                    <td><?php echo ($i["desc"]); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s', $i["time"])); ?></td>
                    <td><a class="btnBlue" href="<?php echo U('Domain/categoryAdd?id=' . $i['id']);?>">编辑</a><a class="btnGray delete" href="<?php echo U('Domain/category?method=delete&id=' . $i[id]);?>">删除</a></td>
                </tr><?php endforeach; endif; ?>
                <tr>
                    <td colspan="6">
                        <a class="btnGray deleteBulk" href="<?php echo U('Domain/category?method=deleteBulk');?>">删除选中</a><!--<a class="btnGray" href="#">锁定选中</a>-->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>