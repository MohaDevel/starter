<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="content">--}}
{{--                <div class="title m-b-md">--}}
{{--                    Laravel--}}
{{--                </div>--}}

{{--                <div class="links">--}}
{{--                    <a href="{{route('b')}}">Docs</a>--}}
{{--                    <a href="{{route('c')}}">Laracasts</a>--}}
{{--                    <a href="{{route('d')}}">News</a>--}}
{{--                    <a href="https://blog.laravel.com">Blog</a>--}}
{{--                    <a href="https://nova.laravel.com">Nova</a>--}}
{{--                    <a href="https://forge.laravel.com">Forge</a>--}}
{{--                    <a href="https://vapor.laravel.com">Vapor</a>--}}
{{--                    <a href="https://github.com/laravel/laravel">GitHub</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <p>{{ $data }}--</p>--}}
{{--            <span>{{$mohammed_Alhakmy}} -- {{ $age }}</span>--}}

{{--            <p>{{ $objd -> name }}</p>--}}
{{--            <p>{{ $obj->name }}</p>--}3}
{{--            <p>{{ $obj->description }}</p>--}}
{{--            <p>{{ $obj->description }}</p>--}}
{{--            <a href="">{{ $name }}</a>--}}
            <h1>{{__('messages.welcome')}}</h1>
{{--            @if($name == 'mohammed aLAHAMYs ')--}}
{{--                <p>yes focurese</p>--}}
{{--            @else--}}
{{--                <p>my name is mohammed</p>--}}
{{--            @endif--}}
{{--            @foreach($data as $_data)--}}
{{--                <p>{{ $_data }}</p>--}}
{{--            @endforeach--}}
{{--            @if($name == 'ahmed')--}}
{{--                <span>77777{{$name}}</span>--}}
{{--            @elseif($name == 'ahmed')--}}
{{--                <span>99999{{$name}}</span>--}}
{{--            @else--}}
{{--                --}}
{{--            @endif--}}
{{--            @forelse($data as $_data)--}}
{{--                <p>{{$_data}}</p>--}}
{{--            @empty--}}
{{--                <p>this is empty arrray</p>--}}
{{--            @endforelse--}}
            <p>Laravel</p>
        </div>
    </body>
</html>
