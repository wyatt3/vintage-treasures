$('#OrderBy').change(function() {
    $('#orderForm').submit();
});

// ====================== Cart Code ============================== //

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var cart = []
function cartInit(sessionCart) {
    cart = sessionCart;
}

function addToCart(productID, back = '') {
    if(!cart.includes(productID)) {
        cart.push(productID);
        $(".cartAmt").html('(' + cart.length + ')');

        var data = $(this).serializeArray();
        for (i = 0; i < cart.length; i++) {
            data.push({
                name: 'cart[]',
                value: cart[i]
            });
        }

        $.ajax({
            type: "POST",
            url: back + 'setCart',
            dataType: 'json',
            data : data,
        });
    }
}

function removeFromCart(productID) {
    if(cart.includes(productID)) {
        cart = cart.filter(item => item !== productID);
        $(".cartAmt").html('(' + cart.length + ')');

        var data = $(this).serializeArray();
        for (i = 0; i < cart.length; i++) {
            data.push({
                name: 'cart[]',
                value: cart[i]
            });
        }

        $.ajax({
            type: "POST",
            url: "setCart",
            dataType: 'json',
            data: data,
        });
        setTimeout(function() {
            location.reload();
        }, 100);
    }
}

// ========================== Checkout Code ====================== //

var stripe = Stripe('pk_test_51GzRrlCOrb9xObT3BzSqJ3ZHtpxMFTdVLPwpCxig6FYJT5ugtjph53bQ0ENVLZumH7tW2GY7MFVCcotAx7iWh9fh00sm9AWiXN');
var elements = stripe.elements();

var style = {
    base: {
      color: "#32325d",
    }
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

var clientSecret;
function createPayment(total) {
    var response = fetch('createIntent/' + total).then(function(response) {
        return response.json();
    }).then(function(responseJson) {
        clientSecret = responseJson.client_secret;
    });
}

card.on('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
    if (error) {
        displayError.textContent = error.message;
    } else {
        displayError.textContent = '';
    }
});