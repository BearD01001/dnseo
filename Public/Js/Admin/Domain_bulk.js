/**
 * Created by Marsn9 on 14-10-22.
 */
$(document).ready(function() {
    $(".del").click(function() {
        $(this).parents("tr").fadeOut("slow", function() {$(this).remove();});
        return false;
    });
});