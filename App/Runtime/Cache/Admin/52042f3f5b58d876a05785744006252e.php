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
        <form class="form" action="#">
            <div class="title">SEO - 基本设置</div>
            <div class="row">
                <label class="tipst">全局&nbsp;Keyword：<div class="tips">该关键词优先所有其他关键词，排序占首位，一级关键词。</div></label>
                <input type="text" name="keyword" value="<?php echo ($data["keyword"]); ?>" placeholder="请以半角“逗号”分隔各个关键词。"/>
            </div>
            <div class="row">
                <label class="tipst">多主域名侧重：<div class="tips">若多个相似域名做米表主域名，请添加其一为侧重域名。</div></label>
                <input type="text" name="mult_domain" value="<?php echo ($data["mult_domain"]); ?>" placeholder="请填写域名主体(xxx.com)"/>
            </div>
            <div class="row">
                <label class="tipst">全局重定向：<div class="tips">将所有米表域名的访问全部重定向至主域名。</div></label>
                <input type="radio" id="redirect_on" name="redirect" value="1"<?php if($data['redirect'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="redirect_on">开启</label>
                <input type="radio" id="redirect_off" name="redirect" value="0"<?php if($data['redirect'] == '0'): ?>checked="checked"<?php endif; ?>/> <label for="redirect_off">关闭</label>
            </div>
            <div class="row">
                <label>URL&nbsp;模式：</label>
                <input type="radio" id="url_mode_pathinfo" name="url_mode" value="pathinfo"<?php if($data['url_mode'] == 'pathinfo'): ?>checked="checked"<?php endif; ?>/> <label for="url_mode_pathinfo">Pathinfo模式</label>
                <input type="radio" id="url_mode_rewrite" name="url_mode" value="rewrite"<?php if($data['url_mode'] == 'rewrite'): ?>checked="checked"<?php endif; ?>/> <label for="url_mode_rewrite">Rewrite模式</label>
                <input type="radio" id="url_mode_compatible" name="url_mode" value="compatible"<?php if($data['url_mode'] == 'compatible'): ?>checked="checked"<?php endif; ?>/> <label for="url_mode_compatible">兼容模式</label>
                <input type="radio" id="url_mode_common" name="url_mode" value="common"<?php if($data['url_mode'] == 'common'): ?>checked="checked"<?php endif; ?>/> <label for="url_mode_common">普通模式</label>
            </div>
            <div class="row">
                <label>伪静态：</label>
                <input type="radio" id="rewrite_on" name="rewrite" value="1"<?php if($data['rewrite'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="rewrite_on">开启</label>
                <input type="radio" id="rewrite_off" name="rewrite" value="0"<?php if($data['rewrite'] == '0'): ?>checked="checked"<?php endif; ?>/> <label for="rewrite_off">关闭</label>
            </div>
            <div class="row">
                <label>Sitemap：</label>
                <input type="radio" id="sitemap_on" name="sitemap" value="1"<?php if($data['sitemap'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="sitemap_on">开启</label>
                <input type="radio" id="sitemap_off" name="sitemap" value="0"<?php if($data['sitemap'] == '0'): ?>checked="checked"<?php endif; ?>/> <label for="sitemap_off">关闭</label>
            </div>
            <div class="row">
                <label>Sitemap&nbsp;选项：</label>
                <input type="checkbox" id="sitemap_compress" name="sitemap_compress" value="1"<?php if($data['sitemap_compress'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="sitemap_compress">压缩</label>
                <input type="checkbox" id="sitemap_nohtml" name="sitemap_nohtml" value="1"<?php if($data['sitemap_compress'] == '1'): ?>checked="checked"<?php endif; ?>> <label for="sitemap_nohtml"/>
                忽略Stiemap.html </label>
                <select id="sitemap_priority" name="sitemap_priority">
                    <option value="0"<?php if($data['sitemap_priority'] == '0'): ?>selected="selected"<?php endif; ?>>自动</option>
                    <option value="0.1"<?php if($data['sitemap_priority'] == '0.1'): ?>selected="selected"<?php endif; ?>>0.1</option>
                    <option value="0.2"<?php if($data['sitemap_priority'] == '0.2'): ?>selected="selected"<?php endif; ?>>0.2</option>
                    <option value="0.3"<?php if($data['sitemap_priority'] == '0.3'): ?>selected="selected"<?php endif; ?>>0.3</option>
                    <option value="0.4"<?php if($data['sitemap_priority'] == '0.4'): ?>selected="selected"<?php endif; ?>>0.4</option>
                    <option value="0.5"<?php if($data['sitemap_priority'] == '0.5'): ?>selected="selected"<?php endif; ?>>0.5</option>
                    <option value="0.6"<?php if($data['sitemap_priority'] == '0.6'): ?>selected="selected"<?php endif; ?>>0.6</option>
                    <option value="0.7"<?php if($data['sitemap_priority'] == '0.7'): ?>selected="selected"<?php endif; ?>>0.7</option>
                    <option value="0.8"<?php if($data['sitemap_priority'] == '0.8'): ?>selected="selected"<?php endif; ?>>0.8</option>
                    <option value="0.9"<?php if($data['sitemap_priority'] == '0.9'): ?>selected="selected"<?php endif; ?>>0.9</option>
                    <option value="1"<?php if($data['sitemap_priority'] == '1'): ?>selected="selected"<?php endif; ?>>1</option>
                </select> <label for="sitemap_priority">优先级</label>
                <select id="sitemap_changefreq" name="sitemap_changefreq">
                    <option value="always"<?php if($data['sitemap_changefreq'] == 'always'): ?>selected="selected"<?php endif; ?>>经常</option>
                    <option value="hourly"<?php if($data['sitemap_changefreq'] == 'hourly'): ?>selected="selected"<?php endif; ?>>每小时</option>
                    <option value="daily"<?php if($data['sitemap_changefreq'] == 'daily'): ?>selected="selected"<?php endif; ?>>每天</option>
                    <option value="weekly"<?php if($data['sitemap_changefreq'] == 'weekly'): ?>selected="selected"<?php endif; ?>>每周</option>
                    <option value="monthly"<?php if($data['sitemap_changefreq'] == 'monthly'): ?>selected="selected"<?php endif; ?>>每月</option>
                    <option value="yearly"<?php if($data['sitemap_changefreq'] == 'yearly'): ?>selected="selected"<?php endif; ?>>每年</option>
                    <option value="never"<?php if($data['sitemap_changefreq'] == 'never'): ?>selected="selected"<?php endif; ?>>从不</option>
                </select> <label for="sitemap_changefreq">更新频率</label>
            </div>
            <div class="row">
                <label>友链&nbsp;Nofollow：</label>
                <input type="radio" id="nofollow_on" name="nofollow" value="1"<?php if($data['nofollow'] == '1'): ?>checked="checked"<?php endif; ?>/> <label for="nofollow_on">开启</label>
                <input type="radio" id="nofollow_off" name="nofollow" value="0"<?php if($data['nofollow'] == '0'): ?>checked="checked"<?php endif; ?>/> <label for="nofollow_off">关闭</label>
            </div>
            <div class="rowBtn">
                <input type="submit" class="ajaxBtn" value="保&nbsp;存"/>
            </div>
        </form>
    </div>
</body>