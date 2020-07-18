@extends('layouts.app')

@section('content')
<div class="my-5"></div>
<div class="container">
    <a class="btn btn-outline-dark" href="{{ route('home') }}">&lsaquo; Back</a><br>
    <div class="text-center">
        <img src="{{ asset('storage/' . $post->imgName) }}" width="75%"> 
    </div>
    <p class="my-3 text-left post-content">
    <span class="text-gray">Posted on <?php echo date_format($post->created_at, 'M jS, Y') ?></span><br>
    {{ $post->content }}
    </p>
</div>

@endsection