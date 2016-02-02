/**
 * Created by Marsn9 on 14-11-3.
 */
$(function() {
    $(".page div a").unwrap();
    $(".page a").addClass("btnGray");
    $(".page span").addClass("btnGray").css("opacity", ".7");
    $("thead select").die().live("change", function() {
        location.href = $(this).val();
    });
});