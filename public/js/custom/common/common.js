$(document).ready(function () {
    //Add active class depending upon url js
    var a_href_found_flag = false;
    var addActiveClass = function (currentHref) {
        $("#side-menu .sidenav li a").each(function() {
            var thisUrl = $(this).attr('href');
            if (thisUrl == currentHref) {
                $(this).addClass('active');
                $(this).parent().addClass('active');
                $(this).parent().parent().parent().parent().addClass('active');
                a_href_found_flag = true;
            }
        });
    }
    var currentHref = window.location.href;
    addActiveClass(currentHref);

    if (!a_href_found_flag) {
        $("#side-menu .sidenav li a").each(function() {
            var this_url = $(this).attr('href');
            if (this_url == baseUrlWOParameter) {
                $(this).addClass('active');
                $(this).parent().addClass('active');
                $(this).parent().parent().parent().parent().addClass('active');
            }
        });
    }
    $('.collapsible').collapsible();
});