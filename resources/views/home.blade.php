@extends('layouts.app')
<!-- See Reviews Link -->
<!-- https://www.google.com/search?hl=en-US&gl=us&q=Vintage+Treasures,+37+Main+St,+Logan,+UT+84321&ludocid=14600537354204602362&lsig=AB86z5W2ZOS_IqedkviVk2VRfLh4#lrd=0x87547e3fc16366a3:0xca9f875ddf2fdffa,1 -->
<!-- Write Review Link -->
<!-- https://www.google.com/search?hl=en-US&gl=us&q=Vintage+Treasures,+37+Main+St,+Logan,+UT+84321&ludocid=14600537354204602362&lsig=AB86z5W2ZOS_IqedkviVk2VRfLh4#lrd=0x87547e3fc16366a3:0xca9f875ddf2fdffa,3 -->

@section('content')

<!-------------------------- HEAD ------------------------->
<div class="container">
    @if (session('message'))
        <div class="alert alert-{{session('message-bg')}}" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12 mt-5 text-center">
            <h1>Vintage Treasures</h1>
            <p class="mt-3">Antique Store in Logan, UT</p>
            <p id="open">
        </div>
    </div>
</div>
<footer class="container">
    <div class="row text-center">
        <div class="col-12 col-md-4">
            <h3>Contact</h3>
            <a class="btn btn-primary text-light" id="callButton">Call Now</a>
        </div>
        <div class="col-12 col-md-4">
            <h3>Address</h3>
        </div>
        <div class="col-12 col-md-4">
            <h3>Store Hours</h3>
        </div>
    </div>
</footer>
@endsection
