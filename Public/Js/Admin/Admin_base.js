/**
 * Created by Administrator on 15-12-7.
 */
$(document).ready(function() {
    /* 默认AJAX按钮事件绑定 */
    $(".ajaxBtn").ajaxBtn();

    /* 默认返回按钮动作 */
    $("a.cancel").click(function() {
        history.go(-1);
        return false;
    });
});