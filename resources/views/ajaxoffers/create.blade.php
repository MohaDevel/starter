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
                <form class="row g-3 needs-validation"   id="offerForm" onsubmit="return false"  autocomplete="off">
                    @csrf
                    {{--         <input name="_token" value="{{ csrf_token(id="id_form_data") }}">--}}

                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Photo</label>
                        <input type="file" class="form-control" name="photo" id="validationCustom01"   >
                        @error('photo')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">{{__('messages.offer.key ar')}}</label>
                        <input type="text" class="form-control" name="name_ar" id="validationCustom01"   >
                        @error('name_ar')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">{{__('messages.offer.key en')}}</label>
                        <input type="text" class="form-control" name="name_en" id="validationCustom01"   >
                        @error('name_en')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">{{__('messages.offer.Price')}}</label>
                        <input type="text" class="form-control" name="price" id="validationCustom02"   >
                        @error('price')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">{{__('messages.offer.Details ar')}}</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="details_ar" id="validationCustomUsername" aria-describedby="inputGroupPrepend"  >
                            @error('details_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">{{__('messages.offer.Details en')}}</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="details_en" id="validationCustomUsername" aria-describedby="inputGroupPrepend"  >
                            @error('details_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" id="save_offer" >{{__('messages.offer.Submit form')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@stop


{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(document).on('click','#save_offer',function (e){--}}
{{--            // var FormData = new FormData($('#id_form_data')[0]);--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                type:'POST',--}}
{{--               // enctype:"multipart/form-data",--}}
{{--                url:"{{route('ajax.offersStore')}}",--}}
{{--                // data:FormData,--}}
{{--                // processData:false,--}}
{{--                // contentType:false,--}}
{{--                // cache:false,--}}
{{--                // crossDomain: true,--}}
{{--                data:--}}
{{--                    {--}}
{{--                        '_token': "{{csrf_token()}}",--}}
{{--                        'photo':$("input[name='photo']").val(),--}}
{{--                        'name_ar':$("input[name='name_ar']").val(),--}}
{{--                        'name_en':$("input[name='name_en']").val(),--}}
{{--                        'price':$("input[name='price']").val(),--}}
{{--                        'details_en':$("input[name='details_en']").val(),--}}
{{--                        'details_ar':$("input[name='details_ar']").val(),--}}
{{--                    },--}}

{{--                success:function (data){--}}
{{--                if(data.status == true){--}}
{{--                    $('#messages_show').show();--}}
{{--                }--}}
{{--                },error:function (reject){--}}

{{--                }--}}
{{--            })--}}
{{--        });--}}

{{--    </script>--}}
{{--@stop--}}

@section('scripts')
    <script>
        $(document).on('click', '#save_offer', function (e) {
            e.preventDefault();

            var formData = new FormData($('#offerForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('ajax.offersStore')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        $('#success_msg').show();
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
