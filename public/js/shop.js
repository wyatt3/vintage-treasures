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
        console.log("created");
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



function overlayOn() {
    $("#overlay").css('display', 'block');
    submit.toggleAttribute('disabled');
  }
  
  function overlayOff() {
    $("#overlay").css('display', 'none');
    submit.toggleAttribute('disabled');
  }
  
  
  var form = document.getElementById('payment-form');
  var submit = document.getElementById('submit');
  
  form.addEventListener('submit', function(ev) {
    ev.preventDefault();
    overlayOn();
    stripe.confirmCardPayment(clientSecret, {
      payment_method: {
        card: card,
        billing_details: {
          name: $("#firstName").val() + " " + $("#lastName").val(),
          address:  {
            city: $("#city").val(),
            state: $("#state").val(),
            line1: $("#line1").val(),
            line2: $("#line2").val(),
          }
        }
      }
    }).then(function(result) {
      if (result.error) {
        if(result.error.type != 'validation_error') {
          // Show error to your customer (e.g., insufficient funds)
          $('#overlay > p').text(result.error.message).css('font-size', '35px');
          setTimeout(function() {overlayOff();$('#overlay > p').html("Processing...<br><span>Please don't close this window</span>").css('font-size', '50px');}, 2000);
          
        } else {
          overlayOff();
        }
  
      } else {
        // The payment has been processed!
        if (result.paymentIntent.status == 'succeeded') {
          window.location.href = "purchased";
          // Show a success message to your customer
          // There's a risk of the customer closing the window before callback
          // execution. Set up a webhook or plugin to listen for the
          // payment_intent.succeeded event that handles any business critical
          // post-payment actions.
        }
      }
    });
  });