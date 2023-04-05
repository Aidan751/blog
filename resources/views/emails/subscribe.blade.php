{{-- subscription successfull template --}}
@extends('layouts.email')

@section('content')
    <div style="font-family: Helvetica, Arial, sans-serif;">
        <h1>Subscription successfull!</h1>
        <p>Hi there! Thank you for subscribing to our newsletter.</p>
        <p>Best regards, {{ config('app.name') }}</p>
    </div>
@endsection
