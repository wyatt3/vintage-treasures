@extends('layouts.shop')

@section('content')
<?php $subtotal = $subtotal/100;
    $tax = $subtotal * 0.047;
    $shipping = $subtotal > 50 ? 0 : 6; 
    $total = number_format($subtotal + $tax + $shipping, 2);
    ?>
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
            <p class="text-primary text-right"><strong>Total:  ${{$total}}</strong></p>
        </div>
        <div class="col-12 col-lg-10">
            <form class="form" action="#test" id="payment-form">
                <label for="firstName">Full Name</label>
                <input class="form-control" type='text' id='firstName' name='firstName' placeholder="First Name"><br>
                <input class="form-control" type='text' id='lastName' name='lastName' placeholder="Last Name"><br>
                <label for="line1">Billing Address</label>
                <input class="form-control" type='text' id='line1' name='line1' placeholder="Line 1"><br>
                <input class="form-control" type='text' id='line2' name='line2' placeholder="Line 2"><br>
                <input class="form-control" type='text' id='city' name='city' placeholder="City"><br>
                <input class="form-control" type='text' id='state' name='state' placeholder="State"><br>
                
                <div id="card-element">
                    <!-- Elements will create input elements here -->
                </div>
            
                <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>
                <div class="modal-footer">
                <button class="mt-3 btn btn-secondary" id="submit">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection