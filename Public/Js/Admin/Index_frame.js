/**
 * Created by Marsn9 on 14-10-14.
 */
$(document).ready(function(){
    $(".menu a").live("click", function(){
        $("#frame").attr("src", $(this).attr("href"));
        return false;
    });
    $("#logout").click(function(){
        $logoutURL = $(this).attr("href");
        $.get($logoutURL, function($data){
            if($data.status == 1){
                $.globalMsg($data.info, $data.url);
            }
        });
        return false;
    });
})