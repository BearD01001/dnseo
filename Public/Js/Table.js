/**
 * Created by Marsn9 on 14-10-16.
 */
$(document).ready(function(){
    $("thead td:eq(0) input:checkbox").live("click", function() {
        if($(this).attr("checked") != false){
            $("input[type='checkbox']").attr("checked", true);
        }else{
            $("input[type='checkbox']").attr("checked", false);
        }
    });
    $bulkHandle = function($obj, $selector) {
        $checkedNum = 0;
        $thisIndex = $obj.parents("td").index();
        $thisVal = $obj.val();
        if($thisVal == "") return false;
        $("tbody tr").each(function() {
            if($(this).find("td:eq(0) input[type=checkbox]").attr("checked") == true){
                $checkedNum += 1;
                $(this).find("td:eq(" + $thisIndex + ") " + $selector).val($thisVal);
            }
        });
        if($checkedNum == 0) {
            $obj.val("");
            $.handleMsg("操作失败", "请选中需要批量设置的项。");
        }
        return false;
    }
    $("thead select").live("change", function() {
        $bulkHandle($(this), "select");
    });
    $("thead input[type=text]").live("blur", function() {
        $bulkHandle($(this), "input[type=text]");
    });

    /* 删除单条数据 */
    $(".delete").ajaxBtn(function() {
        $(this).parents("tr").fadeOut("slow", function() {$(this).remove();});
    });

    /* 批量删除 */
    $(".deleteBulk").click(function() {
        $url = $(this).attr("href");
        $obj = $(":checkbox[name][checked]");
        $data = $obj.serialize();
        /* 显示Loading图像 */
        $("#loading", parent.document).length == 0 ? $("body", parent.document).append("<img id='loading' src='" + window.parent.public + "/Img/Elements/loaders/12.gif'>") : "";
        $("#loading", parent.document).fadeIn(500);
        $.post($url, $data, function($data) {
            if($data.status == 1) {
                $.handleMsg($data.title, $data.info);
                $obj.parents("tr").fadeOut("slow", function() {
                    $(this).remove();
                });
            } else {
                $.handleMsg($data.title, $data.info);
            }
            $("#loading", parent.document).fadeOut(200);
        });
        return false;
    });

});