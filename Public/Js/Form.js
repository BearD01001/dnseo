/**
 * Created by Marsn9 on 14-10-23.
 */
$(document).ready(function() {
    $("input[type=file]").after("<a class='btnBlue' href='#'>上传</a>");
//    $name = $(":file").attr("name");
    $("input[type=file]").nextAll("a").after(function() {
        $name = $(this).prevAll(":file").attr("name");
        return "<input type='hidden' name='" + $name + "'/>";
    });

    $("input[type=file] + a").click(function() {
        $(this).prevAll(":file").click();
        return false;
    });

//    选择文件后改变对应按钮文字跟颜色并开始上传
    $("input[type=file]").live("change", function() {
        $thisButtom = $(this).nextAll("a");
        $thisButtom.html(function() {
            $text = $(this).text();
            $html = $(this).html();
            return $html.replace($text, "正在上传...");
        });
//        开始上传
        $thisImg = $(this).nextAll("a").find("img");
        $thisId = $(this).attr("id");
        $_this = $(this);
        $thisName = $(this).nextAll(":hidden");
        if($(this).val().length > 0) {
            $.ajaxFileUpload({
                url: $uploadUrl, //用于文件上传的服务器端请求地址
                fileElementId: $thisId, //文件上传空间的id属性  <input type="file" id="file" name="file" />
                dataType: 'text',
                success: function($data) {
                    // 返回数据处理，过滤掉pre标签
                    $reg = new RegExp("(\{[\s\S]*\})");
                    $data = $data.replace(/(<[\s\S]*?>)([\s\S]*?)(<[\s\S]*?>)/, "$2");
                    $data = $.parseJSON($data);
                    $.handleMsg('', $data.info);
                    if($data.status == 1) {
                        $thisImg.attr("src", $data.img);
                        $thisName.val($data.img);
                        $thisButtom.attr("class", "btnOrange");
                        $thisImg.parent().css('right', '90px');
                        $thisButtom.html(function() {
                            $text = $(this).text();
                            $html = $(this).html();
                            return $html.replace($text, "上传成功！");
                        });
                    } else {
                        $thisImg.parent().css('right', '90px');
                        $thisButtom.html(function() {
                            $text = $(this).text();
                            $html = $(this).html();
                            return $html.replace($text, "请重新上传");
                        });

                    }
                },
                error: function($data, $status, e) {
                    $.handleMsg('', e);
                }
            });
        }
        return false;
    });

/*
    图片上传类型添加上传前本地预览功能
    input[type=file] name属性必须以pic开头命名
*/
    $("input[type=file][name^=pic]").nextAll("a").append("<img class='preview' src=''>");
    $imgNum = 1;
    $("img.preview").each(function() {
        $(this).parent().prevAll(":file").attr("id", "file" + $imgNum);
        $(this).attr("id", "img" + $imgNum);
        $(this).wrap("<div class='preview'></div>");
//        $("#file" + $imgNum).uploadPreview({Img: "img" + $imgNum});//  图片预览
        $imgNum ++;
    });

    if($(":file").attr("data-src") != "" && $(":file").attr("data-src") != undefined) {
        $(":file").nextAll(":hidden").val($(":file").attr("data-src"));
        $img = $(":file").nextAll("a").find("img");
        $img.attr("src", $(":file").attr("data-src"));
        $img.parent().css('right', '90px');
        $thisButtom = $(":file").nextAll("a");
        $thisButtom.html(function() {
            $text = $(this).text();
            $html = $(this).html();
            $(this).attr("class", "btnOrange");
            return $html.replace($text, "更改缩略图");
        });
    }

    $("input[type=file][name^=pic]").nextAll("a").mouseover(function() {
        if($(this).hasClass("btnOrange") && !$(this).find("div.preview").is(":animated")) {
            $(this).find("div.preview").fadeIn();
        }
        return false;
    });
    $("input[type=file][name^=pic]").nextAll("a").mouseout(function() {
        if($(this).hasClass("btnOrange") && !$(this).find("div.preview").is(":animated")) {
            $(this).find("div.preview").fadeOut();
        }
        return false;
    });
});