/**
 * Created by Marsn9 on 14-9-13.
 */
$(document).ready(function() {
    $("#verify_code").click(function(){
        $(this).attr("src", $("#verify_code").attr("src").replace(/\?0\.\d+/, "") + "?" + Math.random());
        return false;
    });

    $("input[type=submit]").die().live("click", function() {
        $loginPost = $(this).parent();
        $.post(
            $loginPost.attr("action"),
            $loginPost.serialize(),
            function($data){
                if($data.status == 1){
                    $.globalMsg($data.info, $data.url);
                }else{
                    $.globalMsg($data.info);
                    if($("#verify_code").attr("src").indexOf("?") != -1) {
                        $("#verify_code").attr("src", $("#verify_code").attr("src").replace(/\&0\.\d+/, "") + "&" + Math.random());
                    }else{
                        $("#verify_code").attr("src", $("#verify_code").attr("src").replace(/\?0\.\d+/, "") + "?" + Math.random());
                    }
                }
            }
        );
        return false;
    });

    $(".login input[name=username]").focus();
});