<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>域名SEO后台管理 - Powered by Marsn9</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Form.css"/>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/uploadPreview.js"></script>
    <script type="text/javascript" src="/Public/Js/ajaxFileUpload.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Form.js"></script>
    <script type="text/javascript">
        $uploadUrl = "<?php echo U('Domain/upload');?>";
    </script>
</head>
<body>
<div class="body">
    <div class="main">
        <form class="form" action="<?php echo U('Domain/add?id=' . $data['thisDomain']['id']);?>" enctype="multipart/form-data">
            <div class="title">域名管理 - <?php if(I('get.id') != ''): ?>编辑域名<a href="<?php echo U('Domain/my');?>" class="btnOrange">返回</a><?php else: ?>添加域名<?php endif; ?></div>
            <div class="row"><label>域　　名：</label><input type="text" name="domain" value="<?php echo ($data["thisDomain"]["domain"]); ?>" required="required"/><input type="hidden" name="id" value="<?php echo ($data["thisDomain"]["id"]); ?>"/></div>
            <div class="row"><label>简　　介：</label><textarea name="desc"><?php echo ($data["thisDomain"]["desc"]); ?></textarea></div>
            <div class="row"><label>关键词：</label><input type="text" name="keyword" placeholder="请以半角“逗号”分隔各关键词。" value="<?php echo ($data["thisDomain"]["keyword"]); ?>"/></div>
            <div class="row"><label>缩略图：</label><input type="file" name="pic" data-src="<?php echo ($data["thisDomain"]["pic"]); ?>"/></div>
            <div class="row"><label>分　　类：</label>
            <?php if(is_array($data['categories'])): foreach($data['categories'] as $key=>$i): ?><input required="required" type="checkbox" name="category[]" value="<?php echo ($i["id"]); ?>" id="category_<?php echo ($i["id"]); ?>"<?php if($i['selected'] == '1'): ?>checked="checked"<?php endif; ?>/><label for="category_<?php echo ($i["id"]); ?>"><?php echo ($i["name"]); ?></label><?php endforeach; endif; ?>
            </div>
            <div class="row"><label>出售价格：</label><input type="text" name="price" placeholder="议价填“0" value="<?php echo ($data["thisDomain"]["price"]); ?>"/></div>
            <div class="btnRow"><input type="submit" class="ajaxBtn" class="ajaxBtn" value="确认"/><?php if(I('get.id') != ''): ?><a href="#" class="btnOrange cancel">取消</a><?php endif; ?></div>
        </form>
    </div>
</div>
</body>
</html>