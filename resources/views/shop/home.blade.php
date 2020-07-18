@extends('layouts.shop')
<!------------------ AVAILABLE VARIABLES  --------------->
<!-- 
    $products : Array of all products paginated in groups of 9, and ordered by however the user chooses
    $order : The order in which the products should be sorted, defaults to newest
 -->
@section('content')

<div class="container">
    @if(Session::has('order'))
    <div class="alert alert-success"><p class="m-0">Thank you for your order! You should recieve an email shortly with your order confirmation.</p></div>
    @endif
    <form class="ml-sm-4 mb-4 form-inline" id="orderForm">
        @csrf
        <label for="OrderBy">Order By:</label>
        <select class=" ml-sm-3 form-control" id="OrderBy" name='order'>
            <option <?php if($order == 'newest') { echo 'selected'; } ?> value="newest">Newest Arrivals</option>
            <option <?php if($order == 'alphabetical') { echo 'selected'; } ?> value="alphabetical">Name (Alphabetical)</option>
            <option <?php if($order == 'htl') { echo 'selected'; } ?> value="htl">Price: High to Low</option>
            <option <?php if($order == 'lth') { echo 'selected'; } ?> value="lth">Price: Low to High</option>
        </select>
    </form>
    {{$products->appends(['order' => $order])->links()}}
    <div class="row">
        @foreach($products as $product)
        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card mb-3 bg-primary text-white">
                <div class="card-header">{{$product->title}} <?php if ($product->sold) { echo "<span class='rounded mx-2 p-2 bg-danger text-white'>(SOLD)</span>";} ?><span class="float-right">$ <?php echo number_format($product->price, 2); ?></span></div>
                <a class="text-decoration-none" href="{{ route('products.show', ['product' => $product->id]) }}">
                <div class="card-img py-1 bg-dark"><img class="rounded" src="{{ asset('storage/'. $product->imageName) }}" width="100%"></div>
                </a>
                <div class="card-footer"><button class="btn btn-dark float-right" <?php if(in_array($product->id, $cart) || $product->sold == 1) { echo 'disabled';} ?> onclick=" addToCart({{$product->id}}); this.toggleAttribute('disabled'); this.innerHTML=cartIcon + ' In Cart'"><i class="foundicon-cart"></i><?php if(in_array($product->id, $cart)){?> In Cart<?php } else { ?> Add to Cart<?php } ?></button></div>
                
            </div>
        </div>    <!--<br>{{$product->price}}<br>{{$product->sold}}<br><br> -->
        @endforeach
    </div>
    {{$products->appends(['order' => $order])->links()}}
</div>

@endsection