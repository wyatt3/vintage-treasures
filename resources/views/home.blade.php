@extends('layouts.app')
<!-- See Reviews Link -->
<!-- https://www.google.com/search?hl=en-US&gl=us&q=Vintage+Treasures,+37+Main+St,+Logan,+UT+84321&ludocid=14600537354204602362&lsig=AB86z5W2ZOS_IqedkviVk2VRfLh4#lrd=0x87547e3fc16366a3:0xca9f875ddf2fdffa,1 -->
<!-- Write Review Link -->
<!-- https://www.google.com/search?hl=en-US&gl=us&q=Vintage+Treasures,+37+Main+St,+Logan,+UT+84321&ludocid=14600537354204602362&lsig=AB86z5W2ZOS_IqedkviVk2VRfLh4#lrd=0x87547e3fc16366a3:0xca9f875ddf2fdffa,3 -->


<!-------------------------- AVAILABLE VARIABLES ------------------------->
<!-- 
    $hours : Array of Business Hours Objects
    $posts : Array of Blog Posts Objects for Updates section
    $gallery : Array of Images for Gallery section
 -->


@section('content')

<!-------------------------- HEAD ------------------------->
<div id="mastMobile" class="mast py-3 text-center">
    <img src="{{ asset('img/MastImg.jpg') }}">
</div>
<div id="spacer" class="my-5"></div>
<div class="container">
    @if(Session('message'))
    <div class="alert alert-success">Message Sent! We'll get back to you as soon as we can!</div>
    @endif
    <div class="row">
        <div id="pageTitle" class="col-12 mt-5 text-center">
            <h1>Vintage Treasures</h1>
            <p class="mt-3 mb-1">Antique Store in Logan, UT</p>
            <p id="open" class="mt-0"></p>
            <a class="btn btn-dark text-light" data-toggle="modal" data-target="#quoteModal"><i class="foundicon-mail"></i>&nbsp;Get Quote</a>
        </div>
    </div>
</div>
<div id="mastMain" class="mast py-5 text-center">
    <img class="rounded" src="{{ asset('img/MastImg.jpg') }}">
</div>


<!-------------------------- UPDATES ------------------------->
<div class="bg-overlay pb-3">
    <div class="sectionheader my-2 py-2 text-center" id="updates"><hr><h4>UPDATES<h4></div>
    <div class="container">
        <div class="row mb-2">
            @foreach($posts as $post)
            <div class="col-12 col-md-4 mb-2">
                <a class="text-decoration-none" href="{{ route('post.show', ['id' => $post->id]) }}">
                <div class="card bg-light">
                    <div class="card-img-top"><img class="rounded" src="{{ asset('img/posts/' . $post->imgName) }}" width="100%"></div>
                    <div class="card-body text-center">
                        <p class="mt-2 mb-0 text-left text-dark"><span class="text-gray">Posted on <?php echo date_format($post->created_at, 'M jS, Y') ?></span><br>{{ $post->content }}</p>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
        {{$posts->fragment('updates')->links()}}
    </div>
</div>
<!-------------------------- GALLERY ------------------------->
<div class="sectionheader my-2 py-2 text-center" id="gallery"><hr><h4>GALLERY</h4></div>
<div class="container">
    <div class="row mb-3">
        @foreach($gallery as $image)
        <div class="col-12 col-lg-6 col-xl-4 mb-3"><a data-toggle="modal" data-target="#<?php echo "galleryModal" . $image->id ?>"><img class="rounded galleryImage" src="{{asset($image->imagePath()) }}" width="100%"></a></div>
        <!------------- Gallery Modal ---------------------->
        <div class="modal fade" id="<?php echo "galleryModal" . $image->id ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content bg-light text-dark">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <img class="rounded" src="{{asset($image->imagePath()) }}" width="100%">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$gallery->fragment('gallery')->links()}}
</div>


<!-------------------------- FOOTER ------------------------->
<div class="bg-overlay">
    <div class="sectionheader my-2 py-2 text-center" id="contact"><hr><h4>MORE INFO<h4></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-lg-4 my-3">
                <h3>Contact</h3>
                <a class="mb-2 btn btn-dark text-light contactButton" href="tel:4353749436"><i class="foundicon-phone"></i>&nbsp;Call Now</a><br>
                <a class="btn btn-dark text-light contactButton" href="mailto:vintagetreasures@gmail.com"><i class="foundicon-mail"></i>&nbsp;Email Us</a>
            </div>
            <div class="col-12 col-lg-4 my-3">
                <h3>Address</h3>
                <p>37 North Main Street<br>Logan, UT 84321<br>United States</p>
                <a class="btn btn-dark text-light" href="https://www.google.com/maps/dir//Vintage+Treasures/data=!4m8!4m7!1m0!1m5!1m1!1s0x87547e3fc16366a3:0xca9f875ddf2fdffa!2m2!1d-111.83540939999999!2d41.7321281" target="_blank"><i class="foundicon-location"></i>&nbsp;Get Directions</a>
            </div>
            <div class="col-12 col-lg-4 mt-3">
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
    </div>
</div>

<!------------------------- Quote Modal ------------------------------------>
<div class="modal fade" id="quoteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-light text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Get A Quote</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group mb-0" name="quoteValidate" action="{{ route('quote') }}" method="post">
                    @csrf
                    <label for="name">Full Name:</label>
                    <input class="form-control mb-1 form-input-light" type="text" id="name" name="name"><br>
                    <label for="phoneNum">Phone Number:</label>
                    <input class="form-control mb-1 form-input-light" type="text" id="phoneNum" name="phoneNum"><br>
                    <label for="email">Email:</label>
                    <input class="form-control mb-1 form-input-light" type="text" id="email" name="email"><br>
                    <label for="message">Message:</label>
                    <textarea rows="4" class="form-control form-input-light" id="message" name="message"></textarea>
                    <p class="text-gray mt-3 mb-0">Be sure to avoid including any sensitive information that you don't want to share with this business.</p>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Send Message">
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
