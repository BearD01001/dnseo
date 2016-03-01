/**
 * Created by Dino9 on 15-12-18.
 */
/* 载入HTML DOM结构后直接运行的部分，不等待图片、框架等加载 */
/* Web前台通用文件，考虑到执行不必要代码，必需先判断所操作元素是否存在 */

/* 域名展示页背景图 */
var $domainImg = $('.main img');
$domainImg.length > 0 ?
    $('head').append('<style>.main:before { background-image: url("'+ $domainImg.attr('src') +'") }</style>') : '';

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
    var $footer = $('.footer');
    var $resizeFunc = function() {
        if($(document).height() > parseInt($footer.offset().top) + 74) {
            $footer.css({'position' : 'fixed', 'bottom': '0'});
        } else {
            $footer.css({'position' : '', 'bottom': ''});
        }
    };
    $resizeFunc();
    $.event.add(window, 'resize', $resizeFunc);
})();

/* 无图片域名详情页动画溢出修正 */
var $img = $('.main .domain img');
$img.length > 0 ? '' : $('.main').css('overflow', 'hidden');