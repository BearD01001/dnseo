<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $homeInfo['domain'];?>,域名出售,域名购买,高流量域名,高权重域名 - <?php echo $homeInfo['name'];?></title>
    <meta name="keywords" content="<?php echo $homeSEO['keyword'];?>"/>
    <meta name="description" content="<?php echo $homeSEO['meta_desc'];?>"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Home/Base.css"/>
    <script src="/Public/Js/jquery-1.11.2.min.js"></script>
    <script src="/Public/Js/Plugins/jquery.nicescroll.min.js"></script>
    <script src="/Public/Js/Base.js"></script>
    <script src="/Public/Js/Home/Home_Base.js"></script>
</head>
<body>
	<div class="header">
		<img class="logo" alt="<?php echo $homeInfo['name'];?>" src="/Public/Img/logo.png">
		<div class="slogan"><?php echo $homeInfo['slogan'];?></div>
		<div class="contact">
			<ul>
				<li>电话：<span><?php echo $homeInfo['tel'];?></span></li>
				<li>邮箱：<span><?php echo $homeInfo['email'];?></span></li>
				<li>QQ：<span><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $homeInfo['qq'];?>&site=<?php echo $homeInfo['domain'];?>&menu=no"><?php echo $homeInfo['qq'];?></a></span></li>
			</ul>
		</div>
	</div>
<?php $r = rand(1, 6); ?>
	<div class="nav bg0<?php echo $r; ?>">
		<ul>
			<li><a href="/">首页</a></li>
            <?php if(is_array($cateItem)): foreach($cateItem as $key=>$c): ?><li><a href="/<?php echo $c['id'];?>"><?php echo $c['name'];?></a></li><?php endforeach; endif; ?>
            <li class="all"><a href="#"><span class="icon-grid-view"></span>全部分类</a>
                <div>
                    <ul>
                        <?php if(is_array($AllCate)): foreach($AllCate as $key=>$c): ?><li><a href="/<?php echo $c['id'];?>"><?php echo $c['name'];?></a></li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </li>
            <li class="cur l0"></li>
		</ul>
	</div>

<link rel="stylesheet" type="text/css" href="/Public/Js/Plugins/justifiedGallery.min.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/Home/Index_index2.css"/>
<script type="text/javascript" src="/Public/Js/Plugins/jquery.justifiedGallery.min.js"></script>
<div class="photo-wall">
    <div class="item-bar"></div>
    <?php if(is_array($domainItem['cateItem'])): foreach($domainItem['cateItem'] as $key=>$category): ?><div class="domain-item">
            <h3><?php echo ($category['name']); ?></h3>
            <div class="domains">
                <?php if(count($domainItem[$category['id']]) != 0): if(is_array($domainItem[$category['id']])): foreach($domainItem[$category['id']] as $key=>$domain): $r = rand(1, 6); ?>
                        <a href="/<?php echo ($domain['domain']); ?>" class="bd0<?php echo ($r); ?>" target="_blank">
                            <img src=<?php if($domain['pic'] == ''): ?>"/Public/Img/none-img.png"<?php else: ?>"<?php echo ($domain['pic']); ?>"<?php endif; ?> />
                            <b class=<?php if($domain['pic'] == ''): ?>"no-img"<?php else: ?>"img"<?php endif; ?>><?php echo ($domain['domain']); ?></b>
                            <p class=<?php if($domain['pic'] == ''): ?>"no-img"<?php else: ?>"caption img"<?php endif; ?>><?php echo ($domain['desc']); ?></p>
                        </a><?php endforeach; endif; ?>
                <?php else: ?>
                    <div class="no-domain">该分类下没有域名</div><?php endif; ?>
            </div>
        </div><?php endforeach; endif; ?>
</div>
<script type="text/javascript">
    $(".domains").justifiedGallery({
        'rowHeight' : 240,
        'captions' : true,
        'target' : '_blank',
        'fixedHeight' : true,
        'lastRow' : 'justify',
        'margins' : 10
    });
</script>
	<div class="footer">
		<div class="links">
			<a href="#">友情链接</a>
			<a href="#">友情链接</a>
			<a href="#">友情链接</a>
			<a href="#">友情链接</a>
			<a href="#">友情链接</a>
			<a href="#">友情链接</a>
		</div>
		<!--<a href="#" class="about">关于我们</a>-->
        <div class="copyright"><?php echo $homeInfo['copyright'];?></div>
        <script src="/Public/Js/Base_applet.js"></script>
        <div class="stat-code"><?php echo $homeInfo['stat_code'];?></div>
	</div>
</body>
</html>