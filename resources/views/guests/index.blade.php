@extends('layouts.guest')

@section('page_title')
    Pappo
@endsection

@section('content_guest')
<section id="home">
    <div class="home-img flex">
        <div class="l">
            <img src="./img/l.svg" alt="">
        </div>
        <div class="r">
            <img src="./img/r.svg" alt="">
        </div>    
    </div>
    <div class="title">
        <p>EHI AMIGO COSA TI VA DI MANGIARE OGGI?</p>
    </div>
    <div class="btn-home">
        <a href="#plates">SCEGLI QUALCOSA <i class="fas fa-utensils"></i></a>
    </div>
    <div class="ciao">
        <a href="">ciao</a>
    </div>
</section>


@endsection

















































































<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pappo</title>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="{{ route('admin.index') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Pappo
                </div>
            </div>
        </div>
    </body>
</html> -->
