@extends('layouts.app')
@section('title')
    Privacy Policy
@endsection
@section('content')
    <!--zblog section-->

    <section class="individual-blogs " style="color: white">

        {!! $cookies_policy !!}

    </section>

    <style>
        p {
            color: white !important;
        }
    </style>
@endsection
