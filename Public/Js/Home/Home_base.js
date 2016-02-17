/**
 * Created by Dino9 on 15-12-7.
 */
$(document).ready(function() {
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