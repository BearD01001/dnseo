<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>域名SEO后台管理 - Powered by Marsn9</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Form.css"/>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Form.js"></script>
</head>
<body>
<div class="body">
    <div class="main">
        <form class="form" action="<?php echo U('Domain/categoryAdd?id=' . $data['thisCategory']['id']);?>">
            <div class="title">域名管理 - 域名分类管理 - 添加分类<a class="btnOrange" href="<?php echo U('Domain/category');?>">返回</a></div>
            <div class="row"><label>分类名称：</label><input type="text" name="name" value="<?php echo ($data["thisCategory"]["name"]); ?>" required="required"/></div>
            <div class="row">
                <label>父级分类：</label>
                <select name="parent">
                    <option value="0">顶级分类</option>
                    <?php if(is_array($data['categories'])): foreach($data['categories'] as $key=>$i): if($data['thisCategory']['id'] != $i['id']): ?><option value="<?php echo ($i["id"]); ?>"<?php if($data['thisCategory']['parent'] == $i['id']): ?>selected="selected"<?php endif; ?>><?php echo ($i["intend"]); echo ($i["name"]); ?></option><?php endif; endforeach; endif; ?>
                </select>
            </div>
            <div class="row"><label>关键词：</label><input type="text" name="keyword" value="<?php echo ($data["thisCategory"]["keyword"]); ?>" placeholder="请以英文‘逗号’分隔各关键词。"/></div>
            <div class="row"><label>分类介绍：</label><textarea name="desc"><?php echo ($data["thisCategory"]["desc"]); ?></textarea></div>
            <div class="row"><label>排序：</label><input type="text" name="sort" value="<?php echo ($data["thisCategory"]["sort"]); ?>"/><span class="note">存在父级分类时排序从“0”计算。</span></div>
            <div class="btnRow"><input type="submit" class="ajaxBtn" value="确认"/><a class="btnGray" href="Javascript:history.go(-1);">取消</a></div>
        </form>
    </div>
</div>
</body>
</html>