$('#OrderBy').change(function() {
    $('#orderForm').submit();
});

var cart = [];
function addToCart(productID) {
    if(!cart.includes(productID)) {
        $(".cartAmt").html('(' + (cart.length + 1) + ')');
        cart.push(productID);
        $(".cart").html(cart);
    }
}