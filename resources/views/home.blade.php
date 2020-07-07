@extends('layouts.app')
<!-- See Reviews Link -->
<!-- https://www.google.com/search?hl=en-US&gl=us&q=Vintage+Treasures,+37+Main+St,+Logan,+UT+84321&ludocid=14600537354204602362&lsig=AB86z5W2ZOS_IqedkviVk2VRfLh4#lrd=0x87547e3fc16366a3:0xca9f875ddf2fdffa,1 -->
<!-- Write Review Link -->
<!-- https://www.google.com/search?hl=en-US&gl=us&q=Vintage+Treasures,+37+Main+St,+Logan,+UT+84321&ludocid=14600537354204602362&lsig=AB86z5W2ZOS_IqedkviVk2VRfLh4#lrd=0x87547e3fc16366a3:0xca9f875ddf2fdffa,3 -->

@section('content')

<!-------------------------- HEAD ------------------------->
<div id="spacer" class="my-5"></div>
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

<!-------------------------- FOOTER ------------------------->
<footer class="container">
    <div class="row text-center mb-3">
        <div class="col-12 col-lg-4 my-3">
            <h3>Contact</h3>
            <a class="mb-2 btn btn-dark text-light contactButton" href="tel:4353749436"><i class="foundicon-phone"></i>&nbsp;Call Now</a><br>
            <a class="btn btn-dark text-light contactButton" href="mailto:vintagetreasures@gmail.com"><i class="foundicon-mail"></i>&nbsp;Email Us</a>
        </div>
        <div class="col-12 col-lg-4 my-3">
            <h3>Address</h3>
            <p>37 North Main Street<br>Logan, UT 84321<br>United States</p>
            <a class="btn btn-dark text-light" id="callButton"><i class="foundicon-location"></i>&nbsp;Get Directions</a>
        </div>
        <div class="col-12 col-lg-4 my-3">
            <h3>Store Hours</h3>
            @foreach($hours as $hour)
                <div class="row text-left">
                    <div class="col-2"></div>
                    <div class="col-4">
                    {{ $hour->day }}:
                    </div>
                    <div class="col-6">
                        <p> <?php if($hour->isOpen) { echo $hour->openTime . " - " . $hour->closeTime;} else { echo "Closed";} ?></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="float-left"><a class="text-light" href="{{ route('login') }}">Login</a></div>
    <div class="text-right text-light">&copy; Vintage Treasures 2020</div>
</footer>
@endsection
