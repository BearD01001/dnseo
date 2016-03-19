/**
 * Created by Dino9 on 15-12-18.
 */
/* 载入HTML DOM结构后直接运行的部分，不等待图片、框架等加载 */
/* Web前台通用文件，考虑到执行不必要代码，必需先判断所操作元素是否存在 */

var dinoApplet = {};

/* 域名展示页背景图 */
dinoApplet.domainImg = $('.main img');
dinoApplet.domainImg.length > 0 ?
    $('head').append('<style>.main:before { background-image: url("'+ dinoApplet.domainImg.attr('src') +'") }</style>') : '';

/* 响应式加载首页插件 */
(function() {
    var $offsetWidth = document.body.clientWidth;
    //alert($offsetWidth);
    if($offsetWidth > 1024) {
        /* PC端首页插件 */
        var $domain = $(".domains");
        $domain.length > 0 ? $domain.justifiedGallery({
            'rowHeight' : 240,
            'captions' : true,
            'target' : '_blank',
            'fixedHeight' : true,
            'lastRow' : 'justify',
            'sizeRangeSuffixes' : {
                'lt100' : '',
                'lt240' : '',
                'lt320' : '',
                'lt500' : '',
                'lt640' : '',
                'lt1024' : ''
            },
            'margins' : 10
        }) : '';
        /* 导航滚动到窗口顶部后固定 */
        $(function() {
            var elm = $('.nav');
            var startPos = $(elm).offset().top;
            $.event.add(window, "scroll", function() {
                var p = $(window).scrollTop();
                $(elm).css('position',((p) > startPos) ? 'fixed' : 'absolute');
                $(elm).css('top',((p) > startPos) ? '0px' : '');
            });
        });
        /* niceScroll页面平滑滚动插件 */
        $('html').niceScroll({
            zindex: 9999,
            scrollspeed: 50
        });
    } else { // 移动端设置
        $('.nav ul li.all a').click(function() {
            $('.nav ul li.all div').addClass('active');
        });
        $('.nav ul li.all div').click(function() {
            $(this).removeClass('active');
        });
        $('*').removeAttr('style');
    }
})();

/* 域名展示页景深动画 */
//var domainImg = $('.main h1 + img');
//$(domainImg).length > 0 ?
//    $(document).mousemove(function(e) {
//        var main = $('.main');
////        $(main).css('-webkit-transform', 'translate(-' + e.pageX/1000 + 'px, -' + e.pageY/1000 + 'px)');
//        $(main).css({'top': '-' + e.pageX/100 + 'px', 'left': '-' + e.pageY/100 + 'px'});
//        console.log('pageX:' + e.pageX + ';pageY:' + e.pageY + '==translate(-' + e.pageX/10 + ', -' + e.pageY/10 + ')');
//    }) : '';

/* 无封面域名展示页简介Textarea便签换行处理 */
(function(){
    $("p.re-br").each(function() {
        var temp =  $(this).text().replace(/\n|\r\n/g,'<br/>');
        $(this).html(temp);
    });
})();

/* 域名详情页不够屏高时将footer定位到页面底部 */
(function() {
    var $photoWall = $('.photo-wall');
    if($photoWall.length <= 0) {
        var $footer = $('.footer');
        var $resizeFunc = function() {
            ($(document).height() < parseInt($footer.offset().top) + 74) ? '' : $footer.css({'position' : 'fixed', 'bottom': '0'});
        };
        $resizeFunc();
        $.event.add(window, 'resize', $resizeFunc);
    }
})();

/* 无图片域名详情页动画溢出修正 */
dinoApplet.domainCover = $('.main .domain img');
dinoApplet.domainCover.length > 0 ? '' : $('.main').css('overflow', 'hidden');