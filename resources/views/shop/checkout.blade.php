@extends('layouts.shop')

@section('content')
<div class="over" id="overlay">
        <p class="text-center">Processing...<br>
        <span>Please don't close this window</span>
        </p>
    </div>
<div class="createIntent"></div>
<div class="container">
    <h1 class="text-left ml-lg-5">Checkout</h1>
    <div class="row">
        <div class="col-12 col-lg-2">
            <p class="text-primary text-right">
                <strong>Subtotal:</strong>    $<?php echo number_format($subtotal, 2); ?><br>
                <strong>Taxes:</strong>    $<?php echo number_format($tax, 2)?><br>
                <strong>Shipping:</strong>    <?php if(!$shipping) {echo "Free";} else {echo "$"; echo number_format($shipping, 2);} ?>
            </p>
            <hr>
            <p class="text-primary text-right"><strong>Total:  $<?php echo number_format($total, 2); ?></strong></p>
        </div>
        <div class="col-12 col-lg-10">
            <form class="form" action="{{ route('order') }}" method="POST" id="payment-form">
                @csrf
                <input type="hidden" name="total" value="{{$total}}">
                <label for="firstName">Full Name</label>
                <input class="form-control" type='text' id='firstName' name='firstName' placeholder="First Name"><br>
                <input class="form-control" type='text' id='lastName' name='lastName' placeholder="Last Name"><br>
                <label for="email">Email Address</label>
                <input class="form-control" type='text' id='email' name='email' placeholder='Email Address'>
                <label for="line1s">Shipping Address</label>
                <input class="form-control" type="text" id="line1s" name="line1s" placeholder="Line 1"><br>
                <input class="form-control" type="text" id="line2s" name="line2s" placeholder="Line 2"><br>
                <input class="form-control" type="text" id="citys" name="citys" placeholder="City"><br>
                <input class="form-control" type="text" id="states" name="states" placeholder="State"><br>
                <label for="line1">Billing Address</label><br>
                <div class="custom-control custom-checkbox mb-2">
                    <input class="d-inline custom-control-input" id="same" type="checkbox"><label class="custom-control-label" for="same">&nbsp;Same as shipping address</label>
                </div>
                <div id="billing">
                    <input class="form-control" type='text' id='line1' name='line1' placeholder="Line 1"><br>
                    <input class="form-control" type='text' id='line2' name='line2' placeholder="Line 2"><br>
                    <input class="form-control" type='text' id='city' name='city' placeholder="City"><br>
                    <input class="form-control" type='text' id='state' name='state' placeholder="State"><br>
                </div>
                <div id="card-element">
                    <!-- Elements will create input elements here -->
                </div>
            
                <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>
                <button class="form-control mt-3 btn btn-secondary" id="form-submit">Place Order</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        createPayment(Math.round({{$total}} * 100));
});
</script>
@endsection