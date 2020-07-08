@extends('layouts.shop')
<!------------------ AVAILABLE VARIABLES  --------------->
<!-- 
    $products : Array of all products paginated in groups of 9, and ordered by however the user chooses
 -->
@section('content')

<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-12 col-lg-6 col-xl-4">Product</div>
        @endforeach
    </div>
</div>

@endsection