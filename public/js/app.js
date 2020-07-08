
var open = false;

$(window).scroll(function() {
    if(open) {
        $('.dropdown-menu').toggle(250);
        open=!open;       
    }
    $('.navbar-collapse').collapse('hide');
});

$(window).click(function() {
    $('.navbar-collapse').collapse('hide');
    if(open) {
        $('.dropdown-menu').toggle(250);
        open = !open;
    }
});

$('.dropdown-toggle').unbind().click(function() {
    $('.dropdown-menu').toggle(250);
    open = !open;;
});

$('.navbar-toggler').click(function() {
    if(open) {
        $('.dropdown-menu').toggle(250);
        open = !open;
    }
});
