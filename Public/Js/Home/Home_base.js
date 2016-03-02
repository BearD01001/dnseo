/**
 * Created by Dino9 on 15-12-7.
 */
$(document).ready(function() {
    /* 响应式加载首页插件 */
    $resizeAct = function() {
        $offsetWidth = document.body.clientWidth;
        if($offsetWidth > 1024) {
            /* PC端首页插件 */
            var $domain = $(".domains");
            $domain.length > 0 ? $domain.justifiedGallery({
                'rowHeight' : 240,
                'captions' : true,
                'target' : '_blank',
                'fixedHeight' : true,
                'lastRow' : 'justify',
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
    }();
    /* 分类名滚动至导航下后固定，后至翻转替换分类名 */
//    var itemCon = $('.photo-wall');
//    $(itemCon).length > 0 ? $(function() {
//        var elm = $('.nav');
//        var itemName = $('.domain-item h3');
//        var itemBar = $('.item-bar');
//        var itemNameLength = $(itemName).length;
//        var startPos = $(elm).offset().top;
//        var itemNameTop = {};
//        $(itemName).each(function() {
//            itemNameTop[$(this).text()] = $(this).offset().top;
//        });
//        $.event.add(window, "scroll", function() {
//            var p = $(window).scrollTop();
//            $(itemName).each(function() {
//                if((p) > (itemNameTop[$(this).text()] - 72)) {
//                    $(this).css('right', '90%');
//                    $(this).css('top', '95px');
//                    $(this).css('position', 'fixed');
//                    $(this).parent().prev().find('h3').css('right', '80%').fadeOut(500);
////                    $(this).parent().prev().find('h3').css('top', '');
////                    $(this).parent().prev().find('h3').css('position', 'absolute');
//                } else {
//                    $(this).css('right', '');
//                    $(this).css('top', '');
//                    $(this).css('position', 'absolute');
//                    $(this).parent().prev().find('h3').fadeIn(500);
//                }
//            });
//            if((p) > (startPos)) {
//                $(itemBar).css('position', 'fixed');
//                $(itemBar).css('width', '80%');
//                $(itemBar).css('top', '50px');
//            } else {
//                $(itemBar).css('position', 'absolute');
//                $(itemBar).css('width', '');
//                $(itemBar).css('top', '');
//            }
//        });
//    }) : '';
});