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
     <form class="row g-3 needs-validation"  method="POST" action="{{  route('offers.update',$offer-> id) }}" enctype="multipart/form-data">
{{--     <form class="row g-3 needs-validation"  method="POST" action="{{  url('offers.update/'.$offer_id) }}" enctype="multipart/form-data">--}}
         @csrf
{{--         <input name="_token" value="{{ csrf_token() }}">--}}

         <div class="col-md-4">
             <label for="validationCustom01" class="form-label">Photo</label>
             <input type="file" class="form-control" name="photo" id="validationCustom01"   >
             @error('photo')
             <small class="form-text text-danger">{{ $message }}</small>
             @enderror
         </div>


         <div class="col-md-4">
                 <label for="validationCustom01" class="form-label">{{__('messages.offer.key ar')}}</label>
             <input type="text" value="{{ $offer->name_ar }}" class="form-control" name="name_ar" id="validationCustom01"   >
             @error('name_ar')
            <small class="form-text text-danger">{{ $message }}</small>
             @enderror
         </div>
         <div class="col-md-4">
                 <label for="validationCustom01" class="form-label">{{__('messages.offer.key en')}}</label>
             <input type="text" class="form-control" value="{{ $offer->name_en }}" name="name_en" id="validationCustom01"   >
             @error('name_en')
            <small class="form-text text-danger">{{ $message }}</small>
             @enderror
         </div>
         <div class="col-md-4">
             <label for="validationCustom02" class="form-label">{{__('messages.offer.Price')}}</label>
             <input type="text" class="form-control" value="{{ $offer->price }}" name="price" id="validationCustom02"   >
             @error('price')
             <small class="form-text text-danger">{{ $message }}</small>
             @enderror
         </div>
         <div class="col-md-4">
             <label for="validationCustomUsername" class="form-label">{{__('messages.offer.Details ar')}}</label>
             <div class="input-group has-validation">
              <input type="text" class="form-control" value="{{ $offer->details_ar }}" name="details_ar" id="validationCustomUsername" aria-describedby="inputGroupPrepend"  >
             @error('details_ar')
                 <small class="form-text text-danger">{{ $message }}</small>
            @enderror
             </div>
         </div>
         <div class="col-md-4">
             <label for="validationCustomUsername" class="form-label">{{__('messages.offer.Details en')}}</label>
             <div class="input-group has-validation">
              <input type="text" class="form-control" value="{{ $offer->details_en }}" name="details_en" id="validationCustomUsername" aria-describedby="inputGroupPrepend"  >
             @error('details_en')
                 <small class="form-text text-danger">{{ $message }}</small>
            @enderror
             </div>
         </div>
         <div class="col-12">
             <button class="btn btn-primary" type="submit">{{__('messages.offer.Submit form')}}</button>
         </div>
     </form>
 </div>

        </div>
    </body>
</html>
