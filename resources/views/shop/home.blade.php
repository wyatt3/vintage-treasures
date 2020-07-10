@extends('layouts.shop')
<!------------------ AVAILABLE VARIABLES  --------------->
<!-- 
    $products : Array of all products paginated in groups of 9, and ordered by however the user chooses
    $order : The order in which the products should be sorted, defaults to newest
 -->
@section('content')

<div class="container">
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
    <div class="row">
        @foreach($products as $product)
        <div class="col-12 col-lg-6 col-xl-4">
            <a class="text-decoration-none" href="{{ route('products.show', ['product' => $product->id]) }}">
            <div class="card mb-3 bg-primary text-light">
                <div class="card-header">{{$product->title}}<span class="float-right">${{$product->price}}</span></div>
                <div class="card-img py-1 bg-dark"><img class="rounded" src="{{ asset('img/products/'. $product->imageName) }}" width="100%"></div>
                <div class="card-footer"><button class="btn btn-dark float-right"><i class="foundicon-cart"></i> Add to Cart</button></div>

            </div>
            </a>
        </div>    <!--<br>{{$product->price}}<br>{{$product->sold}}<br><br> -->
        @endforeach
    </div>
    {{$products->appends(['order' => $order])->links()}}
</div>

@endsection