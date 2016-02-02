<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>域名SEO管理后台 - Powered by Marsn9</title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Form.css"/>
    <script type="text/javascript" src="/Public/Js/jQuery.js"></script>
    <script type="text/javascript" src="/Public/Js/Base.js"></script>
    <script type="text/javascript" src="/Public/Js/Form.js"></script>
</head>
<body>
    <div class="main">
        <form class="form" action="#">
            <div class="title">SEO - 首页设置</div>
            <div class="row">
                <label>首页&nbsp;Title：</label>
                <input type="text" name="title" value="<?php echo ($data["title"]); ?>" placeholder="不填写则采用米表名称。"/>
            </div>
            <div class="row">
                <label class="tipst">首页&nbsp;Keyword：<div class="tips">位于全局&nbsp;Keyword&nbsp;之后，二级关键词。</div></label>
                <input type="text" name="keyword" value="<?php echo ($data["keyword"]); ?>" placeholder="请以半角“逗号”分隔各个关键词。"/>
            </div>
            <div class="row">
                <label>首页&nbsp;Meta&nbsp;介绍：</label>
                <textarea name="meta_desc" placeholder="不填写则采用米表介绍。"><?php echo ($data["meta_desc"]); ?></textarea>
            </div>
            <div class="row">
                <label class="tipst">动态布局周期：<div class="tips">首页更新布局内容，请视蜘蛛采集情况选择适当的更新周期。</div></label>
                <input type="radio" id="layout_5" name="layout" value="0.5"<?php if($data['layout'] == '0.5'): ?>checked="checked"<?php endif; ?>/> <label for="layout_5">12小时</label>
                <input type="radio" id="layout1" name="layout" value="1"<?php if($data['layout'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="layout1">1天</label>
                <input type="radio" id="layout3" name="layout" value="3"<?php if($data['layout'] == '3'): ?>checked="checked"<?php endif; ?>/> <label for="layout3">3天</label>
                <input type="radio" id="layout7" name="layout" value="7"<?php if($data['layout'] == '7'): ?>checked="checked"<?php endif; ?>/> <label for="layout7">7天</label>
            </div>
            <div class="row">
                <label class="tipst">显示分类：<div class="tips">仅显示该分类直属域名，子分类域名不予显示。</div></label>
                <?php if(is_array($data['category'])): foreach($data['category'] as $key=>$vo): ?><input type="checkbox" id="category_<?php echo ($vo["id"]); ?>" name="category[]" value="<?php echo ($vo["id"]); ?>"<?php if($vo['checked'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="category_<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></label>&nbsp;<?php endforeach; endif; ?>
            </div>
            <div class="row">
                <label>每分类显示数目：</label>
                <input type="radio" id="category_num_10" name="category_num" value="10"<?php if($data['category_num'] == '10'): ?>checked="checked"<?php endif; ?>/> <label for="category_num_10">10</label>
                <input type="radio" id="category_num_15" name="category_num" value="15"<?php if($data['category_num'] == '15'): ?>checked="checked"<?php endif; ?>/> <label for="category_num_15">15</label>
                <input type="radio" id="category_num_20" name="category_num" value="20"<?php if($data['category_num'] == '20'): ?>checked="checked"<?php endif; ?>/> <label for="category_num_20">20</label>
                <input type="radio" id="category_num_25" name="category_num" value="25"<?php if($data['category_num'] == '25'): ?>checked="checked"<?php endif; ?>/> <label for="category_num_25">25</label>
                <input type="radio" id="category_num_30" name="category_num" value="30"<?php if($data['category_num'] == '30'): ?>checked="checked"<?php endif; ?>/> <label for="category_num_30">30</label>
            </div>
            <div class="row">
                <label>Stiemap&nbsp;链接：</label>
                <input type="radio" id="sitemap_on" name="sitemap" value="1"<?php if($data['sitemap'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="sitemap_on">显示</label>
                <input type="radio" id="sitemap_off" name="sitemap" value="0"<?php if($data['sitemap'] == '0'): ?>checked="checked"<?php endif; ?>/> <label for="sitemap_off">不显示</label>
            </div>
            <div class="row">
                <label>联系方式保护：</label>
                <input type="radio" id="contact_protect_on" name="contact_protect" value="1"<?php if($data['contact_protect'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="contact_protect_on">开启</label>
                <input type="radio" id="contact_protect_off" name="contact_protect" value="0"<?php if($data['contact_protect'] == '0'): ?>checked="checked"<?php endif; ?>/> <label for="contact_protect_off">关闭</label>
            </div>
            <div class="row">
                <label>友情链接：</label>
                <input type="radio" id="link_on" name="link" value="1"<?php if($data['link'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="link_on">显示</label>
                <input type="radio" id="link_off" name="link" vlaue="0"<?php if($data['link'] == '0'): ?>checked="checked"<?php endif; ?>/> <label for="link_off">不显示</label>
            </div>
            <div class="btnRow">
                <input type="submit" class="ajaxBtn" value="保&nbsp;存"/>
            </div>
        </form>
    </div>
</body>
</html>