@extends('layouts.email')

@section('content')

<div class="container">
    <h1>Order Confirmation</h1>
    <p>
        Thank you for your order from Vintage Treasures!<br>
        Order ID: {{$orderID}}<br>

        We'll ship your order to {{$shippingAddress}}.<br>
        You should recieve another email with tracking information when your order ships.<br>
        If you have any questions, visit <a href="www.vintage-treasures-logan.com">our site</a> for contact information, or feel free to call us at <a href="tel:1-435-374-9436">(435) 374-9436</a>.
    </p>
</div>

@endsection