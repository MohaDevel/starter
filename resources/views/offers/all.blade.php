<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">  {{ $properties['native'] }}</a>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
        <div class="table-responsive">
            <div class="flex-center position-ref full-height">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('messages.offer name_ar.key')}}</th>
                         <th scope="col">{{__('messages.offer.Price')}}</th>
                        <th scope="col">{{__('messages.offer.Details_ar')}}</th>
                        <th scope="col">Photo</th>
                        <th scope="col">{{__('messages.offer.controls')}}</th>

                    </tr>
                    </thead>



                    <tbody>
                    @foreach($offers as $offer)
                        <tr>
                            <th scope="row">{{$offer -> id}}</th>
                            <td>{{$offer -> name}}</td>
                            <td>{{$offer -> price}}</td>
                            <td>{{$offer -> details}}</td>
                            <td><img src="images/offers/{{$offer -> photo}}" alt=""></td>
                            <td>
                                <a href="#" class="btn btn-danger">{{__('messages.offer.Delete')}}</a>
                                <a href="#" class="btn btn-info">{{__('messages.offer.Edit')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    </body>
</html>
