
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

function OpenTime(){
    var date = new Date();
    var day = date.getDay();
    var hour = date.getHours();
    var min = date.getMinutes();

    if(day == 0 || (day == 6 && hour >= 18)) {
        html = "Closed until 10:30 A.M. on Monday";
    } else {
        if(hour >= 10 && hour < 18) {
            if(hour == 10 && min < 30) {
                html = "Opening at 10:30 A.M.";
            } else {
                html = "Open today until 6:00 P.M.";
            }
        } else {
            html = "Opening at 10:30 A.M.";
        }
    }
    $('#open').html(html);
}

var interval = setInterval(OpenTime(), 10000);

$('form[name="quoteValidate"]').validate({
    rules: {
        name: 'required',
        phoneNum: 'required',
        email: {
            email: true,
            required: true,
        },
        message: 'required',
    },
    messages: {
        name: 'Please enter your full name<br>',
        phoneNum: 'Please enter your phone number<br>',
        email: {
            required: 'Please enter an email<br>',
            email: 'Please enter a valid email address<br>',
        },
        message: 'Please enter a message<br>',
    }
});

