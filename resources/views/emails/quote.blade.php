@extends('layouts.email')

@section('content')

<div class="container">
    <h1>Quote Request - {{ $name }}</h1>
    <p>
        Phone: <?php echo $phoneNumber; ?> <br>
        Reply Email: <?php echo $email; ?><br>
        Message: <?php echo $msg; ?>
    </p>
</div>

@endsection