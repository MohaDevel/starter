@extends('layouts.app')

@section('content')
    <div class="alert alert-info"  style="display: none" id="messages_show">
        تم الحفظ بنجاح
    </div>
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="  m-b-md">
                {{--     <form class="row g-3 needs-validation"  method="post" action="{{  url('offers\store') }}">--}}
                @if(Session::has('success'))
                    <div class="alert alert-info justify-content-start" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form class="row g-3 needs-validation"   id="offerFormupdate" onsubmit="return false"  autocomplete="off">
                    @csrf
                    {{--         <input name="_token" value="{{ csrf_token(id="id_form_data") }}">--}}

                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Photo</label>
                        <input type="file" class="form-control" name="photo" id="validationCustom01"   >
                        @error('photo')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <input type="hidden" name="id" value="{{$offer->id}}">
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">{{__('messages.offer.key ar')}}</label>
                        <input type="text" class="form-control" name="name_ar" value="{{$offer->name_ar}}" id="validationCustom01"   >
                        @error('name_ar')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">{{__('messages.offer.key en')}}</label>
                        <input type="text" class="form-control" value="{{$offer->name_en}}" name="name_en" id="validationCustom01"   >
                        @error('name_en')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">{{__('messages.offer.Price')}}</label>
                        <input type="text" class="form-control" value="{{$offer->price}}" name="price" id="validationCustom02"   >
                        @error('price')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">{{__('messages.offer.Details ar')}}</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="details_ar" value="{{$offer->details_ar}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend"  >
                            @error('details_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">{{__('messages.offer.Details en')}}</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="details_en" value="{{$offer->details_en}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend"  >
                            @error('details_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" id="update_offer" >{{__('messages.offer.Submit form')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).on('click', '#update_offer', function (e) {
            e.preventDefault();

            var formData = new FormData($('#offerFormupdate')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('ajaxoffers.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        $('#messages_show').show();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>
@stop
