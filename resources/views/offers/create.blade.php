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
        <div class="flex-center position-ref full-height">
 <div class="  m-b-md">
{{--     <form class="row g-3 needs-validation"  method="post" action="{{  url('offers\store') }}">--}}
        @if(Session::has('success'))
     <div class="alert alert-info justify-content-start" role="alert">
        {{ Session::get('success') }}
     </div>
     @endif
     <form class="row g-3 needs-validation"  method="POST" action="{{  route('offers.store') }}">
         @csrf
{{--         <input name="_token" value="{{ csrf_token() }}">--}}
         <div class="col-md-4">
             <label for="validationCustom01" class="form-label">Name</label>
             <input type="text" class="form-control" name="name" id="validationCustom01"   >
             @error('name')
            <small class="form-text text-danger">{{ $message }}</small>
             @enderror
         </div>
         <div class="col-md-4">
             <label for="validationCustom02" class="form-label">Price</label>
             <input type="text" class="form-control" name="price" id="validationCustom02"   >
             @error('price')
             <small class="form-text text-danger">{{ $message }}</small>
             @enderror
         </div>
         <div class="col-md-4">
             <label for="validationCustomUsername" class="form-label">Details</label>
             <div class="input-group has-validation">
              <input type="text" class="form-control" name="details" id="validationCustomUsername" aria-describedby="inputGroupPrepend"  >
             @error('details')
                 <small class="form-text text-danger">{{ $message }}</small>
            @enderror
             </div>
         </div>
         <div class="col-12">
             <button class="btn btn-primary" type="submit">Submit form</button>
         </div>
     </form>
 </div>

        </div>
    </body>
</html>
