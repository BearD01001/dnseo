<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>域名SEO后台管理 - Powered by Marsn9</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Admin/Domain_bulk.css"/>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/uploadPreview.js"></script>
    <script type="text/javascript" src="/Public/Js/ajaxFileUpload.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Table.js"></script>
    <script type="text/javascript" src="/Public/Js/Form.js"></script>
    <script type="text/javascript" src="/Public/Js/Admin/Domain_bulk.js"></script>
    <script type="text/javascript">
        $uploadUrl = "<?php echo U('Domain/upload');?>";
    </script>
</head>
<body>
<div class="body">
    <div class="main">
        <?php if($data['domain'] != '1'): ?><form class="form" method="post" action="<?php echo U('Domain/bulk');?>">
            <div class="title">域名管理 - 批量添加域名</div>
            <div class="row"><label>域　　名：</label><textarea name="domains" placeholder="每行一个域名，最多50个，格式为：域名+[分隔符]+简单描述"></textarea></div>
            <div class="row"><label>分隔符：</label>
                <input type="radio" id="comma" name="separator" value="1" checked/>&nbsp;<label for="comma">,</label>
                <input type="radio" id="pipeline" name="separator" value="2"/>&nbsp;<label for="pipeline">|</label>
                <input type="radio" id="space" name="separator" value="3"/>&nbsp;<label for="space">[空格]</label>
            </div>
            <div class="btnRow"><input type="submit" value="下一步"/></div>
        </form>
        <?php else: ?>
        <form action="#">
            <table class="table">
                <caption>域名管理 - 批量添加域名</caption>
                <thead>
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td>域名</td>
                        <td>简介</td>
                        <td>关键词<span class="note">英文','分隔</span></td>
                        <td>缩略图</td>
                        <td>
                            <select multiple="multiple">
                                <?php echo ($data["categoriesHtml"]); ?>
                            </select>
                        </td>
                        <td><input type="text" placeholder="批量价格"/></td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($data['domains'])): foreach($data['domains'] as $key=>$i): ?><tr>
                        <td><input type="checkbox"/></td>
                        <td><?php echo ($i["domain"]); ?><input type="hidden" name="domain[]" value="<?php echo ($i["domain"]); ?>"/></td>
                        <td><textarea name="desc[]"><?php echo ($i["desc"]); ?></textarea></td>
                        <td><input type="text" name="keyword[]" placeholder="以半角&quot;逗号&quot;分隔关键词。"/></td>
                        <td><input type="file" name="pic[]"/></td>
                        <td>
                            <select name="category_<?php echo ($i["num"]); ?>[]" multiple="multiple" required="required">
                                <?php echo ($data["categoriesHtml"]); ?>
                            </select>
                        </td>
                        <td><input type="text" name="price[]" placeholder="议价填&quot;0&quot;"/></td>
                        <td><a class="btnGray del" href="#">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                        <td colspan="8"><input type="submit" class="ajaxBtn" value="确认添加"/><a class="btnGray" href="Javascript:history.go(-1);">上一步</a></td>
                    </tr>
                </tbody>
            </table>
        </form><?php endif; ?>
    </div>
</div>
</body>
</html>