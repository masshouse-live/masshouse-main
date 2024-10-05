@extends('layouts.app')
@section('title')
    Privacy Policy
@endsection
@section('content')
    <!--zblog section-->

    <section class="individual-blogs " style="color: white">

        {!! $terms_and_conditions !!}

    </section>

    <style>
        p {
            color: white !important;
        }
    </style>
@endsection
